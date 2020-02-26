<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunai extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
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

    public function simpanan(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

        $wilayah = $this->Wilayah_model->get_all();		

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
		$bungaDitarik = 0;
    	$administrasi = 0;
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
		
			//hitung saldo simpanan aktif kini
			$setoran = $this->Setoransimpanan_model->get_sirkulasi_simpanan($f,$t,$w,2);
			$saldoSimpanan += $setoran[0]->ssi_jmlsetor;
			
			
			//hitung penarikan
			$simpananNon = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan($f,$t,$w,1);
			$saldoSimpananDitarik += $simpananNon[0]->pes_saldopokok;
			$phBuku += $simpananNon[0]->pes_phbuku;
			$administrasi += $simpananNon[0]->pes_administrasi;
			$bungaDitarik += $simpananNon[0]->pes_bunga;

			//hitung bunga
			$bungasim = $this->Bungasetoransimpanan_model->get_sirkulasi_bungasimpanan($f,$t,$w,0);
			$bungaSimpanan = $bungasim[0]->bss_bungabulanini;

			//simpanan wajib
			$setoranwajib = $this->Setoransimpananwajib_model->get_sirkulasi_simpananwajib($f,$t);
			$saldoSimpananwajib += $setoranwajib[0]->ssw_jmlsetor;

			//simpanan pokok
			$setoransip = $this->Simpananpokok_model->get_sirkulasi_simpananpokok($f,$t);
			$saldoSimpananpokok += $setoransip[0]->sip_setoran;

		$data = array(
			'bungaditarik' => $bungaDitarik,
            'wilayah_data' => $wilayah,
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldoSimpananwajib,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/simpanan/rekap/rekap',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}