<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kasbon extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kasbon_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $kasbon = $this->Kasbon_model->get_limit_data($start, $q);


        $data = array(
            'kasbon_data' => $kasbon,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/kasbon/kasbon_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kasbon/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'kasbon/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'kasbon/index.html';
            $config['first_url'] = base_url() . 'kasbon/index.html';
        }

        $kasbon = $this->Kasbon_model->get_limit_data( $start, $q);


        $data = array(
            'kasbon_data' => $kasbon,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/kasbon/kasbon_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Kasbon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ksb_no' => $row->ksb_no,
		'ksb_jumlah' => $row->ksb_jumlah,
		'wil_kode' => $row->wil_kode,
		'kar_kode' => $row->kar_kode,
		'ksb_keterangan' => $row->ksb_keterangan,
		'ksb_tanggal' => $row->ksb_tanggal,
		'ksb_tgl' => $row->ksb_tgl,
		'ksb_flag' => $row->ksb_flag,
		'ksb_info' => $row->ksb_info,'content' => 'backend/kasbon/kasbon_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kasbon'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kasbon/create_action'),
	    'ksb_no' => set_value('ksb_no'),
	    'ksb_jumlah' => set_value('ksb_jumlah'),
	    'wil_kode' => set_value('wil_kode'),
	    'kar_kode' => set_value('kar_kode'),
	    'ksb_keterangan' => set_value('ksb_keterangan'),
	    'ksb_tanggal' => set_value('ksb_tanggal'),
	    'ksb_tgl' => set_value('ksb_tgl'),
	    'ksb_flag' => set_value('ksb_flag'),
	    'ksb_info' => set_value('ksb_info'),
	    'content' => 'backend/kasbon/kasbon_input',
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
		'ksb_jumlah' => $this->input->post('ksb_jumlah',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'ksb_jenis' => $this->input->post('ksb_jenis',TRUE),
		'ksb_keterangan' => $this->input->post('ksb_keterangan',TRUE),
		'ksb_tanggal' => $this->input->post('ksb_tanggal',TRUE),
		'ksb_tgl' => $this->tgl,
		'ksb_flag' => 0,
		'ksb_info' => "",
	    );

            $this->Kasbon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kasbon'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kasbon_model->get_by_id($id);

        if ($row) {
            $wil_kode = $this->db->get_where('wilayah',array('wil_kode' => $row->wil_kode))->row();
            $kar_kode = $this->db->get_where('karyawan',array('kar_kode' => $row->kar_kode))->row();
            $data = array(
                'button' => 'Update',
                'action' => site_url('kasbon/update_action'),
		'ksb_no' => set_value('ksb_no', $row->ksb_no),
		'ksb_jumlah' => set_value('ksb_jumlah', $row->ksb_jumlah),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'nm_wil_kode' => set_value('nm_wil_kode', $wil_kode->wil_nama),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'nm_kar_kode' => set_value('nm_kar_kode', $kar_kode->kar_nama),
		'ksb_jenis' => set_value('ksb_jenis', $row->ksb_jenis),
		'nm_ksb_jenis' => set_value('nm_ksb_jenis', $this->jenisKasbon[$row->ksb_jenis]),
		'ksb_keterangan' => set_value('ksb_keterangan', $row->ksb_keterangan),
		'ksb_tanggal' => set_value('ksb_tanggal', $row->ksb_tanggal),
		'ksb_tgl' => set_value('ksb_tgl', $row->ksb_tgl),
		'ksb_flag' => set_value('ksb_flag', $row->ksb_flag),
		'ksb_info' => set_value('ksb_info', $row->ksb_info),
	    'content' => 'backend/kasbon/kasbon_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kasbon'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ksb_no', TRUE));
        } else {
            $data = array(
		'ksb_jumlah' => $this->input->post('ksb_jumlah',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'ksb_jenis' => $this->input->post('ksb_jenis',TRUE),
		'ksb_keterangan' => $this->input->post('ksb_keterangan',TRUE),
		'ksb_tanggal' => $this->input->post('ksb_tanggal',TRUE),
		'ksb_tgl' => $this->tgl,
		'ksb_flag' => 1,
		'ksb_info' => "",
	    );

            $this->Kasbon_model->update($this->input->post('ksb_no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kasbon'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kasbon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'ksb_flag' => 2,
            );
            $this->Kasbon_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kasbon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kasbon'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ksb_jumlah', 'ksb jumlah', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('ksb_tanggal', 'ksb tanggal', 'trim|required');

	$this->form_validation->set_rules('ksb_no', 'ksb_no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kasbon.php */
/* Location: ./application/controllers/Kasbon.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-17 05:50:14 */
/* http://harviacode.com */