<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingdenda extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Settingdenda_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingdenda/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingdenda/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingdenda/index.html';
            $config['first_url'] = base_url() . 'settingdenda/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingdenda_model->total_rows($q);
        $settingdenda = $this->Settingdenda_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'settingdenda_data' => $settingdenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingdenda/settingdenda_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingdenda/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingdenda/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingdenda/index.html';
            $config['first_url'] = base_url() . 'settingdenda/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingdenda_model->total_rows($q);
        $settingdenda = $this->Settingdenda_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'settingdenda_data' => $settingdenda,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingdenda/settingdenda_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Settingdenda_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'sed_id' => $row->sed_id,
    		'sed_hari' => $row->sed_hari,
    		'sed_denda' => $row->sed_denda,
            'content' => 'backend/settingdenda/settingdenda_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingdenda'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('settingdenda/create_action'),
    	    'sed_id' => set_value('sed_id'),
    	    'sed_hari' => set_value('sed_hari'),
    	    'sed_denda' => set_value('sed_denda'),
    	    'content' => 'backend/settingdenda/settingdenda_form',
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
    		'sed_hari' => $this->input->post('sed_hari',TRUE),
    		'sed_denda' => $this->input->post('sed_denda',TRUE),
    		'sed_tgl' => $this->tgl,
    		'sed_flag' => 0,
    		'sed_info' => "",
    	    );

            $this->Settingdenda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('settingdenda'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Settingdenda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('settingdenda/update_action'),
        		'sed_id' => set_value('sed_id', $row->sed_id),
        		'sed_hari' => set_value('sed_hari', $row->sed_hari),
        		'sed_denda' => set_value('sed_denda', $row->sed_denda),
        	    'content' => 'backend/settingdenda/settingdenda_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingdenda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sed_id', TRUE));
        } else {
            $data = array(
    		'sed_hari' => $this->input->post('sed_hari',TRUE),
    		'sed_denda' => $this->input->post('sed_denda',TRUE),
    		'sed_flag' => 1,
    	    );

            $this->Settingdenda_model->update($this->input->post('sed_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('settingdenda'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Settingdenda_model->get_by_id($id);

        if ($row) {
            $data = array(
            'sed_flag' => 2,
            );

            $this->Settingdenda_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('settingdenda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingdenda'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sed_hari', 'sed hari', 'trim|required');
	$this->form_validation->set_rules('sed_denda', 'sed denda', 'trim|required');

	$this->form_validation->set_rules('sed_id', 'sed_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Settingdenda.php */
/* Location: ./application/controllers/Settingdenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:34 */
/* http://harviacode.com */