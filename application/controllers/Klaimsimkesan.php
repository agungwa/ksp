<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klaimsimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klaimsimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'klaimsimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'klaimsimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'klaimsimkesan/index.html';
            $config['first_url'] = base_url() . 'klaimsimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Klaimsimkesan_model->total_rows($q);
        $klaimsimkesan = $this->Klaimsimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'klaimsimkesan_data' => $klaimsimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/klaimsimkesan/klaimsimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'klaimsimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'klaimsimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'klaimsimkesan/index.html';
            $config['first_url'] = base_url() . 'klaimsimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Klaimsimkesan_model->total_rows($q);
        $klaimsimkesan = $this->Klaimsimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'klaimsimkesan_data' => $klaimsimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/klaimsimkesan/klaimsimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Klaimsimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'ksi_id' => $row->ksi_id,
    		'sik_kode' => $row->sik_kode,
    		'jkl_id' => $row->jkl_id,
    		'ksi_tglklaim' => $row->ksi_tglklaim,
    		'ksi_jmlklaim' => $row->ksi_jmlklaim,
    		'ksi_jmltunggakan' => $row->ksi_jmltunggakan,
    		'ksi_jmlditerima' => $row->ksi_jmlditerima,
    		'ksi_status' => $row->ksi_status,
            'content' => 'backend/klaimsimkesan/klaimsimkesan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klaimsimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('klaimsimkesan/create_action'),
    	    'ksi_id' => set_value('ksi_id'),
    	    'sik_kode' => set_value('sik_kode'),
            'nm_sik_kode' => set_value('nm_sik_kode'),
    	    'jkl_id' => set_value('jkl_id'),
            'nm_jkl_id' => set_value('nm_jkl_id'),
    	    'ksi_tglklaim' => set_value('ksi_tglklaim'),
    	    'ksi_jmlklaim' => set_value('ksi_jmlklaim'),
    	    'ksi_jmltunggakan' => set_value('ksi_jmltunggakan'),
    	    'ksi_jmlditerima' => set_value('ksi_jmlditerima'),
    	    'ksi_status' => set_value('ksi_status'),
    	    'content' => 'backend/klaimsimkesan/klaimsimkesan_form',
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
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'jkl_id' => $this->input->post('jkl_id',TRUE),
    		'ksi_tglklaim' => $this->input->post('ksi_tglklaim',TRUE),
    		'ksi_jmlklaim' => $this->input->post('ksi_jmlklaim',TRUE),
    		'ksi_jmltunggakan' => $this->input->post('ksi_jmltunggakan',TRUE),
    		'ksi_jmlditerima' => $this->input->post('ksi_jmlditerima',TRUE),
    		'ksi_status' => $this->input->post('ksi_status',TRUE),
    		'ksi_tgl' => $this->tgl,
    		'ksi_flag' => 0,
    		'ksi_info' => "",
    	    );

            $this->Klaimsimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('klaimsimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Klaimsimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klaimsimkesan/update_action'),
        		'ksi_id' => set_value('ksi_id', $row->ksi_id),
        		'sik_kode' => set_value('sik_kode', $row->sik_kode),
                'nm_sik_kode' => set_value('sik_kode', $row->sik_kode),
        		'jkl_id' => set_value('jkl_id', $row->jkl_id),
                'nm_jkl_id' => set_value('jkl_id', $row->jkl_id),
        		'ksi_tglklaim' => set_value('ksi_tglklaim', $row->ksi_tglklaim),
        		'ksi_jmlklaim' => set_value('ksi_jmlklaim', $row->ksi_jmlklaim),
        		'ksi_jmltunggakan' => set_value('ksi_jmltunggakan', $row->ksi_jmltunggakan),
        		'ksi_jmlditerima' => set_value('ksi_jmlditerima', $row->ksi_jmlditerima),
        		'ksi_status' => set_value('ksi_status', $row->ksi_status),
        	    'content' => 'backend/klaimsimkesan/klaimsimkesan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klaimsimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ksi_id', TRUE));
        } else {
            $data = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'jkl_id' => $this->input->post('jkl_id',TRUE),
    		'ksi_tglklaim' => $this->input->post('ksi_tglklaim',TRUE),
    		'ksi_jmlklaim' => $this->input->post('ksi_jmlklaim',TRUE),
    		'ksi_jmltunggakan' => $this->input->post('ksi_jmltunggakan',TRUE),
    		'ksi_jmlditerima' => $this->input->post('ksi_jmlditerima',TRUE),
    		'ksi_status' => $this->input->post('ksi_status',TRUE),
    		'ksi_flag' => 1,
    	    );

            $this->Klaimsimkesan_model->update($this->input->post('ksi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klaimsimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Klaimsimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'ksi_flag' => 2,
            );

            $this->Klaimsimkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klaimsimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klaimsimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('jkl_id', 'jkl id', 'trim|required');
	$this->form_validation->set_rules('ksi_tglklaim', 'ksi tglklaim', 'trim|required');
	$this->form_validation->set_rules('ksi_jmlklaim', 'ksi jmlklaim', 'trim|required');
	$this->form_validation->set_rules('ksi_jmltunggakan', 'ksi jmltunggakan', 'trim|required');
	$this->form_validation->set_rules('ksi_jmlditerima', 'ksi jmlditerima', 'trim|required');
	$this->form_validation->set_rules('ksi_status', 'ksi status', 'trim|required');

	$this->form_validation->set_rules('ksi_id', 'ksi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Klaimsimkesan.php */
/* Location: ./application/controllers/Klaimsimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:18 */
/* http://harviacode.com */