<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawanijasah extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawanijasah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $karyawanijasah = $this->Karyawanijasah_model->get_limit_data( $start, $q);
        $data = array(
            'karyawanijasah_data' => $karyawanijasah,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawanijasah/karyawanijasah_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        $karyawanijasah = $this->Karyawanijasah_model->get_limit_data($start, $q);


        $data = array(
            'karyawanijasah_data' => $karyawanijasah,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawanijasah/karyawanijasah_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Karyawanijasah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kij_id' => $row->kij_id,
		'kar_kode' => $row->kar_kode,
		'kij_sd' => $row->kij_sd,
		'kij_smp' => $row->kij_smp,
		'kij_sma' => $row->kij_sma,
		'kij_d3' => $row->kij_d3,
		'kij_s1' => $row->kij_s1,
		'kij_s2' => $row->kij_s2,
		'kij_s3' => $row->kij_s3,
		'kij_lainlain' => $row->kij_lainlain,
		'kij_status' => $row->kij_status,
		'kij_tgl' => $row->kij_tgl,
		'kij_flag' => $row->kij_flag,
		'kij_info' => $row->kij_info,'content' => 'backend/karyawanijasah/karyawanijasah_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawanijasah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawanijasah/create_action'),
	    'kij_id' => set_value('kij_id'),
	    'kar_kode' => set_value('kar_kode'),
	    'kij_sd' => set_value('kij_sd'),
	    'kij_smp' => set_value('kij_smp'),
	    'kij_sma' => set_value('kij_sma'),
	    'kij_d3' => set_value('kij_d3'),
	    'kij_s1' => set_value('kij_s1'),
	    'kij_s2' => set_value('kij_s2'),
	    'kij_s3' => set_value('kij_s3'),
	    'kij_lainlain' => set_value('kij_lainlain'),
	    'kij_status' => set_value('kij_status'),
	    'content' => 'backend/karyawanijasah/karyawanijasah_form',
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
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'kij_sd' => $this->input->post('kij_sd',TRUE),
		'kij_smp' => $this->input->post('kij_smp',TRUE),
		'kij_sma' => $this->input->post('kij_sma',TRUE),
		'kij_d3' => $this->input->post('kij_d3',TRUE),
		'kij_s1' => $this->input->post('kij_s1',TRUE),
		'kij_s2' => $this->input->post('kij_s2',TRUE),
		'kij_s3' => $this->input->post('kij_s3',TRUE),
		'kij_lainlain' => $this->input->post('kij_lainlain',TRUE),
		'kij_status' => $this->input->post('kij_status',TRUE),
		'kij_tgl' => $this->tgl,
		'kij_flag' => 0,
		'kij_info' => "",
	    );

            $this->Karyawanijasah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawanijasah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Karyawanijasah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawanijasah/update_action'),
		'kij_id' => set_value('kij_id', $row->kij_id),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'kij_sd' => set_value('kij_sd', $row->kij_sd),
		'kij_smp' => set_value('kij_smp', $row->kij_smp),
		'kij_sma' => set_value('kij_sma', $row->kij_sma),
		'kij_d3' => set_value('kij_d3', $row->kij_d3),
		'kij_s1' => set_value('kij_s1', $row->kij_s1),
		'kij_s2' => set_value('kij_s2', $row->kij_s2),
		'kij_s3' => set_value('kij_s3', $row->kij_s3),
		'kij_lainlain' => set_value('kij_lainlain', $row->kij_lainlain),
		'kij_status' => set_value('kij_status', $row->kij_status),
	    'content' => 'backend/karyawanijasah/karyawanijasah_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawanijasah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kij_id', TRUE));
        } else {
            $data = array(
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'kij_sd' => $this->input->post('kij_sd',TRUE),
		'kij_smp' => $this->input->post('kij_smp',TRUE),
		'kij_sma' => $this->input->post('kij_sma',TRUE),
		'kij_d3' => $this->input->post('kij_d3',TRUE),
		'kij_s1' => $this->input->post('kij_s1',TRUE),
		'kij_s2' => $this->input->post('kij_s2',TRUE),
		'kij_s3' => $this->input->post('kij_s3',TRUE),
		'kij_lainlain' => $this->input->post('kij_lainlain',TRUE),
		'kij_status' => $this->input->post('kij_status',TRUE),
		'kij_flag' => 1,
	    );

            $this->Karyawanijasah_model->update($this->input->post('kij_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawanijasah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawanijasah_model->get_by_id($id);

        if ($row) {
            $data = array (
                'kij_flag' => 2,
            );
            $this->Karyawanijasah_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawanijasah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawanijasah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('kij_sd', 'kij sd', 'trim|required');
	$this->form_validation->set_rules('kij_smp', 'kij smp', 'trim|required');
	$this->form_validation->set_rules('kij_sma', 'kij sma', 'trim|required');
	$this->form_validation->set_rules('kij_d3', 'kij d3', 'trim|required');
	$this->form_validation->set_rules('kij_s1', 'kij s1', 'trim|required');
	$this->form_validation->set_rules('kij_s2', 'kij s2', 'trim|required');
	$this->form_validation->set_rules('kij_s3', 'kij s3', 'trim|required');
	$this->form_validation->set_rules('kij_lainlain', 'kij lainlain', 'trim|required');
	$this->form_validation->set_rules('kij_status', 'kij status', 'trim|required');

	$this->form_validation->set_rules('kij_id', 'kij_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawanijasah.php */
/* Location: ./application/controllers/Karyawanijasah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-20 04:41:21 */
/* http://harviacode.com */