<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jasainvestasi extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jasainvestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jasainvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jasainvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jasainvestasi/index.html';
            $config['first_url'] = base_url() . 'jasainvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jasainvestasi_model->total_rows($q);
        $jasainvestasi = $this->Jasainvestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jasainvestasi_data' => $jasainvestasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jasainvestasi/jasainvestasi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jasainvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jasainvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jasainvestasi/index.html';
            $config['first_url'] = base_url() . 'jasainvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jasainvestasi_model->total_rows($q);
        $jasainvestasi = $this->Jasainvestasi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jasainvestasi_data' => $jasainvestasi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jasainvestasi/jasainvestasi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jasainvestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jiv_id' => $row->jiv_id,
		'jiv_jasa' => $row->jiv_jasa,
		'jiv_keterangan' => $row->jiv_keterangan,
		'jiv_tgl' => $row->jiv_tgl,
		'jiv_flag' => $row->jiv_flag,
		'jiv_info' => $row->jiv_info,'content' => 'backend/jasainvestasi/jasainvestasi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasainvestasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jasainvestasi/create_action'),
	    'jiv_id' => set_value('jiv_id'),
	    'jiv_jasa' => set_value('jiv_jasa'),
	    'jiv_keterangan' => set_value('jiv_keterangan'),
	    'jiv_tgl' => set_value('jiv_tgl'),
	    'jiv_flag' => set_value('jiv_flag'),
	    'jiv_info' => set_value('jiv_info'),
	    'content' => 'backend/jasainvestasi/jasainvestasi_form',
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
		'jiv_jasa' => $this->input->post('jiv_jasa',TRUE),
		'jiv_keterangan' => $this->input->post('jiv_keterangan',TRUE),
		'jiv_tgl' => $this->input->post('jiv_tgl',TRUE),
		'jiv_flag' => $this->input->post('jiv_flag',TRUE),
		'jiv_info' => $this->input->post('jiv_info',TRUE),
	    );

            $this->Jasainvestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jasainvestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jasainvestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jasainvestasi/update_action'),
		'jiv_id' => set_value('jiv_id', $row->jiv_id),
		'jiv_jasa' => set_value('jiv_jasa', $row->jiv_jasa),
		'jiv_keterangan' => set_value('jiv_keterangan', $row->jiv_keterangan),
		'jiv_tgl' => set_value('jiv_tgl', $row->jiv_tgl),
		'jiv_flag' => set_value('jiv_flag', $row->jiv_flag),
		'jiv_info' => set_value('jiv_info', $row->jiv_info),
	    'content' => 'backend/jasainvestasi/jasainvestasi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasainvestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jiv_id', TRUE));
        } else {
            $data = array(
		'jiv_jasa' => $this->input->post('jiv_jasa',TRUE),
		'jiv_keterangan' => $this->input->post('jiv_keterangan',TRUE),
		'jiv_tgl' => $this->input->post('jiv_tgl',TRUE),
		'jiv_flag' => $this->input->post('jiv_flag',TRUE),
		'jiv_info' => $this->input->post('jiv_info',TRUE),
	    );

            $this->Jasainvestasi_model->update($this->input->post('jiv_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jasainvestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jasainvestasi_model->get_by_id($id);

        if ($row) {
            $this->Jasainvestasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jasainvestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasainvestasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jiv_jasa', 'jiv jasa', 'trim|required');
	$this->form_validation->set_rules('jiv_keterangan', 'jiv keterangan', 'trim|required');
	$this->form_validation->set_rules('jiv_tgl', 'jiv tgl', 'trim|required');
	$this->form_validation->set_rules('jiv_flag', 'jiv flag', 'trim|required');
	$this->form_validation->set_rules('jiv_info', 'jiv info', 'trim|required');

	$this->form_validation->set_rules('jiv_id', 'jiv_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jasainvestasi.php */
/* Location: ./application/controllers/Jasainvestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:32 */
/* http://harviacode.com */