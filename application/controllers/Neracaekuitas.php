<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neracaekuitas extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Neracaekuitas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $neracaekuitas = $this->Neracaekuitas_model->get_limit_data( $start, $q);

        $data = array(
            'neracaekuitas_data' => $neracaekuitas,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracaekuitas/neracaekuitas_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');

        $neracaekuitas = $this->Neracaekuitas_model->get_limit_data($start, $q);


        $data = array(
            'neracaekuitas_data' => $neracaekuitas,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/neracaekuitas/neracaekuitas_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Neracaekuitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nek_id' => $row->nek_id,
		'nek_tanggal' => $row->nek_tanggal,
		'nek_simpanancdr' => $row->nek_simpanancdr,
		'nek_donasi' => $row->nek_donasi,
		'nek_tgl' => $row->nek_tgl,
		'nek_flag' => $row->nek_flag,
		'nek_info' => $row->nek_info,'content' => 'backend/neracaekuitas/neracaekuitas_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaekuitas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('neracaekuitas/create_action'),
	    'nek_id' => set_value('nek_id'),
	    'nek_tanggal' => set_value('nek_tanggal'),
	    'nek_simpanancdr' => set_value('nek_simpanancdr'),
	    'nek_donasi' => set_value('nek_donasi'),
	    'content' => 'backend/neracaekuitas/neracaekuitas_form',
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
		'nek_id' => $this->input->post('nek_id',TRUE),
		'nek_tanggal' => $this->input->post('nek_tanggal',TRUE),
		'nek_simpanancdr' => $this->input->post('nek_simpanancdr',TRUE),
		'nek_donasi' => $this->input->post('nek_donasi',TRUE),
		'nek_tgl' => $this->tgl,
		'nek_flag' => 0,
		'nek_info' => "",
	    );

            $this->Neracaekuitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('neracaekuitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Neracaekuitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('neracaekuitas/update_action'),
		'nek_id' => set_value('nek_id', $row->nek_id),
		'nek_tanggal' => set_value('nek_tanggal', $row->nek_tanggal),
		'nek_simpanancdr' => set_value('nek_simpanancdr', $row->nek_simpanancdr),
		'nek_donasi' => set_value('nek_donasi', $row->nek_donasi),
	    'content' => 'backend/neracaekuitas/neracaekuitas_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaekuitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'nek_id' => $this->input->post('nek_id',TRUE),
		'nek_tanggal' => $this->input->post('nek_tanggal',TRUE),
		'nek_simpanancdr' => $this->input->post('nek_simpanancdr',TRUE),
		'nek_donasi' => $this->input->post('nek_donasi',TRUE),
		'nek_flag' => 1,
	    );

            $this->Neracaekuitas_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('neracaekuitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Neracaekuitas_model->get_by_id($id);

        if ($row) {
            $data = array (
                "nek_flag" => 2,
            );
            $this->Neracaekuitas_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('neracaekuitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaekuitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nek_tanggal', 'nek tanggal', 'trim|required');
	$this->form_validation->set_rules('nek_simpanancdr', 'nek simpanancdr', 'trim|required');
	$this->form_validation->set_rules('nek_donasi', 'nek donasi', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Neracaekuitas.php */
/* Location: ./application/controllers/Neracaekuitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-10 00:19:11 */
/* http://harviacode.com */