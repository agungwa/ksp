<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisjaminan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisjaminan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisjaminan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisjaminan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisjaminan/index.html';
            $config['first_url'] = base_url() . 'jenisjaminan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisjaminan_model->total_rows($q);
        $jenisjaminan = $this->Jenisjaminan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenisjaminan_data' => $jenisjaminan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenisjaminan/jenisjaminan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisjaminan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisjaminan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisjaminan/index.html';
            $config['first_url'] = base_url() . 'jenisjaminan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisjaminan_model->total_rows($q);
        $jenisjaminan = $this->Jenisjaminan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenisjaminan_data' => $jenisjaminan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenisjaminan/jenisjaminan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenisjaminan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'jej_id' => $row->jej_id,
    		'jej_jaminan' => $row->jej_jaminan,
    		'jej_keterangan' => $row->jej_keterangan,
    		'jej_tgl' => $row->jej_tgl,
            'content' => 'backend/jenisjaminan/jenisjaminan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisjaminan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisjaminan/create_action'),
    	    'jej_id' => set_value('jej_id'),
    	    'jej_jaminan' => set_value('jej_jaminan'),
    	    'jej_keterangan' => set_value('jej_keterangan'),
    	    'content' => 'backend/jenisjaminan/jenisjaminan_form',
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
        		'jej_jaminan' => $this->input->post('jej_jaminan',TRUE),
        		'jej_keterangan' => $this->input->post('jej_keterangan',TRUE),
        		'jej_tgl' => $this->tgl,
        		'jej_flag' => 0,
        		'jej_info' => "",
        	);

            $this->Jenisjaminan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisjaminan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisjaminan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisjaminan/update_action'),
        		'jej_id' => set_value('jej_id', $row->jej_id),
        		'jej_jaminan' => set_value('jej_jaminan', $row->jej_jaminan),
        		'jej_keterangan' => set_value('jej_keterangan', $row->jej_keterangan),
        	    'content' => 'backend/jenisjaminan/jenisjaminan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisjaminan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jej_id', TRUE));
        } else {
            $data = array(
    		'jej_jaminan' => $this->input->post('jej_jaminan',TRUE),
    		'jej_keterangan' => $this->input->post('jej_keterangan',TRUE),
    		'jej_flag' => 1,
    	    );

            $this->Jenisjaminan_model->update($this->input->post('jej_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisjaminan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisjaminan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'jej_flag' => 2,
            );

            $this->Jenisjaminan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisjaminan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisjaminan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jej_jaminan', 'jej jaminan', 'trim|required');
	$this->form_validation->set_rules('jej_keterangan', 'jej keterangan', 'trim|required');

	$this->form_validation->set_rules('jej_id', 'jej_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenisjaminan.php */
/* Location: ./application/controllers/Jenisjaminan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:38 */
/* http://harviacode.com */