<?php

	require_once("handler.php");
	require_once("filehandler.php");
	require_once("jsonhandler.php");
	require_once("storage.php");
	require_once("posts.php");
	require_once("post.php");

	Storage::getInstance()->setHandler(new FileHandler());

	$posts = getAllPosts();

	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "";

	if($action == "add") {
		if(!empty($_POST)) {
			$posts = addNewPost($_POST['title'], $_POST['content']);
		//	header("Location: index.php");
		}

		$posts = getAllPosts();
		require_once("../view/index.html.php");
	}
	else if ($action == "delete") {
		$date = $_GET['date'];
		$posts = deletePost($date);
		//header("Location: index.php");
		$posts = getAllPosts();
		require_once("../view/index.html.php");
	} 
	else {
		$posts = getAllPosts();
		require_once("../view/index.html.php");
	}

?>