<?php

interface Handler
{
	public function getAllPosts();
	public function addPost($data);
	public function delete($id);
}