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

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $f = urldecode($this->input->get('f', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $s = urldecode($this->input->get('s', TRUE)); //status
        $u = urldecode($this->input->get('u', TRUE)); //no rekening
        $start = intval($this->input->get('start'));
        //echo $f,$t, $u, $w, $s;
        $datasimpanan = array();
        $wilayah = $this->Wilayah_model->get_all();
        $simpanan = $this->Simpanan_model->get_limit_data($start, $q);
        
        foreach ($simpanan as $key=>$item) {
            
            $tgl = date("Y-m-d", strtotime($item->sim_tglpendaftaran));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));
            if (
                ( $u=='all' && $s=='all' && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s=='all' && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s == $item->sim_status && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s=='all' && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s == $item->sim_status && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s=='all' && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s == $item->sim_status && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s == $item->sim_status && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t )) {
                    $sim_status = $this->statusSimpanan;
                    $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $item->jsi_id))->row();
                    $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $item->jse_id))->row();
                    $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $item->bus_id))->row();
                    $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
                    $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
                    $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
                    $datasimpanan[$key] = array(
                'sim_kode' => $item->sim_kode,
                'ang_no' => $item->ang_no,
                'nm_ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'bus_id' => $bus_id->bus_bunga,
                'jsi_id' => $jsi_id->jsi_simpanan,
                'jse_id' => $jse_id->jse_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sim_tglpendaftaran' => $item->sim_tglpendaftaran,
                'sim_status' => $sim_status[$item->sim_status],
                'sim_tgl' => $item->sim_tgl,
                'sim_flag' => $item->sim_flag,
                'sim_info' => $item->sim_info,
                    );
                }
            }
            
      //  var_dump($datasimpanan);
        $data = array(
            'datasimpanan' => $datasimpanan,
            'simpanan_data' => $simpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'f' => $f,
            't' => $t,
            'w' => $w,
            's' => $s,
            'u' => $u,
            'start' => $start,
        );
        //var_dump($data);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/simpanan/printsimpanan/simpanan_list.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
       $mpdf->Output('listrekeningsimpanan.pdf','D'); // it downloads the file into the user system, with give name
    
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

		$saldoSimpananlalu = 0;
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
		
		//hitung saldo simpanan aktif lalu
		foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
    				if ($tgl < $f && 'all' == $w || $tgl < $f && $sim_kode->wil_kode == $w) {
						$saldoSimpananlalu += $item->ssi_jmlsetor;
    				}
    			} else {
    				$saldoSimpananlalu += $item->ssi_jmlsetor;
				}
				
			}
			
		}
		
    	//hitung saldo simpanan ditarik
    	foreach ($simpananNonaktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				$wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $sim_kode->wil_kode))->row();
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->pes_tglpenarikan));
    				if ( $tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $wil_kode->wil_nama == $w) {
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
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				$wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $sim_kode->wil_kode))->row();
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->bss_tglbunga));
    				if ($tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $wil_kode->wil_nama == $w) {
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
		
		//rekening simpanan lalu
		foreach ($simpananAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl < $f && 'all'==$w) || ($tgl < $f && $value->wil_kode==$w))  {
    				$totalRekeninglalu++ ;
    			}
			} else {
					$totalRekeninglalu++ ;
		}
		}

		//rekening simpanan masuk
		foreach ($simpananAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekening++ ;
    			}
			} else {
					$totalRekening++ ;
		}
		}

		//rekening simpanan keluar
		foreach ($simpananNonaktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sim_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$totalRekeningkeluar++ ;
    			}
			} else {
					$totalRekeningkeluar++ ;
		}
		
		}

		$data = array(
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,
			'saldosimpananlalu' => $saldoSimpananlalu,
			'totalrekening' => $totalRekening,
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
		    'content' => 'backend/simpanan/datarekening/index',
		);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/sirkulasisimpanan.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('sirkulasisimpanan.pdf','D'); // it downloads the file into the user system, with give name
    
	}
	
    public function jatuhTempo(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu =1;
        $simpanan = $this->Simpanan_model->get_jatuh_tempo($start, $q, $f, $t);

        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedatenow = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        $datasimpanan = array();
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedatenow;}
        foreach ($simpanan as $key=>$item) {
            $sim_status = $this->statusSimpanan;
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $item->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $item->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $item->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            
            $tanggalDuedate = date("Y-m-d", strtotime($item->sim_tglpendaftaran.' + '.$jsi_id->jsi_simpanan.' Months'));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $item->wil_kode == $w)) {
                $datasimpanan[$key] = array('sim_kode' => $item->sim_kode,
                                        'ang_no' => $item->ang_no,
                                        'ang_nama' => $ang_no->ang_nama,
                                        'ang_alamat' => $ang_no->ang_alamat,
                                        'kar_nama' => $kar_kode->kar_nama ,
                                        'bus_bunga' => $bus_id->bus_bunga,
                                        'jsi_simpanan' => $jsi_id->jsi_simpanan,
                                        'jse_setoran' => $jse_id->jse_setoran ,
                                        'wil_nama' => $wil_kode->wil_nama,
                                        'wil_nama' => $wil_kode->wil_nama,
                                        'sim_tglpendaftaran' => $item->sim_tglpendaftaran ,
                                        'tanggalDuedate' => $tanggalDuedate,
                                        'statusSimpanan' => $this->statusSimpanan[$item->sim_status],
                                    );
            }
        }

        $data = array(
            'datasimpanan' => $datasimpanan,
            'simpanan_data' => $simpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,
        );
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/simpanan_jatuhtempo.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('jatuhtempo.pdf','D'); // it downloads the file into the user system, with give name
    
	}
	
    public function read($id) 
    {
        
        $row = $this->Simpanan_model->get_by_id($id);
        $setoran = $this->Setoransimpanan_model->get_data_setor($id);
        if ($row) {
            $sim_status = $this->statusSimpanan;
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $data = array(
        'setoran_data' => $setoran,
		'sim_kode' => $row->sim_kode,
		'ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'bus_id' => $bus_id->bus_bunga,
		'jsi_id' => $jsi_id->jsi_simpanan,
		'jse_id' => $jse_id->jse_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
        'sim_status' => $sim_status[$row->sim_status],
		'sim_tgl' => $row->sim_tgl,
		'sim_flag' => $row->sim_flag,
		'sim_info' => $row->sim_info,
		);
	}
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/simpanan_read.php',$data,true);
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

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */