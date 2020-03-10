<?php $title = "Article" ?>
<?php $style = 'Update' ?>

<?php ob_start(); ?>

<section class="article">

    <?php if (isset($_GET['create'])) {?>

    <form method="post" action="articles&save=0">

    <?php } else { ?>

    <form method="post" action="articles&save=<?= $_GET['update'] ?>">

    <?php } ?>

        <div class="header">
            <div class="id">
                <label for="id_article"><h3>N°:</h3></label>
                <input class="input" type="text" name="id_article" placeholder="numéro du chapitre" value="<?= $id_article ?>" required>
            </div>
            <div class="status">
            </br><input type="checkbox" name="published" value="1" <?= $checked ?>>En ligne
            </div>
        </div>

        <label for="title"><h3>TITRE DU CHAPITRE : </h3></label>
        <input id="title" class="input" type="text" name="title" value="<?= $title_article ?>">

        <label for="tiny"><h3>CONTENU DU CHAPITRE : </h3></label>
        <textarea class="input" id="tiny" name="content"><?= $content_article; ?></textarea>

        <input id="save-article" class="submit" type="submit" name="submit" value="Enregistrer">
        
    </form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
