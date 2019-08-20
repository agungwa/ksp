<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawansimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawansimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $karyawansimpanan = $this->Karyawansimpanan_model->get_limit_data( $start, $q);

        $data = array(
            'karyawansimpanan_data' => $karyawansimpanan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawansimpanan/karyawansimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        $karyawansimpanan = $this->Karyawansimpanan_model->get_limit_data($start, $q);


        $data = array(
            'karyawansimpanan_data' => $karyawansimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawansimpanan/karyawansimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Karyawansimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ksi_id' => $row->ksi_id,
		'kar_kode' => $row->kar_kode,
		'ksi_simpanan' => $row->ksi_simpanan,
		'ksi_status' => $row->ksi_status,
		'ksi_tgl' => $row->ksi_tgl,
		'ksi_flag' => $row->ksi_flag,
		'ksi_info' => $row->ksi_info,'content' => 'backend/karyawansimpanan/karyawansimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawansimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawansimpanan/create_action'),
	    'ksi_id' => set_value('ksi_id'),
	    'kar_kode' => set_value('kar_kode'),
	    'ksi_simpanan' => set_value('ksi_simpanan'),
	    'ksi_status' => set_value('ksi_status'),
	    'content' => 'backend/karyawansimpanan/karyawansimpanan_form',
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
		'ksi_simpanan' => $this->input->post('ksi_simpanan',TRUE),
		'ksi_status' => $this->input->post('ksi_status',TRUE),
		'ksi_tgl' => $this->tgl,
		'ksi_flag' => 0,
		'ksi_info' => "",
	    );

            $this->Karyawansimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawansimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Karyawansimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawansimpanan/update_action'),
		'ksi_id' => set_value('ksi_id', $row->ksi_id),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'ksi_simpanan' => set_value('ksi_simpanan', $row->ksi_simpanan),
		'ksi_status' => set_value('ksi_status', $row->ksi_status),
	    'content' => 'backend/karyawansimpanan/karyawansimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawansimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ksi_id', TRUE));
        } else {
            $data = array(
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'ksi_simpanan' => $this->input->post('ksi_simpanan',TRUE),
		'ksi_status' => $this->input->post('ksi_status',TRUE),
		'ksi_tgl' => $this->tgl,
		'ksi_flag' => 1,
		'ksi_info' => "",
	    );

            $this->Karyawansimpanan_model->update($this->input->post('ksi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawansimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawansimpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'ksi_flag' => 2,
            );
            $this->Karyawansimpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawansimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawansimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('ksi_simpanan', 'ksi simpanan', 'trim|required');
	$this->form_validation->set_rules('ksi_status', 'ksi status', 'trim|required');

	$this->form_validation->set_rules('ksi_id', 'ksi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawansimpanan.php */
/* Location: ./application/controllers/Karyawansimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-20 04:41:10 */
/* http://harviacode.com */