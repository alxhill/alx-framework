<?php
class Load {
	function view($view_file, $data = null)
	{
		if (is_array($data))
		{
			extract($data);
		}
		include 'views/'.$view_file.'.php';
	}
	
}