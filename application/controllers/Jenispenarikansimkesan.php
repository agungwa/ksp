<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispenarikansimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenispenarikansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispenarikansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispenarikansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispenarikansimkesan/index.html';
            $config['first_url'] = base_url() . 'jenispenarikansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispenarikansimkesan_model->total_rows($q);
        $jenispenarikansimkesan = $this->Jenispenarikansimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenispenarikansimkesan_data' => $jenispenarikansimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenispenarikansimkesan/jenispenarikansimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispenarikansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispenarikansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispenarikansimkesan/index.html';
            $config['first_url'] = base_url() . 'jenispenarikansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispenarikansimkesan_model->total_rows($q);
        $jenispenarikansimkesan = $this->Jenispenarikansimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenispenarikansimkesan_data' => $jenispenarikansimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenispenarikansimkesan/jenispenarikansimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenispenarikansimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jps_id' => $row->jps_id,
		'jps_jenis' => $row->jps_jenis,
		'jps_administrasi' => $row->jps_administrasi,
		'jps_persenpenarikan' => $row->jps_persenpenarikan,
		'jps_tgl' => $row->jps_tgl,
		'jps_flag' => $row->jps_flag,
		'jps_info' => $row->jps_info,'content' => 'backend/jenispenarikansimkesan/jenispenarikansimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispenarikansimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispenarikansimkesan/create_action'),
	    'jps_id' => set_value('jps_id'),
	    'jps_jenis' => set_value('jps_jenis'),
	    'jps_administrasi' => set_value('jps_administrasi'),
	    'jps_persenpenarikan' => set_value('jps_persenpenarikan'),
	    'jps_tgl' => set_value('jps_tgl'),
	    'jps_flag' => set_value('jps_flag'),
	    'jps_info' => set_value('jps_info'),
	    'content' => 'backend/jenispenarikansimkesan/jenispenarikansimkesan_form',
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
		'jps_jenis' => $this->input->post('jps_jenis',TRUE),
		'jps_administrasi' => $this->input->post('jps_administrasi',TRUE),
		'jps_persenpenarikan' => $this->input->post('jps_persenpenarikan',TRUE),
		'jps_tgl' => $this->input->post('jps_tgl',TRUE),
		'jps_flag' => $this->input->post('jps_flag',TRUE),
		'jps_info' => $this->input->post('jps_info',TRUE),
	    );

            $this->Jenispenarikansimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenispenarikansimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenispenarikansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispenarikansimkesan/update_action'),
		'jps_id' => set_value('jps_id', $row->jps_id),
		'jps_jenis' => set_value('jps_jenis', $row->jps_jenis),
		'jps_administrasi' => set_value('jps_administrasi', $row->jps_administrasi),
		'jps_persenpenarikan' => set_value('jps_persenpenarikan', $row->jps_persenpenarikan),
		'jps_tgl' => set_value('jps_tgl', $row->jps_tgl),
		'jps_flag' => set_value('jps_flag', $row->jps_flag),
		'jps_info' => set_value('jps_info', $row->jps_info),
	    'content' => 'backend/jenispenarikansimkesan/jenispenarikansimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispenarikansimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jps_id', TRUE));
        } else {
            $data = array(
		'jps_jenis' => $this->input->post('jps_jenis',TRUE),
		'jps_administrasi' => $this->input->post('jps_administrasi',TRUE),
		'jps_persenpenarikan' => $this->input->post('jps_persenpenarikan',TRUE),
		'jps_tgl' => $this->input->post('jps_tgl',TRUE),
		'jps_flag' => $this->input->post('jps_flag',TRUE),
		'jps_info' => $this->input->post('jps_info',TRUE),
	    );

            $this->Jenispenarikansimkesan_model->update($this->input->post('jps_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispenarikansimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenispenarikansimkesan_model->get_by_id($id);

        if ($row) {
            $this->Jenispenarikansimkesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispenarikansimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispenarikansimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jps_jenis', 'jps jenis', 'trim|required');
	$this->form_validation->set_rules('jps_administrasi', 'jps administrasi', 'trim|required');
	$this->form_validation->set_rules('jps_persenpenarikan', 'jps persenpenarikan', 'trim|required');
	$this->form_validation->set_rules('jps_tgl', 'jps tgl', 'trim|required');
	$this->form_validation->set_rules('jps_flag', 'jps flag', 'trim|required');
	$this->form_validation->set_rules('jps_info', 'jps info', 'trim|required');

	$this->form_validation->set_rules('jps_id', 'jps_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenispenarikansimkesan.php */
/* Location: ./application/controllers/Jenispenarikansimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:57 */
/* http://harviacode.com */