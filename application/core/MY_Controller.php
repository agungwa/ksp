<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Base extends CI_Controller {

	var $tgl;
	var $flag;
    var $statusAngsuran;
    var $statusPinjaman;
    var $statusSimkesan;
    var $statusAnggota;
    var $statusSimpanan;

	function __construct()
    {
        parent::__construct();
       	$this->tgl = date('Y-m-d H:i:s');
       	$this->flag = array(0=>"New", 1=>"Updated", 2=>"Deleted");
        $this->statusAngsuran = array(0=>"Belum Bayar", 1=>"Bayar", 2=>"Telat");
        $this->statusPinjaman = array(0=>"Pengajuan", 1=>"Disetujui", 2=>"Ditolak");
        $this->statusSimkesan = array(0=>"Baru");
        $this->statusAnggota = array(0=>"Belum Anggota", 1=>"Calon Anggota", 2=>"Anggota");
        $this->statusSimpanan = array(0=>"Aktif", 1=>"Tidak Aktif");
        $this->load->vars($this->tgl, $this->flag, $this->statusAngsuran);

        if ($this->session->userdata('logged')!=TRUE){
            redirect(site_url('Auth'));
        }
    }

}