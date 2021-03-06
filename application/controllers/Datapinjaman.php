<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datapinjaman extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Angsuranbayar_model');
        $this->load->model('Pelunasan_model');
        $this->load->model('Potonganprovisi_model');
        $this->load->model('Wilayah_model');
    }

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$angsuranbayarAll = $this->Angsuranbayar_model->get_all();
    	$pinjamanAll = $this->Pinjaman_model->get_pinjaman_all();
    	$pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktif();
    	$pinjamanNonaktif = $this->Pinjaman_model->get_pinjaman_nonaktif();
    	$angsuranBayar = $this->Angsuran_model->get_angsuran_bayar();
		$angsuranTotal = $this->Angsuran_model->get_angsuran_total();
		$angsuranKurang = $this->Angsuran_model->get_angsuran_kurang();
    	$pelunasanPinjaman = $this->Pelunasan_model->get_all(); 
        $wilayah = $this->Wilayah_model->get_all();
        $provisi = $this->Potonganprovisi_model->get_by_id(1);		

		$bungaPelunasan = 0;
		$totalRekening = 0;
		$saldolunaskini = 0;
		$satu = 1;
		$saldoDroppinjaman = 0;
    	$saldoLalupinjaman = 0;
    	$pokokAngsuran = 0;
    	$pokokAngsuranpelunasan = 0;
    	$bungaAngsuran = 0;
    	$bungaAngsurankurang = 0;
    	$dendaAngsuran = 0;
    	$provisiPinjaman = 0;
    	$bungaDendapelunasan = 0;
    	$totalAngsuran = 0;
		$totalAngsurantunggakan = 0;
		$pokokSudahbayar = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluarlalu = 0;
		$totalRekeningkeluarsetelah = 0;
		$totalRekeningkeluar = 0;
		$totalrekeningMasuk = 0;
		$totalrekeningMasuklalu = 0;
		$totalrekeningMasuksetelah = 0;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

    	//hitung saldo pinjaman kini
    	foreach ($pinjamanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
    				$saldoDroppinjaman += $value->pin_pinjaman ;
    			}
			} else {
				$saldoDroppinjaman == 0;
		}
	}

    	//hitung saldo pinjaman lalu
    	foreach ($pinjamanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if (($jt < $f && 'all'==$w) || ($jt < $f && $value->wil_kode==$w))  {
    				$saldoLalupinjaman += $value->pin_pinjaman ;
    			}
			} else {
				$saldoLalupinjaman += $value->pin_pinjaman;
		}
	}

	//hitung saldo pinjaman lunas kini
	foreach ($pinjamanNonaktif as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
		//var_dump($value->ags_id);
			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
				$saldolunaskini += $value->pin_pinjaman ;
			}
		} else {
			$saldolunaskini += $value->pin_pinjaman ;
	}
}


    	//hitung saldo angsuran pokok dari angsuran status bayar
   /* 	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
    				$pokokAngsuran += $value->ags_jmlpokok ;
    			}
			} else {
				$pokokAngsuran += $value->ags_jmlpokok;
		}
	} */

    	//hitung saldo angsuran pokok dari pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
    				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok ;
    				//$pokokSudahbayar += $value->pel_pokoksudahbayar ;
    			}
			} else {
				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok;
				//$pokokSudahbayar += $value->pel_pokoksudahbayar;
		}
	}

    	//hitung bunga angsuran status bayar
   /* 	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			
			if ($f<>'' && $t<>'' && $w<>'') {
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_tgl);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
					$bungaAngsuran += $value->ags_jmlbunga ;
				}
				
		//var_dump($value->ags_jmlbunga);
			} else {
				$bungaAngsuran += $value->ags_jmlbunga;
				
		}
	} */

	
    	//hitung denda angsuran status bayar
/*    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t  && $pin_id->wil_kode==$w))  {
    				$dendaAngsuran += $value->ags_denda ;
    			}
			} else {
				$dendaAngsuran += $value->ags_denda;
		}
	} */

	
    	//hitung denda angsuran bayar
    	foreach ($angsuranbayarAll as $key => $value) {
			$ags_id = $this->db->get_where('angsuran', array('ags_id' => $value->ags_id))->row();
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $ags_id->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->agb_tgl));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t  && $pin_id->wil_kode==$w))  {
    				$dendaAngsuran += $value->agb_denda ;
    			}
			} else {
				$dendaAngsuran += $value->agb_denda;
		}
	}

		
    	//hitung bunga angsuran status bayar
    	foreach ($angsuranbayarAll as $key => $value) {
			$ags_id = $this->db->get_where('angsuran', array('ags_id' => $value->ags_id))->row();
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $ags_id->pin_id))->row();
			
			if ($f<>'' && $t<>'' && $w<>'') {
			$jt = date("Y-m-d", strtotime($value->agb_tgl));
			//var_dump($value->ags_tgl);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
					$bungaAngsuran += $value->agb_bunga ;
					$pokokAngsuran += $value->agb_pokok;
				}
				
		//var_dump($value->ags_jmlbunga);
			} else {
				$bungaAngsuran += $value->agb_bunga;
				$pokokAngsuran += $value->agb_pokok;
				
		}
	}

		//hitung bunga angsuran status kurang improvement
		foreach ($angsuranKurang as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
				if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t  && $pin_id->wil_kode==$w))  {
					$bungaAngsurankurang += $value->ags_jmlbunga ;
				}
				//var_dump($value->ags_tgl);
				//var_dump($jt);
				//var_dump($f);
				//var_dump($t);
			} else {
				$bungaAngsurankurang += $value->ags_jmlbunga;
		}
	}
	
	
    	//hitung saldo potongan provisi
    	foreach ($pinjamanAktif as $key => $value) {
			$pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $value->pop_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->pin_tglpencairan);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
    				$provisiPinjaman += $value->pin_pinjaman*$pop_id->pop_potongan/100 ;
    			}
			} else {
				$provisiPinjaman += $value->pin_pinjaman*$pop_id->pop_potongan/100;
		}
	}

		   	//hitung saldo bunga denda pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
					$bungaDendapelunasan += $value->pel_bungatambahan ;
					$bungaPelunasan += $value->pel_totalbungapokok;
    			}
			} else {
				$bungaPelunasan += $value->pel_totalbungapokok;
				$bungaDendapelunasan += $value->pel_bungatambahan;
		}
	}
	
		//hitung Total saldo angsuran total dari angsuran
    	foreach ($angsuranTotal as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
    				$totalAngsuran += $value->ags_jmlbayar ;
    			}
			} else {
				$totalAngsuran += $value->ags_jmlbayar;
		}
	}
			
	
		//hitung Total saldo angsuran pokok dari angsuran tunggakan
    	foreach ($angsuranTotal as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $pin_id->wil_kode==$w))  {
    				$totalAngsurantunggakan += $value->ags_bayartunggakan ;
    			}
			} else {
				$totalAngsurantunggakan += $value->ags_bayartunggakan;
		}
	}

	//Rekening pinjaman kini
	foreach ($pinjamanAktif as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
		//var_dump($value->ags_id);
			if (('all'==$w) || ($value->wil_kode==$w))  {
				$totalRekening++ ;
			}
		} else {
			$totalRekening=0;
	}
}


	//Rekening pinjaman masuk kini
	foreach ($pinjamanAll as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
		//var_dump($value->ags_id);
			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
				$totalrekeningMasuk++ ;
			}
		} else {
			$totalrekeningMasuk=0;
	}
}


//Rekening pinjaman masuk lalu
foreach ($pinjamanAll as $key => $value) {
	if ($f<>'' && $t<>'' && $w<>'') {	
	$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
	//var_dump($value->ags_id);
		if (($jt < $f && 'all'==$w) || ($jt < $f && $value->wil_kode==$w))  {
			$totalrekeningMasuklalu++ ;
		}
	} else {
		$totalrekeningMasuklalu=0;
}
}


//Rekening pinjaman masuk setelah
foreach ($pinjamanAll as $key => $value) {
	if ($f<>'' && $t<>'' && $w<>'') {	
	$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
	//var_dump($value->ags_id);
		if (($jt > $t && 'all'==$w) || ($jt > $t && $value->wil_kode==$w))  {
			$totalrekeningMasuksetelah++ ;
		}
	} else {
		$totalrekeningMasuksetelah=0;
}
}
	//Rekening pinjaman lalu
	foreach ($pinjamanAll as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
		//var_dump($value->ags_id);
			if (($jt < $f && 'all'==$w) || ($jt < $f && $value->wil_kode==$w))  {
				$totalRekeninglalu++ ;
			}
		} else {
			$totalRekeninglalu++;
	}
}

	//Rekening pinjaman Keluar
	foreach ($pinjamanNonaktif as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpelunasan));
		//var_dump($value->ags_id);
			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
				$totalRekeningkeluar++ ;
			}
		} else {
			$totalRekeningkeluar++;
	}
}

//Rekening pinjaman Keluar Lalu
foreach ($pinjamanNonaktif as $key => $value) {
	if ($f<>'' && $t<>'' && $w<>'') {	
	$jt = date("Y-m-d", strtotime($value->pin_tglpelunasan));
	//var_dump($value->ags_id);
		if (($jt < $f && 'all'==$w) || ($jt < $f && $value->wil_kode==$w))  {
			$totalRekeningkeluarlalu++ ;
		}
	} else {
		$totalRekeningkeluarlalu++;
}
}

//Rekening pinjaman Keluar
foreach ($pinjamanNonaktif as $key => $value) {
	if ($f<>'' && $t<>'' && $w<>'') {	
	$jt = date("Y-m-d", strtotime($value->pin_tglpelunasan));
	//var_dump($value->ags_id);
		if (($jt > $t && 'all'==$w) || ($jt > $t && $value->wil_kode==$w))  {
			$totalRekeningkeluarsetelah++ ;
		}
	} else {
		$totalRekeningkeluarsetelah++;
}
}

		$data = array(
			
			'bungapelunasan' => $bungaPelunasan,
			'totalrekening' => $totalRekening,
			'totalrekeningmasuk' => $totalrekeningMasuk,
			'totalrekeningmasuklalu' => $totalrekeningMasuklalu,
			'totalrekeningmasuksetelah' => $totalrekeningMasuksetelah,
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,
			'totalrekeningkeluarlalu' => $totalRekeningkeluarlalu,
			'totalrekeningkeluarsetelah' => $totalRekeningkeluarsetelah,
			'wilayah_data' => $wilayah,
			'saldolunaskini' => $saldolunaskini,
			'saldodroppinjaman' => $saldoDroppinjaman,
			'saldolalupinjaman' => $saldoLalupinjaman,
			'pokokangsuran' => $pokokAngsuran,
			'pokoksudahbayar' => $pokokSudahbayar,
			'pokokangsuranpelunasan' => $pokokAngsuranpelunasan,
			'bungaangsuran' => $bungaAngsuran,
			'bungaangsurankurang' => $bungaAngsurankurang,
			'bungadendapelunasan' => $bungaDendapelunasan,
			'dendaangsuran' => $dendaAngsuran,
			'provisipinjaman' => $provisiPinjaman,
			'totalangsuran' => $totalAngsuran,
			'totalangsurantunggakan' => $totalAngsurantunggakan,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/pinjaman/datapinjaman/index',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}