<?php $title = "connexion / déconnexion" ?>
<?php $style = "Admin" ?>

<?php ob_start(); ?>

<section class="admin">
    
    <?php if (isset($_SESSION['connected']) == true) { ?>

    <form class="forms" method="post" action="logout" >
        <p>Vous êtes connecté en tant que <?= $_SESSION['user'] ?></p>
        <input class="submit" type="submit" name="logout" value="Se deconnecter">
    </form>

    <?php  } else { ?>

    <form class="forms" method="post" action="login" >
        <h1>Administration</h1>
        <input class="input" type="text" name="user_connexion" placeholder="Identifiant" required>
        <input class="input" type="password" name="password_connexion" placeholder="Mot de passe" required>
        <input class="submit" type="submit" name="login" value="Connexion">
    </form>

    <?php } ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
