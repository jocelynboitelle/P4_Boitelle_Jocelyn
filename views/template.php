<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?></title>
        <link href="../public/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tiny.cloud/1/ewzsiip33a1my2zwspbb5uuxo8dg1o815xvg6xd2ky41dyb2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector: '#tiny'});</script>
    </head>
    <nav class=top-bar>
        <div class="menu">
            <li><a href="<?= URL ?>">Accueil</a></li>
            <li><a href="Articles">Articles</a></li>
        </div>
        <div class="menu">
            <li><a href="login">Administration</a></li>
        </div>
    </nav>

    <div class="content"> 
        <?= $content ?>
    </div>

    <footer class="bottom-bar">
        <p>créer par Jocelyn Boitelle</p>
    </footer>
</html>
