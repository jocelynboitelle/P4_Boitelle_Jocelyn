<?php

class ControllerArticles
{
    private $_articleManager;

    public function __construct()
    {
        if (isset($url) && $url && count($url) > 1)
            throw new Exception('Page Introuvable', 1);
        else 
            $this->articles();
    }

    private function articles() {

        $this->_articleManager = new ArticleManager;

        if (isset($_SESSION['connected']))
            $articles = $this->_articleManager->getArticlesAdmin();
        else
            $articles = $this->_articleManager->getArticles();
        require_once('views/viewArticles.php');
    }
}
