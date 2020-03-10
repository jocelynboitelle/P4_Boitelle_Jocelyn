<?php $title = $article[0]->title(); ?>
<?php $style = 'Article' ?>

<?php ob_start(); ?>

<section class="article">
    <section class="content-article">
        <h1><?= $article[0]->title(); ?></h1>
        <p><?= $article[0]->content(); ?></p>
    </section>
    <div class="element"><div class="bar"></div></div>
    <section class="comments">
        <h2>Commentaires</h2>

        <?php foreach ($comments as $comment): ?>

            <div class="comment">
                <div class="upper">
                    <h3><?= $comment->user(); ?></h3>
                </div>
                <div class="lower">
                    <p><?= $comment->content(); ?></p>
                    <a href="article&id=<?= $_GET['id'] ?>&report=<?= $comment->id(); ?>"><button class="submit">Signaler</button></a>
                </div>
            </div>

        <?php endforeach; ?>

        <h2>Ajouter un commentaire</h2>
        <form class="forms" method="post" action="article&id=<?= $_GET['id']?>">
            <input class="name" type="text" name="name_comment" placeholder="Nom" required>
            <textarea class="text" name="post_comment" placeholder="Votre commentaire" required></textarea>
            <input class="submit" type="submit" name="submit" value="Envoyer">
        </form>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
