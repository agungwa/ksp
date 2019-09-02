<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wilayah extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wilayah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $wilayah = $this->Wilayah_model->get_limit_data($start, $q);


        $data = array(
            'wilayah_data' => $wilayah,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/wilayah/wilayah_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q) .'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $wilayah = $this->Wilayah_model->get_limit_data($start, $q);


        $data = array(
            'wilayah_data' => $wilayah,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/wilayah/wilayah_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function asal()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q) .'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }
        $wilayah = $this->Wilayah_model->get_limit_data( $start, $q);


        $data = array(
            'wilayah_data' => $wilayah,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/wilayah/wilayah_asal',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function tujuan()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q) .'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $wilayah = $this->Wilayah_model->get_limit_data($start, $q);


        $data = array(
            'wilayah_data' => $wilayah,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/wilayah/wilayah_tujuan',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'wil_kode' => $row->wil_kode,
		'wil_nama' => $row->wil_nama,
		'wil_tgl' => $row->wil_tgl,
		'wil_flag' => $row->wil_flag,
		'wil_info' => $row->wil_info,'content' => 'backend/wilayah/wilayah_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
                'action' => site_url('wilayah/create_action'),
        	    'wil_kode' => set_value('wil_kode'),
        	    'wil_nama' => set_value('wil_nama'),
        	    'content' => 'backend/wilayah/wilayah_form',
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
    		'wil_nama' => $this->input->post('wil_nama',TRUE),
    		'wil_tgl' => $this->tgl,
    		'wil_flag' => 0,
    		'wil_info' => "",
    	    );

            $this->Wilayah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('wilayah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('wilayah/update_action'),
        		'wil_kode' => set_value('wil_kode', $row->wil_kode),
        		'wil_nama' => set_value('wil_nama', $row->wil_nama),
        	    'content' => 'backend/wilayah/wilayah_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('wil_kode', TRUE));
        } else {
            $data = array(
    		'wil_nama' => $this->input->post('wil_nama',TRUE),
    		'wil_flag' => 1,
    	    );

            $this->Wilayah_model->update($this->input->post('wil_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wilayah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
            'wil_flag' => 2,
            );

            $this->Wilayah_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wilayah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('wil_nama', 'wil nama', 'trim|required');

	$this->form_validation->set_rules('wil_kode', 'wil_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wilayah.php */
/* Location: ./application/controllers/Wilayah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:03:12 */
/* http://harviacode.com */