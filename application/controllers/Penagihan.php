<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penagihan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Jaminan_model');
        $this->load->model('Penjamin_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->penagihanawal();
                break;
            case  2:
                $this->penagihanakhir();
                break;
                    
            default:
                $this->penagihanawal();
                break;
        }
    }
    public function penagihanawal(){

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
            'content' => 'backend/penagihan/penagihan',
            'item'=> 'penagihanawal.php',
            'active' => 1,
        );

        $this->load->view(layout(), $data);
    
    }

    public function penagihanakhir(){
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
            'content' => 'backend/penagihan/penagihan',
            'item'=> 'penagihanakhir.php',
            'active' => 2,
        );

        $this->load->view(layout(), $data);

    }

}