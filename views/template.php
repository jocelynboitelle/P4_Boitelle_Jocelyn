<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Jean Forteroche - <?= $title ?></title>
        <link href="../public/css/style<?= $title ?>.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdn.tiny.cloud/1/ewzsiip33a1my2zwspbb5uuxo8dg1o815xvg6xd2ky41dyb2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector: '#tiny'});</script>
    </head>

    <nav class=top-bar>
        <div class="menu">
            <li><a class="link" href="accueil">Accueil</a></li>
            <li><a class="link" href="articles">Articles</a></li>
            <?php if (isset($_SESSION['connected'])) { ?>
            <li><a class="link" href="comments">Commentaires</a></li>
            <?php } ?>
        </div>
        <div class="menu">
            <li><a class="auteur" href="login">Jean Forteroche</a></li>
        </div>
    </nav>

    <?php if (isset($this->message_comment) != NULL) { ?>

        <div class="alert">
            <div class="<?= $this->typeAlert ?>">
                <p class="message"><?= $this->message_comment ?? '' ?></p>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            </div>
        </div>

    <?php } ?>

    <div class="content"> 
        <?= $content ?>
    </div>

    <footer class="bottom-bar">
        <p>créer par Jocelyn Boitelle</p>
    </footer>
</html>
