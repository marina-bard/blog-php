<?php

	require_once("post.php");

	class FileHandler implements Handler {

		private $storagePath = '../storage/posts.txt';

		public function read() {
			$file = file_get_contents($this->storagePath);
			return $this->formPostsArray(explode("~", $file));
		}

		public function write($data) {
			$string = $this->createString($data);
			$file = file_get_contents($this->storagePath);
			file_put_contents($this->storagePath, $string);
			file_put_contents($this->storagePath, $file, FILE_APPEND | LOCK_EX);
		}

		public function delete($date) {
			$array = $this->read();
			
			foreach ($array as $a) {
				if(strcmp($a->getDate(), $date)) {
					$post = $this->createString($a);
					$string .= $post;
				}
				else { 
					unset($a);
				}
			}

			file_put_contents($this->storagePath, $string);
		}

		public 	function createString($data) {
			return $data->getTitle().";".$data->getDate().";".$data->getContent()."~";
		}

		public function formPostsArray($array) {
			$posts = [];
			foreach ($array as $a) {
				list($title, $date, $content) = explode (";", $a);
				if($title != "")
					$posts[] = new Post($title, $date, $content);
			}
			return $posts;
		}

	}

?>