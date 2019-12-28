<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Angsuran extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Angsuran_model');
        $this->load->model('Angsuranbayar_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Pinjaman_model');
        $this->load->model('Jaminan_model');
        $this->load->model('Settingdenda_model');
        $this->load->model('Dendaangsuran_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->bayarAngsuranv2();
                break;
            case  2:
                $this->listAngsuran();
                break;
            case  3:
                $this->listDenda();
                break;
            case  4:
                $this->listpinjaman();
                break;
            case  5:
                $this->listAngsuranbayar();
                break;

            default:
                $this->listpinjaman();
                break;
        }
    }

    public function bayarAngsuran(){
        $q = urldecode($this->input->get('q', TRUE));        
        $k = urldecode($this->input->get('k', TRUE));
        $d = 3;
        $angsuran = null;
        $historiAngsuran = null;

        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        if ($k == null) { $k=1;}

        if ($q<>''){
            $pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktifcari($q);
            foreach ($pinjamanAktif as $key => $value) {
            $row = $this->Angsuran_model->get_by_pinjaman($value->pin_id, $k);
            $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($value->pin_id);
             if ($row) {
                 $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
                 $tgldenda = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$d.' days'));
                 $angsuran = array(
                    'tgldenda' => $tgldenda,
                    'ags_id' => $row->ags_id,
                    'pin_id' => $row->pin_id,
                    'ang_angsuranke' => $row->ang_angsuranke,
                    'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
                    'ags_tglbayar' => $row->ags_tglbayar,
                    'ags_jmlpokok' => $row->ags_jmlpokok,
                    'ags_jmlbunga' => $row->ags_jmlbunga,
                    'totalbayar' => $totalbayar,
                    'ags_jmlbayar' => $row->ags_jmlbayar,
                    'ags_status' => $row->ags_status,
                );
             }
            }
        }   

        $data = array(
            'settingdenda_data' => $settingdenda,
            'q' => $q,
            'k' => $k,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'bayar_angsuran.php',
            'active' => 1,
            'angsuran' => $angsuran,
            'histori' => $historiAngsuran
        );

        $this->load->view(layout(), $data);
    }

     //action bayar angsuran
     public function bayarAngsuran_action($id){
        $row = $this->Angsuran_model->get_by_id($id);
        if ($row) {
            $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
            $angsuran = array(
               'ags_id' => $row->ags_id,
               'pin_id' => $row->pin_id,
               'ang_angsuranke' => $row->ang_angsuranke,
               'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
               'ags_tglbayar' => $row->ags_tglbayar,
               'ags_jmlpokok' => $row->ags_jmlpokok,
               'ags_jmlbunga' => $row->ags_jmlbunga,
               'totalbayar' => $totalbayar,
               'ags_jmlbayar' => $row->ags_jmlbayar,
               'ags_status' => $row->ags_status,
           );
       }


            if ($row->ags_jmlbayar < 1){
                $z= $this->input->post('ags_jmlbayar',TRUE);
            } else if ($row->ags_jmlbayar > 1){
                $z= $row->ags_jmlbayar+$this->input->post('tambah',TRUE);
            }

       if ($z < $totalbayar){
           $status = 1;
       } else if ($z >= $totalbayar){
           $status = 2;
       }
        //var_dump($totalbayar);
        $dataAngsuran = array(
            'pin_id' => $this->input->post('pin_id',TRUE),
    		'ags_tglbayar' =>  $this->input->post('ags_tglbayar',TRUE),
            'ags_tgl' => $this->tgl,
    		'ags_jmlbayar' => $z,
    		'ags_status' => $status,
            );
        $this->Angsuran_model->update($this->input->post('ags_id', TRUE), $dataAngsuran);
        redirect(site_url('angsuran/?p=1&k='.$row->ang_angsuranke.'&q='.$row->pin_id.''));
    }

    public function histori_angsuran() {
        $q = urldecode($this->input->get('q', TRUE)); 
        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($q);
        $data = array(
            'settingdenda_data' => $settingdenda,
            'q' => $q,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'histori_angsuran.php',
            'active' => 4,
            'histori' => $historiAngsuran,
        );

        $this->load->view(layout(), $data);
    }


    public function bayarAngsuranv2(){
        $q = urldecode($this->input->get('q', TRUE));        
        $k = urldecode($this->input->get('k', TRUE));
        $d = 3;
        $denda = 0;
        $angsuran = null;
        $historiAngsuran = null;
        $angsuranbayar = array();
        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        if ($k == null) { $k=1;}

        if ($q<>''){
            $pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktifcari($q);
            foreach ($pinjamanAktif as $key => $value) {
            $row = $this->Angsuran_model->get_by_pinjaman($value->pin_id, $k);
            $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($value->pin_id);
             if ($row) {
                 $tgldenda = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$d.' days'));
                 $d=2;
                 $m=1;
                 $dataangsur = $this->Angsuranbayar_model->get_angsuran_bayarpin($row->ags_id);
                 $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
                 $dendajatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$d.' days'));
                 $nextjatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$m.' months'));
                 //$tglbayar = date("Y-m-d", strtotime($row->ags_tglbayar));
                             $tanggalnext = new DateTime($nextjatuhtempo); 
                             $tanggala = new DateTime($dendajatuhtempo); 
                             //$tanggala = new DateTime($tglbayar); 
                             $sekarang = new DateTime();
                             if ($this->tgl < $nextjatuhtempo ){
                             $perbedaan = $tanggala->diff($sekarang);
                             }else if ($this->tgl >= $nextjatuhtempo ){
                             $perbedaan = $tanggala->diff($tanggalnext);
                             }

                             if ($row->ags_jmlbayar < 1){
                                 $kurangsetor = $totalbayar; 
                             }else {
                                 $kurangsetor = $totalbayar-$row->ags_jmlbayar;
                             }
                             if ($kurangsetor < 0){
                                 $kurangsetor = 0;
                             }
                            // if ($this->tgl > $dendajatuhtempo && $row->ags_jmlbayar < $totalbayar ){
                               //  $denda = ($totalbayar * ($settingdenda->sed_denda/100))*$perbedaan->d;
                           //  } 
                              if ($row->ags_tglbayar > $dendajatuhtempo ){
                                $denda = ($totalbayar * ($settingdenda->sed_denda/100))*$perbedaan->d;
                             }
                             //var_dump($denda,$row->ags_tglbayar);
                         if ($row->ags_bayartunggakan <= 0) {
                                 $totalkekurangan = $kurangsetor + $denda;
                                 } else {
                                 $totalkekurangan = $kurangsetor + $row->ags_denda - $row->ags_bayartunggakan;
                                 }
                                 //var_dump($denda);
                 $angsuran = array(
                    'angsuranbayar' => $angsuranbayar,
                    'kurangsetor' => $kurangsetor,
                    'denda' => $denda,
                    'tgldenda' => $tgldenda,
                    'ags_id' => $row->ags_id,
                    'pin_id' => $row->pin_id,
                    'ang_angsuranke' => $row->ang_angsuranke,
                    'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
                    'ags_tglbayar' => $row->ags_tglbayar,
                    'ags_jmlpokok' => $row->ags_jmlpokok,
                    'ags_jmlbunga' => $row->ags_jmlbunga,
                    'totalbayar' => $totalbayar,
                    'ags_jmlbayar' => $row->ags_jmlbayar,
                    'ags_status' => $row->ags_status,
                );
             }
            }
        }   

        $data = array(
            'settingdenda_data' => $settingdenda,
            'q' => $q,
            'k' => $k,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'bayar_angsuranv2.php',
            'active' => 1,
            'angsuran' => $angsuran,
            'histori' => $historiAngsuran
        );

        $this->load->view(layout(), $data);
    }

    // masih perlu improve logic denda
    public function bayarAngsuranv2_action($id){
        //$totalbayar = 0;
        $dataangsur = $this->Angsuranbayar_model->get_angsuran_bayarpin($id);
        //$jmlbayar = $dataangsur->agb_pokok + $dataangsur->agb_bunga + $this->input->post('agb_pokok',TRUE) + $this->input->post('agb_bunga',TRUE);
        $row = $this->Angsuran_model->get_by_id($id);
        $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
        $inputbayar = $row->ags_jmlbayar + floatval($this->input->post('agb_pokok',TRUE)) + floatval($this->input->post('agb_bunga',TRUE)) + floatval($this->input->post('agb_denda',TRUE));
        if ($dataangsur == NULL){
            $pokok1 = 0; 
            $bunga1 = 0; 
            $denda1 = 0; 
        } else {
            $pokok1 = $dataangsur->{'agb_pokok'}; 
            $bunga1 = $dataangsur->{'agb_bunga'}; 
            $denda1 = $dataangsur->{'agb_denda'}; 
        }

        $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
        if ($row->ags_jmlbayar < 1){
            $nilaistatus = floatval($this->input->post('agb_pokok',TRUE)) + floatval($this->input->post('agb_bunga',TRUE));
            $totallunas = $row->ags_jmlpokok + $row->ags_jmlbunga;
        } else {
            $nilaistatus = $pokok1 + $bunga1 + floatval($this->input->post('agb_pokok',TRUE)) + floatval($this->input->post('agb_bunga',TRUE));
            $totallunas = $pokok1 + $bunga1;
        }
        
        
        if ($row->ags_jmlbayar < 1 ){
            $bayar = floatval($this->input->post('agb_pokok',TRUE)) + floatval($this->input->post('agb_bunga',TRUE)) + floatval($this->input->post('agb_denda',TRUE));
        } else if (ceiling($row->ags_jmlbayar,1000) < ceiling($totalbayar,1000)){          
            $bayar = floatval($this->input->post('agb_pokok',TRUE)) + floatval($this->input->post('agb_denda',TRUE));
        }
        //var_dump($inputbayar);
        if ($row->ags_jmlbayar < 1){
            $z= $bayar;
            $ags_tglbayar = $this->input->post('agb_tglbunga',TRUE);
        } else if ($row->ags_jmlbayar > 1){
            $ags_tglbayar = $row->ags_tglbayar;
            $z= $row->ags_jmlbayar+$bayar;
        }


        if ($pokok1 < 1){
            $pokok= $this->input->post('agb_pokok',TRUE);
            $tglpokok = NULL;
        } else if ($pokok1 > 1){
            $pokok= $dataangsur->{'agb_pokok'}+floatval($this->input->post('agb_pokok',TRUE));
            $tglpokok = $this->input->post('agb_tglpokok',TRUE);
        }

        
        if ($denda1 < 1){
            $denda= $this->input->post('agb_denda',TRUE);
            $tgldenda = NULL;
        } else if ($denda1 > 1){
            $denda= $dataangsur->{'agb_denda'}+floatval($this->input->post('agb_denda',TRUE));
            $tgldenda = $this->input->post('agb_tgldenda',TRUE);
        }
            
        if ($nilaistatus < $totalbayar){
            $status = 1;
            $tglstatus = null;
        } else {
            $status = 2;
            $tglstatus = $this->tgl;
        }
        
       $dataAngsuran = array(
           'pin_id' => $this->input->post('pin_id',TRUE),
           'ags_tglbayar' =>  $ags_tglbayar,
           'ags_tgl' => $this->tgl,
           'ags_jmlbayar' => $z,
           'ags_status' => $status,
           );

       $this->Angsuran_model->update($this->input->post('ags_id', TRUE), $dataAngsuran);
      
            $dataAngsuranbayar = array(
                'ags_id' => $id,
                'agb_pokok' =>  $this->input->post('agb_pokok',TRUE),
                'agb_tglpokok' => $tglpokok,
                'agb_bunga' => $this->input->post('agb_bunga',TRUE),
                'agb_tglbunga' => $this->input->post('agb_tglbunga',TRUE),
                'agb_denda' => $this->input->post('agb_denda',TRUE),
                'agb_tgldenda' => $tgldenda,
                'agb_status' => $status,
                'agb_tgllunas' => $tglstatus,
                'agb_tgl' => $this->tgl,
                'agb_flag' => 0,
                'agb_info' => "",
                );
            $this->Angsuranbayar_model->insert($dataAngsuranbayar);
        
        
      // var_dump($status,$nilaistatus,$this->input->post('agb_bunga',TRUE));
       redirect(site_url('angsuran/?p=1&k='.$row->ang_angsuranke.'&q='.$row->pin_id.''));
   }

    public function listpinjaman()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE));
        $s = urldecode($this->input->get('s', TRUE));
        $k = urldecode($this->input->get('k', TRUE));
        $u = urldecode($this->input->get('u', TRUE));
        $start = intval($this->input->get('start'));
        

        $pinjaman = $this->Pinjaman_model->get_limit_data( $start, $q);

        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $datapinjaman=array();
        foreach ($pinjaman as $key=>$item) {
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            if (
                ( $w=='all' && $s=='all' && $k=='all' && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k=='all' && $u=='all') || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k=='all' && $u=='all') || 
                ( $w=='all' && $s=='all' && $k==$item->pin_marketing && $u=='all') || 
                ( $w=='all' && $s=='all' && $k=='all' && $u==$item->pin_id) ||  
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k=='all' && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k==$item->pin_marketing && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k=='all' && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u=='all') || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k=='all' && $u==$item->pin_id) || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u=='all') || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k=='all' && $u==$item->pin_id) || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w=='all' && $s=='all' && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s=='all' && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u==$item->pin_id))
                {
                    $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $item->sea_id))->row();
                    $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $item->bup_id))->row();
                    $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $item->pop_id))->row();
                    $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $item->skp_id))->row();
                    $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
                    $marketing = $this->db->get_where('karyawan', array('kar_kode' => $item->pin_marketing))->row();
                    $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $item->pin_surveyor))->row();
                    $datapinjaman[$key] = array(
                        'pin_id' => $item->pin_id,
                        'ang_no' => $item->ang_no,
                        'nama_ang_no' => $ang_no->ang_nama,
                        'sea_id' => $sea_id->sea_tenor,
                        'bup_id' => $bup_id->bup_bunga,
                        'pop_id' => $pop_id->pop_potongan,
                        'wil_kode' => $wil_kode->wil_nama,
                        'skp_id' => $skp_id->skp_kategori,
                        'pin_pengajuan' => $item->pin_pengajuan,
                        'pin_pinjaman' => $item->pin_pinjaman,
                        'pin_tglpengajuan' => $item->pin_tglpengajuan,
                        'pin_tglpencairan' => $item->pin_tglpencairan,
                        'pin_marketing' => $marketing->kar_nama,
                        'pin_surveyor' => $surveyor->kar_nama,
                        'pin_survey' => $item->pin_survey,
                        'pin_statuspinjaman' => $this->statusPinjaman[$item->pin_statuspinjaman],

                    );
            }
        }
        

        $data = array(
            'datapinjaman' => $datapinjaman,
            'pinjaman_data' => $pinjaman,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'q' => $q,
            'start' => $start,
            'active' => 4,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'pinjaman_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function denda($id) {
        $settingdenda = $this->Settingdenda_model->get_by_id(1);        
        $row = $this->Angsuran_model->get_by_id($id);
        if ($row) {
            $d=2;
			$m=1;
            $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
            $dendajatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$d.' days'));
						$nextjatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$m.' months'));
						$tanggalnext = new DateTime($nextjatuhtempo); 
						$tanggala = new DateTime($dendajatuhtempo); 
						$sekarang = new DateTime();
						if ($this->tgl < $nextjatuhtempo){
						$perbedaan = $tanggala->diff($sekarang);
						}else if ($this->tgl >= $nextjatuhtempo){
						$perbedaan = $tanggala->diff($tanggalnext);
						}
						$totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
						if ($row->ags_jmlbayar < 1){
							$kurangsetor = $totalbayar; 
						}else {
							$kurangsetor = $totalbayar-$row->ags_jmlbayar;
						}
						if ($kurangsetor < 0){
							$kurangsetor = 0;
						}
						if ($this->tgl > $dendajatuhtempo && $row->ags_jmlbayar < $totalbayar && $row->ags_status < 2 ){
							$denda = ($kurangsetor * ($settingdenda->sed_denda/100))*$perbedaan->d;
                        }
                        if ($row->ags_bayartunggakan <= 0){
							$dd = $denda;
							} else { 
							$dd = $row->ags_denda;
                            }
                    if ($row->ags_bayartunggakan <= 0) {
                            $totalkekurangan = $kurangsetor + $denda;
                            } else {
                            $totalkekurangan = $kurangsetor + $row->ags_denda - $row->ags_bayartunggakan;
                            }
						
            $angsuran = array(
        'settingdenda_data' => $settingdenda,
               'ags_id' => $row->ags_id,
               'pin_id' => $row->pin_id,
               'ang_angsuranke' => $row->ang_angsuranke,
               'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
               'ags_tglbayar' => $row->ags_tglbayar,
               'ags_jmlpokok' => $row->ags_jmlpokok,
               'ags_jmlbunga' => $row->ags_jmlbunga,
               'totalbayar' => $totalbayar,
               'ags_jmlbayar' => $row->ags_jmlbayar,
               'ags_denda' => $row->ags_denda,
               'ags_bayartunggakan' => $row->ags_bayartunggakan,
               'denda' => $dd,
               'kurangsetor' => $kurangsetor,
               'totalkekurangan' => $totalkekurangan,
               'ags_status' => $row->ags_status,  
        'content' => 'backend/angsuran/denda',
           );
       }
       
       $this->load->view(
        layout(), $angsuran);

        
    }

    
    public function denda_action($id) {
        $settingdenda = $this->Settingdenda_model->get_by_id(1);        
        $row = $this->Angsuran_model->get_by_id($id);
       // var_dump($row);
        if ($row) {
            $angsuran = array(
        'settingdenda_data' => $settingdenda,
               'ags_id' => $row->ags_id,
               'pin_id' => $row->pin_id,
               'ang_angsuranke' => $row->ang_angsuranke,
               'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
               'ags_tglbayar' => $row->ags_tglbayar,
               'ags_jmlpokok' => $row->ags_jmlpokok,
               'ags_jmlbunga' => $row->ags_jmlbunga,
               'ags_jmlbayar' => $row->ags_jmlbayar,
               'ags_status' => $row->ags_status,
                
            );
            $d=2;
			$m=1;
            $totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
            $dendajatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$d.' days'));
						$nextjatuhtempo = date("Y-m-d", strtotime($row->ags_tgljatuhtempo.' + '.$m.' months'));
						$tanggalnext = new DateTime($nextjatuhtempo); 
						$tanggala = new DateTime($dendajatuhtempo); 
						$sekarang = new DateTime();
						if ($this->tgl < $nextjatuhtempo){
						$perbedaan = $tanggala->diff($sekarang);
						}else if ($this->tgl >= $nextjatuhtempo){
						$perbedaan = $tanggala->diff($tanggalnext);
						}
						$totalbayar = $row->ags_jmlpokok + $row->ags_jmlbunga;
						if ($row->ags_jmlbayar < 1){
							$kurangsetor = 0; 
						}else {
							$kurangsetor = $totalbayar-$row->ags_jmlbayar;
						}
						if ($kurangsetor < 0){
							$kurangsetor = 0;
						}
            if ($this->tgl > $dendajatuhtempo && $row->ags_jmlbayar < $totalbayar && $row->ags_status < 2 ){
                $denda = ($kurangsetor * ($settingdenda->sed_denda/100))*$perbedaan->d;
            }
            if ($row->ags_bayartunggakan <= 0){
                $dd = $denda;
                } else { 
                $dd = $row->ags_denda;
                }

            if ($row->ags_bayartunggakan <1){
                $z= $this->input->post('ags_bayartunggakan',TRUE);
            } else if ($row->ags_bayartunggakan > 0){
                $z= $row->ags_bayartunggakan+$this->input->post('tambah',TRUE);
            }
            if ($row->ags_bayartunggakan <= 0) {
                $totalkekurangan = $kurangsetor + $denda;
                } else {
                $totalkekurangan = $kurangsetor + $row->ags_denda - $z;
                }
            if ($row->ags_bayartunggakan > 0 && $totalkekurangan > 0) {
                $status = 1;
            } else {
                $status = 2;
            }
            //var_dump($status);
           // var_dump($totalkekurangan);
            $dataAngsuran = array(
                'ags_denda' => $this->input->post('ags_denda',TRUE),
                'ags_tglbayar' => $this->input->post('ags_tglbayar',TRUE),
                'ags_tgl' => $this->tgl,
                'ags_bayartunggakan' => $z,
                'ags_status' => $status,
                );
            $this->Angsuran_model->update($this->input->post('ags_id',TRUE), $dataAngsuran);
        
        redirect(site_url('angsuran/bayarAngsuran?q='.$row->pin_id));
    }
    }

    public function listAngsuran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $u = urldecode($this->input->get('u', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
        $start = intval($this->input->get('start'));
        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $angsuran = $this->Angsuran_model->get_angsuran_data($start, $q, $t);
        $dataangsuran = array();
        if ($t == null) { $t=$datetoday ;}
        foreach ($angsuran as $key=>$item) {
            $t = date("Y-m-d", strtotime($t));
            $jt = date("Y-m-d", strtotime($item->ags_tgljatuhtempo));
            if (
                ( $jt == $t && $u=='all') || 
                ( $jt == $t && $item->pin_id == $u)) {

                    $dataangsuran[$key] = array(
                        'ags_id' => $item->ags_id,
                        'pin_id' => $item->pin_id,
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
            'angsuran_data' => $angsuran,
            'q' => $q,
            'u' => $u,
            't' => $t,
            'start' => $start,
            'active' => 2,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'list_angsuran.php',
        );
        $this->load->view(layout(), $data);
    }
    
    public function listAngsuranbayar()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $u = urldecode($this->input->get('u', TRUE));
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE));
        $start = intval($this->input->get('start'));
        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $angsuran = $this->Angsuran_model->get_angsuran_bayarlist($start, $q, $t);

        $satu = 1;
        $n=1;
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

        $dataangsuran = array();
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($angsuran as $key=>$item) {
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));
            $jt = date("Y-m-d", strtotime($item->ags_tglbayar));
            if (
                ( $jt >= $f && $jt <= $t) || 
                ( $jt >= $f && $jt <= $t)) {

                    $dataangsuran[$key] = array(
                        'ags_id' => $item->ags_id,
                        'pin_id' => $item->pin_id,
                        'ang_angsuranke' => $item->ang_angsuranke,
                        'ags_tgljatuhtempo' => $item->ags_tgljatuhtempo,
                        'ags_tglbayar' => $item->ags_tglbayar,
                        'ags_jmlpokok' => $item->ags_jmlpokok,
                        'ags_jmlbunga' => $item->ags_jmlbunga,
                        'ags_jmlbayar' => $item->ags_jmlbayar,
                        'ags_bayartunggakan' => $item->ags_bayartunggakan,
                        'ags_status' => $this->statusAngsuran[$item->ags_status],
                    );
            }
        }

        $data = array(
            
            'dataangsuran' => $dataangsuran,
            'angsuran_data' => $angsuran,
            'q' => $q,
            'u' => $u,
            't' => $t,
            'f' => $f,
            'start' => $start,
            'active' => 5,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'list_angsuranbayar.php',
        );
        $this->load->view(layout(), $data);
    }


    public function listDenda(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dendaangsuran_model->total_rows($q);
        $dendaangsuran = $this->Dendaangsuran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dendaangsuran_data' => $dendaangsuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 3,
            'content' => 'backend/angsuran/angsuran',
            'item'=> 'list_denda.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'angsuran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'angsuran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'angsuran/index.html';
            $config['first_url'] = base_url() . 'angsuran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Angsuran_model->total_rows($q);
        $angsuran = $this->Angsuran_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'angsuran_data' => $angsuran,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/angsuran/angsuran_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Angsuran_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'ags_id' => $row->ags_id,
    		'pin_id' => $row->pin_id,
    		'ang_angsuranke' => $row->ang_angsuranke,
    		'ags_tgljatuhtempo' => $row->ags_tgljatuhtempo,
    		'ags_tglbayar' => $row->ags_tglbayar,
    		'ags_jmlpokok' => $row->ags_jmlpokok,
    		'ags_jmlbunga' => $row->ags_jmlbunga,
    		'ags_status' => $row->ags_status,
            'content' => 'backend/angsuran/angsuran_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('angsuran/create_action'),
    	    'ags_id' => set_value('ags_id'),
    	    'pin_id' => set_value('pin_id'),
            'nm_pin_id' => set_value('nm_pin_id'),
    	    'ang_angsuranke' => set_value('ang_angsuranke'),
    	    'ags_tgljatuhtempo' => set_value('ags_tgljatuhtempo'),
    	    'ags_tglbayar' => set_value('ags_tglbayar'),
    	    'ags_jmlpokok' => set_value('ags_jmlpokok'),
    	    'ags_jmlbunga' => set_value('ags_jmlbunga'),
    	    'ags_status' => set_value('ags_status'),
    	    'content' => 'backend/angsuran/angsuran_form',
    	);
        $this->load->view(layout(), $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'ang_angsuranke' => $this->input->post('ang_angsuranke',TRUE),
    		'ags_tgljatuhtempo' => $this->input->post('ags_tgljatuhtempo',TRUE),
    		'ags_tglbayar' => $this->input->post('ags_tglbayar',TRUE),
    		'ags_jmlpokok' => $this->input->post('ags_jmlpokok',TRUE),
    		'ags_jmlbunga' => $this->input->post('ags_jmlbunga',TRUE),
    		'ags_status' => $this->input->post('ags_status',TRUE),
    		'ags_tgl' => $this->tgl,
    		'ags_flag' => 0,
    		'ags_info' => "",
    	    );

            $this->Angsuran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('angsuran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Angsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('angsuran/update_action'),
        		'ags_id' => set_value('ags_id', $row->ags_id),
        		'pin_id' => set_value('pin_id', $row->pin_id),
                'nm_pin_id' => set_value('pin_id', $row->pin_id),
        		'ang_angsuranke' => set_value('ang_angsuranke', $row->ang_angsuranke),
        		'ags_tgljatuhtempo' => set_value('ags_tgljatuhtempo', $row->ags_tgljatuhtempo),
        		'ags_tglbayar' => set_value('ags_tglbayar', $row->ags_tglbayar),
        		'ags_jmlpokok' => set_value('ags_jmlpokok', $row->ags_jmlpokok),
        		'ags_jmlbunga' => set_value('ags_jmlbunga', $row->ags_jmlbunga),
        		'ags_status' => set_value('ags_status', $row->ags_status),
        	    'content' => 'backend/angsuran/angsuran_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ags_id', TRUE));
        } else {
            $data = array(
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'ang_angsuranke' => $this->input->post('ang_angsuranke',TRUE),
    		'ags_tgljatuhtempo' => $this->input->post('ags_tgljatuhtempo',TRUE),
    		'ags_tglbayar' => $this->input->post('ags_tglbayar',TRUE),
    		'ags_jmlpokok' => $this->input->post('ags_jmlpokok',TRUE),
    		'ags_jmlbunga' => $this->input->post('ags_jmlbunga',TRUE),
    		'ags_status' => $this->input->post('ags_status',TRUE),
    		'ags_flag' => 1,
    	    );

            $this->Angsuran_model->update($this->input->post('ags_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('angsuran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Angsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
            'ags_flag' => 2,
            );

            $this->Angsuran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('angsuran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('ang_angsuranke', 'ang angsuranke', 'trim|required');
	$this->form_validation->set_rules('ags_tgljatuhtempo', 'ags tgljatuhtempo', 'trim|required');
	$this->form_validation->set_rules('ags_tglbayar', 'ags tglbayar', 'trim|required');
	$this->form_validation->set_rules('ags_jmlpokok', 'ags jmlpokok', 'trim|required');
	$this->form_validation->set_rules('ags_jmlbunga', 'ags jmlbunga', 'trim|required');
	$this->form_validation->set_rules('ags_status', 'ags status', 'trim|required');

	$this->form_validation->set_rules('ags_id', 'ags_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Angsuran.php */
/* Location: ./application/controllers/Angsuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:41:40 */
/* http://harviacode.com */