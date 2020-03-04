<?php $title = "Admin" ?>

<?php ob_start(); ?>

<div class="admin">
    
    <!-- Si je suis connecté -->
    <?php if (isset($_SESSION['connected']) == true) { ?>


    <form class="forms" method="post" action="logout" >
        <p>Vous êtes connecté en tant que <?= $_SESSION['user'] ?></p>
        <input class="submit" type="submit" name="logout" value="Se deconnecter">
    </form>

    <!-- Sinon -->
    <?php  } else { ?>

    <form class="forms" method="post" action="login" >
        <h1>Administration</h1>
            <input class="name" type="text" name="user_connexion" placeholder="Identifiant" required>
            <input class="password" type="password" name="password_connexion" placeholder="Mot de passe" required>
            <input class="submit" type="submit" name="login" value="Connexion">
    </form>

    <?php } ?>

    <p><?= $message_connexion ?? '' ?></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
