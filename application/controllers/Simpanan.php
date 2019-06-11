<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->simpanana();
                break;
            case  2:
                $this->simpananb();
                break;
            case  3:
                $this->listdata();
                break;
            case  4:
                $this->tariksimpanan();
                break;
            case  5:
                $this->setor();
                break;
                    
            default:
                $this->simpanana();
                break;
        }
    } 

    public function simpanana(){
        $nowYear = date('d');
        $data = array(
        'kode' => $this->Pengkodean->simpananana($nowYear),
        'content' => 'backend/simpanan/simpanan',
        'item'=> 'pendaftaran/simpanana.php',
        'active' => 1,
        );
        $this->load->view(layout(), $data);
    }

    public function simpananb(){
        $nowYear = date('d');
        $data = array(
        'kode' => $this->Pengkodean->simpanananb($nowYear),
        'content' => 'backend/simpanan/simpanan',
        'item'=> 'pendaftaran/simpananb.php',
        'active' => 2,
        );

        $this->load->view(layout(), $data);
    }

//setoranan Simpanan
    public function setor(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $setor = null;
        
        //data simpanan
        if ($q<>''){
            $sim_status = $this->statusSimpanan;
            $row = $this->Simpanan_model->get_by_id($q);
            $setoran = $this->Setoransimpanan_model->get_data_setor($q);
            if ($row) {    
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $setor = array(
                'setoran_data' => $setoran,
                'sim_kode' => $row->sim_kode,
                'ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'bus_id' => $bus_id->bus_bunga,
                'jsi_id' => $jsi_id->jsi_simpanan,
                'jse_id' => $jse_id->jse_setoran,
                'min_jse_id' => $jse_id->jse_min,
                'wil_kode' => $wil_kode->wil_nama,
                'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
                'sim_status' => $sim_status[$row->sim_status],
	    );
            }
        }

        $data = array(
            'content' => 'backend/simpanan/simpanan',
            'item'=> 'setoran/setoran.php',
            'q' => $q,
            'active' => 5,
            'setor' => $setor,
        );
        
    $this->load->view(layout(), $data);
    }

    public function setoran_action() 
    {
        //insert data setoran simpanan
        $dataSetoran = array(
            'sim_kode' => $this->input->post('sim_kode',TRUE),
            'ssi_tglsetor' => $this->tgl,
            'ssi_jmlsetor' => $this->input->post('ssi_jmlsetor',TRUE),
            'ssi_tgl' => $this->tgl,
            'ssi_flag' => 0,
            'ssi_info' => "",
            );
                $this->Setoransimpanan_model->insert($dataSetoran);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('simpanan/?p=5'));
        
    }

//Tarik Simpanan
    public function tariksimpanan(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $penarikan = null;
        
        //data simpanan
        if ($q<>''){
            $sim_status = $this->statusSimpanan;
            $row = $this->Simpanan_model->get_by_id($q);
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $setoran = $this->Setoransimpanan_model->get_data_setor($q);
            if ($row) {
                $penarikan = array(
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
	    );
            }
        }

        $data = array(
            'content' => 'backend/simpanan/simpanan',
            'item'=> 'penarikan/penarikan.php',
            'q' => $q,
            'active' => 4,
            'penarikan' => $penarikan,
        );
        
    $this->load->view(layout(), $data);
    }

    public function tariksimpanan_action() 
    {
        //update data simpanan
        $dataSimpanan = array(
            'sim_status' => 1,
            'sim_flag' => 1,
            );
        $this->Simpanan_model->update($this->input->post('sim_kode', TRUE), $dataSimpanan);
        //insert data tarik simpanan
        $dataPenarikan = array(
            'sim_kode' => $this->input->post('sim_kode',TRUE),
            'pes_tglpenarikan' => $this->tgl,
            'pes_jumlah' => $this->input->post('pes_jumlah',TRUE),
            'pes_tgl' => $this->tgl,
            'pes_flag' => 0,
            'pes_info' => "",
            );
                $this->Penarikansimpanan_model->insert($dataPenarikan);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('simpanan/?p=4'));
        
    }

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        /*if ($q <> '') {
            $config['base_url'] = base_url() . 'simpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpanan/index.html';
            $config['first_url'] = base_url() . 'simpanan/index.html';
        }*/

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpanan_model->total_rows($q);
        $simpanan = $this->Simpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $wilayah = $this->Wilayah_model->get_all();
        $data = array(
            'simpanan_data' => $simpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 3,
            'content' => 'backend/simpanan/simpanan',
            'item' => 'simpanan_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpanan/index.html';
            $config['first_url'] = base_url() . 'simpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpanan_model->total_rows($q);
        $simpanan = $this->Simpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'simpanan_data' => $simpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpanan/simpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
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
		'sim_info' => $row->sim_info,'content' => 'backend/simpanan/simpanan_read',
        );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('simpanan/create_action'),
	    'sim_kode' => set_value('sim_kode'),
        'ang_no' => set_value('ang_no'),
        'nm_ang_no' => set_value ('nm_ang_no'),
        'kar_kode' => set_value('kar_kode'),
        'nm_kar_kode' => set_value('nm_kar_kode'),
	    'bus_id' => set_value('bus_id'),
	    'nm_bus_id' => set_value('nm_bus_id'),
	    'jsi_id' => set_value('jsi_id'),
	    'nm_jsi_id' => set_value('nm_jsi_id'),
	    'jse_id' => set_value('jse_id'),
	    'nm_jse_id' => set_value('nm_jse_id'),
	    'wil_kode' => set_value('wil_kode'),
	    'nm_wil_kode' => set_value('nm_wil_kode'),
	    'sim_tglpendaftaran' => set_value('sim_tglpendaftaran'),
	    'sim_status' => set_value('sim_status'),
	    'content' => 'backend/simpanan/simpanan_form',
	);
        $this->load->view(layout(), $data);
    }
    
    public function simpanana_action() 
    {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => $this->input->post('bus_id',TRUE),
		'jsi_id' => 1,
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => $this->input->post('sim_status',TRUE),
		'sim_tgl' => $this->tgl,
		'sim_flag' => 0,
		'sim_info' => "",
	    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        
    }

    public function simpananb_action() 
    {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => $this->input->post('bus_id',TRUE),
		'jsi_id' => 2,
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => $this->input->post('sim_status',TRUE),
		'sim_tgl' => $this->tgl,
		'sim_flag' => 0,
		'sim_info' => "",
	    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('simpanan/update_action'),
		'sim_kode' => set_value('sim_kode', $row->sim_kode),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'nm_ang_no' => set_value('nm_ang_no', $row->ang_no),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'nm_kar_kode' => set_value('kar_kode', $row->kar_kode),
		'bus_id' => set_value('bus_id', $row->bus_id),
		'nm_bus_id' => set_value('bus_id', $row->bus_id),
		'jsi_id' => set_value('jsi_id', $row->jsi_id),
		'nm_jsi_id' => set_value('jsi_id', $row->jsi_id),
		'jse_id' => set_value('jse_id', $row->jse_id),
		'nm_jse_id' => set_value('jse_id', $row->jse_id),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'nm_wil_kode' => set_value('wil_kode', $row->wil_kode),
		'sim_status' => set_value('sim_status', $row->sim_status),
	    'content' => 'backend/simpanan/simpanan_form.php',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => $this->input->post('bus_id',TRUE),
		'jsi_id' => $this->input->post('jsi_id',TRUE),
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => $this->input->post('sim_status',TRUE),
		'sim_flag' => 1,
	    );

            $this->Simpanan_model->update($this->input->post('sim_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'sim_flag' => 2,
            );
            $this->Simpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('bus_id', 'bus id', 'trim|required');
	$this->form_validation->set_rules('jsi_id', 'jsi id', 'trim|required');
	$this->form_validation->set_rules('jse_id', 'jse id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('sim_tglpendaftaran', 'sim tglpendaftaran', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */