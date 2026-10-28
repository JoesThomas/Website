<?php
    $query = $dbCon->prepare("SELECT ID,username,position FROM users WHERE ID = :userID ");
    $query->bindParam(':userID',  $_SESSION['user_session'], PDO::PARAM_INT);
    $query->execute();

    $queryResult = $query->fetch(PDO::FETCH_ASSOC);
    // store info in vars
    $user_ID = $queryResult["ID"];
    $username = $queryResult["username"];
    $positions = $queryResult["position"];
