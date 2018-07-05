<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require '../config/db.php';
require '../config/login.php';
require '../partials/headerLogins.php';
?>
<div class="login_article">
    <a href="../index.php">
        <button class="return">
            <div class="cross_1"></div>
            <div class="cross_2"></div>
        </button>
    </a>
    <h1 class="login_title">Login</h1>
    <?php require 'formUserLogin.php';?>
    <p><?= $message ?></p>
    <form action="#" method="post" class="login_form">
        <div class="login email">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="login_input">
        </div>
        <div class="login password">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="login_input">
        </div>
        <div class="login submit">
            <input type="submit">
        </div>
    </form>
    <a href="inscription.php" class="notLogin_title">
        <h2>Pas encore inscrit ?</h1>
    </a>
</div>
<?php
include '../partials/footerLogins.php';

