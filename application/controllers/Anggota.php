<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/anggota/anggota_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'anggota_data' => $anggota,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/anggota/anggota_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ang_no' => $row->ang_no,
		'ang_nama' => $row->ang_nama,
		'ang_alamat' => $row->ang_alamat,
		'ang_noktp' => $row->ang_noktp,
		'ang_nokk' => $row->ang_nokk,
		'ang_nohp' => $row->ang_nohp,
		'ang_tgllahir' => $row->ang_tgllahir,
		'ang_status' => $row->ang_status,
		'ang_tgl' => $row->ang_tgl,
		'ang_flag' => $row->ang_flag,
		'ang_info' => $row->ang_info,'content' => 'backend/anggota/anggota_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('anggota/create_action'),
	    'ang_no' => set_value('ang_no'),
	    'ang_nama' => set_value('ang_nama'),
	    'ang_alamat' => set_value('ang_alamat'),
	    'ang_noktp' => set_value('ang_noktp'),
	    'ang_nokk' => set_value('ang_nokk'),
	    'ang_nohp' => set_value('ang_nohp'),
	    'ang_tgllahir' => set_value('ang_tgllahir'),
	    'ang_status' => set_value('ang_status'),
	    'content' => 'backend/anggota/anggota_form',
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
                'ang_no' => $this->input->post('ang_no',TRUE),
		'ang_nama' => $this->input->post('ang_nama',TRUE),
		'ang_alamat' => $this->input->post('ang_alamat',TRUE),
		'ang_noktp' => $this->input->post('ang_noktp',TRUE),
		'ang_nokk' => $this->input->post('ang_nokk',TRUE),
		'ang_nohp' => $this->input->post('ang_nohp',TRUE),
		'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
		'ang_status' => $this->input->post('ang_status',TRUE),
		'ang_tgl' => $this->tgl,
		'ang_flag' => 0,
		'ang_info' => "",
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'ang_nama' => set_value('ang_nama', $row->ang_nama),
		'ang_alamat' => set_value('ang_alamat', $row->ang_alamat),
		'ang_noktp' => set_value('ang_noktp', $row->ang_noktp),
		'ang_nokk' => set_value('ang_nokk', $row->ang_nokk),
		'ang_nohp' => set_value('ang_nohp', $row->ang_nohp),
		'ang_tgllahir' => set_value('ang_tgllahir', $row->ang_tgllahir),
		'ang_status' => set_value('ang_status', $row->ang_tgllahir),
	    'content' => 'backend/anggota/anggota_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ang_no', TRUE));
        } else {
            $data = array(
		'ang_nama' => $this->input->post('ang_nama',TRUE),
		'ang_alamat' => $this->input->post('ang_alamat',TRUE),
		'ang_noktp' => $this->input->post('ang_noktp',TRUE),
		'ang_nokk' => $this->input->post('ang_nokk',TRUE),
		'ang_nohp' => $this->input->post('ang_nohp',TRUE),
		'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
		'ang_status' => $this->input->post('ang_status',TRUE),
		'ang_tgl' => $this->tgl,
		'ang_flag' => 1,
		'ang_info' => "",
	    );

            $this->Anggota_model->update($this->input->post('ang_no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'ang_flag' => 2
            );
            $this->Anggota_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_nama', 'ang nama', 'trim|required');
	$this->form_validation->set_rules('ang_alamat', 'ang alamat', 'trim|required');
	$this->form_validation->set_rules('ang_noktp', 'ang noktp', 'trim|required');
	$this->form_validation->set_rules('ang_nokk', 'ang nokk', 'trim|required');
	$this->form_validation->set_rules('ang_nohp', 'ang nohp', 'trim|required');
	$this->form_validation->set_rules('ang_tgllahir', 'ang tgllahir', 'trim|required');
	$this->form_validation->set_rules('ang_status', 'ang status', 'trim|required');

	$this->form_validation->set_rules('ang_no', 'ang_no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:40:16 */
/* http://harviacode.com */