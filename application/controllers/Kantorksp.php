<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kantorksp extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kantorksp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $kantorksp = $this->Kantorksp_model->get_limit_data($start, $q);

        $data = array(
            'kantorksp_data' => $kantorksp,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/kantorksp/kantorksp_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        $kantorksp = $this->Kantorksp_model->get_limit_data( $start, $q);


        $data = array(
            'kantorksp_data' => $kantorksp,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/kantorksp/kantorksp_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Kantorksp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kks_id' => $row->kks_id,
		'kks_nama' => $row->kks_nama,
		'kks_alamat' => $row->kks_alamat,
		'kks_kode' => $row->kks_kode,
		'kks_flag' => $row->kks_flag,
		'kks_tgl' => $row->kks_tgl,
		'kks_info' => $row->kks_info,'content' => 'backend/kantorksp/kantorksp_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantorksp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kantorksp/create_action'),
	    'kks_id' => set_value('kks_id'),
	    'kks_nama' => set_value('kks_nama'),
	    'kks_alamat' => set_value('kks_alamat'),
	    'kks_kode' => set_value('kks_kode'),
	    'content' => 'backend/kantorksp/kantorksp_form',
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
		'kks_nama' => $this->input->post('kks_nama',TRUE),
		'kks_alamat' => $this->input->post('kks_alamat',TRUE),
		'kks_kode' => $this->input->post('kks_kode',TRUE),
		'kks_flag' => 0,
		'kks_tgl' => $this->tgl,
		'kks_info' => "",
	    );

            $this->Kantorksp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kantorksp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kantorksp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kantorksp/update_action'),
		'kks_id' => set_value('kks_id', $row->kks_id),
		'kks_nama' => set_value('kks_nama', $row->kks_nama),
		'kks_alamat' => set_value('kks_alamat', $row->kks_alamat),
		'kks_kode' => set_value('kks_kode', $row->kks_kode),
	    'content' => 'backend/kantorksp/kantorksp_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantorksp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kks_id', TRUE));
        } else {
            $data = array(
		'kks_nama' => $this->input->post('kks_nama',TRUE),
		'kks_alamat' => $this->input->post('kks_alamat',TRUE),
		'kks_kode' => $this->input->post('kks_kode',TRUE),
		'kks_flag' => 1,
	    );

            $this->Kantorksp_model->update($this->input->post('kks_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kantorksp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kantorksp_model->get_by_id($id);

        if ($row) {
            $data = array (
                'kks_flag' => 2,
            );
            $this->Kantorksp_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kantorksp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantorksp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kks_nama', 'kks nama', 'trim|required');
	$this->form_validation->set_rules('kks_alamat', 'kks alamat', 'trim|required');
	$this->form_validation->set_rules('kks_kode', 'kks kode', 'trim|required');

	$this->form_validation->set_rules('kks_id', 'kks_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kantorksp.php */
/* Location: ./application/controllers/Kantorksp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-01 15:59:59 */
/* http://harviacode.com */