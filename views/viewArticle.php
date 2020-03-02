<?php $title = $article[0]->title() ?>

<?php ob_start(); ?>

<div class="article">

    <h1> <?= $article[0]->title() ?> </h1>
    <p> <?= $article[0]->content() ?> </p>

    <div class="element"><div class="bar"></div></div>

    <div class="comments">

        <h2>Commentaires</h2>

        <form class="forms" method="post" action="article&id=<?= $_GET['id']?>">
            <input class="name" type="text" name="name_comment" placeholder="Nom" required>
            <textarea class="text" name="post_comment" placeholder="Votre commentaire" required></textarea>
            <input class="submit" type="submit" name="submit" value="Envoyer">
        </form>

        <p><?= $this->message_comment ?? '' ?></p>

        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <h3> <?= $comment->user() ?> </h3>
                <p> <?= $comment->content() ?> </p>
                <a href="article&id=<?= $_GET['id'] ?>&report=<?= $comment->id() ?>"><button>Signaler</button></a>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
