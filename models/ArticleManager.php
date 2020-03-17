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

    public function getLastArticle() 
    {   
        $articles = [];
        $req = $this->db->prepare('SELECT * FROM articles WHERE status = 1 ORDER BY date DESC LIMIT 1');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
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

    public function updateArticle($id, $id_article, $title, $content, $status) {
        $req = $this->db->prepare('UPDATE articles SET `id_article` = :id_article, `title` = :title, `content` = :content, `date_updated` = NOW(), `status` = :status WHERE id = :id');
        $req->execute(array(
            'id' => $id,
            'id_article' => $id_article,
            'title' => $title,
            'content' => $content,
            'status' => $status
        ));
    }

    public function createArticle($id_article, $title, $content, $status) {
        $req = $this->db->prepare('INSERT INTO `articles` (`id_article`, `title`, `content`, `date`, `date_updated`, `status`) VALUES (:id_article, :title, :content, NOW(), NOW(), :status)');
        $req->execute(array(
            'id_article' => $id_article,
            'title' => $title,
            'content' => $content,
            'status' => $status
        ));
    }

    public function deleteArticle($id) 
    {
        $req = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}
