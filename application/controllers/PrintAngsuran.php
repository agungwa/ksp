<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PrintAngsuran extends MY_Base
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
        );
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/angsuran/printangsuran/list_angsuran.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('angsuran.pdf','D'); // it downloads the file into the user system, with give name
    
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

    public function detailangsuran(){
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
                              if ($this->tgl > $dendajatuhtempo && $row->ags_status < 2 ){
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
            'content' => 'backend/angsuran/printangsuran/detailangsuran.php',
            'angsuran' => $angsuran,
            'histori' => $historiAngsuran
        );
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/angsuran/printangsuran/detailangsuran.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output("rincianangsuran$row->pin_id.pdf","D"); // it downloads the file into the user system, with give name
    

        $this->load->view(layout(), $data);
    }



}

/* End of file Angsuran.php */
/* Location: ./application/controllers/Angsuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:41:40 */
/* http://harviacode.com */