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

    	$pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktif();
    	$pinjamanNonaktif = $this->Pinjaman_model->get_pinjaman_nonaktif();
    	$angsuranBayar = $this->Angsuran_model->get_angsuran_bayar();
    	$angsuranTotal = $this->Angsuran_model->get_angsuran_total();
    	$pelunasanPinjaman = $this->Pelunasan_model->get_all(); 
        $wilayah = $this->Wilayah_model->get_all();
        $provisi = $this->Potonganprovisi_model->get_by_id(1);		

		
		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;
		$satu = 1;
		$saldoDroppinjaman = 0;
    	$saldoLalupinjaman = 0;
    	$pokokAngsuran = 0;
    	$pokokAngsuranpelunasan = 0;
    	$bungaAngsuran = 0;
    	$dendaAngsuran = 0;
    	$provisiPinjaman = 0;
    	$bungaDendapelunasan = 0;
    	$totalAngsuran = 0;
    	$totalAngsurantunggakan = 0;
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
				$saldoDroppinjaman += $value->pin_pinjaman;
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

    	//hitung saldo angsuran pokok dari angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
    				$pokokAngsuran += $value->ags_jmlpokok ;
    			}
			} else {
				$pokokAngsuran += $value->ags_jmlpokok;
		}
	}

    	//hitung saldo angsuran pokok dari pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
    				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok ;
    			}
			} else {
				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok;
		}
	}

    	//hitung bunga angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
    				$bungaAngsuran += $value->ags_jmlbunga ;
    			}
			} else {
				$bungaAngsuran += $value->ags_jmlbunga;
		}
	}
	
    	//hitung denda angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
    				$dendaAngsuran += $value->ags_denda ;
    			}
			} else {
				$dendaAngsuran += $value->ags_denda;
		}
	}
	
	
    	//hitung saldo potongan provisi
    	foreach ($pinjamanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
    				$provisiPinjaman += $value->pin_pinjaman*$provisi->pop_potongan/100 ;
    			}
			} else {
				$provisiPinjaman += $value->pin_pinjaman*$provisi->pop_potongan/100;
		}
	}

   	//hitung saldo total pokok pelunasan
	   foreach ($pelunasanPinjaman as $key => $value) {
		$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pel_tglpelunasan));
		//var_dump($value->ags_id);
			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok ;
			}
		} else {
			$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok;
	}
}

		   	//hitung saldo bunga denda pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
    				$bungaDendapelunasan += $value->pel_bungatambahan ;
    			}
			} else {
				$bungaDendapelunasan += $value->pel_bungatambahan;
		}
	}
	
		//hitung Total saldo angsuran pokok dari angsuran jumlah bayar
    	foreach ($angsuranTotal as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
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
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $pin_id->wil_kode==$w))  {
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
			if (($jt >= $f && $jt <= $t && 'all'==$w) || ($jt >= $f && $jt <= $t && $value->wil_kode==$w))  {
				$$totalRekening++ ;
			}
		} else {
			$$totalRekening++;
	}
}

	//Rekening pinjaman lalu
	foreach ($pinjamanNonaktif as $key => $value) {
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
	foreach ($pinjamanAktif as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$jt = date("Y-m-d", strtotime($value->pin_tglpencairan));
		//var_dump($value->ags_id);
			if (($jt < $f && 'all'==$w) || ($jt < $f && $value->wil_kode==$w))  {
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
			'saldodroppinjaman' => $saldoDroppinjaman,
			'saldolalupinjaman' => $saldoLalupinjaman,
			'pokokangsuran' => $pokokAngsuran,
			'pokokangsuranpelunasan' => $pokokAngsuranpelunasan,
			'bungaangsuran' => $bungaAngsuran,
			'bungadendapelunasan' => $bungaDendapelunasan,
			'dendaangsuran' => $dendaAngsuran,
			'provisipinjaman' => $provisiPinjaman,
			'totalangsuran' => $totalAngsuran,
			'totalangsurantunggakan' => $totalAngsurantunggakan,
			'f' => $f,
			't' => $t,
			'w' => $w,
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
}

/* End of file Pinjaman.php */
/* Location: ./application/controllers/Pinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:42 */
/* http://harviacode.com */