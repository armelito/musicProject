<?php
$message = '';

if(!empty($_POST))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $prepare = $pdo->prepare('
        INSERT INTO
            users (name, email, password)
        VALUES
            (:name, :email, :password)
    ');
    $prepare->bindValue('name', $name);
    $prepare->bindValue('email', $email);
    $prepare->bindValue('password', $password);
    $prepare->execute();
    
    $message = 'User registered';
}
