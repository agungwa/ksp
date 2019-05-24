<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penagihan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->model('Jaminan_model');
        $this->load->model('Penjamin_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index(){

        $karyawan = $this->Karyawan_model->get_all();

        $data = array(
            'content' => 'backend/penagihan/penagihan_form',
            'penagihan' => null,
            'karyawan' => $karyawan
        );

        $this->load->view(layout(), $data);
    }

}