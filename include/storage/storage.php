<?php

class Storage
{
    private static $instance = null;
    private $handler;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setHandler($handler) {
        switch(Config::$handler){
            case 'txt':
                $this->handler = new FileHandler();
                break;
            case 'json':
                $this->handler = new JSonHandler();
                break;
            case 'db':
                $this->handler = new DatabaseHandler();
                break;
            default:
                $this->handler = new FileHandler();
        }
    }

    public function readData() {
        return $this->handler->getAllPosts();
    }

    public function writeData($title, $content) {
        $post = new Post(null, $title, date("Y-m-d H:i:s"), $content);
        $this->handler->addPost($post);
    }

    public function deleteData($date) {
        $this->handler->delete($date);
    }
}

?>