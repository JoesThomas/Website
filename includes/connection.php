<?php
    declare(strict_types=1);
    require 'config.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $dbCon = null;
    try {
        $dbCon = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUser, $dbPassword);
        $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

