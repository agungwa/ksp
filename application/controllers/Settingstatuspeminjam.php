<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingstatuspeminjam extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Settingstatuspeminjam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingstatuspeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingstatuspeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingstatuspeminjam/index.html';
            $config['first_url'] = base_url() . 'settingstatuspeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingstatuspeminjam_model->total_rows($q);
        $settingstatuspeminjam = $this->Settingstatuspeminjam_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'settingstatuspeminjam_data' => $settingstatuspeminjam,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingstatuspeminjam/settingstatuspeminjam_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingstatuspeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingstatuspeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingstatuspeminjam/index.html';
            $config['first_url'] = base_url() . 'settingstatuspeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingstatuspeminjam_model->total_rows($q);
        $settingstatuspeminjam = $this->Settingstatuspeminjam_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'settingstatuspeminjam_data' => $settingstatuspeminjam,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingstatuspeminjam/settingstatuspeminjam_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Settingstatuspeminjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ssp_id' => $row->ssp_id,
		'ssp_namastatus' => $row->ssp_namastatus,
		'ssp_tgl' => $row->ssp_tgl,
		'ssp_flag' => $row->ssp_flag,
		'ssp_info' => $row->ssp_info,'content' => 'backend/settingstatuspeminjam/settingstatuspeminjam_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingstatuspeminjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('settingstatuspeminjam/create_action'),
	    'ssp_id' => set_value('ssp_id'),
	    'ssp_namastatus' => set_value('ssp_namastatus'),
	    'content' => 'backend/settingstatuspeminjam/settingstatuspeminjam_form',
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
		'ssp_namastatus' => $this->input->post('ssp_namastatus',TRUE),
		'ssp_tgl' => $this->tgl,
		'ssp_flag' => 0,
		'ssp_info' => "",
	    );

            $this->Settingstatuspeminjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('settingstatuspeminjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Settingstatuspeminjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('settingstatuspeminjam/update_action'),
		'ssp_id' => set_value('ssp_id', $row->ssp_id),
		'ssp_namastatus' => set_value('ssp_namastatus', $row->ssp_namastatus),
	    'content' => 'backend/settingstatuspeminjam/settingstatuspeminjam_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingstatuspeminjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ssp_id', TRUE));
        } else {
            $data = array(
		'ssp_namastatus' => $this->input->post('ssp_namastatus',TRUE),
		'ssp_flag' => 1,
	    );

            $this->Settingstatuspeminjam_model->update($this->input->post('ssp_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('settingstatuspeminjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Settingstatuspeminjam_model->get_by_id($id);

        if ($row) {
            $data = array (
                'ssp_flag' => 2,
            );
            $this->Settingstatuspeminjam_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('settingstatuspeminjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingstatuspeminjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ssp_namastatus', 'ssp namastatus', 'trim|required');
	$this->form_validation->set_rules('ssp_tgl', 'ssp tgl', 'trim|required');
	$this->form_validation->set_rules('ssp_flag', 'ssp flag', 'trim|required');
	$this->form_validation->set_rules('ssp_info', 'ssp info', 'trim|required');

	$this->form_validation->set_rules('ssp_id', 'ssp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Settingstatuspeminjam.php */
/* Location: ./application/controllers/Settingstatuspeminjam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:52 */
/* http://harviacode.com */