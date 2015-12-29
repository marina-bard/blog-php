<?php

	class JSonHandler implements Handler {

        public function getStoragePath() {
            return Config::$jsonStoragePath;
        }

		public function getAllPosts() {
			$json = $this->read();
            for($i = 0; $i < count($json); $i++) {
                $posts[] = new Post($json[$i]['id'],
                    $json[$i]['title'],
                    $json[$i]['date'],
                    $json[$i]['content']);
            }
            return array_reverse($posts);
		}

		public function read() {
			$json = file_get_contents($this->getStoragePath());
			return json_decode($json, true);
		}

        public function write($data) {
            $json = json_encode($data);
            file_put_contents($this->getStoragePath(), $json);
        }

		public function addPost($data) {
            $postsRevers = $this->getAllPosts();
            $posts = array_reverse($postsRevers);
            if (count($posts) > 0) {
                $id = $posts[count($posts)-1]->getId() + 1;
            }
            else {
                $id = 0;
            }
            $data->setId($id);
            $posts[] = $data;
            $this->write($posts);
		}

		public function delete($id) {
            $json = $this->read();
            for ($i = 0; $i < count($json); $i++) {
                if ($json[$i]['id'] == $id) {
                    array_splice($json, $i, 1);
                    break;
                }
            }
            $this->write($json);
        }
	}
	
?>