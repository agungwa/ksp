<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jaminan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jaminan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jaminan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jaminan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jaminan/index.html';
            $config['first_url'] = base_url() . 'jaminan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jaminan_model->total_rows($q);
        $jaminan = $this->Jaminan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jaminan_data' => $jaminan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jaminan/jaminan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jaminan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jaminan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jaminan/index.html';
            $config['first_url'] = base_url() . 'jaminan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jaminan_model->total_rows($q);
        $jaminan = $this->Jaminan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jaminan_data' => $jaminan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jaminan/jaminan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jaminan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'jam_id' => $row->jam_id,
    		'pin_id' => $row->pin_id,
    		'jej_id' => $row->jej_id,
    		'jam_nomor' => $row->jam_nomor,
    		'jam_keterangan' => $row->jam_keterangan,
    		'jam_file' => $row->jam_file,
            'content' => 'backend/jaminan/jaminan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaminan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jaminan/create_action'),
    	    'jam_id' => set_value('jam_id'),
    	    'pin_id' => set_value('pin_id'),
            'nm_pin_id' => set_value('nm_pin_id'),
    	    'jej_id' => set_value('jej_id'),
            'nm_jej_id' => set_value('nm_jej_id'),
    	    'jam_nomor' => set_value('jam_nomor'),
    	    'jam_keterangan' => set_value('jam_keterangan'),
    	    'jam_file' => set_value('jam_file'),
    	    'content' => 'backend/jaminan/jaminan_form',
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
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'jej_id' => $this->input->post('jej_id',TRUE),
    		'jam_nomor' => $this->input->post('jam_nomor',TRUE),
    		'jam_keterangan' => $this->input->post('jam_keterangan',TRUE),
    		'jam_file' => "",
    		'jam_tgl' => $this->tgl,
    		'jam_flag' => 0,
    		'jam_info' => "",
    	    );

            $this->Jaminan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jaminan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jaminan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jaminan/update_action'),
        		'jam_id' => set_value('jam_id', $row->jam_id),
        		'pin_id' => set_value('pin_id', $row->pin_id),
                'nm_pin_id' => set_value('pin_id', $row->pin_id),
        		'jej_id' => set_value('jej_id', $row->jej_id),
                'nm_jej_id' => set_value('jej_id', $row->jej_id),
        		'jam_nomor' => set_value('jam_nomor', $row->jam_nomor),
        		'jam_keterangan' => set_value('jam_keterangan', $row->jam_keterangan),
        		'jam_file' => set_value('jam_file', $row->jam_file),
        	    'content' => 'backend/jaminan/jaminan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaminan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jam_id', TRUE));
        } else {
            $data = array(
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'jej_id' => $this->input->post('jej_id',TRUE),
    		'jam_nomor' => $this->input->post('jam_nomor',TRUE),
    		'jam_keterangan' => $this->input->post('jam_keterangan',TRUE),
    		'jam_flag' => 1,
    	    );

            $this->Jaminan_model->update($this->input->post('jam_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jaminan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jaminan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'jam_flag' => 2,
            );

            $this->Jaminan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jaminan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaminan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('jej_id', 'jej id', 'trim|required');
	$this->form_validation->set_rules('jam_nomor', 'jam nomor', 'trim|required');
	$this->form_validation->set_rules('jam_keterangan', 'jam keterangan', 'trim|required');

	$this->form_validation->set_rules('jam_id', 'jam_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jaminan.php */
/* Location: ./application/controllers/Jaminan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:19 */
/* http://harviacode.com */