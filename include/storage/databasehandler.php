<?php

class DatabaseHandler implements Handler
{
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(Config::$dbSettings['host'],
            Config::$dbSettings['userName'],
            Config::$dbSettings['password'],
            Config::$dbSettings['database']);
    }

    public function getAllPosts()
    {
        $query = "SELECT * FROM posts";
        $result = mysqli_query($this->connection, $query);

        $posts = [];
        while ($post = mysqli_fetch_array($result)) {
            $posts[] = new Post((int)$post['id'],
                $post['title'],
                $post['date'],
                $post['content']);
        }

        mysqli_free_result($result);
        return array_reverse($posts);
    }

    public function addPost($data)
    {
        $title = mysqli_real_escape_string($this->connection, $data->getTitle());
        $content = mysqli_real_escape_string($this->connection, $data->getContent());
        $date = mysqli_real_escape_string($this->connection, $data->getDate());
        $query = "INSERT INTO posts(title, date, content) VALUES ('$title', '$date', '$content')";

        $result = mysqli_query($this->connection, $query);
        mysqli_free_result($result);
    }

    public function delete($id)
    {
        $id = mysqli_real_escape_string($this->connection, $id);
        $query = "DELETE FROM posts WHERE id = '$id'";
        $result = mysqli_query($this->connection, $query);
        mysqli_free_result($result);
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}