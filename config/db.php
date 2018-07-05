<?php 

session_start();


define('DB_HOST', 'musicexpvyarmol9.mysql.db');
define('DB_PORT', '21');
define('DB_NAME', 'musicexpvyarmol9');
define('DB_USER', 'musicexpvy');
define('DB_PASS', 'evMFHyzqUZdB');


try
{
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e)
{
    die('Couldn\'t connect');
}

