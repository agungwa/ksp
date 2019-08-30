<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neracakasbanksimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Neracakasbanksimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $neracakasbanksimkesan = $this->Neracakasbanksimkesan_model->get_limit_data($start, $q);

        $data = array(
            'neracakasbanksimkesan_data' => $neracakasbanksimkesan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakasbanksimkesan/neracakasbanksimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        

        $neracakasbanksimkesan = $this->Neracakasbanksimkesan_model->get_limit_data($start, $q);


        $data = array(
            'neracakasbanksimkesan_data' => $neracakasbanksimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakasbanksimkesan/neracakasbanksimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Neracakasbanksimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nkbs_id' => $row->nkbs_id,
		'nkbs_tanggal' => $row->nkbs_tanggal,
		'nkbs_jumlah' => $row->nkbs_jumlah,
		'nkbs_tgl' => $row->nkbs_tgl,
		'nkbs_flag' => $row->nkbs_flag,
		'nkbs_info' => $row->nkbs_info,'content' => 'backend/neracakasbanksimkesan/neracakasbanksimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbanksimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('neracakasbanksimkesan/create_action'),
	    'nkbs_id' => set_value('nkbs_id'),
	    'nkbs_tanggal' => set_value('nkbs_tanggal'),
	    'nkbs_jumlah' => set_value('nkbs_jumlah'),
	    'content' => 'backend/neracakasbanksimkesan/neracakasbanksimkesan_form',
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
		'nkbs_tanggal' => $this->input->post('nkbs_tanggal',TRUE),
		'nkbs_jumlah' => $this->input->post('nkbs_jumlah',TRUE),
		'nkbs_tgl' => $this->tgl,
		'nkbs_flag' => 0,
		'nkbs_info' => "",
	    );

            $this->Neracakasbanksimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('neracakasbanksimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Neracakasbanksimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('neracakasbanksimkesan/update_action'),
		'nkbs_id' => set_value('nkbs_id', $row->nkbs_id),
		'nkbs_tanggal' => set_value('nkbs_tanggal', $row->nkbs_tanggal),
		'nkbs_jumlah' => set_value('nkbs_jumlah', $row->nkbs_jumlah),
	    'content' => 'backend/neracakasbanksimkesan/neracakasbanksimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbanksimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nkbs_id', TRUE));
        } else {
            $data = array(
		'nkbs_tanggal' => $this->input->post('nkbs_tanggal',TRUE),
		'nkbs_jumlah' => $this->input->post('nkbs_jumlah',TRUE),
		'nkbs_tgl' => $this->tgl,
		'nkbs_flag' => 1,
		'nkbs_info' => "",
	    );

            $this->Neracakasbanksimkesan_model->update($this->input->post('nkbs_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('neracakasbanksimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Neracakasbanksimkesan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'nkbs_flag' => 2,
            );
            $this->Neracakasbanksimkesan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('neracakasbanksimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbanksimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nkbs_tanggal', 'nkbs tanggal', 'trim|required');
	$this->form_validation->set_rules('nkbs_jumlah', 'nkbs jumlah', 'trim|required');
	$this->form_validation->set_rules('nkbs_id', 'nkbs_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Neracakasbanksimkesan.php */
/* Location: ./application/controllers/Neracakasbanksimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-30 17:32:59 */
/* http://harviacode.com */