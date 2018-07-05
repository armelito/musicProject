<ul class="form_user">
    <?php if(empty($_SESSION['user'])): ?>
        <li class="form_line save"><a href="login/inscription.php">inscription</a></li>
        <li class="form_line"><a href="login/login.php">login</a></li>
    <?php else: ?>
        <li class="form_line exit"><a href="login/logout.php">logout</a></li>
    <?php endif ?>
</ul>