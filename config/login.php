<?php

$message = '';

if(!empty($_POST))
{
    $email = $_POST['email'];
    // Ancienne methode
    // $salt = hash('md5', $email.SALT);
    // $password = hash('sha256', $salt.$_POST['password']);
    // Nouvelle methode :
    $email = $_POST['email'];
    $password = $_POST['password'];

    $prepare = $pdo->prepare('
        SELECT
            *
        FROM
            users
        WHERE
            email = :email
        LIMIT
            1
    ');
    $prepare->bindValue('email', $email);
    $prepare->execute();
    $user = $prepare->fetch();

    if(!$user)
    {
        $message = 'Email not found';
    }
    else
    {
        if(password_verify($password, $user->password))
        {
            $_SESSION['user'] = [
                'email' => $user->email,
                'name' => $user->name,
            ];
            $message = 'You are logged in';
            header('location: private/profile.php');
        }
        else
        {
            $message = 'Wrong password';
        }
    }
}
