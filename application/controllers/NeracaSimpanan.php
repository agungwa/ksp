<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class NeracaSimpanan extends MY_Base
{
	function __construct()
    {
		parent::__construct();
		$this->load->model("Wilayah_model");
    }

    public function index(){
    	$w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$b = urldecode($this->input->get('b', TRUE)); //bulan
        $t = urldecode($this->input->get('t', TRUE)); //tahun
        $wilayah = $this->Wilayah_model->get_all();

    	$data = array(
    		'wilayah' => $wilayah,
    		'w' => $w,
			'b' => $b,
			't' => $t,
		    'content' => 'backend/simpanan/neraca/index',
		);
        $this->load->view(layout(), $data);
    }

}