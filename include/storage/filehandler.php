<?php

class FileHandler implements Handler
{
    public function getStoragePath()
    {
        return Config::$fileStoragePath;
    }

    public function getAllPosts()
    {
        return array_reverse($this->read());
    }

    public function read()
    {
        $file = file_get_contents($this->getStoragePath());
        return $this->formPostsArray(explode("~", $file));
    }

    public function addPost($data)
    {
        $posts = $this->read();
        if ($posts != null) {
            $id = end($posts)->getId() + 1;
        } else {
            $id = 0;
        }

        $data->setId($id);
        $string = (string)$data;
        file_put_contents($this->getStoragePath(), $string, FILE_APPEND | LOCK_EX);
    }

    public function delete($id)
    {
        $array = $this->read();
        $string = null;

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->getId() != $id) {
                $post = (string)$array[$i];
                $string .= $post;
            } else {
                $delPos = $i;
            }
        }
        unset($array[$delPos]);
        file_put_contents($this->getStoragePath(), $string);
    }

    public function formPostsArray($array)
    {
        $posts = [];
        foreach ($array as $a) {
            list($id, $title, $date, $content) = explode (";", $a);
            if ($title != "") {
                $posts[] = new Post($id, $title, $date, $content);
            }
        }
        return $posts;
    }

}