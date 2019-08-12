<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PrintInvestasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Pengkodean');
    }

    public function printsirkulasiinvestasi(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;
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
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$saldoInvestasi += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasi += $value->ivb_jumlah;
		}
	}

		//hitung saldo investasi aktif lalu
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$saldoInvestasilalu += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasilalu += $value->ivb_jumlah;
		}
	}

		
    	//hitung saldo investasi nonaktif
    	foreach ($investasiNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
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

		//Rekening investasi kini
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekening++;
    			}
			} else {
				$totalRekening++;
		}
	}

		//Rekening investasi aktif lalu
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$totalRekeninglalu++ ;
    			}
			} else {
				$totalRekeninglalu++;
		}
	}

		
    	//Rekening investasi nonaktif
    	foreach ($investasiNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekeningkeluar++ ;
    			}
			} else {
				$totalRekeningkeluar++;
		}
	}
    	
		$data = array(
			
			'totalrekening' => $totalRekening,
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,
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
        
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('backend/investasiberjangka/printinvestasi/sirkulasiinvestasi.php',$data,true);
    //echo $html;
    $mpdf->WriteHTML($html);
    //$mpdf->Output(); // opens in browser
    $mpdf->Output('sirkulasiinvestasi.pdf','D'); // it downloads the file into the user system, with give name


    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }


}

/* End of file Investasiberjangka.php */
/* Location: ./application/controllers/Investasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:37 */
/* http://harviacode.com */