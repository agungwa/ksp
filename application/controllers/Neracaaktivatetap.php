<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neracaaktivatetap extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Neracaaktivatetap_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $neracaaktivatetap = $this->Neracaaktivatetap_model->get_limit_data($start, $q);

        $data = array(
            'neracaaktivatetap_data' => $neracaaktivatetap,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracaaktivatetap/neracaaktivatetap_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        $neracaaktivatetap = $this->Neracaaktivatetap_model->get_limit_data($start, $q);


        $data = array(
            'neracaaktivatetap_data' => $neracaaktivatetap,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracaaktivatetap/neracaaktivatetap_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Neracaaktivatetap_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nat_id' => $row->nat_id,
		'nat_tanah' => $row->nat_tanah,
		'nat_bangunan' => $row->nat_bangunan,
		'nat_elektronik' => $row->nat_elektronik,
		'nat_kendaraan' => $row->nat_kendaraan,
		'nat_peralatan' => $row->nat_peralatan,
		'nat_akumulasipenyusutan' => $row->nat_akumulasipenyusutan,
		'nat_keterangan' => $row->nat_keterangan,
		'nat_tanggal' => $row->nat_tanggal,
		'nat_tgl' => $row->nat_tgl,
		'nat_flag' => $row->nat_flag,
		'nat_info' => $row->nat_info,'content' => 'backend/neracaaktivatetap/neracaaktivatetap_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaaktivatetap'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('neracaaktivatetap/create_action'),
	    'nat_id' => set_value('nat_id'),
	    'nat_tanah' => set_value('nat_tanah'),
	    'nat_bangunan' => set_value('nat_bangunan'),
	    'nat_elektronik' => set_value('nat_elektronik'),
	    'nat_kendaraan' => set_value('nat_kendaraan'),
	    'nat_peralatan' => set_value('nat_peralatan'),
	    'nat_akumulasipenyusutan' => set_value('nat_akumulasipenyusutan'),
	    'nat_keterangan' => set_value('nat_keterangan'),
	    'nat_tanggal' => set_value('nat_tanggal'),
	    'content' => 'backend/neracaaktivatetap/neracaaktivatetap_form',
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
		'nat_tanah' => $this->input->post('nat_tanah',TRUE),
		'nat_bangunan' => $this->input->post('nat_bangunan',TRUE),
		'nat_elektronik' => $this->input->post('nat_elektronik',TRUE),
		'nat_kendaraan' => $this->input->post('nat_kendaraan',TRUE),
		'nat_peralatan' => $this->input->post('nat_peralatan',TRUE),
		'nat_akumulasipenyusutan' => $this->input->post('nat_akumulasipenyusutan',TRUE),
		'nat_keterangan' => $this->input->post('nat_keterangan',TRUE),
		'nat_tanggal' => $this->input->post('nat_tanggal',TRUE),
		'nat_tgl' => $this->tgl,
		'nat_flag' => 0,
		'nat_info' => "",
	    );

            $this->Neracaaktivatetap_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('neracaaktivatetap'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Neracaaktivatetap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('neracaaktivatetap/update_action'),
		'nat_id' => set_value('nat_id', $row->nat_id),
		'nat_tanah' => set_value('nat_tanah', $row->nat_tanah),
		'nat_bangunan' => set_value('nat_bangunan', $row->nat_bangunan),
		'nat_elektronik' => set_value('nat_elektronik', $row->nat_elektronik),
		'nat_kendaraan' => set_value('nat_kendaraan', $row->nat_kendaraan),
		'nat_peralatan' => set_value('nat_peralatan', $row->nat_peralatan),
		'nat_akumulasipenyusutan' => set_value('nat_akumulasipenyusutan', $row->nat_akumulasipenyusutan),
		'nat_keterangan' => set_value('nat_keterangan', $row->nat_keterangan),
		'nat_tanggal' => set_value('nat_tanggal', $row->nat_tanggal),
	    'content' => 'backend/neracaaktivatetap/neracaaktivatetap_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaaktivatetap'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nat_id', TRUE));
        } else {
            $data = array(
		'nat_tanah' => $this->input->post('nat_tanah',TRUE),
		'nat_bangunan' => $this->input->post('nat_bangunan',TRUE),
		'nat_elektronik' => $this->input->post('nat_elektronik',TRUE),
		'nat_kendaraan' => $this->input->post('nat_kendaraan',TRUE),
		'nat_peralatan' => $this->input->post('nat_peralatan',TRUE),
		'nat_akumulasipenyusutan' => $this->input->post('nat_akumulasipenyusutan',TRUE),
		'nat_keterangan' => $this->input->post('nat_keterangan',TRUE),
		'nat_tanggal' => $this->input->post('nat_tanggal',TRUE),
		'nat_flag' => 1,
	    );

            $this->Neracaaktivatetap_model->update($this->input->post('nat_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('neracaaktivatetap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Neracaaktivatetap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'nat_flag' => 2,
            );
            $this->Neracaaktivatetap_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('neracaaktivatetap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracaaktivatetap'));
        }
    }

    public function _rules() 
    {	$this->form_validation->set_rules('nat_tanggal', 'nat tanggal', 'trim|required');

	$this->form_validation->set_rules('nat_id', 'nat_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Neracaaktivatetap.php */
/* Location: ./application/controllers/Neracaaktivatetap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-09 08:11:34 */
/* http://harviacode.com */