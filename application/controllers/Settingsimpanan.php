<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingsimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Settingsimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingsimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingsimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingsimpanan/index.html';
            $config['first_url'] = base_url() . 'settingsimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingsimpanan_model->total_rows($q);
        $settingsimpanan = $this->Settingsimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'settingsimpanan_data' => $settingsimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingsimpanan/settingsimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingsimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingsimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingsimpanan/index.html';
            $config['first_url'] = base_url() . 'settingsimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingsimpanan_model->total_rows($q);
        $settingsimpanan = $this->Settingsimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'settingsimpanan_data' => $settingsimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingsimpanan/settingsimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Settingsimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ses_id' => $row->ses_id,
		'ses_nama' => $row->ses_nama,
		'ses_min' => $row->ses_min,
		'ses_max' => $row->ses_max,
		'ses_tgl' => $row->ses_tgl,
		'ses_flag' => $row->ses_flag,
		'ses_info' => $row->ses_info,'content' => 'backend/settingsimpanan/settingsimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingsimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('settingsimpanan/create_action'),
	    'ses_id' => set_value('ses_id'),
	    'ses_nama' => set_value('ses_nama'),
	    'ses_min' => set_value('ses_min'),
	    'ses_max' => set_value('ses_max'),
	    'content' => 'backend/settingsimpanan/settingsimpanan_form',
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
		'ses_nama' => $this->input->post('ses_nama',TRUE),
		'ses_min' => $this->input->post('ses_min',TRUE),
		'ses_max' => $this->input->post('ses_max',TRUE),
		'ses_tgl' => $this->tgl,
		'ses_flag' => 0,
		'ses_info' => "",
	    );

            $this->Settingsimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('settingsimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Settingsimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('settingsimpanan/update_action'),
		'ses_id' => set_value('ses_id', $row->ses_id),
		'ses_nama' => set_value('ses_nama', $row->ses_nama),
		'ses_min' => set_value('ses_min', $row->ses_min),
		'ses_max' => set_value('ses_max', $row->ses_max),
	    'content' => 'backend/settingsimpanan/settingsimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingsimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ses_id', TRUE));
        } else {
            $data = array(
		'ses_nama' => $this->input->post('ses_nama',TRUE),
		'ses_min' => $this->input->post('ses_min',TRUE),
		'ses_max' => $this->input->post('ses_max',TRUE),
		'ses_flag' => 1,
	    );

            $this->Settingsimpanan_model->update($this->input->post('ses_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('settingsimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Settingsimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'ses_flag' => 2,
            );
            $this->Settingsimpanan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('settingsimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingsimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ses_nama', 'ses nama', 'trim|required');
	$this->form_validation->set_rules('ses_min', 'ses min', 'trim|required');
	$this->form_validation->set_rules('ses_max', 'ses max', 'trim|required');

	$this->form_validation->set_rules('ses_id', 'ses_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Settingsimpanan.php */
/* Location: ./application/controllers/Settingsimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:46 */
/* http://harviacode.com */