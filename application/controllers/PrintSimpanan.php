<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Printsimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->model('Simpananpokok_model');
        $this->load->model('Simpanan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }
   
    public function printlistsetoran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        
        $setoransimpanan = $this->Setoransimpanan_model->get_limit_data($start, $q, $f, $t);

        $wilayah = $this->Wilayah_model->get_all();
        $datasetoran = array();
        foreach ($setoransimpanan as $key=>$item) {
            $sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
            //$wil_kode = $sim_kode->wil_kode;
            $tanggalDuedate = $item->ssi_tglsetor;
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $sim_kode->wil_kode == $w)) {
                $datasetoran[$key] = array('ssi_id' => $item->ssi_id,
                'sim_kode' => $item->sim_kode,
                'wil_kode' => $sim_kode->wil_kode,
                'ssi_tglsetor' => $item->ssi_tglsetor,
                'ssi_jmlsetor' => $item->ssi_jmlsetor,
                //'ssi_jmlbunga' => $row->ssi_jmlbunga,
                'ssi_tgl' => $item->ssi_tgl,
                'ssi_flag' => $item->ssi_flag,
                'ssi_info' => $item->ssi_info,
                );
            }
        }
        $data = array(
            'datasetoran' => $datasetoran,
            'setoransimpanan_data' => $setoransimpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,
        );
        //var_dump($data);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/setoransimpananprint.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('listsetoransimpanan.pdf','D'); // it downloads the file into the user system, with give name
    
    }

    public function printsirkulasisimpanan(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$setoransimpananwajib = $this->Setoransimpananwajib_model->get_all();    	
    	$simpananwajibDitarik = $this->Penarikansimpananwajib_model->get_all();
		$simpananPokok = $this->Simpananpokok_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		

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

		$data = array(
			
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
        );
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/sirkulasisimpanan.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('sirkulasisimpanan.pdf','D'); // it downloads the file into the user system, with give name
    
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */