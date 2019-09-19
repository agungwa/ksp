<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phu_sistem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Phu_sistem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $phu_sistem = $this->Phu_sistem_model->get_limit_data( $start, $q);


        $data = array(
            'phu_sistem_data' => $phu_sistem,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phu_sistem/phu_sistem_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        

        $phu_sistem = $this->Phu_sistem_model->get_limit_data( $start, $q);


        $data = array(
            'phu_sistem_data' => $phu_sistem,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phu_sistem/phu_sistem_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Phu_sistem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'psis_id' => $row->psis_id,
		'psis_pendapatan' => $row->psis_pendapatan,
		'psis_pengeluaran' => $row->psis_pengeluaran,
		'psis_tgl' => $row->psis_tgl,
		'psis_flag' => $row->psis_flag,
		'psis_info' => $row->psis_info,'content' => 'backend/phu_sistem/phu_sistem_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu_sistem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('phu_sistem/create_action'),
	    'psis_id' => set_value('psis_id'),
	    'psis_pendapatan' => set_value('psis_pendapatan'),
	    'psis_pengeluaran' => set_value('psis_pengeluaran'),
	    'content' => 'backend/phu_sistem/phu_sistem_form',
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
		'psis_pendapatan' => $this->input->post('psis_pendapatan',TRUE),
		'psis_pengeluaran' => $this->input->post('psis_pengeluaran',TRUE),
		'psis_tgl' => $this->tgl,
		'psis_flag' => 0,
		'psis_info' => "",
	    );

            $this->Phu_sistem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('phu_sistem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Phu_sistem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('phu_sistem/update_action'),
		'psis_id' => set_value('psis_id', $row->psis_id),
		'psis_pendapatan' => set_value('psis_pendapatan', $row->psis_pendapatan),
		'psis_pengeluaran' => set_value('psis_pengeluaran', $row->psis_pengeluaran),
	    'content' => 'backend/phu_sistem/phu_sistem_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu_sistem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('psis_id', TRUE));
        } else {
            $data = array(
		'psis_pendapatan' => $this->input->post('psis_pendapatan',TRUE),
		'psis_pengeluaran' => $this->input->post('psis_pengeluaran',TRUE),
		'psis_flag' => 1,
	    );

            $this->Phu_sistem_model->update($this->input->post('psis_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('phu_sistem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Phu_sistem_model->get_by_id($id);

        if ($row) {
            $data = array (
                'psis_flag' => 2,
            );
            $this->Phu_sistem_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('phu_sistem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu_sistem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('psis_pendapatan', 'psis pendapatan', 'trim|required');
	$this->form_validation->set_rules('psis_pengeluaran', 'psis pengeluaran', 'trim|required');

	$this->form_validation->set_rules('psis_id', 'psis_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Phu_sistem.php */
/* Location: ./application/controllers/Phu_sistem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-07 03:51:13 */
/* http://harviacode.com */