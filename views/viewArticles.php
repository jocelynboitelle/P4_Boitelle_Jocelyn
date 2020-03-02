<?php $title = "Articles" ?>

<?php ob_start(); ?>

<div class="articles">

<h1>Articles</h1>

<!-- 
    Si je suis connecté:
        -boutton create 
-->

<?php foreach ($articles as $article): ?>
    <a href="article&id=<?= $article->id() ?>">

        <h2> <?= $article->title() ?> </h2>
        <p> <?= $article->content() ?> </p>
        <!-- 
            Si je suis connecté:
                -boutton update(id)
                -boutton delete(id)
        -->
    </a>
<?php endforeach; ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
