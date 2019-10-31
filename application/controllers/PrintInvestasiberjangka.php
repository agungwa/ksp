<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PrintInvestasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Pengkodean');
	}

    
    public function jatuhTempo(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu =1;
        $investasi = $this->Investasiberjangka_model->get_jatuh_tempo($start, $q, $f, $t);

        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        $datainvestasi = array();
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($investasi as $key=>$item) { $ivb_status = $this->statusInvestasi;                
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $item->jwi_id))->row();
            $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $item->jiv_id))->row();
            $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $item->biv_id))->row();
            $tanggalDuedate = date("Y-m-d", strtotime($item->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $item->wil_kode == $w)) {
                $datainvestasi[$key] = array(
                    'ivb_kode' => $item->ivb_kode,
                    'ang_no' => $item->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'alamat_ang_no' => $ang_no->ang_alamat,
                    'kar_kode' => $kar_kode->kar_nama,
                    'wil_kode' => $wil_kode->wil_nama,
                    'jwi_id' => $jwi_id->jwi_jangkawaktu,
                    'jiv_id' => $jiv_id->jiv_jasa,
                    'biv_id' => $biv_id->biv_bunga,
                    'ivb_jumlah' => $item->ivb_jumlah,
                    'ivb_tglpendaftaran' => $item->ivb_tglpendaftaran,
                    'ivb_tglperpanjangan' => $item->ivb_tglperpanjangan,
                    'jatuhtempo' => $tanggalDuedate,
                    'ivb_status' => $ivb_status[$item->ivb_status],
                    'ivb_tgl' => $item->ivb_tgl,
                    'ivb_flag' => $item->ivb_flag,
                    'ivb_info' => $item->ivb_info,
                                    );
            }
        }

        $data = array(
            'datainvestasi' => $datainvestasi,
            'investasi_data' => $investasi,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,
        );
        
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('backend/investasiberjangka/printinvestasi/investasi_jatuhtempo.php',$data,true);
		//echo $html;
		$mpdf->WriteHTML($html);
		//$mpdf->Output(); // opens in browser
		$mpdf->Output('jatuhtempo.pdf','D'); // it downloads the file into the user system, with give name
	
	
    }

    
    public function listjasa(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu =1;
        $investasi = $this->Investasiberjangka_model->get_investasi_perbulan($start, $q);

        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        $datainvestasi = array();
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($investasi as $key=>$item) { $ivb_status = $this->statusInvestasi;                
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $item->jwi_id))->row();
            $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $item->jiv_id))->row();
            $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $item->biv_id))->row();

            
            $date1 = new DateTime($item->ivb_tglpendaftaran);
            $date2 = new DateTime();
            $diff = $date1->diff($date2);
            $selisihjt = (($diff->format('%y') * 12) + $diff->format('%m'));

            $tanggalDuedate1 = date("Y-m-d", strtotime($item->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));
            $tanggalDuedate = date("Y-m-d", strtotime($item->ivb_tglpendaftaran.' + '.$satu.' Months'));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (( $selisihjt >= 1 && $w=='all') || ( $selisihjt >= 1 && $item->wil_kode == $w)) {
                $datainvestasi[$key] = array(
                    'ivb_kode' => $item->ivb_kode,
                    'ang_no' => $item->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'alamat_ang_no' => $ang_no->ang_alamat,
                    'kar_kode' => $kar_kode->kar_nama,
                    'wil_kode' => $wil_kode->wil_nama,
                    'jwi_id' => $jwi_id->jwi_jangkawaktu,
                    'jiv_id' => $jiv_id->jiv_jasa,
                    'biv_id' => $biv_id->biv_bunga,
                    'ivb_jumlah' => $item->ivb_jumlah,
                    'ivb_tglpendaftaran' => $item->ivb_tglpendaftaran,
                    'ivb_tglperpanjangan' => $item->ivb_tglperpanjangan,
                    'jatuhtempo' => $tanggalDuedate,
                    'ivb_status' => $ivb_status[$item->ivb_status],
                    'ivb_tgl' => $item->ivb_tgl,
                    'ivb_flag' => $item->ivb_flag,
                    'ivb_info' => $item->ivb_info,
                                    );
            }
        }

        $data = array(
            'datainvestasi' => $datainvestasi,
            'investasi_data' => $investasi,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,
        );
        
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('backend/investasiberjangka/printinvestasi/investasi_jasa.php',$data,true);
		//echo $html;
		$mpdf->WriteHTML($html);
		//$mpdf->Output(); // opens in browser
		$mpdf->Output('listjasa.pdf','D'); // it downloads the file into the user system, with give name
	
	
    }
	


    public function printsirkulasiinvestasi(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;
    	$investasiAktif = $this->Investasiberjangka_model->get_investasi_aktif();
    	$investasiNonaktif = $this->Investasiberjangka_model->get_investasi_nonaktif();
    	$jasaDitarik = $this->Penarikaninvestasiberjangka_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		
		$satu = 1;
    	$saldoInvestasi = 0;
    	$saldoInvestasilalu = 0;
    	$saldoInvestasiditarik = 0;
    	$jasaInvestasiditarik = 0;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
		}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

    	//hitung saldo investasi aktif
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$saldoInvestasi += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasi += $value->ivb_jumlah;
		}
	}

		//hitung saldo investasi aktif lalu
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$saldoInvestasilalu += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasilalu += $value->ivb_jumlah;
		}
	}

		
    	//hitung saldo investasi nonaktif
    	foreach ($investasiNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$saldoInvestasiditarik += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasiditarik += $value->ivb_jumlah;
		}
	}

    	//hitung saldo jasa ditarik
    	foreach ($jasaDitarik as $key => $value) {
			$ivb_kode = $this->db->get_where('investasiberjangka', array('ivb_kode' => $value->ivb_kode))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($value->pib_tgl));
    				if (($tgl >= $f && $tgl <= $t && $w == 'all') || ($tgl >= $f && $tgl <= $t && $ivb_kode->wil_kode == $w)) {
    					$jasaInvestasiditarik += $value->pib_jmlditerima;
    				}
    			} else {
    				$jasaInvestasiditarik += $value->pib_jmlditerima;
    			}
    		
    	}

		//Rekening investasi kini
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekening++;
    			}
			} else {
				$totalRekening++;
		}
	}

		//Rekening investasi aktif lalu
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$totalRekeninglalu++ ;
    			}
			} else {
				$totalRekeninglalu++;
		}
	}

		
    	//Rekening investasi nonaktif
    	foreach ($investasiNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
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
			'jasainvestasiditarik' => $jasaInvestasiditarik,
			'saldoinvestasiditarik' => $saldoInvestasiditarik,
			'saldoinvestasilalu' => $saldoInvestasilalu,
			'saldoinvestasi' => $saldoInvestasi,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/investasiberjangka/datainvestasi/index',
		);
        
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('backend/investasiberjangka/printinvestasi/sirkulasiinvestasi.php',$data,true);
    //echo $html;
    $mpdf->WriteHTML($html);
    //$mpdf->Output(); // opens in browser
    $mpdf->Output('sirkulasiinvestasi.pdf','D'); // it downloads the file into the user system, with give name


    }

	//print sertifikat investasi
    public function read($id) 
    {
        $row = $this->Investasiberjangka_model->get_by_id($id);
        if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

            $data = array(
		'ivb_kode' => $row->ivb_kode,
		'ang_no' => $row->ang_no,
		'nama_ang_no' => $ang_no->ang_nama,
		'alamat_ang_no' => $ang_no->ang_alamat,
		'kar_kode' => $kar_kode->kar_nama,
		'wil_kode' => $wil_kode->wil_nama,
		'jwi_id' => $jwi_id->jwi_jangkawaktu,
		'jiv_id' => $jiv_id->jiv_jasa,
		'biv_id' => $biv_id->biv_bunga,
		'ivb_jumlah' => $row->ivb_jumlah,
		'ivb_tglpendaftaran' => $row->ivb_tglpendaftaran,
        'ivb_tglperpanjangan' => $row->ivb_tglperpanjangan,
        'jatuhtempo' => $tanggalDuedate,
		'ivb_status' => $ivb_status[$row->ivb_status],
		'ivb_tgl' => $row->ivb_tgl,
		'ivb_flag' => $row->ivb_flag,
		'ivb_info' => $row->ivb_info,
	    );
        
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
		$html = $this->load->view('backend/investasiberjangka/printinvestasi/sertifikat.php',$data,true);
		//echo $html;
		$mpdf->WriteHTML($html);
		//$mpdf->Output(); // opens in browser
		$mpdf->Output('sertifikat.pdf','D'); // it downloads the file into the user system, with give name
	}
	
    }

	//print surat investasi
    public function surat($id) 
    {
        $row = $this->Investasiberjangka_model->get_by_id($id);
        if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

            $data = array(
		'ivb_kode' => $row->ivb_kode,
		'ang_no' => $row->ang_no,
		'nama_ang_no' => $ang_no->ang_nama,
		'alamat_ang_no' => $ang_no->ang_alamat,
		'ang_tempatlahir' => $ang_no->ang_tempatlahir,
		'ang_tgllahir' => $ang_no->ang_tgllahir,
		'ang_nohp' => $ang_no->ang_nohp,
		'kar_kode' => $kar_kode->kar_nama,
		'wil_kode' => $wil_kode->wil_nama,
		'jwi_id' => $jwi_id->jwi_jangkawaktu,
		'jiv_id' => $jiv_id->jiv_jasa,
		'biv_id' => $biv_id->biv_bunga,
		'ivb_jumlah' => $row->ivb_jumlah,
		'ivb_tglpendaftaran' => $row->ivb_tglpendaftaran,
        'ivb_tglperpanjangan' => $row->ivb_tglperpanjangan,
        'jatuhtempo' => $tanggalDuedate,
		'ivb_status' => $ivb_status[$row->ivb_status],
		'ivb_tgl' => $row->ivb_tgl,
		'ivb_flag' => $row->ivb_flag,
		'ivb_info' => $row->ivb_info,
	    );
        
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
		$html = $this->load->view('backend/investasiberjangka/printinvestasi/surat.php',$data,true);
		//echo $html;
		$mpdf->WriteHTML($html);
		//$mpdf->Output(); // opens in browser
		$mpdf->Output('surat.pdf','D'); // it downloads the file into the user system, with give name
	}
	
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }


}

/* End of file Investasiberjangka.php */
/* Location: ./application/controllers/Investasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:37 */
/* http://harviacode.com */