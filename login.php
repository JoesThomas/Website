<?php
require_once __DIR__ . '/includes/portfolio-auth.php';
$error = '';
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (!portfolio_check_csrf((string)($_POST['csrf'] ?? ''))) {
        $error = 'Session expired. Refresh and try again.';
    } elseif (($_POST['action'] ?? '') === 'logout') {
        portfolio_logout();
        header('Location: login.php');
        exit;
    } elseif (($_POST['action'] ?? '') === 'login') {
        if (portfolio_login((string)($_POST['username'] ?? ''), (string)($_POST['password'] ?? ''))) {
            header('Location: dashboard.php');
            exit;
        }
        usleep(350000);
        $error = 'Incorrect username or password.';
    }
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>Sign in | Joe Thomas</title><link rel="stylesheet" href="assets/css/portfolio.css?v=5"></head><body>
<?php include __DIR__ . '/includes/Header.php'; ?>
<main class="portfolio"><div class="wrap"><section class="cardx" style="max-width:520px;margin:auto"><h1><?php echo portfolio_logged_in() ? 'Your account' : 'Sign in'; ?></h1>
<?php if ($error): ?><p class="status error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
<?php if (portfolio_logged_in()): ?>
<p>You are signed in. <a href="dashboard.php">Open your dashboard</a>.</p>
<form method="post"><input type="hidden" name="csrf" value="<?php echo htmlspecialchars(portfolio_csrf(), ENT_QUOTES, 'UTF-8'); ?>"><button class="action" name="action" value="logout" type="submit">Sign out</button></form>
<?php elseif (!portfolio_auth_config()): ?>
<p>Sign-in is not configured yet. Add a private authentication JSON file on your hosting server.</p>
<?php else: ?>
<form method="post" autocomplete="on"><input type="hidden" name="csrf" value="<?php echo htmlspecialchars(portfolio_csrf(), ENT_QUOTES, 'UTF-8'); ?>">
<div class="field"><label for="username">Username</label><input id="username" name="username" autocomplete="username" maxlength="100" required></div>
<div class="field"><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required></div>
<button class="action primary" type="submit" name="action" value="login">Sign in</button></form>
<?php endif; ?></section></div></main></body></html>
