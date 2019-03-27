<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisklaim extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisklaim_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisklaim/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisklaim/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisklaim/index.html';
            $config['first_url'] = base_url() . 'jenisklaim/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisklaim_model->total_rows($q);
        $jenisklaim = $this->Jenisklaim_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenisklaim_data' => $jenisklaim,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenisklaim/jenisklaim_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisklaim/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisklaim/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisklaim/index.html';
            $config['first_url'] = base_url() . 'jenisklaim/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisklaim_model->total_rows($q);
        $jenisklaim = $this->Jenisklaim_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenisklaim_data' => $jenisklaim,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenisklaim/jenisklaim_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenisklaim_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jkl_id' => $row->jkl_id,
		'jkl_keuntungan' => $row->jkl_keuntungan,
		'jkl_plan' => $row->jkl_plan,
		'jkl_tahunke' => $row->jkl_tahunke,
		'jkl_nominal' => $row->jkl_nominal,
		'jkl_keterangan' => $row->jkl_keterangan,
		'jkl_administrasi' => $row->jkl_administrasi,
		'jkl_tgl' => $row->jkl_tgl,
		'jkl_flag' => $row->jkl_flag,
		'jkl_info' => $row->jkl_info,'content' => 'backend/jenisklaim/jenisklaim_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisklaim'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisklaim/create_action'),
	    'jkl_id' => set_value('jkl_id'),
	    'jkl_keuntungan' => set_value('jkl_keuntungan'),
	    'jkl_plan' => set_value('jkl_plan'),
	    'jkl_tahunke' => set_value('jkl_tahunke'),
	    'jkl_nominal' => set_value('jkl_nominal'),
	    'jkl_keterangan' => set_value('jkl_keterangan'),
	    'jkl_administrasi' => set_value('jkl_administrasi'),
	    'jkl_tgl' => set_value('jkl_tgl'),
	    'jkl_flag' => set_value('jkl_flag'),
	    'jkl_info' => set_value('jkl_info'),
	    'content' => 'backend/jenisklaim/jenisklaim_form',
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
		'jkl_keuntungan' => $this->input->post('jkl_keuntungan',TRUE),
		'jkl_plan' => $this->input->post('jkl_plan',TRUE),
		'jkl_tahunke' => $this->input->post('jkl_tahunke',TRUE),
		'jkl_nominal' => $this->input->post('jkl_nominal',TRUE),
		'jkl_keterangan' => $this->input->post('jkl_keterangan',TRUE),
		'jkl_administrasi' => $this->input->post('jkl_administrasi',TRUE),
		'jkl_tgl' => $this->input->post('jkl_tgl',TRUE),
		'jkl_flag' => $this->input->post('jkl_flag',TRUE),
		'jkl_info' => $this->input->post('jkl_info',TRUE),
	    );

            $this->Jenisklaim_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisklaim'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisklaim_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisklaim/update_action'),
		'jkl_id' => set_value('jkl_id', $row->jkl_id),
		'jkl_keuntungan' => set_value('jkl_keuntungan', $row->jkl_keuntungan),
		'jkl_plan' => set_value('jkl_plan', $row->jkl_plan),
		'jkl_tahunke' => set_value('jkl_tahunke', $row->jkl_tahunke),
		'jkl_nominal' => set_value('jkl_nominal', $row->jkl_nominal),
		'jkl_keterangan' => set_value('jkl_keterangan', $row->jkl_keterangan),
		'jkl_administrasi' => set_value('jkl_administrasi', $row->jkl_administrasi),
		'jkl_tgl' => set_value('jkl_tgl', $row->jkl_tgl),
		'jkl_flag' => set_value('jkl_flag', $row->jkl_flag),
		'jkl_info' => set_value('jkl_info', $row->jkl_info),
	    'content' => 'backend/jenisklaim/jenisklaim_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisklaim'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jkl_id', TRUE));
        } else {
            $data = array(
		'jkl_keuntungan' => $this->input->post('jkl_keuntungan',TRUE),
		'jkl_plan' => $this->input->post('jkl_plan',TRUE),
		'jkl_tahunke' => $this->input->post('jkl_tahunke',TRUE),
		'jkl_nominal' => $this->input->post('jkl_nominal',TRUE),
		'jkl_keterangan' => $this->input->post('jkl_keterangan',TRUE),
		'jkl_administrasi' => $this->input->post('jkl_administrasi',TRUE),
		'jkl_tgl' => $this->input->post('jkl_tgl',TRUE),
		'jkl_flag' => $this->input->post('jkl_flag',TRUE),
		'jkl_info' => $this->input->post('jkl_info',TRUE),
	    );

            $this->Jenisklaim_model->update($this->input->post('jkl_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisklaim'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisklaim_model->get_by_id($id);

        if ($row) {
            $this->Jenisklaim_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisklaim'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisklaim'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jkl_keuntungan', 'jkl keuntungan', 'trim|required');
	$this->form_validation->set_rules('jkl_plan', 'jkl plan', 'trim|required');
	$this->form_validation->set_rules('jkl_tahunke', 'jkl tahunke', 'trim|required');
	$this->form_validation->set_rules('jkl_nominal', 'jkl nominal', 'trim|required');
	$this->form_validation->set_rules('jkl_keterangan', 'jkl keterangan', 'trim|required');
	$this->form_validation->set_rules('jkl_administrasi', 'jkl administrasi', 'trim|required');
	$this->form_validation->set_rules('jkl_tgl', 'jkl tgl', 'trim|required');
	$this->form_validation->set_rules('jkl_flag', 'jkl flag', 'trim|required');
	$this->form_validation->set_rules('jkl_info', 'jkl info', 'trim|required');

	$this->form_validation->set_rules('jkl_id', 'jkl_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenisklaim.php */
/* Location: ./application/controllers/Jenisklaim.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:44 */
/* http://harviacode.com */