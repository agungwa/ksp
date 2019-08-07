<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Shu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $shu = $this->Shu_model->get_limit_data( $start, $q);

        $data = array(
            'shu_data' => $shu,
            'q' => $q,,
            'start' => $start,
            'content' => 'backend/shu/shu_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        $shu = $this->Shu_model->get_limit_data( $start, $q);


        $data = array(
            'shu_data' => $shu,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/shu/shu_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Shu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'shu_id' => $row->shu_id,
		'shu_pendapatan' => $row->shu_pendapatan,
		'shu_pengeluaran' => $row->shu_pengeluaran,
		'shu_jumlah' => $row->shu_jumlah,
		'shu_tanggal' => $row->shu_tanggal,
		'shu_tgl' => $row->shu_tgl,
		'shu_flag' => $row->shu_flag,
		'shu_info' => $row->shu_info,
		'phu_id' => $row->phu_id,
		'psis_id' => $row->psis_id,'content' => 'backend/shu/shu_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('shu/create_action'),
	    'shu_id' => set_value('shu_id'),
	    'shu_pendapatan' => set_value('shu_pendapatan'),
	    'shu_pengeluaran' => set_value('shu_pengeluaran'),
	    'shu_jumlah' => set_value('shu_jumlah'),
	    'shu_tanggal' => set_value('shu_tanggal'),
	    'phu_id' => set_value('phu_id'),
	    'psis_id' => set_value('psis_id'),
	    'content' => 'backend/shu/shu_form',
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
		'shu_pendapatan' => $this->input->post('shu_pendapatan',TRUE),
		'shu_pengeluaran' => $this->input->post('shu_pengeluaran',TRUE),
		'shu_jumlah' => $this->input->post('shu_jumlah',TRUE),
		'shu_tanggal' => $this->input->post('shu_tanggal',TRUE),
		'shu_tgl' => $this->tgl,
		'shu_flag' => 0,
		'shu_info' => "",
		'phu_id' => $this->input->post('phu_id',TRUE),
		'psis_id' => $this->input->post('psis_id',TRUE),
	    );

            $this->Shu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('shu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Shu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('shu/update_action'),
		'shu_id' => set_value('shu_id', $row->shu_id),
		'shu_pendapatan' => set_value('shu_pendapatan', $row->shu_pendapatan),
		'shu_pengeluaran' => set_value('shu_pengeluaran', $row->shu_pengeluaran),
		'shu_jumlah' => set_value('shu_jumlah', $row->shu_jumlah),
		'shu_tanggal' => set_value('shu_tanggal', $row->shu_tanggal),
		'phu_id' => set_value('phu_id', $row->phu_id),
		'psis_id' => set_value('psis_id', $row->psis_id),
	    'content' => 'backend/shu/shu_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('shu_id', TRUE));
        } else {
            $data = array(
		'shu_pendapatan' => $this->input->post('shu_pendapatan',TRUE),
		'shu_pengeluaran' => $this->input->post('shu_pengeluaran',TRUE),
		'shu_jumlah' => $this->input->post('shu_jumlah',TRUE),
		'shu_tanggal' => $this->input->post('shu_tanggal',TRUE),
		'shu_flag' => 1,
		'phu_id' => $this->input->post('phu_id',TRUE),
		'psis_id' => $this->input->post('psis_id',TRUE),
	    );

            $this->Shu_model->update($this->input->post('shu_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('shu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Shu_model->get_by_id($id);

        if ($row) {
            $data = array (
                'shu_flag' => 2,
            );
            $this->Shu_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('shu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('shu_pendapatan', 'shu pendapatan', 'trim|required');
	$this->form_validation->set_rules('shu_pengeluaran', 'shu pengeluaran', 'trim|required');
	$this->form_validation->set_rules('shu_jumlah', 'shu jumlah', 'trim|required');
	$this->form_validation->set_rules('shu_tanggal', 'shu tanggal', 'trim|required');
	$this->form_validation->set_rules('phu_id', 'phu id', 'trim|required');
	$this->form_validation->set_rules('psis_id', 'psis id', 'trim|required');

	$this->form_validation->set_rules('shu_id', 'shu_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Shu.php */
/* Location: ./application/controllers/Shu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-07 03:51:20 */
/* http://harviacode.com */