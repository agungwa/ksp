<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dendaangsuran extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dendaangsuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dendaangsuran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dendaangsuran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dendaangsuran/index.html';
            $config['first_url'] = base_url() . 'dendaangsuran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dendaangsuran_model->total_rows($q);
        $dendaangsuran = $this->Dendaangsuran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dendaangsuran_data' => $dendaangsuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/dendaangsuran/dendaangsuran_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dendaangsuran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dendaangsuran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dendaangsuran/index.html';
            $config['first_url'] = base_url() . 'dendaangsuran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dendaangsuran_model->total_rows($q);
        $dendaangsuran = $this->Dendaangsuran_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'dendaangsuran_data' => $dendaangsuran,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/dendaangsuran/dendaangsuran_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Dendaangsuran_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'dnd_id' => $row->dnd_id,
    		'ags_id' => $row->ags_id,
    		'sed_id' => $row->sed_id,
            'content' => 'backend/dendaangsuran/dendaangsuran_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dendaangsuran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('dendaangsuran/create_action'),
    	    'dnd_id' => set_value('dnd_id'),
    	    'ags_id' => set_value('ags_id'),
            'nm_ags_id' => set_value('nm_ags_id'),
    	    'sed_id' => set_value('sed_id'),
            'nm_sed_id' => set_value('nm_sed_id'),
    	    'content' => 'backend/dendaangsuran/dendaangsuran_form',
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
    		'ags_id' => $this->input->post('ags_id',TRUE),
    		'sed_id' => $this->input->post('sed_id',TRUE),
    		'dnd_tgl' => $this->tgl,
    		'dnd_flag' => 0,
    		'dnd_info' => "",
    	    );

            $this->Dendaangsuran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dendaangsuran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dendaangsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dendaangsuran/update_action'),
        		'dnd_id' => set_value('dnd_id', $row->dnd_id),
        		'ags_id' => set_value('ags_id', $row->ags_id),
                'nm_ags_id' => set_value('ags_id', $row->ags_id),
        		'sed_id' => set_value('sed_id', $row->sed_id),
                'nm_sed_id' => set_value('sed_id', $row->sed_id),
        	    'content' => 'backend/dendaangsuran/dendaangsuran_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dendaangsuran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('dnd_id', TRUE));
        } else {
            $data = array(
    		'ags_id' => $this->input->post('ags_id',TRUE),
    		'sed_id' => $this->input->post('sed_id',TRUE),
    		'dnd_flag' => 1,
    	    );

            $this->Dendaangsuran_model->update($this->input->post('dnd_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dendaangsuran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dendaangsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
            'dnd_flag' => 2,
            );

            $this->Dendaangsuran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dendaangsuran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dendaangsuran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ags_id', 'ags id', 'trim|required');
	$this->form_validation->set_rules('sed_id', 'sed id', 'trim|required');

	$this->form_validation->set_rules('dnd_id', 'dnd_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dendaangsuran.php */
/* Location: ./application/controllers/Dendaangsuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:08 */
/* http://harviacode.com */