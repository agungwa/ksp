<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Angsuranbayar extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Angsuranbayar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $angsuranbayar = $this->Angsuranbayar_model->get_limit_data($start, $q);


        $data = array(
            'angsuranbayar_data' => $angsuranbayar,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/angsuranbayar/angsuranbayar_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'angsuranbayar/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'angsuranbayar/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'angsuranbayar/index.html';
            $config['first_url'] = base_url() . 'angsuranbayar/index.html';
        }

        $angsuranbayar = $this->Angsuranbayar_model->get_limit_data($start, $q);


        $data = array(
            'angsuranbayar_data' => $angsuranbayar,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/angsuranbayar/angsuranbayar_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Angsuranbayar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'agb_id' => $row->agb_id,
		'ags_id' => $row->ags_id,
		'agb_pokok' => $row->agb_pokok,
		'agb_bunga' => $row->agb_bunga,
		'agb_denda' => $row->agb_denda,
		'agb_status' => $row->agb_status,
		'agb_tglpokok' => $row->agb_tglpokok,
		'agb_tglbunga' => $row->agb_tglbunga,
		'agb_tgllunas' => $row->agb_tgllunas,
		'agb_tgl' => $row->agb_tgl,
		'agb_flag' => $row->agb_flag,
		'agb_info' => $row->agb_info,'content' => 'backend/angsuranbayar/angsuranbayar_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuranbayar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('angsuranbayar/create_action'),
	    'agb_id' => set_value('agb_id'),
	    'ags_id' => set_value('ags_id'),
	    'agb_pokok' => set_value('agb_pokok'),
	    'agb_bunga' => set_value('agb_bunga'),
	    'agb_denda' => set_value('agb_denda'),
	    'agb_status' => set_value('agb_status'),
	    'agb_tglpokok' => set_value('agb_tglpokok'),
	    'agb_tglbunga' => set_value('agb_tglbunga'),
	    'agb_tgllunas' => set_value('agb_tgllunas'),
	    'content' => 'backend/angsuranbayar/angsuranbayar_form',
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
		'agb_pokok' => $this->input->post('agb_pokok',TRUE),
		'agb_bunga' => $this->input->post('agb_bunga',TRUE),
		'agb_denda' => $this->input->post('agb_denda',TRUE),
		'agb_status' => $this->input->post('agb_status',TRUE),
		'agb_tglpokok' => $this->input->post('agb_tglpokok',TRUE),
		'agb_tglbunga' => $this->input->post('agb_tglbunga',TRUE),
		'agb_tgllunas' => $this->input->post('agb_tgllunas',TRUE),
		'agb_tgl' => $this->tgl,
		'agb_flag' => 0,
		'agb_info' => "",
	    );

            $this->Angsuranbayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('angsuranbayar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Angsuranbayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('angsuranbayar/update_action'),
		'agb_id' => set_value('agb_id', $row->agb_id),
		'ags_id' => set_value('ags_id', $row->ags_id),
		'agb_pokok' => set_value('agb_pokok', $row->agb_pokok),
		'agb_bunga' => set_value('agb_bunga', $row->agb_bunga),
		'agb_denda' => set_value('agb_denda', $row->agb_denda),
		'agb_status' => set_value('agb_status', $row->agb_status),
		'agb_tglpokok' => set_value('agb_tglpokok', $row->agb_tglpokok),
		'agb_tglbunga' => set_value('agb_tglbunga', $row->agb_tglbunga),
		'agb_tgllunas' => set_value('agb_tgllunas', $row->agb_tgllunas),
	    'content' => 'backend/angsuranbayar/angsuranbayar_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuranbayar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('agb_id', TRUE));
        } else {
            $data = array(
		'ags_id' => $this->input->post('ags_id',TRUE),
		'agb_pokok' => $this->input->post('agb_pokok',TRUE),
		'agb_bunga' => $this->input->post('agb_bunga',TRUE),
		'agb_denda' => $this->input->post('agb_denda',TRUE),
		'agb_status' => $this->input->post('agb_status',TRUE),
		'agb_tglpokok' => $this->input->post('agb_tglpokok',TRUE),
		'agb_tglbunga' => $this->input->post('agb_tglbunga',TRUE),
		'agb_tgllunas' => $this->input->post('agb_tgllunas',TRUE),
		'agb_flag' => 1,
	    );

            $this->Angsuranbayar_model->update($this->input->post('agb_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('angsuranbayar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Angsuranbayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'agb_flag' => 2,
            );
            $this->Angsuranbayar_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('angsuranbayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angsuranbayar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ags_id', 'ags id', 'trim|required');

	$this->form_validation->set_rules('agb_id', 'agb_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Angsuranbayar.php */
/* Location: ./application/controllers/Angsuranbayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-06 22:43:38 */
/* http://harviacode.com */