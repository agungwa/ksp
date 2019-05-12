<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jabatan/index.html';
            $config['first_url'] = base_url() . 'jabatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jabatan_model->total_rows($q);
        $jabatan = $this->Jabatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jabatan_data' => $jabatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jabatan/jabatan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jabatan/index.html';
            $config['first_url'] = base_url() . 'jabatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jabatan_model->total_rows($q);
        $jabatan = $this->Jabatan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jabatan_data' => $jabatan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jabatan/jabatan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'jab_kode' => $row->jab_kode,
    		'jab_nama' => $row->jab_nama,
            'content' => 'backend/jabatan/jabatan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('jabatan/create_action'),
    	    'jab_kode' => set_value('jab_kode'),
    	    'jab_nama' => set_value('jab_nama'),
    	    'content' => 'backend/jabatan/jabatan_form',
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
            'jab_kode' => $this->input->post('jab_kode',TRUE),
    		'jab_nama' => $this->input->post('jab_nama',TRUE),
    		'jab_tgl' => $this->tgl,
    		'jab_flag' => 0,
    		'jab_info' => "",
    	    );

            $this->Jabatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jabatan/update_action'),
        		'jab_kode' => set_value('jab_kode', $row->jab_kode),
        		'jab_nama' => set_value('jab_nama', $row->jab_nama),
        	    'content' => 'backend/jabatan/jabatan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jab_kode', TRUE));
        } else {
            $data = array(
    		'jab_nama' => $this->input->post('jab_nama',TRUE),
    		'jab_flag' => 1,
    	    );

            $this->Jabatan_model->update($this->input->post('jab_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'jab_flag' => 2,
            );

            $this->Jabatan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jab_nama', 'jab nama', 'trim|required');

	$this->form_validation->set_rules('jab_kode', 'jab_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:48 */
/* http://harviacode.com */