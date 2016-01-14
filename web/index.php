<?php

include_once ("../include/autoloader.php");

Storage::getInstance()->setHandler();

$posts = Storage::getInstance()->readData();

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}

if ($action == "add") {
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