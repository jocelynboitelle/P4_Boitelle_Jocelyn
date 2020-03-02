<?php $title = "Accueil" ?>

<?php ob_start(); ?>

<div class="header">
    <h1 class="title">Un billet simple pour l'Alaska</h1>

</div>

<div class="bio">
    <p>test</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
