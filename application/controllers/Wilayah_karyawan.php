<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wilayah_karyawan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wilayah_karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wilayah_karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wilayah_karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wilayah_karyawan/index.html';
            $config['first_url'] = base_url() . 'wilayah_karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wilayah_karyawan_model->total_rows($q);
        $wilayah_karyawan = $this->Wilayah_karyawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wilayah_karyawan_data' => $wilayah_karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/wilayah_karyawan/wilayah_karyawan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wilayah_karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wilayah_karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wilayah_karyawan/index.html';
            $config['first_url'] = base_url() . 'wilayah_karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wilayah_karyawan_model->total_rows($q);
        $wilayah_karyawan = $this->Wilayah_karyawan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'wilayah_karyawan_data' => $wilayah_karyawan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/wilayah_karyawan/wilayah_karyawan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Wilayah_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'wik_id' => $row->wik_id,
    		'wil_kode' => $row->wil_kode,
    		'status' => $row->status,
    		'kar_kode' => $row->kar_kode,
            'content' => 'backend/wilayah_karyawan/wilayah_karyawan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah_karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('wilayah_karyawan/create_action'),
    	    'wik_id' => set_value('wik_id'),
    	    'wil_kode' => set_value('wil_kode'),
            'nm_wil_kode' => set_value('nm_wil_kode'),
    	    'status' => set_value('status'),
    	    'kar_kode' => set_value('kar_kode'),
            'nm_kar_kode' => set_value('nm_kar_kode'),
    	    'content' => 'backend/wilayah_karyawan/wilayah_karyawan_form',
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
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'status' => 'aktif',
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'wik_tgl' => $this->tgl,
    		'wik_flag' => 0,
    		'wik_info' => "",
    	    );

            $this->Wilayah_karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('wilayah_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wilayah_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('wilayah_karyawan/update_action'),
        		'wik_id' => set_value('wik_id', $row->wik_id),
        		'wil_kode' => set_value('wil_kode', $row->wil_kode),
                'nm_wil_kode' => set_value('wil_kode', $row->wil_kode),
        		'status' => set_value('status', $row->status),
        		'kar_kode' => set_value('kar_kode', $row->kar_kode),
                'nm_kar_kode' => set_value('kar_kode', $row->kar_kode),
        	    'content' => 'backend/wilayah_karyawan/wilayah_karyawan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('wik_id', TRUE));
        } else {
            $data = array(
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'status' => $this->input->post('status',TRUE),
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'wik_flag' => 1,
    	    );

            $this->Wilayah_karyawan_model->update($this->input->post('wik_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wilayah_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wilayah_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'wik_flag' => 2,
            );

            $this->Wilayah_karyawan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wilayah_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');

	$this->form_validation->set_rules('wik_id', 'wik_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wilayah_karyawan.php */
/* Location: ./application/controllers/Wilayah_karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-22 05:56:51 */
/* http://harviacode.com */