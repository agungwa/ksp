<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Angsuran extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Angsuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
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

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'angsuran_data' => $angsuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/angsuran/angsuran_list',
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
		'ags_tgl' => $row->ags_tgl,
		'ags_flag' => $row->ags_flag,
		'ags_info' => $row->ags_info,'content' => 'backend/angsuran/angsuran_read',
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
            'button' => 'Create',
            'action' => site_url('angsuran/create_action'),
	    'ags_id' => set_value('ags_id'),
	    'pin_id' => set_value('pin_id'),
	    'ang_angsuranke' => set_value('ang_angsuranke'),
	    'ags_tgljatuhtempo' => set_value('ags_tgljatuhtempo'),
	    'ags_tglbayar' => set_value('ags_tglbayar'),
	    'ags_jmlpokok' => set_value('ags_jmlpokok'),
	    'ags_jmlbunga' => set_value('ags_jmlbunga'),
	    'ags_status' => set_value('ags_status'),
	    'ags_tgl' => set_value('ags_tgl'),
	    'ags_flag' => set_value('ags_flag'),
	    'ags_info' => set_value('ags_info'),
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
		'ags_tgl' => $this->input->post('ags_tgl',TRUE),
		'ags_flag' => $this->input->post('ags_flag',TRUE),
		'ags_info' => $this->input->post('ags_info',TRUE),
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
		'ang_angsuranke' => set_value('ang_angsuranke', $row->ang_angsuranke),
		'ags_tgljatuhtempo' => set_value('ags_tgljatuhtempo', $row->ags_tgljatuhtempo),
		'ags_tglbayar' => set_value('ags_tglbayar', $row->ags_tglbayar),
		'ags_jmlpokok' => set_value('ags_jmlpokok', $row->ags_jmlpokok),
		'ags_jmlbunga' => set_value('ags_jmlbunga', $row->ags_jmlbunga),
		'ags_status' => set_value('ags_status', $row->ags_status),
		'ags_tgl' => set_value('ags_tgl', $row->ags_tgl),
		'ags_flag' => set_value('ags_flag', $row->ags_flag),
		'ags_info' => set_value('ags_info', $row->ags_info),
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
		'ags_tgl' => $this->input->post('ags_tgl',TRUE),
		'ags_flag' => $this->input->post('ags_flag',TRUE),
		'ags_info' => $this->input->post('ags_info',TRUE),
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
            $this->Angsuran_model->delete($id);
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
	$this->form_validation->set_rules('ags_tgl', 'ags tgl', 'trim|required');
	$this->form_validation->set_rules('ags_flag', 'ags flag', 'trim|required');
	$this->form_validation->set_rules('ags_info', 'ags info', 'trim|required');

	$this->form_validation->set_rules('ags_id', 'ags_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Angsuran.php */
/* Location: ./application/controllers/Angsuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:41:40 */
/* http://harviacode.com */