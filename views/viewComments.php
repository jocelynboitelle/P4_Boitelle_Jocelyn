<?php $title = "Commentaires" ?>
<?php $style = 'Comments' ?>

<?php ob_start(); ?>

<section class="comments">

<h1>Commentaires</h1>

<?php foreach ($comments as $comment): ?>
    
<?php 
if ($comment->report() > 0)
    $report = "bad";
else 
    $report = "good";
?>

    <div class="comment">
        <div class="box<?= $report ?>">
            <div class="section">
                <h2> <?= $comment->user(); ?></h2>
                <p class="<?= $report ?>">Signalé <?= $comment->report(); ?> fois.</p>
            </div>
            <div class="section">
                <p class="content-comment"> <?= $comment->content(); ?></p>
                <div class="buttons">
                    <a class="eye" href="article&id=<?= $comment->id_article(); ?>" title="aperçu de l'article"><i class="fas fa-eye fa-lg"></i></a>
                    <a class="fas fa-check fa-lg" href="comments&check=<?= $comment->id(); ?>" title="signalement à zéro"></a>
                    <a class="fas fa-trash fa-lg" onClick="confirmDelete('comments&delete=' + <?= $comment->id(); ?>)" title="supprimer le commentaire"></a>
                </div>
            </div>
            <p>posté le: <?= $comment->date(); ?></p>
        </div>
    </div>

<?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
