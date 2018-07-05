<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
require '../../config/db.php';
require '../../config/profile.php'; 
require '../../partials/headerPrivate.php';
include '../formUserPrivate.php';
?>
<div class="profil_page">
    <h1 class="hello_user">Bonjour <?= $_SESSION['user']['name'] ?></h1>
    <h2 class="title_user">Play your music</h2>
    <a href="drumkit.php" class="drum">
        <div class="button_game">
            <p class="text_create">Drumkit</p>
        </div>
    </a>
    <a href="hero.php" class="hero">
        <div class="button_game">
            <p class="text_create">Hero</p>
        </div>
    </a>
</div>   
<?php
require '../../partials/footerPrivate.php';
