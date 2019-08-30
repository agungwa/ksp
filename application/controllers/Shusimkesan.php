<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shusimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Shusimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $shusimkesan = $this->Shusimkesan_model->get_limit_data($start, $q);

        $data = array(
            'shusimkesan_data' => $shusimkesan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/shusimkesan/shusimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
    

        $shusimkesan = $this->Shusimkesan_model->get_limit_data($start, $q);


        $data = array(
            'shusimkesan_data' => $shusimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/shusimkesan/shusimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Shusimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'shus_id' => $row->shus_id,
		'shus_pendapatan' => $row->shus_pendapatan,
		'shus_pengeluaran' => $row->shus_pengeluaran,
		'shus_jumlah' => $row->shus_jumlah,
		'shus_tgl' => $row->shus_tgl,
		'shus_flag' => $row->shus_flag,
		'shus_info' => $row->shus_info,'content' => 'backend/shusimkesan/shusimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shusimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('shusimkesan/create_action'),
	    'shus_id' => set_value('shus_id'),
	    'shus_pendapatan' => set_value('shus_pendapatan'),
	    'shus_pengeluaran' => set_value('shus_pengeluaran'),
	    'shus_jumlah' => set_value('shus_jumlah'),
	    'content' => 'backend/shusimkesan/shusimkesan_form',
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
		'shus_pendapatan' => $this->input->post('shus_pendapatan',TRUE),
		'shus_pengeluaran' => $this->input->post('shus_pengeluaran',TRUE),
		'shus_jumlah' => $this->input->post('shus_jumlah',TRUE),
		'shus_tgl' => $this->tgl,
		'shus_flag' => 0,
		'shus_info' => "",
	    );

            $this->Shusimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('shusimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Shusimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('shusimkesan/update_action'),
		'shus_id' => set_value('shus_id', $row->shus_id),
		'shus_pendapatan' => set_value('shus_pendapatan', $row->shus_pendapatan),
		'shus_pengeluaran' => set_value('shus_pengeluaran', $row->shus_pengeluaran),
		'shus_jumlah' => set_value('shus_jumlah', $row->shus_jumlah),
	    'content' => 'backend/shusimkesan/shusimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shusimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('shus_id', TRUE));
        } else {
            $data = array(
		'shus_pendapatan' => $this->input->post('shus_pendapatan',TRUE),
		'shus_pengeluaran' => $this->input->post('shus_pengeluaran',TRUE),
		'shus_jumlah' => $this->input->post('shus_jumlah',TRUE),
		'shus_flag' => 1,
	    );

            $this->Shusimkesan_model->update($this->input->post('shus_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('shusimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Shusimkesan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'shu_flag' => 2,
            );
            $this->Shusimkesan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('shusimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shusimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('shus_pendapatan', 'shus pendapatan', 'trim|required');
	$this->form_validation->set_rules('shus_pengeluaran', 'shus pengeluaran', 'trim|required');
	$this->form_validation->set_rules('shus_jumlah', 'shus jumlah', 'trim|required');

	$this->form_validation->set_rules('shus_id', 'shus_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Shusimkesan.php */
/* Location: ./application/controllers/Shusimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-30 15:41:04 */
/* http://harviacode.com */