<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Printsimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Anggota_model');
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
                'alamat_ang_no' => $ang_no->ang_alamat,
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
        
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	
        $setoransimpanan = $this->Setoransimpanan_model->get_listsetoran($f,$t,$w,0);
    
        $data = array(
            'setoransimpanan' => $setoransimpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'active' => 6,
            'content' => 'backend/simpanan/simpanan',
            'item' => 'setoransimpanan_list.php',
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
		
			//hitung saldo simpanan aktif kini
			$setoran = $this->Setoransimpanan_model->get_sirkulasi_simpanan($f,$t,$w,2);
			$saldoSimpanan += $setoran[0]->ssi_jmlsetor;
			
			//hitung saldo simpanan lalu
			$setorankini = $this->Setoransimpanan_model->get_sirkulasi_simpananall($f,$w);
			$saldoSimpananlalu += $setorankini[0]->ssi_jmlsetor;
			
			//hitung penarikan
			$simpananNon = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan($f,$t,$w,1);
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
			$totalRekeninglalu = $this->Simpanan_model->get_total_rekeninglalu($f,$w,0);
			//rekening simpanan kini
			$totalRekening = $this->Simpanan_model->get_total_rekening($f,$t,$w,0);
			//rekening simpanan keluar
			$totalRekeningkeluar = $this->Penarikansimpanan_model->get_total_rekening($f,$t,$w,1);

		$data = array(
			'totalrekeninglalu' => $totalRekeninglalu,
			'bungaditarik' => $bungaDitarik,
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
		'alamat_ang_no' => $ang_no->ang_alamat,
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
        $mpdf->Output('rincian.pdf','D'); // it downloads the file into the user system, with give name
		
        
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