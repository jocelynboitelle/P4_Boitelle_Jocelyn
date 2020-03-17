<?php

class ControllerArticles
{
    private $_articleManager;
    public $checked;

    public function __construct()
    {
        if (isset($url) && $url && count($url) > 1) {
            throw new Exception('Page Introuvable', 1);
        } else {
            $this->_articleManager = new ArticleManager;
            $this->checked = '';
        
            if (isset($_SESSION['connected']))
                $this->articlesAdmin();
            else
                $this->articles();
        }
    }

    private function articles() {
        $articles = $this->_articleManager->getArticles();

        require_once('views/viewArticles.php');
    }

    private function articlesAdmin() {
        if (isset($_GET['delete']))
            $this->deleteArticle($_GET['delete']);
        else if (isset($_GET['update']))
            $this->updateArticle($_GET['update']);
        else if (isset($_GET['create']))
            $this->createArticle();
        else if (isset($_GET['save']))
            $this->saveArticle($_GET['save']);
        else {
            $articles = $this->_articleManager->getArticlesAdmin();
            require_once('views/viewArticles.php');
        }
    }

    private function deleteArticle($id) {
        $this->_articleManager->deleteArticle($id);

        $articles = $this->_articleManager->getArticlesAdmin();
    
        require_once('views/viewArticles.php');
    }

    private function updateArticle($id) {
        $article = $this->_articleManager->getArticleByIdAdmin($id);
        $id_article = $article[0]->id_article();
        $title_article = $article[0]->title();
        $content_article = $article[0]->content();
        $date_article = $article[0]->date();
        $update_article = $article[0]->date_updated();

        if ($article[0]->status() == 1)
            $checked = "checked";
        else 
            $checked = '';

        require_once('views/viewUpdateArticle.php');
    }

    private function createArticle() {
        $id_article = null;
        $title_article = "";
        $content_article = "";
        $checked = 0;

        require_once('views/viewUpdateArticle.php');
    }

    private function saveArticle($id) {
        $article = $this->_articleManager->getArticleByIdAdmin($id);

        $id_article = $_POST['id_article'];
        $title_article = $_POST['title'];
        $content_article = $_POST['content'];
        if (isset($_POST['published']))
            $status = 1;
        else
            $status = 0;

        if ($id == 0) {
            echo $status;
            $this->_articleManager->createArticle($id_article, $title_article, $content_article, $status);
        }
        else
            $this->_articleManager->updateArticle($id, $id_article, $title_article, $content_article, $status);

        header('Location: articles');
    }
}
