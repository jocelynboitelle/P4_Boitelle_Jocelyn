<?php

class ControllerComments
{
    private $_commentsManager;

    public function __construct()
    {
        if (isset($_SESSION['connected']))
            $this->getComments();
        else
            throw new Exception('Page Introuvable', 1);
    }

    private function getComments() {

        $this->_commentsManager = new CommentsManager;

        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $this->_commentsManager->deleteComment($id);
        }
        if (isset($_GET['check'])) {
            $id = $_GET['check'];
            $this->_commentsManager->checkComment($id);
        }        

        $comments = $this->_commentsManager->getComments();

        require_once('views/viewComments.php');
    }
}
