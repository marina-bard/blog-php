<?php

class Post implements JsonSerializable{

    private $id;
    private $title;
    private $content;
    private $date;

    public function __construct($id, $title, $date, $content) {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
    }

    function jsonSerialize() {
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['date'] = $this->date;
        $data['content'] = $this->content;
        return $data;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDate() {
        return $this->date;
    }

    public function getContent() {
        return $this->content;
    }

    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return $this->id.";".$this->title.";".$this->date.";".$this->content."~";
    }
}

?>