<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setoransimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimpanan/index.html';
            $config['first_url'] = base_url() . 'setoransimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimpanan_model->total_rows($q);
        $setoransimpanan = $this->Setoransimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'setoransimpanan_data' => $setoransimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimpanan/setoransimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimpanan/index.html';
            $config['first_url'] = base_url() . 'setoransimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimpanan_model->total_rows($q);
        $setoransimpanan = $this->Setoransimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'setoransimpanan_data' => $setoransimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimpanan/setoransimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Setoransimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ssi_id' => $row->ssi_id,
		'sim_kode' => $row->sim_kode,
		'ssi_tglsetor' => $row->ssi_tglsetor,
		'ssi_jmlsetor' => $row->ssi_jmlsetor,
		//'ssi_jmlbunga' => $row->ssi_jmlbunga,
		'ssi_tgl' => $row->ssi_tgl,
		'ssi_flag' => $row->ssi_flag,
		'ssi_info' => $row->ssi_info,'content' => 'backend/setoransimpanan/setoransimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('setoransimpanan/create_action'),
	    'ssi_id' => set_value('ssi_id'),
        'sim_kode' => set_value('sim_kode'),
        'nm_sim_kode' => set_value('nm_sim_kode'),
	    'ssi_tglsetor' => set_value('ssi_tglsetor'),
	    'ssi_jmlsetor' => set_value('ssi_jmlsetor'),
	    //'ssi_jmlbunga' => set_value('ssi_jmlbunga'),
	    'content' => 'backend/setoransimpanan/setoransimpanan_form',
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
		'ssi_tglsetor' => $this->input->post('ssi_tglsetor',TRUE),
		'ssi_jmlsetor' => $this->input->post('ssi_jmlsetor',TRUE),
		//'ssi_jmlbunga' => $this->input->post('ssi_jmlbunga',TRUE),
		'ssi_tgl' => $this->tgl,
		'ssi_flag' => 0,
		'ssi_info' => "",
	    );

            $this->Setoransimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setoransimpanan/create'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setoransimpanan/update_action'),
		'ssi_id' => set_value('ssi_id', $row->ssi_id),
        'sim_kode' => set_value('sim_kode', $row->sim_kode),
        'nm_sim_kode' => set_value('nm_sim_kode', $row->sim_kode),
		'ssi_tglsetor' => set_value('ssi_tglsetor', $row->ssi_tglsetor),
		'ssi_jmlsetor' => set_value('ssi_jmlsetor', $row->ssi_jmlsetor),
		//'ssi_jmlbunga' => set_value('ssi_jmlbunga', $row->ssi_jmlbunga),
	    'content' => 'backend/setoransimpanan/setoransimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ssi_id', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ssi_tglsetor' => $this->input->post('ssi_tglsetor',TRUE),
		'ssi_jmlsetor' => $this->input->post('ssi_jmlsetor',TRUE),
		//'ssi_jmlbunga' => $this->input->post('ssi_jmlbunga',TRUE),
		'ssi_tgl' => $this->tgl,
		'ssi_flag' => 1,
	    );

            $this->Setoransimpanan_model->update($this->input->post('ssi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setoransimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'ssi_flag' => 2,
            );
            $this->Setoransimpanan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setoransimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('ssi_tglsetor', 'ssi tglsetor', 'trim|required');
	$this->form_validation->set_rules('ssi_jmlsetor', 'ssi jmlsetor', 'trim|required');

	$this->form_validation->set_rules('ssi_id', 'ssi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setoransimpanan.php */
/* Location: ./application/controllers/Setoransimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:19 */
/* http://harviacode.com */