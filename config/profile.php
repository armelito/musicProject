<?php

    // User not logged in
    if(empty($_SESSION['user']))
    {
        header('location: login.php');
        exit;
    }
$query = $pdo->query('SELECT * FROM tasks');
$tasks = $query->fetchAll();

