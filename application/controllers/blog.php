<?php
class Blog extends Controller {
	
	function get_index()
	{
		echo "You are at the index";
	}
	
	function get_post($id)
	{
		echo "Getting post with id $id";
	}
	
	function post_post()
	{
		$post = Post::create(array('title' => $_POST['title'], 'content' => $_POST['content']));
	}
	
	
	
}