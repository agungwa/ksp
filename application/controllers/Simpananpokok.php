<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpananpokok extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpananpokok_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simpananpokok/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpananpokok/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpananpokok/index.html';
            $config['first_url'] = base_url() . 'simpananpokok/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpananpokok_model->total_rows($q);
        $simpananpokok = $this->Simpananpokok_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'simpananpokok_data' => $simpananpokok,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpananpokok/simpananpokok_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simpananpokok/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpananpokok/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpananpokok/index.html';
            $config['first_url'] = base_url() . 'simpananpokok/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpananpokok_model->total_rows($q);
        $simpananpokok = $this->Simpananpokok_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'simpananpokok_data' => $simpananpokok,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpananpokok/simpananpokok_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Simpananpokok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'sip_id' => $row->sip_id,
		'ang_no' => $row->ang_no,
		'ses_id' => $row->ses_id,
		'sip_tglbayar' => $row->sip_tglbayar,
		'sip_tgl' => $row->sip_tgl,
		'sip_flag' => $row->sip_flag,
		'sip_info' => $row->sip_info,'content' => 'backend/simpananpokok/simpananpokok_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananpokok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('simpananpokok/create_action'),
	    'sip_id' => set_value('sip_id'),
	    'ang_no' => set_value('ang_no'),
	    'ses_id' => set_value('ses_id'),
	    'sip_tglbayar' => set_value('sip_tglbayar'),
	    'sip_tgl' => set_value('sip_tgl'),
	    'sip_flag' => set_value('sip_flag'),
	    'sip_info' => set_value('sip_info'),
	    'content' => 'backend/simpananpokok/simpananpokok_form',
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
		'ses_id' => $this->input->post('ses_id',TRUE),
		'sip_tglbayar' => $this->input->post('sip_tglbayar',TRUE),
		'sip_tgl' => $this->input->post('sip_tgl',TRUE),
		'sip_flag' => $this->input->post('sip_flag',TRUE),
		'sip_info' => $this->input->post('sip_info',TRUE),
	    );

            $this->Simpananpokok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpananpokok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Simpananpokok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('simpananpokok/update_action'),
		'sip_id' => set_value('sip_id', $row->sip_id),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'ses_id' => set_value('ses_id', $row->ses_id),
		'sip_tglbayar' => set_value('sip_tglbayar', $row->sip_tglbayar),
		'sip_tgl' => set_value('sip_tgl', $row->sip_tgl),
		'sip_flag' => set_value('sip_flag', $row->sip_flag),
		'sip_info' => set_value('sip_info', $row->sip_info),
	    'content' => 'backend/simpananpokok/simpananpokok_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananpokok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sip_id', TRUE));
        } else {
            $data = array(
		'ang_no' => $this->input->post('ang_no',TRUE),
		'ses_id' => $this->input->post('ses_id',TRUE),
		'sip_tglbayar' => $this->input->post('sip_tglbayar',TRUE),
		'sip_tgl' => $this->input->post('sip_tgl',TRUE),
		'sip_flag' => $this->input->post('sip_flag',TRUE),
		'sip_info' => $this->input->post('sip_info',TRUE),
	    );

            $this->Simpananpokok_model->update($this->input->post('sip_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpananpokok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simpananpokok_model->get_by_id($id);

        if ($row) {
            $this->Simpananpokok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simpananpokok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananpokok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('ses_id', 'ses id', 'trim|required');
	$this->form_validation->set_rules('sip_tglbayar', 'sip tglbayar', 'trim|required');
	$this->form_validation->set_rules('sip_tgl', 'sip tgl', 'trim|required');
	$this->form_validation->set_rules('sip_flag', 'sip flag', 'trim|required');
	$this->form_validation->set_rules('sip_info', 'sip info', 'trim|required');

	$this->form_validation->set_rules('sip_id', 'sip_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpananpokok.php */
/* Location: ./application/controllers/Simpananpokok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:40 */
/* http://harviacode.com */