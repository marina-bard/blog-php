<?php

    require_once("../include/model/post.php");
    require_once("../include/storage/storage.php");
    require_once("../include/storage/handler.php");
	require_once("../include/storage/filehandler.php");
	require_once("../include/storage/jsonhandler.php");
	require_once("../include/storage/databasehandler.php");

	Storage::getInstance()->setHandler(new DatabaseHandler());

	$posts = Storage::getInstance()->readData();

	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "";

	if($action == "add") {
		if(!empty($_POST)) {
            Storage::getInstance()->writeData($_POST['title'], $_POST['content']);
		}
	}

	if ($action == "delete") {
		$id = $_GET['id'];
        Storage::getInstance()->deleteData($id);
	} 

	$posts = Storage::getInstance()->readData();
	require_once("../view/index.html.php");

?>