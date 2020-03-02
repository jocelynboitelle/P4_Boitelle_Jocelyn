<?php

class UsersManager extends Model
{

    public function __construct() {
        $this->db = $this->getBdd();
    }

    public function getUser()
    {
        $users = [];
        $req = $this->db->prepare('SELECT * FROM users');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $users[] = new Users($data);
        }
        return $users;
    }
}
