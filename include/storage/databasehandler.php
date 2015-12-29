<?php

class DatabaseHandler implements Handler {

    private function dbConnection() {
        return mysqli_connect(Config::$dbSettings['host'],
            Config::$dbSettings['userName'],
            Config::$dbSettings['password'],
            Config::$dbSettings['database']);
    }

    public function getAllPosts() {
        $connection = $this->dbConnection();

        $query = "SELECT * FROM posts";
        $result = mysqli_query($connection, $query);

        $posts = [];
        while($post = mysqli_fetch_array($result)) {
            $posts[] = new Post((int)$post['id'],
                $post['title'],
                $post['date'],
                $post['content']);
        }

        mysqli_free_result($result);
        mysqli_close($connection);

        return array_reverse($posts);
    }

    public function addPost($data) {
        $connection = $this->dbConnection();

        $title = $data->getTitle();
        $content = $data->getContent();
        $query = "INSERT INTO posts(title, content) VALUES ('$title', '$content')";

        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
    }

    public function delete($id) {
        $posts = $this->getAllPosts();
        foreach($posts as $post) {
            if($post->getId() == $id) {
                $connection = $this->dbConnection();
                $query = "DELETE FROM posts WHERE id = '$id'";
                $result = mysqli_query($connection, $query);
                mysqli_close($connection);
                break;
            }
        }
    }
}