<?php

class ControllerArticle
{
    private $_articleManager;
    private $_commentsManager;
    public $message_comment;

    public function __construct() {
        if (isset($url) && $url && count($url) > 1)
            throw new Exception('Article Introuvable');
        else
            $this->article();
    }

    private function article() {
        if (isset($_GET['id'])) {
            $id_article = $_GET['id'];
            $this->_articleManager = new ArticleManager;
            $this->_commentsManager = new CommentsManager;

            if (isset($_POST['name_comment'])) {
                $this->postComment($id_article);
                $this->message_comment = "Merci ! Votre commentaire a bien été posté.";
            }

            if (isset($_GET['report'])) {
                $this->reportComment($_GET['report']);
                $this->message_comment = "Merci ! Le commentaire a bien été signalé.";
            }

            $this->singleArticle($id_article);
        }
    }

    private function postComment($id_article) {
        $name_comment = $_POST['name_comment'];
        $post_comment = $_POST['post_comment'];

        $this->_commentsManager->postComment($id_article, $name_comment, $post_comment);
    }

    private function reportComment($id_comment) {
        $this->_commentsManager->reportComment($id_comment);
    }

    private function singleArticle($id_article) {
        if (isset($_SESSION['connected']))
            $article = $this->_articleManager->getArticleByIdAdmin($id_article);
        else
            $article = $this->_articleManager->getArticleById($id_article);
        $comments = $this->_commentsManager->getCommentsById($id_article);

        if ($article == NULL)
            throw new Exception('Article Introuvable');

        require_once('views/viewArticle.php');
    }
}
