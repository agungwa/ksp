<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DataRekening extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Simpananpokok_model');
    }

    public function index(){
    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$saldoSimpanan = 0;
    	$saldoSimpananDitarik = 0;
    	$bungaSimpanan = 0;
    	$saldoSimpananwajib = 0;
    	$saldoSimpananpokok = 0;
    	$phBuku = 0;
    	$administrasi = 0;

    	//hitung saldo simpanan aktif
    	foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
    			$saldoSimpanan += $item->ssi_jmlsetor;
    		}
    	}

    	//hitung saldo simpanan ditarik
    	foreach ($simpananAktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
    			$saldoSimpananDitarik += $item->pes_jumlah;
    			$phBuku += $item->pes_phbuku;
    			$administrasi += $item->pes_administrasi;
    		}
    	}

		$data = array(
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldoSimpananwajib,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
		    'content' => 'backend/simpanan/datarekening/index',
		);
        $this->load->view(layout(), $data);
    }
}