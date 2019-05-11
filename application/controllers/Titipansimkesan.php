<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Titipansimkesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Titipansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'titipansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'titipansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'titipansimkesan/index.html';
            $config['first_url'] = base_url() . 'titipansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Titipansimkesan_model->total_rows($q);
        $titipansimkesan = $this->Titipansimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'titipansimkesan_data' => $titipansimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/titipansimkesan/titipansimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'titipansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'titipansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'titipansimkesan/index.html';
            $config['first_url'] = base_url() . 'titipansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Titipansimkesan_model->total_rows($q);
        $titipansimkesan = $this->Titipansimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'titipansimkesan_data' => $titipansimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/titipansimkesan/titipansimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Titipansimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tts_id' => $row->tts_id,
		'sik_kode' => $row->sik_kode,
		'tts_tgltitip' => $row->tts_tgltitip,
		'tts_jmltitip' => $row->tts_jmltitip,
		'tts_jmlambil' => $row->tts_jmlambil,
		'tts_status' => $row->tts_status,
		'tts_tgl' => $row->tts_tgl,
		'tts_flag' => $row->tts_flag,
		'tts_info' => $row->tts_info,'content' => 'backend/titipansimkesan/titipansimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titipansimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('titipansimkesan/create_action'),
	    'tts_id' => set_value('tts_id'),
	    'sik_kode' => set_value('sik_kode'),
	    'nm_sik_kode' => set_value('nm_sik_kode'),
	    'tts_tgltitip' => set_value('tts_tgltitip'),
	    'tts_jmltitip' => set_value('tts_jmltitip'),
	    'tts_jmlambil' => set_value('tts_jmlambil'),
	    'tts_status' => set_value('tts_status'),
	    'content' => 'backend/titipansimkesan/titipansimkesan_form',
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
		'tts_tgltitip' => $this->input->post('tts_tgltitip',TRUE),
		'tts_jmltitip' => $this->input->post('tts_jmltitip',TRUE),
		'tts_jmlambil' => $this->input->post('tts_jmlambil',TRUE),
		'tts_status' => $this->input->post('tts_status',TRUE),
		'tts_tgl' => $this->tgl,
		'tts_flag' => 0,
		'tts_info' => "",
	    );

            $this->Titipansimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('titipansimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Titipansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('titipansimkesan/update_action'),
		'tts_id' => set_value('tts_id', $row->tts_id),
		'sik_kode' => set_value('sik_kode', $row->sik_kode),
		'nm_sik_kode' => set_value('nm_sik_kode', $row->sik_kode),
		'tts_tgltitip' => set_value('tts_tgltitip', $row->tts_tgltitip),
		'tts_jmltitip' => set_value('tts_jmltitip', $row->tts_jmltitip),
		'tts_jmlambil' => set_value('tts_jmlambil', $row->tts_jmlambil),
		'tts_status' => set_value('tts_status', $row->tts_status),
	    'content' => 'backend/titipansimkesan/titipansimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titipansimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tts_id', TRUE));
        } else {
            $data = array(
		'sik_kode' => $this->input->post('sik_kode',TRUE),
		'tts_tgltitip' => $this->input->post('tts_tgltitip',TRUE),
		'tts_jmltitip' => $this->input->post('tts_jmltitip',TRUE),
		'tts_jmlambil' => $this->input->post('tts_jmlambil',TRUE),
		'tts_status' => $this->input->post('tts_status',TRUE),
		'tts_flag' => 1,
	    );

            $this->Titipansimkesan_model->update($this->input->post('tts_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('titipansimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Titipansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'tts_flag' => 2,
            );
            $this->Titipansimkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('titipansimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titipansimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('tts_tgltitip', 'tts tgltitip', 'trim|required');
	$this->form_validation->set_rules('tts_jmltitip', 'tts jmltitip', 'trim|required');
	$this->form_validation->set_rules('tts_jmlambil', 'tts jmlambil', 'trim|required');
	$this->form_validation->set_rules('tts_status', 'tts status', 'trim|required');

	$this->form_validation->set_rules('tts_id', 'tts_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Titipansimkesan.php */
/* Location: ./application/controllers/Titipansimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-29 13:53:56 */
/* http://harviacode.com */