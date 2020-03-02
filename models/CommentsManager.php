<?php

class CommentsManager extends Model
{
    public function __construct() {
        $this->db = $this->getBdd();
    }

    public function getCommentsById($id) {
        $comments = [];
        $req = $this->db->prepare('SELECT * FROM comments WHERE id_article = :id');
        $req->execute(array('id' => $id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comments($data);
        }
        return $comments;
    }

    public function postComment($id_article, $name_comment, $post_comment) {
        $req = $this->db->prepare('INSERT INTO comments (id, id_article, content, report, user) VALUES (NULL, :id_article, :post_comment, 0, :name_comment)');
        $req->execute(array(
            'id_article' => $id_article,
            'name_comment' => $name_comment,
            'post_comment' => $post_comment
        ));
    }

    public function reportComment($id_comment) {
        $req = $this->db->prepare('UPDATE comments SET report = 1 WHERE id = :id_comment');
        $req->execute(array(
            'id_comment' => $id_comment
        ));
    }
}
