<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index.html';
            $config['first_url'] = base_url() . 'karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/karyawan/karyawan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index.html';
            $config['first_url'] = base_url() . 'karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'karyawan_data' => $karyawan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/karyawan/karyawan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kar_kode' => $row->kar_kode,
		'kar_nama' => $row->kar_nama,
		'jab_kode' => $row->jab_kode,
		'kar_alamat' => $row->kar_alamat,
		'kar_nohp' => $row->kar_nohp,
        'content' => 'backend/karyawan/karyawan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
    	    'kar_kode' => set_value('kar_kode'),
    	    'kar_nama' => set_value('kar_nama'),
    	    'jab_kode' => set_value('jab_kode'),
            'nm_jab_kode' => set_value('nm_jab_kode'),
    	    'kar_alamat' => set_value('kar_alamat'),
    	    'kar_nohp' => set_value('kar_nohp'),
    	    'kar_tgl' => set_value('kar_tgl'),
    	    'kar_flag' => set_value('kar_flag'),
    	    'kar_info' => set_value('kar_info'),
    	    'content' => 'backend/karyawan/karyawan_form',
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
    		'kar_nama' => $this->input->post('kar_nama',TRUE),
    		'jab_kode' => $this->input->post('jab_kode',TRUE),
    		'kar_alamat' => $this->input->post('kar_alamat',TRUE),
    		'kar_nohp' => $this->input->post('kar_nohp',TRUE),
    		'kar_tgl' => $this->tgl,
    		'kar_flag' => 0,
    		'kar_info' => "",
    	    );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
        		'kar_kode' => set_value('kar_kode', $row->kar_kode),
        		'kar_nama' => set_value('kar_nama', $row->kar_nama),
        		'jab_kode' => set_value('jab_kode', $row->jab_kode),
                'nm_jab_kode' => set_value('jab_kode', $row->jab_kode),
        		'kar_alamat' => set_value('kar_alamat', $row->kar_alamat),
        		'kar_nohp' => set_value('kar_nohp', $row->kar_nohp),
        	    'content' => 'backend/karyawan/karyawan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kar_kode', TRUE));
        } else {
            $data = array(
    		'kar_nama' => $this->input->post('kar_nama',TRUE),
    		'jab_kode' => $this->input->post('jab_kode',TRUE),
    		'kar_alamat' => $this->input->post('kar_alamat',TRUE),
    		'kar_nohp' => $this->input->post('kar_nohp',TRUE),
    		'kar_flag' => 1,
    	    );

            $this->Karyawan_model->update($this->input->post('kar_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'kar_flag' => 2,
            );

            $this->Karyawan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kar_nama', 'kar nama', 'trim|required');
	$this->form_validation->set_rules('jab_kode', 'jab kode', 'trim|required');
	$this->form_validation->set_rules('kar_alamat', 'kar alamat', 'trim|required');
	$this->form_validation->set_rules('kar_nohp', 'kar nohp', 'trim|required');

	$this->form_validation->set_rules('kar_kode', 'kar_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:04 */
/* http://harviacode.com */