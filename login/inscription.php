<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require '../config/db.php';
require '../config/inscription.php';
require '../partials/headerLogins.php';
?>

<div class="login_article">
   <a href="../index.php">
        <button class="return">
            <div class="cross_1"></div>
            <div class="cross_2"></div>
        </button>
    </a>
    <h1 class="login_title">Inscription</h1>
   <?php
       include 'formUserLogin.php';
   ?>
       <p><?= $message ?></p>
       <form action="#" method="post" class="login_form">
           <div class="login name">
               <label for="name" class="login_title">Name : </label>
               <input type="name" name="name" class="login_input" placeholder="Jacques Lafrêche">
           </div>
           <div class="login email">
               <label for="email" class="login_title">Email : </label>
               <input type="email" name="email" class="login_input" placeholder="Jacques.Lafrêche@orange.fr">
           </div>
           <div class="login password">
               <label for="password" class="login_title">Password : </label>
               <input type="password" name="password" class="login_input" placeholder="JacquesLafrêche">
           </div>
           <div class="login submit">
               <input type="submit">
           </div>
       </form>
</div>
<?php
    include '../partials/footerLogins.php';
