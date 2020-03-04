<?php $title = "Articles" ?>

<?php ob_start(); ?>

<div class="articles">

<h1>Articles</h1>

<?php if (isset($_SESSION['connected'])) { ?>

    <a class="create" href="createArticle">
        <button class="submit">Créer un article</button>
    </a>

<?php } ?>

<?php foreach ($articles as $article): ?>

    <div class="article" onclick="location.href='article&id=<?= $id = $article->id(); ?>'">

        <?php if (isset($_SESSION['connected'])) { ?>
        
        <div class="box">

        <div class="content-article">
            <h2> <?= $article->title(); ?> </h2>
        </div>
        
        <div class="buttons">
            <p> <?= substr($article->content(), 0, 100); ?>... </p>
            <a class="edit" href="updateArticle&id=<?= $id ?>" title="éditer"><i class="fas fa-edit fa-lg"></i></a>
            <a class="trash" href="deleteArticle&id=<?= $id ?>" title="supprimer"><i class="fas fa-trash fa-lg"></i></a>
        </div>

        </div>

        <?php } else {?>

        <div class="content-article">
            <h2> <?= $article->title(); ?> </h2>
            <p> <?= substr($article->content(), 0, 500); ?>...</p>
            <h3>Lire la suite.</h3>
        </div>

        <?php } ?>

    </div>

<?php endforeach; ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
