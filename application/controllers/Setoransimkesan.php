<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setoransimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html';
            $config['first_url'] = base_url() . 'setoransimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimkesan_model->total_rows($q);
        $setoransimkesan = $this->Setoransimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimkesan/setoransimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html';
            $config['first_url'] = base_url() . 'setoransimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimkesan_model->total_rows($q);
        $setoransimkesan = $this->Setoransimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimkesan/setoransimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ssk_id' => $row->ssk_id,
		'sik_kode' => $row->sik_kode,
		'ssk_tglsetoran' => $row->ssk_tglsetoran,
		'ssk_tglbayar' => $row->ssk_tglbayar,
		'ssk_jmlsetor' => $row->ssk_jmlsetor,
		'ssk_status' => $row->ssk_status,
		'ssk_tgl' => $row->ssk_tgl,
		'ssk_flag' => $row->ssk_flag,
		'ssk_info' => $row->ssk_info,'content' => 'backend/setoransimkesan/setoransimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setoransimkesan/create_action'),
	    'ssk_id' => set_value('ssk_id'),
	    'sik_kode' => set_value('sik_kode'),
	    'ssk_tglsetoran' => set_value('ssk_tglsetoran'),
	    'ssk_tglbayar' => set_value('ssk_tglbayar'),
	    'ssk_jmlsetor' => set_value('ssk_jmlsetor'),
	    'ssk_status' => set_value('ssk_status'),
	    'ssk_tgl' => set_value('ssk_tgl'),
	    'ssk_flag' => set_value('ssk_flag'),
	    'ssk_info' => set_value('ssk_info'),
	    'content' => 'backend/setoransimkesan/setoransimkesan_form',
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
		'ssk_tglsetoran' => $this->input->post('ssk_tglsetoran',TRUE),
		'ssk_tglbayar' => $this->input->post('ssk_tglbayar',TRUE),
		'ssk_jmlsetor' => $this->input->post('ssk_jmlsetor',TRUE),
		'ssk_status' => $this->input->post('ssk_status',TRUE),
		'ssk_tgl' => $this->input->post('ssk_tgl',TRUE),
		'ssk_flag' => $this->input->post('ssk_flag',TRUE),
		'ssk_info' => $this->input->post('ssk_info',TRUE),
	    );

            $this->Setoransimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setoransimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setoransimkesan/update_action'),
		'ssk_id' => set_value('ssk_id', $row->ssk_id),
		'sik_kode' => set_value('sik_kode', $row->sik_kode),
		'ssk_tglsetoran' => set_value('ssk_tglsetoran', $row->ssk_tglsetoran),
		'ssk_tglbayar' => set_value('ssk_tglbayar', $row->ssk_tglbayar),
		'ssk_jmlsetor' => set_value('ssk_jmlsetor', $row->ssk_jmlsetor),
		'ssk_status' => set_value('ssk_status', $row->ssk_status),
		'ssk_tgl' => set_value('ssk_tgl', $row->ssk_tgl),
		'ssk_flag' => set_value('ssk_flag', $row->ssk_flag),
		'ssk_info' => set_value('ssk_info', $row->ssk_info),
	    'content' => 'backend/setoransimkesan/setoransimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ssk_id', TRUE));
        } else {
            $data = array(
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'ssk_tglsetoran' => $this->input->post('ssk_tglsetoran',TRUE),
		'ssk_tglbayar' => $this->input->post('ssk_tglbayar',TRUE),
		'ssk_jmlsetor' => $this->input->post('ssk_jmlsetor',TRUE),
		'ssk_status' => $this->input->post('ssk_status',TRUE),
		'ssk_tgl' => $this->input->post('ssk_tgl',TRUE),
		'ssk_flag' => $this->input->post('ssk_flag',TRUE),
		'ssk_info' => $this->input->post('ssk_info',TRUE),
	    );

            $this->Setoransimkesan_model->update($this->input->post('ssk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setoransimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);

        if ($row) {
            $this->Setoransimkesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setoransimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('ssk_tglsetoran', 'ssk tglsetoran', 'trim|required');
	$this->form_validation->set_rules('ssk_tglbayar', 'ssk tglbayar', 'trim|required');
	$this->form_validation->set_rules('ssk_jmlsetor', 'ssk jmlsetor', 'trim|required');
	$this->form_validation->set_rules('ssk_status', 'ssk status', 'trim|required');
	$this->form_validation->set_rules('ssk_tgl', 'ssk tgl', 'trim|required');
	$this->form_validation->set_rules('ssk_flag', 'ssk flag', 'trim|required');
	$this->form_validation->set_rules('ssk_info', 'ssk info', 'trim|required');

	$this->form_validation->set_rules('ssk_id', 'ssk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setoransimkesan.php */
/* Location: ./application/controllers/Setoransimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:13 */
/* http://harviacode.com */