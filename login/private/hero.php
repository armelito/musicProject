<?php
require '../../config/db.php';
require '../../config/profile.php'; 
require '../../partials/headerPrivate.php';
include '../formUserPrivate.php';
?>
    <div class="gameMenu">
        <h1>Rythm Hero</h1>
        <p>Chose your song</p>
        <div class="song s1">
            <p>Kong - Bonobo</p>
            <p>Difficulty : 1</p>
        </div>
        <div class="song s2">
            <p>Delta - C2C</p>
            <p>Difficulty : 2 (Score x2)</p>
        </div>
        <div class="song s3">
            <p>TURBO KILLER - Carpenter Brut</p>
            <p>Difficulty : 3 (Score x3)</p>
        </div>    
    </div>

    <div class="container">
        <canvas class="canvas"></canvas>
    </div>
    <audio class="song1" src="../../assets/sounds/bonobo-kong.mp3">
        Your browser doesn't support video API
    </audio>
    <audio class="song2" src="../../assets/sounds/c2c-delta.mp3">
        Your browser doesn't support video API
    </audio>
    <audio class="song3" src="../../assets/sounds/carpenter-turbokiller.mp3">
        Your browser doesn't support video API
    </audio>

    <div class="finalScore">
    </div>
    <?php
require '../../partials/footerPrivate.php';
