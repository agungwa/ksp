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
    var $statusInvestasi;
    var $statusSimpananwajib;
    var $statusMutasi;

	function __construct()
    {
        parent::__construct();
        $this->tgl = date('Y-m-d H:i:s');
        $this->tglbulan = date('Y-m');
       	$this->flag = array(0=>"New", 1=>"Updated", 2=>"Deleted");
        $this->statusKaryawan = array(0=>"Aktif", 1=>"Cuti", 2=>"Resign");
        $this->statusSimpanankaryawan = array(0=>"Aktif", 1=>"Ditarik");
        $this->statusIjasahkaryawan = array(0=>"Aktif", 1=>"Ditarik");
        $this->statusAngsuran = array(0=>"Belum Bayar", 1=>"Kurang", 2=>"Lunas");
        $this->statusPinjaman = array(0=>"Pengajuan", 1=>"Disetujui", 2=>"Ditolak", 3=>"Lunas");
        $this->statusSimkesan = array(0=>"Aktif", 1=>"Diklaim", 2=>"Ditarik", 3=>"Hangus", 4=>"Lunas");
        $this->statusKlaimSimkesan = array(0=>"Duka", 1=>"Tahun 2", 2=>"Tahun 3", 3=>"Tahun 4", 4=>"Tahun 5", 5=>"Tahun 6", 6=>"Tahun 7", 7=>"Tahun 8", 8=>"Tahun 9", 9=>"Tahun 10");
        $this->statusAnggota = array(0=>"", 1=>"Calon Anggota", 2=>"Anggota");
        $this->statusSimpanan = array(0=>"Aktif", 1=>"Ditarik");
        $this->statusJaminan = array(0=>"Tidak", 1=>"Ya");
        $this->statusInvestasi = array(0=>"Aktif", 1=>"Tidak Aktif");
        $this->statusSimpananwajib = array(0=>"Aktif", 1=>"Ditarik", 2=>"Belum Dibayar");
        $this->statusMutasi = array(0=>"Tidak", 1=>"Mutasi");
        $this->jenisKasbon = array(0=>"Simpanan", 1=>"Investasi", 2=>"Simkesan", 3=>"Pinjaman");
        $this->load->vars($this->tgl, $this->flag, $this->statusAngsuran);

        if ($this->session->userdata('logged')!=TRUE){
            redirect(site_url('Auth'));
        }
    }

   

   
}