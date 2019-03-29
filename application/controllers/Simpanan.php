<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
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

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'simpanan_data' => $simpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpanan/simpanan_list',
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
        if ($row) {
            $data = array(
		'sim_kode' => $row->sim_kode,
		'ang_no' => $row->ang_no,
		'kar_kode' => $row->kar_kode,
		'bus_id' => $row->bus_id,
		'jsi_id' => $row->jsi_id,
		'jse_id' => $row->jse_id,
		'wil_kode' => $row->wil_kode,
		'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
		'sim_status' => $row->sim_status,
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
            'button' => 'Create',
            'action' => site_url('simpanan/create_action'),
	    'sim_kode' => set_value('sim_kode'),
	    'ang_no' => set_value('ang_no'),
	    'kar_kode' => set_value('kar_kode'),
	    'bus_id' => set_value('bus_id'),
	    'jsi_id' => set_value('jsi_id'),
	    'jse_id' => set_value('jse_id'),
	    'wil_kode' => set_value('wil_kode'),
	    'sim_tglpendaftaran' => set_value('sim_tglpendaftaran'),
	    'sim_status' => set_value('sim_status'),
	    'sim_tgl' => set_value('sim_tgl'),
	    'sim_flag' => set_value('sim_flag'),
	    'sim_info' => set_value('sim_info'),
	    'content' => 'backend/simpanan/simpanan_form',
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
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => $this->input->post('bus_id',TRUE),
		'jsi_id' => $this->input->post('jsi_id',TRUE),
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => $this->input->post('sim_status',TRUE),
		'sim_tgl' => $this->input->post('sim_tgl',TRUE),
		'sim_flag' => $this->input->post('sim_flag',TRUE),
		'sim_info' => $this->input->post('sim_info',TRUE),
	    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        }
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
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'bus_id' => set_value('bus_id', $row->bus_id),
		'jsi_id' => set_value('jsi_id', $row->jsi_id),
		'jse_id' => set_value('jse_id', $row->jse_id),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'sim_tglpendaftaran' => set_value('sim_tglpendaftaran', $row->sim_tglpendaftaran),
		'sim_status' => set_value('sim_status', $row->sim_status),
		'sim_tgl' => set_value('sim_tgl', $row->sim_tgl),
		'sim_flag' => set_value('sim_flag', $row->sim_flag),
		'sim_info' => set_value('sim_info', $row->sim_info),
	    'content' => 'backend/simpanan/simpanan_form',
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
		'sim_tgl' => $this->input->post('sim_tgl',TRUE),
		'sim_flag' => $this->input->post('sim_flag',TRUE),
		'sim_info' => $this->input->post('sim_info',TRUE),
	    );

            $this->Simpanan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);

        if ($row) {
            $this->Simpanan_model->delete($id);
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
	$this->form_validation->set_rules('sim_status', 'sim status', 'trim|required');
	$this->form_validation->set_rules('sim_tgl', 'sim tgl', 'trim|required');
	$this->form_validation->set_rules('sim_flag', 'sim flag', 'trim|required');
	$this->form_validation->set_rules('sim_info', 'sim info', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */