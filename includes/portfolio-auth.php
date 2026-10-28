<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    if (!headers_sent()) {
        ini_set('session.use_strict_mode', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.cookie_samesite', 'Lax');
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ini_set('session.cookie_secure', '1');
    }
    session_start();
}
function portfolio_auth_config(): ?array {
    $path = getenv('PORTFOLIO_AUTH_CONFIG') ?: '';
    if (!$path || !is_readable($path)) return null;
    $data = json_decode(file_get_contents($path), true);
    if (!is_array($data) || empty($data['username']) || empty($data['password_hash'])) return null;
    return $data;
}
function portfolio_logged_in(): bool {
    return !empty($_SESSION['portfolio_authenticated']);
}
function portfolio_login(string $username, string $password): bool {
    $config = portfolio_auth_config();
    if (!$config || !hash_equals((string)$config['username'], $username) ||
        !password_verify($password, (string)$config['password_hash'])) return false;
    session_regenerate_id(true);
    $_SESSION['portfolio_authenticated'] = true;
    $_SESSION['portfolio_username'] = $username;
    return true;
}
function portfolio_logout(): void {
    unset($_SESSION['portfolio_authenticated'], $_SESSION['portfolio_username']);
    session_regenerate_id(true);
}
function portfolio_csrf(): string {
    if (empty($_SESSION['portfolio_csrf'])) $_SESSION['portfolio_csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['portfolio_csrf'];
}
function portfolio_check_csrf(string $token): bool {
    return hash_equals(portfolio_csrf(), $token);
}
