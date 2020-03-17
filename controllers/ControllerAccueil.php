<?php

class ControllerAccueil
{
    private $_articleManager;

    public function __construct() {

        $this->getLastArticle();
    }

    private function getLastArticle() {

        $this->_articleManager = new ArticleManager;

        $article = $this->_articleManager->getLastArticle();

        require_once('views/viewAccueil.php');
    }
}
