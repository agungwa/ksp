<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Base extends CI_Controller {

	var $tgl;
	var $flag;

	function __construct()
    {
        parent::__construct();
       	$this->tgl = date('Y-m-d H:i:s');
       	$this->flag = array(0=>"New", 1=>"Updated", 2=>"Deleted");
        $this->load->vars($this->tgl, $this->flag);

        if ($this->session->userdata('logged')!=TRUE){
            redirect(site_url('Auth'));
        }
    }

}