<?php

	interface Handler {
		public function read();
		public function write($data);
		public function delete($date);
		public function formPostsArray($array);
	}
	
?>