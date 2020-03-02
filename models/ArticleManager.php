<?php

class ArticleManager extends Model
{

    public function __construct() {
        $this->db = $this->getBdd();
    }

    public function getArticlesAdmin() {
        $articles = [];
        $req = $this->db->prepare('SELECT * FROM articles ORDER BY id desc');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function getArticles() {
        $articles = [];
        $req = $this->db->prepare('SELECT * FROM articles WHERE status = true ORDER BY id desc');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function getArticleById($id) {
        $article = [];
        $req = $this->db->prepare('SELECT * FROM articles WHERE id = :id AND status = true');
        $req->execute(array('id' => $id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $article[] = new Article($data);
        }
        return $article;
    }

    public function getArticleByIdAdmin($id) {
        $article = [];
        $req = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $req->execute(array('id' => $id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $article[] = new Article($data);
        }
        return $article;
    }
}
