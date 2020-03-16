<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rekap_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $rekap = $this->Rekap_model->get_limit_data( $start, $q);

        $data = array(
            'rekap_data' => $rekap,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/rekap/rekap_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rekap/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'rekap/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'rekap/index.html';
            $config['first_url'] = base_url() . 'rekap/index.html';
        }

        $rekap = $this->Rekap_model->get_limit_data( $start, $q);


        $data = array(
            'rekap_data' => $rekap,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/rekap/rekap_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Rekap_model->get_by_id($id);
        if ($row) {
            $data = array(
		'rek_id' => $row->rek_id,
		'rek_jenis' => $row->rek_jenis,
		'wil_kode' => $row->wil_kode,
		'kar_kode' => $row->kar_kode,
		'rek_lainlainmasuk' => $row->rek_lainlainmasuk,
		'rek_lainlainkeluar' => $row->rek_lainlainkeluar,
		'rek_jumlah' => $row->rek_jumlah,
		'rek_tanggal' => $row->rek_tanggal,
		'rek_tgl' => $row->rek_tgl,
		'rek_flag' => $row->rek_flag,
		'rek_info' => $row->rek_info,'content' => 'backend/rekap/rekap_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekap'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rekap/create_action'),
	    'rek_id' => set_value('rek_id'),
	    'rek_jenis' => set_value('rek_jenis'),
	    'wil_kode' => set_value('wil_kode'),
	    'kar_kode' => set_value('kar_kode'),
	    'rek_lainlainmasuk' => set_value('rek_lainlainmasuk'),
	    'rek_lainlainkeluar' => set_value('rek_lainlainkeluar'),
	    'rek_jumlah' => set_value('rek_jumlah'),
	    'rek_tanggal' => set_value('rek_tanggal'),
	    'rek_tgl' => set_value('rek_tgl'),
	    'rek_flag' => set_value('rek_flag'),
	    'rek_info' => set_value('rek_info'),
	    'content' => 'backend/rekap/rekap_form',
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
		'rek_jenis' => $this->input->post('rek_jenis',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'rek_lainlainmasuk' => $this->input->post('rek_lainlainmasuk',TRUE),
		'rek_lainlainkeluar' => $this->input->post('rek_lainlainkeluar',TRUE),
		'rek_jumlah' => $this->input->post('rek_jumlah',TRUE),
		'rek_tanggal' => $this->input->post('rek_tanggal',TRUE),
		'rek_tgl' => $this->tgl,
		'rek_flag' => 0,
		'rek_info' => "",
	    );

            $this->Rekap_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekap'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rekap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rekap/update_action'),
		'rek_id' => set_value('rek_id', $row->rek_id),
		'rek_jenis' => set_value('rek_jenis', $row->rek_jenis),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'rek_lainlainmasuk' => set_value('rek_lainlainmasuk', $row->rek_lainlainmasuk),
		'rek_lainlainkeluar' => set_value('rek_lainlainkeluar', $row->rek_lainlainkeluar),
		'rek_jumlah' => set_value('rek_jumlah', $row->rek_jumlah),
		'rek_tanggal' => set_value('rek_tanggal', $row->rek_tanggal),
		'rek_tgl' => set_value('rek_tgl', $row->rek_tgl),
		'rek_flag' => set_value('rek_flag', $row->rek_flag),
		'rek_info' => set_value('rek_info', $row->rek_info),
	    'content' => 'backend/rekap/rekap_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekap'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('rek_id', TRUE));
        } else {
            $data = array(
		'rek_jenis' => $this->input->post('rek_jenis',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'rek_lainlainmasuk' => $this->input->post('rek_lainlainmasuk',TRUE),
		'rek_lainlainkeluar' => $this->input->post('rek_lainlainkeluar',TRUE),
		'rek_jumlah' => $this->input->post('rek_jumlah',TRUE),
		'rek_tanggal' => $this->input->post('rek_tanggal',TRUE),
		'rek_flag' => 1,
	    );

            $this->Rekap_model->update($this->input->post('rek_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rekap_model->get_by_id($id);

        if ($row) {
            $data = array (
                'rek_flag' => 2,
            );
            $this->Rekap_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekap'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('rek_jenis', 'rek jenis', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('rek_jumlah', 'rek jumlah', 'trim|required');
	$this->form_validation->set_rules('rek_tanggal', 'rek tanggal', 'trim|required');

	$this->form_validation->set_rules('rek_id', 'rek_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rekap.php */
/* Location: ./application/controllers/Rekap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-16 00:09:27 */
/* http://harviacode.com */