<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikansimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimkesan/index.html';
            $config['first_url'] = base_url() . 'penarikansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimkesan_model->total_rows($q);
        $penarikansimkesan = $this->Penarikansimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penarikansimkesan_data' => $penarikansimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimkesan/penarikansimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimkesan/index.html';
            $config['first_url'] = base_url() . 'penarikansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimkesan_model->total_rows($q);
        $penarikansimkesan = $this->Penarikansimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penarikansimkesan_data' => $penarikansimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimkesan/penarikansimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penarikansimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pns_id' => $row->pns_id,
		'sik_kode' => $row->sik_kode,
		'jps_id' => $row->jps_id,
		'pns_tglpenarikan' => $row->pns_tglpenarikan,
		'pns_jmlsimkesan' => $row->pns_jmlsimkesan,
		'pns_jmlpenarikan' => $row->pns_jmlpenarikan,
		'pns_catatan' => $row->pns_catatan,
		'pns_tgl' => $row->pns_tgl,
		'pns_flag' => $row->pns_flag,
		'pns_info' => $row->pns_info,'content' => 'backend/penarikansimkesan/penarikansimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penarikansimkesan/create_action'),
	    'pns_id' => set_value('pns_id'),
	    'sik_kode' => set_value('sik_kode'),
	    'jps_id' => set_value('jps_id'),
	    'pns_tglpenarikan' => set_value('pns_tglpenarikan'),
	    'pns_jmlsimkesan' => set_value('pns_jmlsimkesan'),
	    'pns_jmlpenarikan' => set_value('pns_jmlpenarikan'),
	    'pns_catatan' => set_value('pns_catatan'),
	    'pns_tgl' => set_value('pns_tgl'),
	    'pns_flag' => set_value('pns_flag'),
	    'pns_info' => set_value('pns_info'),
	    'content' => 'backend/penarikansimkesan/penarikansimkesan_form',
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
		'pns_id' => $this->input->post('pns_id',TRUE),
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'jps_id' => $this->input->post('jps_id',TRUE),
		'pns_tglpenarikan' => $this->input->post('pns_tglpenarikan',TRUE),
		'pns_jmlsimkesan' => $this->input->post('pns_jmlsimkesan',TRUE),
		'pns_jmlpenarikan' => $this->input->post('pns_jmlpenarikan',TRUE),
		'pns_catatan' => $this->input->post('pns_catatan',TRUE),
		'pns_tgl' => $this->input->post('pns_tgl',TRUE),
		'pns_flag' => $this->input->post('pns_flag',TRUE),
		'pns_info' => $this->input->post('pns_info',TRUE),
	    );

            $this->Penarikansimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penarikansimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penarikansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penarikansimkesan/update_action'),
		'pns_id' => set_value('pns_id', $row->pns_id),
		'sik_kode' => set_value('sik_kode', $row->sik_kode),
		'jps_id' => set_value('jps_id', $row->jps_id),
		'pns_tglpenarikan' => set_value('pns_tglpenarikan', $row->pns_tglpenarikan),
		'pns_jmlsimkesan' => set_value('pns_jmlsimkesan', $row->pns_jmlsimkesan),
		'pns_jmlpenarikan' => set_value('pns_jmlpenarikan', $row->pns_jmlpenarikan),
		'pns_catatan' => set_value('pns_catatan', $row->pns_catatan),
		'pns_tgl' => set_value('pns_tgl', $row->pns_tgl),
		'pns_flag' => set_value('pns_flag', $row->pns_flag),
		'pns_info' => set_value('pns_info', $row->pns_info),
	    'content' => 'backend/penarikansimkesan/penarikansimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'pns_id' => $this->input->post('pns_id',TRUE),
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'jps_id' => $this->input->post('jps_id',TRUE),
		'pns_tglpenarikan' => $this->input->post('pns_tglpenarikan',TRUE),
		'pns_jmlsimkesan' => $this->input->post('pns_jmlsimkesan',TRUE),
		'pns_jmlpenarikan' => $this->input->post('pns_jmlpenarikan',TRUE),
		'pns_catatan' => $this->input->post('pns_catatan',TRUE),
		'pns_tgl' => $this->input->post('pns_tgl',TRUE),
		'pns_flag' => $this->input->post('pns_flag',TRUE),
		'pns_info' => $this->input->post('pns_info',TRUE),
	    );

            $this->Penarikansimkesan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penarikansimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penarikansimkesan_model->get_by_id($id);

        if ($row) {
            $this->Penarikansimkesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penarikansimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pns_id', 'pns id', 'trim|required');
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('jps_id', 'jps id', 'trim|required');
	$this->form_validation->set_rules('pns_tglpenarikan', 'pns tglpenarikan', 'trim|required');
	$this->form_validation->set_rules('pns_jmlsimkesan', 'pns jmlsimkesan', 'trim|required');
	$this->form_validation->set_rules('pns_jmlpenarikan', 'pns jmlpenarikan', 'trim|required');
	$this->form_validation->set_rules('pns_catatan', 'pns catatan', 'trim|required');
	$this->form_validation->set_rules('pns_tgl', 'pns tgl', 'trim|required');
	$this->form_validation->set_rules('pns_flag', 'pns flag', 'trim|required');
	$this->form_validation->set_rules('pns_info', 'pns info', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penarikansimkesan.php */
/* Location: ./application/controllers/Penarikansimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:01 */
/* http://harviacode.com */