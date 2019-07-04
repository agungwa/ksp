<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Investasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->pendaftaran();
                break;
            case  2:
                $this->listdata();
                break;
            case  4:
                $this->tarikinvestasi();
                break;
                    
            default:
                $this->pendaftaran();
                break;
        }
    } 

    //pendaftaran investasi
    public function pendaftaran(){
        $nowYear = date('d');
        $data = array(
            'kode' => $this->Pengkodean->investasiberjangka($nowYear),
            'content' => 'backend/investasiberjangka/investasiberjangka',
            'item'=> 'pendaftaran/pendaftaran.php',
            'active' => 1,
        );

        $this->load->view(layout(), $data);
    }

     //action pendaftaran investasi
     public function pendaftaran_action() 
     {
             $dataPenfataran = array(
                'ivb_kode' => $this->input->post('ivb_kode',TRUE),
                'ang_no' => $this->input->post('ang_no',TRUE),
                'kar_kode' => $this->input->post('kar_kode',TRUE),
                'wil_kode' => $this->input->post('wil_kode',TRUE),
                'jwi_id' => $this->input->post('jwi_id',TRUE),
                'jiv_id' => $this->input->post('jiv_id',TRUE),
                'biv_id' => $this->input->post('biv_id',TRUE),
                'ivb_jumlah' => $this->input->post('ivb_jumlah',TRUE),
                'ivb_tglpendaftaran' => $this->input->post('ivb_tglpendaftaran',TRUE),
                //'ivb_tglperpanjangan' => $this->input->post('ivb_tglperpanjangan',TRUE),
                'ivb_status' => 0,
                'ivb_tgl' => $this->tgl,
                'ivb_flag' => 0,
                'ivb_info' => ""
                 );
             $this->Investasiberjangka_model->insert($dataPenfataran);
             $this->session->set_flashdata('message', 'Create Record Success');
             redirect(site_url('investasiberjangka'));
    }


    //list tarik atau tutup investasi
    public function tarikinvestasi(){
            {
                $q = urldecode($this->input->get('q', TRUE));
                $start = intval($this->input->get('start'));
        
                $config['per_page'] = 10;
                $config['page_query_string'] = TRUE;
                $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
                $investasiberjangka = $this->Investasiberjangka_model->get_limit_data($config['per_page'], $start, $q);
        
                $this->load->library('pagination');
                $this->pagination->initialize($config);
                
                $wilayah = $this->Wilayah_model->get_all();
        
                $data = array(
                    'wilayah_data' => $wilayah,
                    'investasiberjangka_data' => $investasiberjangka,
                    'q' => $q,
                    'pagination' => $this->pagination->create_links(),
                    'total_rows' => $config['total_rows'],
                    'start' => $start,
                    'content' => 'backend/investasiberjangka/investasiberjangka',
                    'item'=> 'tarikinvestasi/tarikinvestasi.php',
                    'active' => 4,
                    );
                $this->load->view(layout(), $data);
            }
    
            $this->load->view(layout(), $data);
        }

    //tarik atau tutup investasi berjangka
    public function tarik() 
    {
        $q = urldecode($this->input->get('q', TRUE));
        $tarik = null;

        if ($q<>''){
                $row = $this->Investasiberjangka_model->get_by_id($q);
                $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_data_ivb($q);
                //var_dump($penarikaninvestasiberjangka);               
                if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

                $tarik = array(
                    'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
                    'ivb_kode' => $row->ivb_kode,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
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
                }
            }
            $data = array(
                'content' => 'backend/investasiberjangka/investasiberjangka',
                'item'=> 'tarikinvestasi/tarik.php',
                'q' => $q,
                'active' => 5,
                'tarik' => $tarik,
            );
            $this->load->view(
            layout(), $data);
        }

    //tutup investasi action
    public function tarik_action(){
        //update data investasi
        $dataInvestasi = array(
            'ivb_status' => 1,
            );
        $this->Investasiberjangka_model->update($this->input->post('ivb_kode', TRUE), $dataInvestasi);
        redirect(site_url('investasiberjangka/?p=4'));
    }

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
       /* if ($q <> '') {
            $config['base_url'] = base_url() . 'investasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'investasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'investasiberjangka/index.html';
            $config['first_url'] = base_url() . 'investasiberjangka/index.html';
        } */

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
        $investasiberjangka = $this->Investasiberjangka_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $wilayah = $this->Wilayah_model->get_all();

        $data = array(
            'wilayah_data' => $wilayah,
            'investasiberjangka_data' => $investasiberjangka,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 2,
            'content' => 'backend/investasiberjangka/investasiberjangka',
            'item' => 'investasiberjangka_list.php'
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'investasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'investasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'investasiberjangka/index.html';
            $config['first_url'] = base_url() . 'investasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
        $investasiberjangka = $this->Investasiberjangka_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'investasiberjangka_data' => $investasiberjangka,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/investasiberjangka/investasiberjangka_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

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
		'ivb_info' => $row->ivb_info,'content' => 'backend/investasiberjangka/investasiberjangka_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasiberjangka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('investasiberjangka/create_action'),
	    'ivb_kode' => set_value('ivb_kode'),
	    'ang_no' => set_value('ang_no'),
	    'nm_ang_no' => set_value('nm_ang_no'),
	    'kar_kode' => set_value('kar_kode'),
	    'nm_kar_kode' => set_value('nm_kar_kode'),
	    'wil_kode' => set_value('wil_kode'),
        'nm_wil_kode' => set_value('nm_wil_kode'),
	    'jwi_id' => set_value('jwi_id'),
	    'nm_jwi_id' => set_value('nm_jwi_id'),
	    'jiv_id' => set_value('jiv_id'),
	    'nm_jiv_id' => set_value('nm_jiv_id'),
	    'biv_id' => set_value('biv_id'),
	    'nm_biv_id' => set_value('nm_biv_id'),
	    'ivb_tglpendaftaran' => set_value('ivb_tglpendaftaran'),
	    'ivb_tglperpanjangan' => set_value('ivb_tglperpanjangan'),
	    'ivb_status' => set_value('ivb_status'),
	    'content' => 'backend/investasiberjangka/investasiberjangka_form',
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
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'jwi_id' => $this->input->post('jwi_id',TRUE),
		'jiv_id' => $this->input->post('jiv_id',TRUE),
		'biv_id' => $this->input->post('biv_id',TRUE),
		'ivb_tglpendaftaran' => $this->input->post('ivb_tglpendaftaran',TRUE),
		'ivb_tglperpanjangan' => $this->input->post('ivb_tglperpanjangan',TRUE),
		'ivb_status' => $this->input->post('ivb_status',TRUE),
		'ivb_tgl' => $this->tgl,
		'ivb_flag' => 0,
		'ivb_info' => "",
	    );

            $this->Investasiberjangka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('investasiberjangka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Investasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('investasiberjangka/update_action'),
		'ivb_kode' => set_value('ivb_kode', $row->ivb_kode),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'nm_ang_no' => set_value('nm_ang_no', $row->ang_nama),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'nm_kar_kode' => set_value('nm_kar_kode', $row->kar_nama),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'nm_wil_kode' => set_value('nm_wil_kode', $row->wil_nama),
		'jwi_id' => set_value('jwi_id', $row->jwi_id),
		'nm_jwi_id' => set_value('nm_jwi_id', $row->jwi_jangkawaktu),
		'jiv_id' => set_value('jiv_id', $row->jiv_id),
		'nm_jiv_id' => set_value('nm_jiv_id', $row->jiv_jasa),
		'biv_id' => set_value('biv_id', $row->biv_id),
		'nm_biv_id' => set_value('nm_biv_id', $row->biv_bunga),
		'ivb_tglpendaftaran' => set_value('ivb_tglpendaftaran', $row->ivb_tglpendaftaran),
		'ivb_tglperpanjangan' => set_value('ivb_tglperpanjangan', $row->ivb_tglperpanjangan),
		'ivb_status' => set_value('ivb_status', $row->ivb_status),
	    'content' => 'backend/investasiberjangka/investasiberjangka_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasiberjangka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ivb_kode', TRUE));
        } else {
            $data = array(
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'jwi_id' => $this->input->post('jwi_id',TRUE),
		'jiv_id' => $this->input->post('jiv_id',TRUE),
		'biv_id' => $this->input->post('biv_id',TRUE),
		'ivb_tglpendaftaran' => $this->input->post('ivb_tglpendaftaran',TRUE),
		'ivb_tglperpanjangan' => $this->input->post('ivb_tglperpanjangan',TRUE),
		'ivb_status' => $this->input->post('ivb_status',TRUE),
		'ivb_flag' => 1,
	    );

            $this->Investasiberjangka_model->update($this->input->post('ivb_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('investasiberjangka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Investasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array (
                'ivb_flag' => 2,
            );
            $this->Investasiberjangka_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('investasiberjangka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasiberjangka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('jwi_id', 'jwi id', 'trim|required');
	$this->form_validation->set_rules('jiv_id', 'jiv id', 'trim|required');
	$this->form_validation->set_rules('biv_id', 'biv id', 'trim|required');
	$this->form_validation->set_rules('ivb_tglpendaftaran', 'ivb tglpendaftaran', 'trim|required');
	$this->form_validation->set_rules('ivb_tglperpanjangan', 'ivb tglperpanjangan', 'trim|required');
	$this->form_validation->set_rules('ivb_kode', 'ivb_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Investasiberjangka.php */
/* Location: ./application/controllers/Investasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:37 */
/* http://harviacode.com */