<?php

class Users
{
    private $_id;
    private $_user_name;
    private $_password;
    private $_mail;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setId($id) {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }
    
    public function setUser_name($user_name) {
        if (is_string($user_name)) {
            $this->_user_name = $user_name;
        }
    }

    public function setPassword($password) {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }
 
    // GETTERS

    public function id() {
        return $this->_id;
    }

    public function user_name() {
        return $this->_user_name;
    }

    public function password() {
        return $this->_password;
    }

    public function mail() {
        return $this->_mail;
    }
}
