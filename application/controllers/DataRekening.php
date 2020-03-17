<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DataRekening extends MY_Base
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

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$anggotaAktif = $this->Anggota_model->get_all();
    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananAll = $this->Simpanan_model->get_simpanan_all();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$setoransimpananwajib = $this->Setoransimpananwajib_model->get_all();    	
    	$simpananwajibDitarik = $this->Penarikansimpananwajib_model->get_all();
    	$penarikanSimpanan = $this->Penarikansimpanan_model->get_all();
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
		$saldoSimpananall = 0;
		$saldoSimpanankininon = 0;
		$saldoSimpananDitariklalu = 0;
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
		
			//hitung saldo simpanan masuk
			$setoran = $this->Setoransimpanan_model->get_sirkulasi_simpanan(NULL,$f,$t,$w,2);
			$saldoSimpanan += $setoran[0]->ssi_jmlsetor;
			
			//hitung saldo simpanan kini
			$setoranall = $this->Setoransimpanan_model->get_sirkulasi_simpanan_all($t,$w,1);
			$saldoSimpananall += $setoranall[0]->ssi_jmlsetor;

			//hitung saldo simpanan kini nonaktif
			$setoranallnon = $this->Setoransimpanan_model->get_sirkulasi_simpanan_allnon($f,$t,$w,1);
			$saldoSimpanankininon += $setoranallnon[0]->ssi_jmlsetor;

			//hitung saldo penarikan lalu
			$setoranNonlalu = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpananlalu($f,$w,1);
			$saldoSimpananDitariklalu += $setoranNonlalu[0]->pes_saldopokok;
			
			//hitung saldo simpanan lalu
			$setorankini = $this->Setoransimpanan_model->get_sirkulasi_simpananall($f,$w);
			$saldoSimpananlalu += $setorankini[0]->ssi_jmlsetor;
			
			//hitung penarikan
			$simpananNon = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan($f,$t,NULL,NULL,$w,1);
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

			//simpanan wajib ditarik
			$setoranwajibpenarikan = $this->Penarikansimpananwajib_model->get_sirkulasi_penarikansimpananwajib($f,$t);
			$saldoSimpananwajibDitarik += $setoranwajibpenarikan[0]->psw_jumlah;

			//simpanan pokok
			$setoransip = $this->Simpananpokok_model->get_sirkulasi_simpananpokok($f,$t);
			$saldoSimpananpokok += $setoransip[0]->sip_setoran;
			//rekening simpanan lalu
			$totalRekeninglalu = $this->Simpanan_model->get_total_rekeninglalu($f,$w,2);
			//rekening simpanan lalu
			$totalRekeningkeluarlalu = $this->Simpanan_model->get_total_rekeningkeluarlalu($f,$w,1);
			//rekening simpanan kini
			$totalRekening = $this->Simpanan_model->get_total_rekening($f,$t,$w,0);
			//rekening simpanan keluar
			$totalRekeningkeluar = $this->Penarikansimpanan_model->get_total_rekening($f,$t,$w,1);

		$data = array(
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluarlalu' => $totalRekeningkeluarlalu,
			'bungaditarik' => $bungaDitarik,
			'totalrekeningkeluar' => $totalRekeningkeluar,
			'saldosimpananlalu' => $saldoSimpananlalu,
			'totalrekening' => $totalRekening,
            'wilayah_data' => $wilayah,
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananall' => $saldoSimpananall,
			'saldosimpanankininon' => $saldoSimpanankininon,
			'saldosimpananditariklalu' => $saldoSimpananDitariklalu,
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