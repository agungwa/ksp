<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PrintDataSimkesan extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Simkesan_model');
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->model('Penarikansimkesan_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Phusimkesan_model');
        $this->load->model('Phusimkesanpendapatan_model');
        $this->load->model('Shusimkesan_model');
        $this->load->model('Neracakasbanksimkesan_model');
		$this->load->model('Wilayah_model');
		
		
        $this->load->model('Pengkodean');
        $this->load->model('Karyawan_model');
        $this->load->model('Plansimkesan_model');
        $this->load->model('Jenispenarikansimkesan_model');
        $this->load->model('Jenisklaim_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Ahliwarissimkesan_model');
    }
	
	public function neraca(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simkesanAktif = $this->Simkesan_model->get_simkesan_aktif();
    	$simkesanNonaktif = $this->Simkesan_model->get_simkesan_nonaktif();
    	$simkesanKlaim = $this->Klaimsimkesan_model->get_all();    	
    	$simkesanDitarik = $this->Penarikansimkesan_model->get_all();
    	$shuSimkesan = $this->Shusimkesan_model->get_all();
    	$rekeningplanA = $this->Simkesan_model->get_simkesan_plan(1);
    	$rekeningplanB = $this->Simkesan_model->get_simkesan_plan(2);
    	$rekeningplanC = $this->Simkesan_model->get_simkesan_plan(3);
    	$kasBank = $this->Neracakasbanksimkesan_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		

		//rekening simkesan
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

		//shu simkesan
		$shuSimkesandata = 0;

		//kas bank
		$kasBankdata = 0;

		//data rekening plan
		$totalRekeningA = 0;
		$totalRekeningB = 0;
		$totalRekeningC = 0;

		//data setoran plan
		$saldoSimkesanA = 0;
		$saldoSimkesanB = 0;
		$saldoSimkesanC = 0;

        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	//hitung saldo simkesan aktif masuk kini
    	foreach ($simkesanAktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesan += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesan += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}
		
    	//hitung saldo simkesan aktif plan a
    	foreach ($rekeningplanA as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanA += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanA += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

    	//hitung saldo simkesan aktif plan b
    	foreach ($rekeningplanB as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanB += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanB += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

    	//hitung saldo simkesan aktif plan c
    	foreach ($rekeningplanC as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanC += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanC += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

		//rekening simkesan plan A
		foreach ($rekeningplanA as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningA++ ;
    			}
			} else {
					$totalRekeningA++ ;
		}
		}

		//rekening simkesan plan B
		foreach ($rekeningplanB as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningB++ ;
    			}
			} else {
					$totalRekeningB++ ;
		}
		}

		//rekening simkesan plan C
		foreach ($rekeningplanC as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningC++ ;
    			}
			} else {
					$totalRekeningC++ ;
		}
		}
		
		//shu
    	foreach ($shuSimkesan as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->phus_tgl));
			//var_dump($value->ags_id);
    			if (($tgl <= $f) )  {
					$shuSimkesandata += $value->shus_jumlah;
    			}
			} else {
				$shuSimkesandata += $value->shus_jumlah;
		}
	}
				
		//kas bank
		foreach ($kasBank as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->nkbs_tanggal));
			//var_dump($value->ags_id);
				if (($tgl <= $f) )  {
					$kasBankdata += $value->nkbs_jumlah;
				}
			} else {
				$kasBankdata += $value->nkbs_jumlah;
		}
	}


		//hitung saldo titipan simkesan
    	foreach ($simkesanAktif as $key => $value) {
    		$titipan = $this->Titipansimkesan_model->get_sikkode($value->sik_kode);
    		foreach ($titipan as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->tts_tgl));
    				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoTitipan += $item->tts_jmltitip;
						$saldoAmbiltitipan += $item->tts_jmlambil;
    				}
    			} else {
					$saldoTitipan += $item->tts_jmltitip;
					$saldoAmbiltitipan += $item->tts_jmlambil;
				}
				
				
			}
			
		
		}

		$data = array(

			//data rekening
			'totalrekening' => $totalRekening,
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,

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

			//data shu
			'shusimkesandata' => $shuSimkesandata,

			//data kas bank
			'kasbankdata' => $kasBankdata,

			//data rekening
			'totalRekeninga' => $totalRekeningA,
			'totalRekeningb' => $totalRekeningB,
			'totalRekeningc' => $totalRekeningC,

			//data setoran plan
			'saldoSimkesana' => $saldoSimkesanA,
			'saldoSimkesanb' => $saldoSimkesanB,
			'saldoSimkesanc' => $saldoSimkesanC,

            'wilayah_data' => $wilayah,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/neraca/neracasimkesan.php',
		);
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/simkesan/printsimkesan/index.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('sirkulasisimkesan.pdf','D'); // it downloads the file into the user system, with give name
    
    }
	
	public function hitungphu(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simkesanAktif = $this->Simkesan_model->get_simkesan_aktif();
    	$simkesanNonaktif = $this->Simkesan_model->get_simkesan_nonaktif();
    	$simkesanHangus = $this->Simkesan_model->get_simkesan_hangus();
    	$simkesanKlaim = $this->Klaimsimkesan_model->get_all();    	
    	$simkesanDitarik = $this->Penarikansimkesan_model->get_all();
    	$phuPengeluaran = $this->Phusimkesan_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		

		//rekening simkesan
		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;

		//setoran simkesan
		$saldoSimkesanlalu = 0;
    	$saldoSimkesan = 0;
		$saldoSimkesanditarik = 0;

		//simkesan hangus
		$saldoSimkesanhangus = 0;

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

		//phu pengeluaran
		$phuInsentif = 0;
		$phuGaji = 0;
		$phuPromosi = 0;
		$phuLainlain = 0;

		//titipan simkesan
		$saldoTitipan = 0;
		$saldoAmbiltitipan = 0;

        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	//hitung saldo simkesan aktif masuk kini
    	foreach ($simkesanAktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl >= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sik_kode->wil_kode == $w) {
						$saldoSimkesan += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesan += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

		

		//hitung saldo titipan simkesan
    	foreach ($simkesanAktif as $key => $value) {
    		$titipan = $this->Titipansimkesan_model->get_sikkode($value->sik_kode);
    		foreach ($titipan as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->tts_tgl));
    				if ($tgl <= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sik_kode->wil_kode == $w) {
						$saldoTitipan += $item->tts_jmltitip;
						$saldoAmbiltitipan += $item->tts_jmlambil;
    				}
    			} else {
					$saldoTitipan += $item->tts_jmltitip;
					$saldoAmbiltitipan += $item->tts_jmlambil;
				}
				
				
			}
			
		}
		
    	//hitung saldo simkesan ditarik
    	foreach ($simkesanNonaktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl >= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sik_kode->wil_kode == $w) {
						$saldoSimkesan += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesan += $item->ssk_jmlsetor;
				}
				
				
			}
		}

    	//hitung saldo simkesan hangus
    	foreach ($simkesanHangus as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl >= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sik_kode->wil_kode == $w) {
						$saldoSimkesanhangus += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanhangus += $item->ssk_jmlsetor;
				}
				
				
			}
		}
		
    	//hitung saldo simkesan lalu
    	foreach ($simkesanAktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl < $f && 'all' == $w || $tgl < $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanlalu += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanlalu += $item->ssk_jmlsetor;
				}
			}
			
		}

		//Saldo Klaim
		foreach ($simkesanKlaim as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $value->sik_kode))->row();
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $sik_kode->wil_kode==$w))  {
    				$saldoSetorklaim += $value->ksi_totalsetor;
    				$saldoTunggakanklaim += $value->ksi_jmltunggakan;
    				$saldoJumlahklaim += $value->ksi_jmlditerima;
    				$administrasiKlaim+= $value->ksi_administrasi;
    			}
			} else {
				$saldoSetorklaim += $value->ksi_totalsetor;
				$saldoTunggakanklaim += $value->ksi_jmltunggakan;
				$saldoJumlahklaim += $value->ksi_jmlditerima;
				$administrasiKlaim+= $value->ksi_administrasi;
		}
		}
		
		//Saldo Penarikan
		foreach ($simkesanDitarik as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $value->sik_kode))->row();
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $sik_kode->wil_kode==$w))  {
    				$saldoSetortarik += $value->pns_totalsetor;
    				$saldoTunggakantarik += $value->pns_jmltunggakan;
    				$saldoJumlahtarik+= $value->pns_jmlpenarikan;
    				$administrasiTarik+= $value->pns_administrasi;
    			}
			} else {
				$saldoSetortarik += $value->pns_totalsetor;
				$saldoTunggakantarik += $value->pns_jmltunggakan;
				$saldoJumlahtarik+= $value->pns_jmlpenarikan;
				$administrasiTarik+= $value->pns_administrasi;
		}
		}

		
		//phu pengeluaran
    	foreach ($phuPengeluaran as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->phus_tgl));
			//var_dump($value->ags_id);
    			if (($tgl <= $f) )  {
					$phuInsentif += $value->phus_insentif;
					$phuGaji += $value->phus_gaji;
					$phuPromosi += $value->phus_promosi;
					$phuLainlain += $value->phus_lainlain;
    			}
			} else {
				
				$phuInsentif += 0;
				$phuGaji += 0;
				$phuPromosi += 0;
				$phuLainlain += 0;
		}
	}

		//rekening simkesan lalu
		foreach ($simkesanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$totalRekeninglalu++ ;
    			}
			} else {
					$totalRekeninglalu++ ;
		}
		}

		//rekening simkesan masuk
		foreach ($simkesanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekening++ ;
    			}
			} else {
					$totalRekening++ ;
		}
		}

		//rekening simkesan keluar
		foreach ($simkesanNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekeningkeluar++ ;
    			}
			} else {
					$totalRekeningkeluar++ ;
		}
		
		}

		$data = array(

			//data rekening
			'totalrekening' => $totalRekening,
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,

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

			//data simkesan hangus
			'saldosimkesanhangus' => $saldoSimkesanhangus,

			//data titipan simkesan	
			'saldotitipan' => $saldoTitipan,
			'saldoambiltitipan' => $saldoAmbiltitipan,

			//data phu pengeluaran
			'phuinsentif' => $phuInsentif,
			'phugaji' => $phuGaji,
			'phupromosi' => $phuPromosi,
			'phulainlain' => $phuLainlain,

            'wilayah_data' => $wilayah,
			'f' => $f,
			't' => $t,
			'w' => $w,
		);
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/neraca/printneraca/shusimkesan.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('shusimkesan.pdf','D'); // it downloads the file into the user system, with give name
	}

    public function listSetoran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $n=1;
        $simkesanAktif = $this->Simkesan_model->get_simkesan_aktif();
        
        $wilayah = $this->Wilayah_model->get_all();
        $datasetoran = array();
        
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($simkesanAktif as $key => $value) {
    		$setoransimkesan = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
            foreach ($setoransimkesan as $k=>$item) {
                $sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $sik_kode->ang_no))->row();

                //$wil_kode = $sim_kode->wil_kode;
                $tanggalDuedate = $item->ssk_tglsetoran;
                $f = date("Y-m-d", strtotime($f));
                $t = date("Y-m-d", strtotime($t));

                if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $sik_kode->wil_kode == $w)) {
                    $datasetoran[$n] = array(
                    'ssk_id' => $item->ssk_id,
                    'sik_kode' => $item->sik_kode,
                    'nama_anggota' => $ang_no->ang_nama,
                    'wil_kode' => $sik_kode->wil_kode,
                    'ssk_tglsetoran' => $item->ssk_tglsetoran,
                    'ssk_jmlsetor' => $item->ssk_jmlsetor,
                    'ssk_tgl' => $item->ssk_tgl,
                    'ssk_flag' => $item->ssk_flag,
                    'ssk_info' => $item->ssk_info,
                    );
                    $n++;
                }
            }
        }

        $data = array(
            'datasetoran' => $datasetoran,
            'setoransimkesan_data' => $setoransimkesan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,  
            'active' => 4,          
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'listsetoran/setoransimkesan_list.php',
        );
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/simkesan/printsimkesan/setoransimkesan_list.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('setoransimkesan.pdf','D'); // it downloads the file into the user system, with give name
	}
    
    public function listjatuhtempo()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

        $setoransimkesan = $this->Setoransimkesan_model->get_group_bysikkode($start, $q, $f, $t);

        $wilayah = $this->Wilayah_model->get_all();
        $datajatuh = array();
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($setoransimkesan as $key=>$item) {
            $sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $sik_kode->ang_no))->row();

            //$wil_kode = $sim_kode->wil_kode;
            $tanggalDuedate = $item->ssk_tglsetoran;
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all' ) || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $sik_kode->wil_kode == $w )) {
                $datajatuh[$key] = array(
                'ssk_id' => $item->ssk_id,
                'sik_kode' => $item->sik_kode,
                'nama_anggota' => $ang_no->ang_nama,
                'wil_kode' => $sik_kode->wil_kode,
                'ssk_tglsetoran' => $item->ssk_tglsetoran,
                'ssk_jmlsetor' => $item->ssk_jmlsetor,
                'ssk_tgl' => $item->ssk_tgl,
                'ssk_flag' => $item->ssk_flag,
                'ssk_info' => $item->ssk_info,
                );
            }
        }
        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'datajatuh' => $datajatuh,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,  
            'active' => 3,          
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'jatuhtempo/simkesan_jatuhtempo.php',
        );
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/simkesan/printsimkesan/simkesan_jatuhtempo.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('jatuhtempo.pdf','D'); // it downloads the file into the user system, with give name
	}


    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}