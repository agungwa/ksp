<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PrintPinjaman extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelunasan_model');
        $this->load->model('Potonganprovisi_model');
        $this->load->model('Angsuranbayar_model');
        $this->load->model('Pinjaman_model');
        $this->load->model('Jaminan_model');
        $this->load->model('Penjamin_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Pengkodean');
    }

    public function printsirkulasipinjaman(){
		
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
        
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/pinjaman/printpinjaman/sirkulasipinjaman.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('sirkulasipinjaman.pdf','D'); // it downloads the file into the user system, with give name
    
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }

    public function printpenagihanawal(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
        $y = urldecode($this->input->get('y', TRUE));
        $satu = 1;
        $start = intval($this->input->get('start'));
        $karyawan = $this->Karyawan_model->get_all();
        $pinjaman = $this->Pinjaman_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();
        $angsuran = $this->Angsuran_model->get_penagihanawal_data($start, $q);
        $dataangsuran = array();
        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $dataangsuran = array();
        if ($t == null && $y == null ) { $t=$datetoday; $y=$tanggalDuedate;}
        foreach ($angsuran as $key=>$item) {
            $pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $pin_id->wil_kode))->row();

            $t = date("Y-m-d", strtotime($t));
            $y = date("Y-m-d", strtotime($y));
            $jt = date("Y-m-d", strtotime($item->ags_tgljatuhtempo));
            if (
                ( $jt >= $t && $jt <= $y && $w=='all') || 
                ( $jt >= $t && $jt <= $y && $pin_id->wil_kode == $w)) {

                    $dataangsuran[$key] = array(
                        'ags_id' => $item->ags_id,
                        'pin_id' => $item->pin_id,
                        'wil_kode' => $wil_kode->wil_nama,
                        'ang_angsuranke' => $item->ang_angsuranke,
                        'ags_tgljatuhtempo' => $item->ags_tgljatuhtempo,
                        'ags_tglbayar' => $item->ags_tglbayar,
                        'ags_jmlpokok' => $item->ags_jmlpokok,
                        'ags_jmlbunga' => $item->ags_jmlbunga,
                        'ags_status' => $this->statusAngsuran[$item->ags_status],
                    );
            }
        }

        $data = array(
            'dataangsuran' => $dataangsuran,
            't' => $t,
            'y' => $y,
            'w' => $w,
            'pinjaman' => $pinjaman,
            'wilayah' => $wilayah,
            'karyawan' => $karyawan,
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/pinjaman/printpinjaman/printpenagihanawal.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('penagihanawal.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function printpenagihankolektor(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
        $y = urldecode($this->input->get('y', TRUE));
        $satu = 1;
        $start = intval($this->input->get('start'));
        $karyawan = $this->Karyawan_model->get_all();
        $pinjaman = $this->Pinjaman_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();
        $angsuran = $this->Angsuran_model->get_penagihanakhir_data($start, $q);
        $dataangsuran = array();
        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $dataangsuran = array();
        if ($t == null && $y == null ) { $t=$datetoday; $y=$tanggalDuedate;}
        foreach ($angsuran as $key=>$item) {
            $pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $pin_id->wil_kode))->row();

            $t = date("Y-m-d", strtotime($t));
            $y = date("Y-m-d", strtotime($y));
            $jt = date("Y-m-d", strtotime($item->ags_tgljatuhtempo));
            if (
                ( $jt >= $t && $jt <= $y && $w=='all') || 
                ( $jt >= $t && $jt <= $y && $pin_id->wil_kode == $w)) {

                    $dataangsuran[$key] = array(
                        'ags_id' => $item->ags_id,
                        'pin_id' => $item->pin_id,
                        'wil_kode' => $wil_kode->wil_nama,
                        'ang_angsuranke' => $item->ang_angsuranke,
                        'ags_tgljatuhtempo' => $item->ags_tgljatuhtempo,
                        'ags_tglbayar' => $item->ags_tglbayar,
                        'ags_jmlpokok' => $item->ags_jmlpokok,
                        'ags_jmlbunga' => $item->ags_jmlbunga,
                        'ags_status' => $this->statusAngsuran[$item->ags_status],
                    );
            }
        }

        $data = array(
            'dataangsuran' => $dataangsuran,
            't' => $t,
            'y' => $y,
            'w' => $w,
            'pinjaman' => $pinjaman,
            'wilayah' => $wilayah,
            'karyawan' => $karyawan,
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/pinjaman/printpinjaman/printpenagihankolektor.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('penagihankolektor.pdf','D'); // it downloads the file into the user system, with give name
    
	}
	
	public function pencairan($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/bpkb.php',$data,true);
				$html1 = $this->load->view('backend/pinjaman/printpinjaman/beritaacara.php',$data,true);
				$html2 = $this->load->view('backend/pinjaman/printpinjaman/pengambilanunit.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html,$html1;
				$mpdf->WriteHTML($html);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html1);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html2);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pencairan.pdf','D'); // it downloads the file into the user system, with give name
    
        }
    }
	
	public function pencairandeposito($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/pkdeposito.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html;
				$mpdf->WriteHTML($html);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pencairan.pdf','D'); // it downloads the file into the user system, with give name
    
        }
    }
	
	public function pencairansertifikat($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/pksertifikat.php',$data,true);
				$html1 = $this->load->view('backend/pinjaman/printpinjaman/beritaacarasertifikat.php',$data,true);
				$html2 = $this->load->view('backend/pinjaman/printpinjaman/suratpemasangan.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html;
				$mpdf->WriteHTML($html);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html1);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html2);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pencairan.pdf','D'); // it downloads the file into the user system, with give name
    
        }
    }
	
	public function pencairanshgb($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/pkshgb.php',$data,true);
				$html1 = $this->load->view('backend/pinjaman/printpinjaman/beritaacarashgb.php',$data,true);
				$html2 = $this->load->view('backend/pinjaman/printpinjaman/suratpengosonganshgb.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html;
				$mpdf->WriteHTML($html);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html1);
				$mpdf->AddPage();
				$mpdf->WriteHTML($html2);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pencairan.pdf','D'); // it downloads the file into the user system, with give name
    
        }
    }
	
	
	public function pencairansimpanan($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/pksimpanan.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html;
				$mpdf->WriteHTML($html);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pencairan.pdf','D'); // it downloads the file into the user system, with give name
    
        }
	}
	
	public function pencairanijazah($id) 
    {
		$row = $this->Pinjaman_model->get_by_id($id);
		$jaminan = $this->Jaminan_model->get_by_rek($id);
		$penjamin = $this->Penjamin_model->get_by_rek($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
			$surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
			$tanggalDuedate = date("Y-m-d", strtotime($row->pin_tglpencairan.' + '.$sea_id->sea_tenor.' Months'));
		//var_dump($jaminan);
            $data = array(
				'jaminan_data' => $jaminan,
				'penjamin_data' => $penjamin,
				'ang_nama' => $ang_no->ang_nama,
				'ang_tgllahir' => $ang_no->ang_tgllahir,
				'ang_alamat' => $ang_no->ang_alamat,
				'ang_noktp' => $ang_no->ang_noktp,
				'ang_nohp' => $ang_no->ang_nohp,
				'ang_tempatlahir' => $ang_no->ang_tempatlahir,
				'tgl_pelunasan' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ang_no' => $row->ang_no,
                'nama_ang_no' => $ang_no->ang_nama,
                'sea_id' => $sea_id->sea_tenor,
                'bup_id' => $bup_id->bup_bunga,
                'pop_id' => $pop_id->pop_potongan,
                'wil_kode' => $wil_kode->wil_nama,
                'skp_id' => $skp_id->skp_kategori,
                'pin_pengajuan' => $row->pin_pengajuan,
                'pin_pinjaman' => $row->pin_pinjaman,
                'pin_tglpengajuan' => $row->pin_tglpengajuan,
                'pin_tglpencairan' => $row->pin_tglpencairan,
                'pin_marketing' => $marketing->kar_nama,
                'pin_surveyor' => $surveyor->kar_nama,
                'pin_survey' => $row->pin_survey,
                'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
    	    );
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
				//$header = $this->load->view('backend/pinjaman/printpinjaman/header2.php',$data,true);
				$html = $this->load->view('backend/pinjaman/printpinjaman/pkijazah.php',$data,true);
				//$mpdf->SetHeader($header);
				//echo $html;
				$mpdf->WriteHTML($html);
				//$mpdf->Output(); // opens in browser
				$mpdf->Output('pkijazah.pdf','D'); // it downloads the file into the user system, with give name
    
        }
    }
	
}

/* End of file Pinjaman.php */
/* Location: ./application/controllers/Pinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:42 */
/* http://harviacode.com */