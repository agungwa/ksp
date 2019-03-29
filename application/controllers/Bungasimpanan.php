<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bungasimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bungasimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungasimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungasimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungasimpanan/index.html';
            $config['first_url'] = base_url() . 'bungasimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungasimpanan_model->total_rows($q);
        $bungasimpanan = $this->Bungasimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bungasimpanan_data' => $bungasimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungasimpanan/bungasimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungasimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungasimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungasimpanan/index.html';
            $config['first_url'] = base_url() . 'bungasimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungasimpanan_model->total_rows($q);
        $bungasimpanan = $this->Bungasimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'bungasimpanan_data' => $bungasimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungasimpanan/bungasimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Bungasimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bus_id' => $row->bus_id,
		'bus_bunga' => $row->bus_bunga,
		'bus_tgl' => $row->bus_tgl,
		'bus_flag' => $row->bus_flag,
		'bus_info' => $row->bus_info,'content' => 'backend/bungasimpanan/bungasimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bungasimpanan/create_action'),
	    'bus_id' => set_value('bus_id'),
	    'bus_bunga' => set_value('bus_bunga'),
	    'bus_tgl' => set_value('bus_tgl'),
	    'bus_flag' => set_value('bus_flag'),
	    'bus_info' => set_value('bus_info'),
	    'content' => 'backend/bungasimpanan/bungasimpanan_form',
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
		'bus_bunga' => $this->input->post('bus_bunga',TRUE),
		'bus_tgl' => $this->input->post('bus_tgl',TRUE),
		'bus_flag' => $this->input->post('bus_flag',TRUE),
		'bus_info' => $this->input->post('bus_info',TRUE),
	    );

            $this->Bungasimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bungasimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bungasimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bungasimpanan/update_action'),
		'bus_id' => set_value('bus_id', $row->bus_id),
		'bus_bunga' => set_value('bus_bunga', $row->bus_bunga),
		'bus_tgl' => set_value('bus_tgl', $row->bus_tgl),
		'bus_flag' => set_value('bus_flag', $row->bus_flag),
		'bus_info' => set_value('bus_info', $row->bus_info),
	    'content' => 'backend/bungasimpanan/bungasimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('bus_id', TRUE));
        } else {
            $data = array(
		'bus_bunga' => $this->input->post('bus_bunga',TRUE),
		'bus_tgl' => $this->input->post('bus_tgl',TRUE),
		'bus_flag' => $this->input->post('bus_flag',TRUE),
		'bus_info' => $this->input->post('bus_info',TRUE),
	    );

            $this->Bungasimpanan_model->update($this->input->post('bus_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bungasimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bungasimpanan_model->get_by_id($id);

        if ($row) {
            $this->Bungasimpanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bungasimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bus_bunga', 'bus bunga', 'trim|required');
	$this->form_validation->set_rules('bus_tgl', 'bus tgl', 'trim|required');
	$this->form_validation->set_rules('bus_flag', 'bus flag', 'trim|required');
	$this->form_validation->set_rules('bus_info', 'bus info', 'trim|required');

	$this->form_validation->set_rules('bus_id', 'bus_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bungasimpanan.php */
/* Location: ./application/controllers/Bungasimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:22:13 */
/* http://harviacode.com */