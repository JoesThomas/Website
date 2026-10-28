<?php
require_once __DIR__ . '/includes/portfolio-auth.php';
if (!portfolio_logged_in()) {
    header('Location: login.php');
    exit;
}
header('Cache-Control: no-store, private');
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>Dashboard | Joe Thomas</title><link rel="stylesheet" href="assets/css/portfolio.css?v=5"></head><body>
<?php include __DIR__ . '/includes/Header.php'; ?>
<main class="portfolio"><div class="wrap"><section class="cardx"><p class="eyebrow">Private dashboard</p><h1>Welcome back</h1><p>Authentication is enabled. This is a placeholder for a future secure connection to your Thermal Receipt Printer application.</p><p>No printer access or financial information is exposed here yet.</p><div class="actions"><a class="action" href="allprojects.php#receipt-printer">Explore the project</a><a class="action" href="login.php">Account settings / sign out</a></div></section></div></main></body></html>
