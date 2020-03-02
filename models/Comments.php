<?php

class Comments
{
    private $_id;
    private $_id_article;
    private $_content;
    private $_date;
    private $_report;
    private $_user;

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

    public function setIdArticle($id_article) {
        $id_article = (int) $id_article;

        if ($id_article > 0) {
            $this->_id_article = $id_article;
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

    public function setReport($report) {
        $report = (int) $report;

        if ($report == 0 || $report == 1)
        $this->_report = $report;
    }

    public function setUser($user) {
        if (is_string($user)) {
            $this->_user = $user;
        }
    }

    // GETTERS

    public function id() {
        return $this->_id;
    }

    public function idArticle() {
        return $this->_id_article;
    }

    public function content() {
        return $this->_content;
    }

    public function date() {
        return $this->_date;
    }

    public function report() {
        return $this->_report;
    }

    public function user() {
        return $this->_user;
    }
}
