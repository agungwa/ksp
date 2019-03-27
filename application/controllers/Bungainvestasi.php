<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bungainvestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bungainvestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungainvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungainvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungainvestasi/index.html';
            $config['first_url'] = base_url() . 'bungainvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungainvestasi_model->total_rows($q);
        $bungainvestasi = $this->Bungainvestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bungainvestasi_data' => $bungainvestasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungainvestasi/bungainvestasi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungainvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungainvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungainvestasi/index.html';
            $config['first_url'] = base_url() . 'bungainvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungainvestasi_model->total_rows($q);
        $bungainvestasi = $this->Bungainvestasi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'bungainvestasi_data' => $bungainvestasi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungainvestasi/bungainvestasi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Bungainvestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'biv_id' => $row->biv_id,
		'biv_bunga' => $row->biv_bunga,
		'biv_keterangan' => $row->biv_keterangan,
		'biv_tgl' => $row->biv_tgl,
		'biv_flag' => $row->biv_flag,
		'biv_info' => $row->biv_info,'content' => 'backend/bungainvestasi/bungainvestasi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungainvestasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bungainvestasi/create_action'),
	    'biv_id' => set_value('biv_id'),
	    'biv_bunga' => set_value('biv_bunga'),
	    'biv_keterangan' => set_value('biv_keterangan'),
	    'biv_tgl' => set_value('biv_tgl'),
	    'biv_flag' => set_value('biv_flag'),
	    'biv_info' => set_value('biv_info'),
	    'content' => 'backend/bungainvestasi/bungainvestasi_form',
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
		'biv_bunga' => $this->input->post('biv_bunga',TRUE),
		'biv_keterangan' => $this->input->post('biv_keterangan',TRUE),
		'biv_tgl' => $this->input->post('biv_tgl',TRUE),
		'biv_flag' => $this->input->post('biv_flag',TRUE),
		'biv_info' => $this->input->post('biv_info',TRUE),
	    );

            $this->Bungainvestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bungainvestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bungainvestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bungainvestasi/update_action'),
		'biv_id' => set_value('biv_id', $row->biv_id),
		'biv_bunga' => set_value('biv_bunga', $row->biv_bunga),
		'biv_keterangan' => set_value('biv_keterangan', $row->biv_keterangan),
		'biv_tgl' => set_value('biv_tgl', $row->biv_tgl),
		'biv_flag' => set_value('biv_flag', $row->biv_flag),
		'biv_info' => set_value('biv_info', $row->biv_info),
	    'content' => 'backend/bungainvestasi/bungainvestasi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungainvestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('biv_id', TRUE));
        } else {
            $data = array(
		'biv_bunga' => $this->input->post('biv_bunga',TRUE),
		'biv_keterangan' => $this->input->post('biv_keterangan',TRUE),
		'biv_tgl' => $this->input->post('biv_tgl',TRUE),
		'biv_flag' => $this->input->post('biv_flag',TRUE),
		'biv_info' => $this->input->post('biv_info',TRUE),
	    );

            $this->Bungainvestasi_model->update($this->input->post('biv_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bungainvestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bungainvestasi_model->get_by_id($id);

        if ($row) {
            $this->Bungainvestasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bungainvestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungainvestasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('biv_bunga', 'biv bunga', 'trim|required');
	$this->form_validation->set_rules('biv_keterangan', 'biv keterangan', 'trim|required');
	$this->form_validation->set_rules('biv_tgl', 'biv tgl', 'trim|required');
	$this->form_validation->set_rules('biv_flag', 'biv flag', 'trim|required');
	$this->form_validation->set_rules('biv_info', 'biv info', 'trim|required');

	$this->form_validation->set_rules('biv_id', 'biv_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bungainvestasi.php */
/* Location: ./application/controllers/Bungainvestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 11:01:41 */
/* http://harviacode.com */