<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasisimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasisimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasisimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasisimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasisimkesan/index.html';
            $config['first_url'] = base_url() . 'mutasisimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasisimkesan_model->total_rows($q);
        $mutasisimkesan = $this->Mutasisimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasisimkesan_data' => $mutasisimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasisimkesan/mutasisimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasisimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasisimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasisimkesan/index.html';
            $config['first_url'] = base_url() . 'mutasisimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasisimkesan_model->total_rows($q);
        $mutasisimkesan = $this->Mutasisimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'mutasisimkesan_data' => $mutasisimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasisimkesan/mutasisimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Mutasisimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'msk_id' => $row->msk_id,
		'sik_kode' => $row->sik_kode,
		'msk_tglmutasi' => $row->msk_tglmutasi,
		'msk_asal' => $row->msk_asal,
		'msk_tujuan' => $row->msk_tujuan,
		'msk_status' => $row->msk_status,
		'msk_tgl' => $row->msk_tgl,
		'msk_flag' => $row->msk_flag,
		'msk_info' => $row->msk_info,'content' => 'backend/mutasisimkesan/mutasisimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mutasisimkesan/create_action'),
	    'msk_id' => set_value('msk_id'),
	    'sik_kode' => set_value('sik_kode'),
	    'msk_tglmutasi' => set_value('msk_tglmutasi'),
	    'msk_asal' => set_value('msk_asal'),
	    'msk_tujuan' => set_value('msk_tujuan'),
	    'msk_status' => set_value('msk_status'),
	    'msk_tgl' => set_value('msk_tgl'),
	    'msk_flag' => set_value('msk_flag'),
	    'msk_info' => set_value('msk_info'),
	    'content' => 'backend/mutasisimkesan/mutasisimkesan_form',
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
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'msk_tglmutasi' => $this->input->post('msk_tglmutasi',TRUE),
		'msk_asal' => $this->input->post('msk_asal',TRUE),
		'msk_tujuan' => $this->input->post('msk_tujuan',TRUE),
		'msk_status' => $this->input->post('msk_status',TRUE),
		'msk_tgl' => $this->input->post('msk_tgl',TRUE),
		'msk_flag' => $this->input->post('msk_flag',TRUE),
		'msk_info' => $this->input->post('msk_info',TRUE),
	    );

            $this->Mutasisimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mutasisimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mutasisimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasisimkesan/update_action'),
		'msk_id' => set_value('msk_id', $row->msk_id),
		'sik_kode' => set_value('sik_kode', $row->sik_kode),
		'msk_tglmutasi' => set_value('msk_tglmutasi', $row->msk_tglmutasi),
		'msk_asal' => set_value('msk_asal', $row->msk_asal),
		'msk_tujuan' => set_value('msk_tujuan', $row->msk_tujuan),
		'msk_status' => set_value('msk_status', $row->msk_status),
		'msk_tgl' => set_value('msk_tgl', $row->msk_tgl),
		'msk_flag' => set_value('msk_flag', $row->msk_flag),
		'msk_info' => set_value('msk_info', $row->msk_info),
	    'content' => 'backend/mutasisimkesan/mutasisimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('msk_id', TRUE));
        } else {
            $data = array(
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'msk_tglmutasi' => $this->input->post('msk_tglmutasi',TRUE),
		'msk_asal' => $this->input->post('msk_asal',TRUE),
		'msk_tujuan' => $this->input->post('msk_tujuan',TRUE),
		'msk_status' => $this->input->post('msk_status',TRUE),
		'msk_tgl' => $this->input->post('msk_tgl',TRUE),
		'msk_flag' => $this->input->post('msk_flag',TRUE),
		'msk_info' => $this->input->post('msk_info',TRUE),
	    );

            $this->Mutasisimkesan_model->update($this->input->post('msk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasisimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mutasisimkesan_model->get_by_id($id);

        if ($row) {
            $this->Mutasisimkesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasisimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('msk_tglmutasi', 'msk tglmutasi', 'trim|required');
	$this->form_validation->set_rules('msk_asal', 'msk asal', 'trim|required');
	$this->form_validation->set_rules('msk_tujuan', 'msk tujuan', 'trim|required');
	$this->form_validation->set_rules('msk_status', 'msk status', 'trim|required');
	$this->form_validation->set_rules('msk_tgl', 'msk tgl', 'trim|required');
	$this->form_validation->set_rules('msk_flag', 'msk flag', 'trim|required');
	$this->form_validation->set_rules('msk_info', 'msk info', 'trim|required');

	$this->form_validation->set_rules('msk_id', 'msk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mutasisimkesan.php */
/* Location: ./application/controllers/Mutasisimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:20 */
/* http://harviacode.com */