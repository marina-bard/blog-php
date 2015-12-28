<?php

	interface Handler {
		public function getAllPosts();
		public function read();
		public function addPost($data);
		public function delete($id);
	}
	
?>