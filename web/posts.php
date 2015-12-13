<?php

	function getAllPosts() {		
		return Storage::getInstance()->readData();
	}

	function addNewPost($title, $content) {
		$post = new Post($title, date("Y-m-d H:i:s"), $content);
		Storage::getInstance()->writeData($post);
	}

	function deletePost($date) {
		return Storage::getInstance()->deleteData($date);
	}
	
?>