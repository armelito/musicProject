<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/header.css">
    <link rel="stylesheet" href="../assets/styles/formUser.css">
    <link rel="stylesheet" href="../assets/styles/drumkit.css">
    <link rel="stylesheet" href="../assets/styles/loginForm.css">
    <title>Drumkit</title>
</head>
<body>
<header class="home_header">
    <div class="home__title">
        <a class="logo_home" href="../index.php">
            <?php if(!empty($_SESSION['user'])): ?>
            <p>Mon profil</p>
            <?php else: ?>
            <p>Armel Prod'</p>
            <?php endif ?>
        </a>
    </div>
    <div class="home_date">
        <span class="text_day">
            <?php echo date('j'); ?>
        </span>
        <span class="text_month">
            <?php echo date('M'); ?>
        </span>
        <span class="text_year">
            <?php echo date('Y'); ?>
        </span>
        <span class="text_day_week">
            <?php echo date('l'); ?>
        </span>
        <span class="timer"></span>
    </div>
</header>