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
        $this->load->model('Pelunasan_model');
        $this->load->model('Potonganprovisi_model');
        $this->load->model('Wilayah_model');
    }

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktif();
    	$angsuranBayar = $this->Angsuran_model->get_angsuran_bayar();
    	$angsuranTotal = $this->Angsuran_model->get_angsuran_total();
    	$pelunasanPinjaman = $this->Pelunasan_model->get_all(); 
        $wilayah = $this->Wilayah_model->get_all();
        $provisi = $this->Potonganprovisi_model->get_by_id(1);		

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


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

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
    			if (($jt <= $f && 'all'==$w) || ($jt <= $f && $value->wil_kode==$w))  {
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

		$data = array(
			
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