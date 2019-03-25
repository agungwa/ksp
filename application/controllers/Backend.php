<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Base {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        is_logged();
    }   
	
	public function index()
	{ 	

					
		$data = array(
			'content'=>'backend/dashboard',

		);
		$this->load->view('layout_backend.php',$data);
	}
}
