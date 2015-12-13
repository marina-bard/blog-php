<?php

	class JSonHandler implements Handler {

		private $storagePath = '../storage/posts.json';

		public function read() {
			$old_json = file_get_contents($this->storagePath);
			$json = json_decode($old_json, true);
			return $this->formPostsArray($json);
		}

		//doesn't work. need some magic here!
		public function write($data) {
			$json = file_get_contents($this->storagePath);
			$json = json_decode($json, true);
			$posts = $this->formPostsArray()
			var_dump($json);
			$json = json_encode($json, JSON_UNESCAPED_UNICODE);
			file_put_contents($this->storagePath, $json);
		}

		public function formPostsArray($array) {
			$posts = [];
			foreach ($array as $a) {
				$posts[] = new Post($a['title'], $a['date'], $a['content']);
			}
			return $posts;
		}

		public function delete($date) {}
	}
	
?>