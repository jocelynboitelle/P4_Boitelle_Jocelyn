<?php $title = "Articles" ?>
<?php $style = 'Articles' ?>

<?php ob_start(); ?>

<div class="articles">
    <h1>Articles</h1>

    <?php if (isset($_SESSION['connected'])) { ?>

    <a class="center" href="articles&create">
        <button class="submit">Créer un article</button>
    </a>

    <?php } ?>

    <?php foreach ($articles as $article): ?>

    <?php $id = $article->id(); ?>

    <div class="article">

        <?php if (isset($_SESSION['connected'])) { ?>

        <div class="id-article"><?= $article->id_article(); ?></div>
        <div class="box">
            <div class="upper">
                <h2> <?= $article->title(); ?> </h2>
            </div>
            <div class="lower">
                <div class="article-admin"> <?= substr($article->content(), 0, 200); ?>...</div>
                <div class="buttons">
                    <a class="eye" href="article&id=<?= $id ?>" title="aperçu"><i class="fas fa-eye fa-lg"></i></a>
                    <a class="edit" href="articles&update=<?= $id ?>" title="éditer"><i class="fas fa-edit fa-lg"></i></a>
                    <a class="trash" onClick="confirmDelete('articles&delete=' + <?= $id ?>)" title="supprimer"><i class="fas fa-trash fa-lg"></i></a>
                </div>
            </div>
        </div>

        <?php } else {?>

        <div class="box-article">
            <div class="content-article">
                <h2> <?= $article->title(); ?> </h2>
                <div> <?= substr($article->content(), 0, 500); ?></div>
            </div>
            <div class="center">
                <button class="submit" onclick="location.href='article&id=<?= $id ?>'">Lire la suite</button>
            </div>
        </div>

        <?php } ?>

    </div>

    <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
