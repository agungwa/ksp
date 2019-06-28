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
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->model('Simpananpokok_model');
    }

    public function index(){
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$setoransimpananwajib = $this->Setoransimpananwajib_model->get_all();    	
    	$simpananwajibDitarik = $this->Penarikansimpananwajib_model->get_all();
    	$simpananPokok = $this->Simpananpokok_model->get_all();

    	$saldoSimpanan = 0;
    	$saldoSimpananDitarik = 0;
    	$bungaSimpanan = 0;
    	$saldoSimpananwajib = 0;
    	$saldoSimpananwajibDitarik = 0;
    	$saldoSimpananpokok = 0;
    	$phBuku = 0;
    	$administrasi = 0;


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

    	//hitung saldo simpanan aktif
    	foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
    				if ($tgl >= $f && $tgl <= $t) {
    					$saldoSimpanan += $item->ssi_jmlsetor;
    				}
    			} else {
    				$saldoSimpanan += $item->ssi_jmlsetor;
    			}
    		}
    	}

    	//hitung saldo simpanan ditarik
    	foreach ($simpananAktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->pes_tglpenarikan));
    				if ($tgl >= $f && $tgl <= $t) {
    					$saldoSimpananDitarik += $item->pes_saldopokok;
	    				$phBuku += $item->pes_phbuku;
	    				$administrasi += $item->pes_administrasi;
    				}
    			} else {
	    			$saldoSimpananDitarik += $item->pes_saldopokok;
	    			$phBuku += $item->pes_phbuku;
	    			$administrasi += $item->pes_administrasi;
    			}
    		}
    	}

    	//hitung bunga simpanan aktif
    	foreach ($simpananAktif as $key => $value) {
    		$bungaSetoran = $this->Bungasetoransimpanan_model->get_data_bungasetoran($value->sim_kode);
    		foreach ($bungaSetoran as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->bss_tglbunga));
    				if ($tgl >= $f && $tgl <= $t) {
    					$bungaSimpanan += $item->bss_bungabulanini;
    				}
    			} else {
    				$bungaSimpanan += $item->bss_bungabulanini;
    			}
    		}
    	}

    	//simpanan wajib
    	foreach ($setoransimpananwajib as $key => $value) {
    		if ($f<>'' && $t<>'') {	
    			$tgl = date("Y-m-d", strtotime($value->ssw_tglsetor));
    			if ($tgl >= $f && $tgl <= $t) {
    				$saldoSimpananwajib += $value->ssw_jmlsetor;
    			}
    		} else {
    			$saldoSimpananwajib += $value->ssw_jmlsetor;
    		}
    	}

    	//simpanan wajib ditarik
    	foreach ($simpananwajibDitarik as $key => $value) {
    		if ($f<>'' && $t<>'') {	
    			$tgl = date("Y-m-d", strtotime($value->psw_tglpenarikan));
    			if ($tgl >= $f && $tgl <= $t) {
    				$saldoSimpananwajibDitarik += $value->psw_jumlah;
    			}
    		} else {
				$saldoSimpananwajibDitarik += $value->psw_jumlah;
    		}
    	}

    	//simpanan pokok
    	foreach ($simpananPokok as $key => $value) {
    		if ($f<>'' && $t<>'') {	
    			$tgl = date("Y-m-d", strtotime($value->sip_tglbayar));
    			if ($tgl >= $f && $tgl <= $t) {
    				$saldoSimpananpokok += $value->sip_setoran;
    			}
    		} else {
				$saldoSimpananpokok += $value->sip_setoran;
    		}
    	}

		$data = array(
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldoSimpananwajib,
			'saldosimpananwajibditarik' => $saldoSimpananwajibDitarik,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			'f' => $f,
			't' => $t,
		    'content' => 'backend/simpanan/datarekening/index',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}