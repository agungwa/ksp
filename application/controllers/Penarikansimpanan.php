<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikansimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikansimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimpanan/index.html';
            $config['first_url'] = base_url() . 'penarikansimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimpanan_model->total_rows($q);
        $penarikansimpanan = $this->Penarikansimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penarikansimpanan_data' => $penarikansimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimpanan/penarikansimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimpanan/index.html';
            $config['first_url'] = base_url() . 'penarikansimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimpanan_model->total_rows($q);
        $penarikansimpanan = $this->Penarikansimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penarikansimpanan_data' => $penarikansimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimpanan/penarikansimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penarikansimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pes_id' => $row->pes_id,
		'sim_kode' => $row->sim_kode,
		'siw_id' => $row->siw_id,
		'pes_tglpenarikan' => $row->pes_tglpenarikan,
		'pes_jumlah' => $row->pes_jumlah,
		'pes_tgl' => $row->pes_tgl,
		'pes_flag' => $row->pes_flag,
		'pes_info' => $row->pes_info,'content' => 'backend/penarikansimpanan/penarikansimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penarikansimpanan/create_action'),
	    'pes_id' => set_value('pes_id'),
	    'sim_kode' => set_value('sim_kode'),
	    'siw_id' => set_value('siw_id'),
	    'pes_tglpenarikan' => set_value('pes_tglpenarikan'),
	    'pes_jumlah' => set_value('pes_jumlah'),
	    'pes_tgl' => set_value('pes_tgl'),
	    'pes_flag' => set_value('pes_flag'),
	    'pes_info' => set_value('pes_info'),
	    'content' => 'backend/penarikansimpanan/penarikansimpanan_form',
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
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'siw_id' => $this->input->post('siw_id',TRUE),
		'pes_tglpenarikan' => $this->input->post('pes_tglpenarikan',TRUE),
		'pes_jumlah' => $this->input->post('pes_jumlah',TRUE),
		'pes_tgl' => $this->input->post('pes_tgl',TRUE),
		'pes_flag' => $this->input->post('pes_flag',TRUE),
		'pes_info' => $this->input->post('pes_info',TRUE),
	    );

            $this->Penarikansimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penarikansimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penarikansimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penarikansimpanan/update_action'),
		'pes_id' => set_value('pes_id', $row->pes_id),
		'sim_kode' => set_value('sim_kode', $row->sim_kode),
		'siw_id' => set_value('siw_id', $row->siw_id),
		'pes_tglpenarikan' => set_value('pes_tglpenarikan', $row->pes_tglpenarikan),
		'pes_jumlah' => set_value('pes_jumlah', $row->pes_jumlah),
		'pes_tgl' => set_value('pes_tgl', $row->pes_tgl),
		'pes_flag' => set_value('pes_flag', $row->pes_flag),
		'pes_info' => set_value('pes_info', $row->pes_info),
	    'content' => 'backend/penarikansimpanan/penarikansimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pes_id', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'siw_id' => $this->input->post('siw_id',TRUE),
		'pes_tglpenarikan' => $this->input->post('pes_tglpenarikan',TRUE),
		'pes_jumlah' => $this->input->post('pes_jumlah',TRUE),
		'pes_tgl' => $this->input->post('pes_tgl',TRUE),
		'pes_flag' => $this->input->post('pes_flag',TRUE),
		'pes_info' => $this->input->post('pes_info',TRUE),
	    );

            $this->Penarikansimpanan_model->update($this->input->post('pes_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penarikansimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penarikansimpanan_model->get_by_id($id);

        if ($row) {
            $this->Penarikansimpanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penarikansimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('siw_id', 'siw id', 'trim|required');
	$this->form_validation->set_rules('pes_tglpenarikan', 'pes tglpenarikan', 'trim|required');
	$this->form_validation->set_rules('pes_jumlah', 'pes jumlah', 'trim|required');
	$this->form_validation->set_rules('pes_tgl', 'pes tgl', 'trim|required');
	$this->form_validation->set_rules('pes_flag', 'pes flag', 'trim|required');
	$this->form_validation->set_rules('pes_info', 'pes info', 'trim|required');

	$this->form_validation->set_rules('pes_id', 'pes_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penarikansimpanan.php */
/* Location: ./application/controllers/Penarikansimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:08 */
/* http://harviacode.com */