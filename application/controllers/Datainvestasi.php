<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DataInvestasi extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Wilayah_model');
    }

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$investasiAktif = $this->Investasiberjangka_model->get_investasi_aktif();
    	$investasiNonaktif = $this->Investasiberjangka_model->get_investasi_nonaktif();
    	$jasaDitarik = $this->Penarikaninvestasiberjangka_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		
		$satu = 1;
    	$saldoInvestasi = 0;
    	$saldoInvestasilalu = 0;
    	$saldoInvestasiditarik = 0;
    	$jasaInvestasiditarik = 0;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
		}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

    	//hitung saldo investasi aktif
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
    				$saldoInvestasi += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasi += $value->ivb_jumlah;
		}
	}

		//hitung saldo investasi aktif lalu
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $value->wil_kode==$w))  {
    				$saldoInvestasilalu += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasilalu += $value->ivb_jumlah;
		}
	}

		
    	//hitung saldo investasi nonaktif
    	foreach ($investasiNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
    				$saldoInvestasiditarik += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasiditarik += $value->ivb_jumlah;
		}
	}

    	//hitung saldo jasa ditarik
    	foreach ($jasaDitarik as $key => $value) {
			$ivb_kode = $this->db->get_where('investasiberjangka', array('ivb_kode' => $value->ivb_kode))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($value->pib_tgl));
    				if (($tgl >= $f && $tgl <= $t && $w == 'all') || ($tgl >= $f && $tgl <= $t && $ivb_kode->wil_kode == $w)) {
    					$jasaInvestasiditarik += $value->pib_jmlditerima;
    				}
    			} else {
    				$jasaInvestasiditarik += $value->pib_jmlditerima;
    			}
    		
    	}

    	
		$data = array(
			
            'wilayah_data' => $wilayah,
			'jasainvestasiditarik' => $jasaInvestasiditarik,
			'saldoinvestasiditarik' => $saldoInvestasiditarik,
			'saldoinvestasilalu' => $saldoInvestasilalu,
			'saldoinvestasi' => $saldoInvestasi,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/investasiberjangka/datainvestasi/index',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}