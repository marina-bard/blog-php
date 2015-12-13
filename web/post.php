<?php

	class Post {

		private $title;
		private $content;
		private $date;

		public function __construct($title, $date, $content) {
			$this->title = $title;
			$this->date = $date;
			$this->content = $content;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getDate() {
			return $this->date;
		}

		public function getContent() {
			return $this->content;
		}
	}
	
?>