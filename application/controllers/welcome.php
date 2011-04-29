<?php
class Controller_Welcome extends Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_index()
	{
		$this->load->view('welcome', array('page' => 'index'));
	}
	
	public function get_home()
	{
		$this->load->view('welcome', array('page' => 'home'));
	}
}
