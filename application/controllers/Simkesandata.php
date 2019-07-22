<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simkesandata extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengkodean');
        $this->load->model('Simkesan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Plansimkesan_model');
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Jenispenarikansimkesan_model');
        $this->load->model('Jenisklaim_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->model('Ahliwarissimkesan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->simkesanlunas();
                break;
            /*case  2:
                $this->simkesanhangus();
                break;*/
            case  3:
                $this->simkesanmasaberakhir();
                break;
                    
            default:
                $this->simkesanlunas();
                break;
        }
    } 


    public function simkesanlunas()
    {
        $u = urldecode($this->input->get('u', TRUE)); //kode simkesan
        $p = urldecode($this->input->get('p', TRUE)); //plan simkesan
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $r = urldecode($this->input->get('r', TRUE)); //karyawan
        $start = intval($this->input->get('start'));
        
        $simkesan = $this->Simkesan_model->get_simkesan_lunas();
        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();
        $datasimkesan= array();
        foreach ($simkesan as $key=>$item) {
           
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $item->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            if (
                ( $p=='all' && $w=='all' && $r=='all' && $u=='all') || 
                ( $p=='all' && $w=='all' && $r=='all' && $item->sik_kode == $u) || 
            ( $item->psk_id == $p && $w=='all' && $r=='all' ) || 
            ( $item->psk_id == $p && $item->wil_kode == $w && $r=='all' ) || 
            ( $item->psk_id == $p && $w=='all' && $item->kar_kode == $r ) ||
            ( $p=='all' && $w=='all' && $item->kar_kode == $r ) ||
            ( $p=='all' && $item->wil_kode == $w && $item->kar_kode == $r ) ||
            ( $p=='all' && $item->wil_kode == $w && $r=='all' ) ||
            ($item->psk_id == $p && $item->wil_kode == $w && $item->kar_kode == $r  )) {

               $datasimkesan[$key] = array(
                'sik_kode' => $item->sik_kode,
                'ang_no' => $item->ang_no,
                'nm_ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'psk_id' => $psk_id->psk_plan,
                'setor_psk_id' => $psk_id->psk_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sik_tglpendaftaran' => $item->sik_tglpendaftaran,
                'sik_tglberakhir' => $item->sik_tglberakhir,
                'sik_status' => $this->statusSimkesan[$item->sik_status],
                'sik_tgl' => $item->sik_tgl,
                'sik_flag' => $item->sik_flag,
                'sik_info' => $item->sik_info,
                );
            }
        }
        
       // var_dump($datasimkesan);
        $data = array(
            'simkesan_data' => $simkesan,
            'datasimkesan' => $datasimkesan,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'plansimkesan_data' => $plansimkesan,
            'u' => $u,
            'w' => $w,
            'p' => $p,
            'r' => $r,
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'simkesandata/simkesanlunas.php',
            'active' => 1,
        );
        $this->load->view(layout(), $data);
    }

  /*  public function simkesanhangus()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $setoransimkesan = $this->Setoransimkesan_model->get_group_bysikkode($start, $q, $f, $t);

       
        $wilayah = $this->Wilayah_model->get_all();
        $datajatuh = array();
        foreach ($setoransimkesan as $key=>$item) {
            $sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $sik_kode->ang_no))->row();

            //$wil_kode = $sim_kode->wil_kode;
            $tanggalDuedate = $item->ssk_tglsetoran;
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all' ) || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $sik_kode->wil_kode == $w )) {
                $datajatuh[$key] = array(
                'ssk_id' => $item->ssk_id,
                'sik_kode' => $item->sik_kode,
                'nama_anggota' => $ang_no->ang_nama,
                'wil_kode' => $sik_kode->wil_kode,
                'ssk_tglsetoran' => $item->ssk_tglsetoran,
                'ssk_jmlsetor' => $item->ssk_jmlsetor,
                'ssk_tgl' => $item->ssk_tgl,
                'ssk_flag' => $item->ssk_flag,
                'ssk_info' => $item->ssk_info,
                );
            }
        }
        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'datajatuh' => $datajatuh,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,  
            'active' => 3,          
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'jatuhtempo/simkesan_jatuhtempo.php',
        );
        $this->load->view(layout(), $data);
    } */

    public function simkesanmasaberakhir()
    {
        $u = urldecode($this->input->get('u', TRUE)); //kode simkesan
        $p = urldecode($this->input->get('p', TRUE)); //plan simkesan
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $t = urldecode($this->input->get('r', TRUE)); //tanggal
        $start = intval($this->input->get('start'));
        
        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $simkesan = $this->Simkesan_model->get_simkesan_lunas();
        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();
        $datasimkesan= array();
        $tahun10=10;
        if ($t == null ) {$t=$datetoday;}
        foreach ($simkesan as $key=>$item) {
            
            $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
            $t = date("Y-m-d", strtotime($t));
           
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $item->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            if (
                ( $p=='all' && $w=='all' && $t==$tanggalDuedate) ||  
            ( $item->psk_id == $p && $w=='all' && $t==$tanggalDuedate ) || 
            ( $item->psk_id == $p && $item->wil_kode == $w && $t==$tanggalDuedate ) || 
            ( $p=='all' && $item->wil_kode == $w && $tanggalDuedate == $t )) {

               $datasimkesan[$key] = array(
                'sik_kode' => $item->sik_kode,
                'ang_no' => $item->ang_no,
                'nm_ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'psk_id' => $psk_id->psk_plan,
                'setor_psk_id' => $psk_id->psk_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sik_tglpendaftaran' => $item->sik_tglpendaftaran,
                'sik_tglberakhir' => $item->sik_tglberakhir,
                'sik_status' => $this->statusSimkesan[$item->sik_status],
                'sik_tgl' => $item->sik_tgl,
                'sik_flag' => $item->sik_flag,
                'sik_info' => $item->sik_info,
                );
            }
        }
        
       // var_dump($datasimkesan);
        $data = array(
            'simkesan_data' => $simkesan,
            'datasimkesan' => $datasimkesan,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'plansimkesan_data' => $plansimkesan,
            'u' => $u,
            'w' => $w,
            'p' => $p,
            'r' => $r,
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'simkesandata/simkesanlunas.php',
            'active' => 1,
        );
        $this->load->view(layout(), $data);
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('psk_id', 'psk id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('sik_tglpendaftaran', 'sik tglpendaftaran', 'trim|required');
	$this->form_validation->set_rules('sik_status', 'sik status', 'trim|required');
	$this->form_validation->set_rules('sik_kode', 'sik_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simkesan.php */
/* Location: ./application/controllers/Simkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:29 */
/* http://harviacode.com */