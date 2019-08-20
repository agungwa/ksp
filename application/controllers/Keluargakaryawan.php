<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keluargakaryawan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Keluargakaryawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $keluargakaryawan = $this->Keluargakaryawan_model->get_limit_data( $start, $q);

        $data = array(
            'keluargakaryawan_data' => $keluargakaryawan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/keluargakaryawan/keluargakaryawan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');

        $keluargakaryawan = $this->Keluargakaryawan_model->get_limit_data($start, $q);


        $data = array(
            'keluargakaryawan_data' => $keluargakaryawan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/keluargakaryawan/keluargakaryawan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Keluargakaryawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kka_id' => $row->kka_id,
		'kar_kode' => $row->kar_kode,
		'kka_nama' => $row->kka_nama,
		'kka_alamat' => $row->kka_alamat,
		'kka_nohp' => $row->kka_nohp,
		'kka_tgl' => $row->kka_tgl,
		'kka_flag' => $row->kka_flag,
		'kka_info' => $row->kka_info,'content' => 'backend/keluargakaryawan/keluargakaryawan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keluargakaryawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('keluargakaryawan/create_action'),
	    'kka_id' => set_value('kka_id'),
	    'kar_kode' => set_value('kar_kode'),
	    'kka_nama' => set_value('kka_nama'),
	    'kka_alamat' => set_value('kka_alamat'),
	    'kka_nohp' => set_value('kka_nohp'),
	    'content' => 'backend/keluargakaryawan/keluargakaryawan_form',
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
		'kka_nama' => $this->input->post('kka_nama',TRUE),
		'kka_alamat' => $this->input->post('kka_alamat',TRUE),
		'kka_nohp' => $this->input->post('kka_nohp',TRUE),
		'kka_tgl' => $this->tgl,
		'kka_flag' => 0,
		'kka_info' => "",
	    );

            $this->Keluargakaryawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('keluargakaryawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Keluargakaryawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('keluargakaryawan/update_action'),
		'kka_id' => set_value('kka_id', $row->kka_id),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'kka_nama' => set_value('kka_nama', $row->kka_nama),
		'kka_alamat' => set_value('kka_alamat', $row->kka_alamat),
		'kka_nohp' => set_value('kka_nohp', $row->kka_nohp),
	    'content' => 'backend/keluargakaryawan/keluargakaryawan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keluargakaryawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kka_id', TRUE));
        } else {
            $data = array(
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'kka_nama' => $this->input->post('kka_nama',TRUE),
		'kka_alamat' => $this->input->post('kka_alamat',TRUE),
		'kka_nohp' => $this->input->post('kka_nohp',TRUE),
		'kka_tgl' => $this->tgl,
		'kka_flag' => 1,
		'kka_info' => "",
	    );

            $this->Keluargakaryawan_model->update($this->input->post('kka_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('keluargakaryawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Keluargakaryawan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'kka_flag' => 2,
            );
            $this->Keluargakaryawan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('keluargakaryawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keluargakaryawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('kka_nama', 'kka nama', 'trim|required');
	$this->form_validation->set_rules('kka_alamat', 'kka alamat', 'trim|required');
	$this->form_validation->set_rules('kka_nohp', 'kka nohp', 'trim|required');
	$this->form_validation->set_rules('kka_tgl', 'kka tgl', 'trim|required');
	$this->form_validation->set_rules('kka_flag', 'kka flag', 'trim|required');
	$this->form_validation->set_rules('kka_info', 'kka info', 'trim|required');

	$this->form_validation->set_rules('kka_id', 'kka_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keluargakaryawan.php */
/* Location: ./application/controllers/Keluargakaryawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-20 04:41:04 */
/* http://harviacode.com */