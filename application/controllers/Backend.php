<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Base {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Historibungasimpanan_model');
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Bungasimpanan_model');
		$this->load->model('Bungasetoransimpanan_model');
		
		//neraca
        $this->load->model('Phu_model');
        $this->load->model('Phu_sistem_model');
        $this->load->model('Shu_model');
        $this->load->model('Neracakasbank_model');
        $this->load->model('Neracaaktivatetap_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Neracakewajibanjangkapanjang_model');
        $this->load->model('Neracaekuitas_model');

		//investasi
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');

		//simpanan
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
		$this->load->model('Simpananpokok_model');
		$this->load->model('Karyawansimpanan_model');
		
		//pinjaman
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Angsuranbayar_model');
        $this->load->model('Pelunasan_model');
        $this->load->model('Potonganprovisi_model');
		$this->load->model('Wilayah_model');
		
		//simkesan
        $this->load->model('Simkesan_model');
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->model('Penarikansimkesan_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Phusimkesan_model');
        $this->load->model('Phusimkesanpendapatan_model');
        $this->load->model('Shusimkesan_model');
		$this->load->model('Neracakasbanksimkesan_model');
		
		is_logged();
		
    }  
	
	public function index()
	{ 	
		$nowYear = date('d');
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
		$t = urldecode($this->input->get('t', TRUE)); //smpai tgl
		
		//model

		//neraca	
        $Shu = $this->Shu_model->get_all();			
		
		//investasi
    	

		//pinjaman
			

		//neraca
		$dataphu = array();
		$shuData = 0;
		$kasBankdata = 0;
		$aktivaTetaptanah = 0;
		$aktivaTetapbangunan = 0;
		$aktivaTetapelektronik = 0;
		$aktivaTetapkendaraan= 0;
		$aktivaTetapperalatan = 0;
		$aktivaTetappenyusutan = 0;
		$simpananKaryawandata = 0;
		$rekeningKoran = 0;
		$modalPenyertaan = 0;
		$simpananCdr = 0;
		$donasi = 0;
		
		//investasi
		$saldoInvestasi = 0;
    	$saldoInvestasilalu = 0;
    	$saldoInvestasiditarik = 0;
    	$jasaInvestasiditarik = 0;

		//simpanan
		$saldoSimpananlalu = 0;
    	$saldoSimpanan = 0;
    	$saldoSimpananDitarik = 0;
    	$bungaSimpanan = 0;
    	$saldoSimpananwajib = 0;
    	$saldoSimpananwajibDitarik = 0;
    	$saldoSimpananpokok = 0;
    	$phBuku = 0;
		$administrasi = 0;
		
		//pinjaman
		$pinjamanAktif = 0;
		$angsuranBayar = 0;

		//simkesan
		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;
		//setoran simkesan
		$saldoSimkesanlalu = 0;
    	$saldoSimkesan = 0;
		$saldoSimkesanditarik = 0;
		//klaim simkesan
		$saldoSetorklaim = 0 ;
		$saldoTunggakanklaim = 0 ;
		$saldoJumlahklaim = 0 ;
		$administrasiKlaim = 0 ;
		//penarikan simkesan
		$saldoSetortarik = 0;
		$saldoTunggakantarik = 0;
		$saldoJumlahtarik = 0;
		$administrasiTarik = 0;
		//titipan simkesan
		$saldoTitipan = 0;
		$saldoAmbiltitipan = 0;
		
		$satu = 1;
		$dua = 2;
		$tiga = 3;
		$empat = 4;
		$lima = 5;
		$enam = 5;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$monthtoday = date("Y-m", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
		$tanggalDuedate1 = date("Y-m", strtotime($datetoday.' - '.$satu.' Months'));
		$tanggalDuedate2 = date("Y-m", strtotime($datetoday.' - '.$dua.' Months'));
		$tanggalDuedate3= date("Y-m", strtotime($datetoday.' - '.$tiga.' Months'));
		$tanggalDuedate4 = date("Y-m", strtotime($datetoday.' - '.$empat.' Months'));
		$tanggalDuedate5 = date("Y-m", strtotime($datetoday.' - '.$lima.' Months'));
		$tanggalDuedate6 = date("Y-m", strtotime($datetoday.' - '.$enam.' Months'));
    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

		//data pihutang
		$dataPihutang = $this->Pinjaman_model->get_data_pihutang(1,NULL,$datetoday);
		$pinjamanAktif = $dataPihutang[0]->pin_pinjaman;

		$dataAngsuran = $this->Angsuranbayar_model->get_angsuran_tgl(1,NULL,NULL,$datetoday);
		$angsuranPokok = $dataAngsuran->{'agb_pokok'};
    	//hitung saldo investasi aktif
    	$investasiAktif = $this->Investasiberjangka_model->get_investasi_sirkulasi();
    	$saldoInvestasi = $investasiAktif[0]->ivb_jumlah ;

		//hitung SHU
			foreach ($Shu as $key => $value) {
				
						$shuData += $value->shu_jumlah;
			
		}

		//hitung simpanan karyawan
		$dataSimpanankaryawan = $this->Karyawansimpanan_model->get_simpanan_karyawan($datetoday);
		$simpananKaryawandata = $dataSimpanankaryawan [0]->ksi_simpanan;

		//simpanan wajib aktif
		$dataSimpananwajib = $this->Setoransimpananwajib_model->get_neraca_simpananwajib($datetoday,$t);
		$saldosimpananwajib = $dataSimpananwajib[0]->ssw_jmlsetor;

		//simpanan pokok
		$dataSimpananpokok = $this->Simpananpokok_model->get_neraca_simpananpokok($datetoday,$t);
		$saldoSimpananpokok = $dataSimpananpokok[0]->sip_setoran;
		
		//hitung simpanan aktif
		$setoran = $this->Setoransimpanan_model->get_sirkulasi(NULL,$datetoday,NULL,1);
		$saldoSimpanan = $setoran[0]->ssi_jmlsetor;

		//setoran simkesan
		$simkesanSaldo = $this->Setoransimkesan_model->get_setoran_simkesan(0,$datetoday);
		$saldoSimkesan = $simkesanSaldo[0]->ssk_jmlsetor;

		//titipan simkesan
		$titipanSimkesan = $this->Titipansimkesan_model->get_titipan_simkesan(0,$datetoday);
		$saldoTitipan = $titipanSimkesan[0]->tts_jmltitip;
		$saldoAmbiltitipan = $titipanSimkesan[0]->tts_jmlambil;


		// tarik simkesan otomatis
		$datenow = date('Y-m-d');
		$dateTime = date("Y-m-d H:i:s");
		$SATU = 1;
		
		$simkesan = $this->Simkesan_model->get_all();
		foreach($simkesan as $key=>$item){
			$rekening = $item->sik_kode;
			
			$setoransimkesan = $this->Setoransimkesan_model->get_last_setor($rekening);
			$jatuhTempo = date("Y-m-d", strtotime($setoransimkesan->ssk_tglsetoran.' + '.$SATU.'month'));
			
			if($datenow >= $jatuhTempo){
				$tts_jmltitip = $this->Titipansimkesan_model->get_totaltitipan1($rekening);
				$tts_jmlambil = $this->Titipansimkesan_model->get_totalambil1($rekening);
				if(($tts_jmltitip->tts_jmltitip - $tts_jmlambil->tts_jmlambil) > 0){
					$ambilTitipan = $tts_jmltitip->tts_jmltitip;
					
					$insertSetoran = array(
						'sik_kode' => $rekening,
						'ssk_tglsetoran' => $dateTime,
						'ssk_tglbayar' => $dateTime,
						'ssk_jmlsetor' => $ambilTitipan,
						'ssk_tgl' => $dateTime
					);
					$this->Setoransimkesan_model->insert($insertSetoran);
					
					$insertTitipan = array(
						'sik_kode' => $rekening,
						'tts_tgltitip' => $dateTime,
						'tts_jmlambil' => $ambilTitipan,
						'tts_tgl' => $dateTime,
					);
					$this->Titipansimkesan_model->insert($insertTitipan);
					// echo "SETORAN <br>";
					// var_dump($insertSetoran);echo "<br>";
					// echo "TITIPAN <br>";
					// var_dump($insertTitipan);echo "<br><br><br>";
				}
			}
		}
		
		// end tarik simkesan otomatis

		$data = array(

			//date


			//neraca
			'dataphu' => $dataphu,
			'shudata' => $shuData,
			'kasbankdata' => $kasBankdata,
			'aktivatetaptanah' => $aktivaTetaptanah,
			'aktivatetapbangunan' => $aktivaTetapbangunan,
			'aktivatetapelektronik' => $aktivaTetapelektronik,
			'aktivatetapkendaraan' => $aktivaTetapkendaraan,
			'aktivatetapperalatan' => $aktivaTetapperalatan,
			'aktivatetappenyusutan' => $aktivaTetappenyusutan,
			'simpanankaryawandata' => $simpananKaryawandata,
			'rekeningkoran' => $rekeningKoran,
			'modalpenyertaan' => $modalPenyertaan,
			'simpanancdr' => $simpananCdr,
			'donasi' => $donasi,

			//investasi
			'jasainvestasiditarik' => $jasaInvestasiditarik,
			'saldoinvestasiditarik' => $saldoInvestasiditarik,
			'saldoinvestasilalu' => $saldoInvestasilalu,
			'saldoinvestasi' => $saldoInvestasi,
			
			//simpanan
			'saldosimpananlalu' => $saldoSimpananlalu,
			'saldosimpananneraca' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldosimpananwajib,
			'saldosimpananwajibditarik' => $saldoSimpananwajibDitarik,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			
			//pinjaman
			'pinjamanaktif' => $pinjamanAktif,
			'angsuranpokok' => $angsuranPokok,

			//simkesan
			//data setoran
			'saldosimkesanlalu' => $saldoSimkesanlalu,
			'saldosimkesan' => $saldoSimkesan,
			'saldosimkesanditarik' => $saldoSimkesanditarik,

			//data klaim
			'saldosetorklaim' => $saldoSetorklaim,
			'saldotunggakanklaim' => $saldoTunggakanklaim,
			'saldojumlahklaim' => $saldoJumlahklaim,
			'administrasiklaim' => $administrasiKlaim,

			//data penarikan
			'saldosetortarik' => $saldoSetortarik,
			'saldotunggakantarik' => $saldoTunggakantarik,
			'saldojumlahtarik' => $saldoJumlahtarik,
			'administrasitarik' => $administrasiTarik,

			//data titipan simkesan	
			'saldotitipan' => $saldoTitipan,
			'saldoambiltitipan' => $saldoAmbiltitipan,
			'f' => $f,
			't' => $t,
			'w' => $w,
			'content'=>'backend/dashboard',

		);
		//$this->hitungBungaSetoran();
		$this->load->view('layout_backend.php',$data);
	}

}
