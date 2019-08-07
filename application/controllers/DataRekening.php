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
        $this->load->model('Wilayah_model');
    }

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$setoransimpananwajib = $this->Setoransimpananwajib_model->get_all();    	
    	$simpananwajibDitarik = $this->Penarikansimpananwajib_model->get_all();
		$simpananPokok = $this->Simpananpokok_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		

		$saldoSimpananlalu = 0;
		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;
    	$saldoSimpanan = 0;
    	$saldoSimpananDitarik = 0;
    	$bungaSimpanan = 0;
    	$saldoSimpananwajib = 0;
    	$saldoSimpananwajibDitarik = 0;
    	$saldoSimpananpokok = 0;
    	$phBuku = 0;
    	$administrasi = 0;
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	//hitung saldo simpanan aktif
    	foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
    				if ($tgl >= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sim_kode->wil_kode == $w) {
						$saldoSimpanan += $item->ssi_jmlsetor;
    				}
    			} else {
    				$saldoSimpanan += $item->ssi_jmlsetor;
				}
				
				
			}
			
		}

		foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
    				if ($tgl < $f && 'all' == $w || $tgl < $f && $sim_kode->wil_kode == $w) {
						$saldoSimpananlalu += $item->ssi_jmlsetor;
    				}
    			} else {
    				$saldoSimpananlalu += $item->ssi_jmlsetor;
				}
				
			}
			
		}
		
    	//hitung saldo simpanan ditarik
    	foreach ($simpananAktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->pes_tglpenarikan));
    				if ( $tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $item->wil_kode == $w) {
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
    				if ($tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $item->wil_kode == $w) {
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
		
		//rekening simpanan lalu
		foreach ($simpananAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$totalRekeninglalu++ ;
    			}
			} else {
					$totalRekeninglalu++ ;
		}
		}

		//rekening simpanan masuk
		foreach ($simpananAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekening++ ;
    			}
			} else {
					$totalRekening++ ;
		}
		}

		//rekening simpanan keluar
		foreach ($simpananNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekeningkeluar++ ;
    			}
			} else {
					$totalRekeningkeluar++ ;
		}
		
		}

		$data = array(
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,
			'saldosimpananlalu' => $saldoSimpananlalu,
			'totalrekening' => $totalRekening,
            'wilayah_data' => $wilayah,
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
			'w' => $w,
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