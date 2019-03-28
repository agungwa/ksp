<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bungapinjaman extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bungapinjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungapinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungapinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungapinjaman/index.html';
            $config['first_url'] = base_url() . 'bungapinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungapinjaman_model->total_rows($q);
        $bungapinjaman = $this->Bungapinjaman_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bungapinjaman_data' => $bungapinjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungapinjaman/bungapinjaman_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungapinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungapinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungapinjaman/index.html';
            $config['first_url'] = base_url() . 'bungapinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungapinjaman_model->total_rows($q);
        $bungapinjaman = $this->Bungapinjaman_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'bungapinjaman_data' => $bungapinjaman,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungapinjaman/bungapinjaman_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Bungapinjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bup_id' => $row->bup_id,
		'bup_bunga' => $row->bup_bunga,
		'bub_tgl' => $row->bub_tgl,
		'bub_flag' => $row->bub_flag,
		'bup_info' => $row->bup_info,'content' => 'backend/bungapinjaman/bungapinjaman_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungapinjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bungapinjaman/create_action'),
	    'bup_id' => set_value('bup_id'),
	    'bup_bunga' => set_value('bup_bunga'),
	    'bub_tgl' => set_value('bub_tgl'),
	    'bub_flag' => set_value('bub_flag'),
	    'bup_info' => set_value('bup_info'),
	    'content' => 'backend/bungapinjaman/bungapinjaman_form',
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
		'bup_bunga' => $this->input->post('bup_bunga',TRUE),
		'bub_tgl' => $this->input->post('bub_tgl',TRUE),
		'bub_flag' => $this->input->post('bub_flag',TRUE),
		'bup_info' => $this->input->post('bup_info',TRUE),
	    );

            $this->Bungapinjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bungapinjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bungapinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bungapinjaman/update_action'),
		'bup_id' => set_value('bup_id', $row->bup_id),
		'bup_bunga' => set_value('bup_bunga', $row->bup_bunga),
		'bub_tgl' => set_value('bub_tgl', $row->bub_tgl),
		'bub_flag' => set_value('bub_flag', $row->bub_flag),
		'bup_info' => set_value('bup_info', $row->bup_info),
	    'content' => 'backend/bungapinjaman/bungapinjaman_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungapinjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('bup_id', TRUE));
        } else {
            $data = array(
		'bup_bunga' => $this->input->post('bup_bunga',TRUE),
		'bub_tgl' => $this->input->post('bub_tgl',TRUE),
		'bub_flag' => $this->input->post('bub_flag',TRUE),
		'bup_info' => $this->input->post('bup_info',TRUE),
	    );

            $this->Bungapinjaman_model->update($this->input->post('bup_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bungapinjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bungapinjaman_model->get_by_id($id);

        if ($row) {
            $this->Bungapinjaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bungapinjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungapinjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bup_bunga', 'bup bunga', 'trim|required');
	$this->form_validation->set_rules('bub_tgl', 'bub tgl', 'trim|required');
	$this->form_validation->set_rules('bub_flag', 'bub flag', 'trim|required');
	$this->form_validation->set_rules('bup_info', 'bup info', 'trim|required');

	$this->form_validation->set_rules('bup_id', 'bup_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bungapinjaman.php */
/* Location: ./application/controllers/Bungapinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 11:02:36 */
/* http://harviacode.com */