<?php

class Article
{
    private $_id;
    private $_id_article;
    private $_title;
    private $_content;
    private $_date;
    private $_date_updated;
    private $_status;

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

    public function setId_article($id_article) {
        $id_article = (int) $id_article;

        if ($id_article > 0) {
            $this->_id_article = $id_article;
        }
    }
    
    public function setTitle($title) {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDate($date) {
        $this->_date = $date;
    }

    public function setDate_updated($date_updated) {
        $this->_date_updated = $date_updated;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }
 
    // GETTERS

    public function id() {
        return $this->_id;
    }
    
    public function id_article() {
        return $this->_id_article;
    }

    public function title() {
        return $this->_title;
    }

    public function content() {
        return $this->_content;
    }

    public function date() {
        return $this->_date;
    }

    public function date_updated() {
        return $this->_date_updated;
    }

    public function status() {
        return $this->_status;
    }
}
