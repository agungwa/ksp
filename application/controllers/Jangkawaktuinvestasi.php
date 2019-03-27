<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jangkawaktuinvestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jangkawaktuinvestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jangkawaktuinvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jangkawaktuinvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jangkawaktuinvestasi/index.html';
            $config['first_url'] = base_url() . 'jangkawaktuinvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jangkawaktuinvestasi_model->total_rows($q);
        $jangkawaktuinvestasi = $this->Jangkawaktuinvestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jangkawaktuinvestasi_data' => $jangkawaktuinvestasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jangkawaktuinvestasi/jangkawaktuinvestasi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jangkawaktuinvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jangkawaktuinvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jangkawaktuinvestasi/index.html';
            $config['first_url'] = base_url() . 'jangkawaktuinvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jangkawaktuinvestasi_model->total_rows($q);
        $jangkawaktuinvestasi = $this->Jangkawaktuinvestasi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jangkawaktuinvestasi_data' => $jangkawaktuinvestasi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jangkawaktuinvestasi/jangkawaktuinvestasi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jangkawaktuinvestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jwi_id' => $row->jwi_id,
		'jwi_jangkawaktu' => $row->jwi_jangkawaktu,
		'jwi_keterangan' => $row->jwi_keterangan,
		'jwi_tgl' => $row->jwi_tgl,
		'jwi_flag' => $row->jwi_flag,
		'jwi_info' => $row->jwi_info,'content' => 'backend/jangkawaktuinvestasi/jangkawaktuinvestasi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jangkawaktuinvestasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jangkawaktuinvestasi/create_action'),
	    'jwi_id' => set_value('jwi_id'),
	    'jwi_jangkawaktu' => set_value('jwi_jangkawaktu'),
	    'jwi_keterangan' => set_value('jwi_keterangan'),
	    'jwi_tgl' => set_value('jwi_tgl'),
	    'jwi_flag' => set_value('jwi_flag'),
	    'jwi_info' => set_value('jwi_info'),
	    'content' => 'backend/jangkawaktuinvestasi/jangkawaktuinvestasi_form',
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
		'jwi_jangkawaktu' => $this->input->post('jwi_jangkawaktu',TRUE),
		'jwi_keterangan' => $this->input->post('jwi_keterangan',TRUE),
		'jwi_tgl' => $this->input->post('jwi_tgl',TRUE),
		'jwi_flag' => $this->input->post('jwi_flag',TRUE),
		'jwi_info' => $this->input->post('jwi_info',TRUE),
	    );

            $this->Jangkawaktuinvestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jangkawaktuinvestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jangkawaktuinvestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jangkawaktuinvestasi/update_action'),
		'jwi_id' => set_value('jwi_id', $row->jwi_id),
		'jwi_jangkawaktu' => set_value('jwi_jangkawaktu', $row->jwi_jangkawaktu),
		'jwi_keterangan' => set_value('jwi_keterangan', $row->jwi_keterangan),
		'jwi_tgl' => set_value('jwi_tgl', $row->jwi_tgl),
		'jwi_flag' => set_value('jwi_flag', $row->jwi_flag),
		'jwi_info' => set_value('jwi_info', $row->jwi_info),
	    'content' => 'backend/jangkawaktuinvestasi/jangkawaktuinvestasi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jangkawaktuinvestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jwi_id', TRUE));
        } else {
            $data = array(
		'jwi_jangkawaktu' => $this->input->post('jwi_jangkawaktu',TRUE),
		'jwi_keterangan' => $this->input->post('jwi_keterangan',TRUE),
		'jwi_tgl' => $this->input->post('jwi_tgl',TRUE),
		'jwi_flag' => $this->input->post('jwi_flag',TRUE),
		'jwi_info' => $this->input->post('jwi_info',TRUE),
	    );

            $this->Jangkawaktuinvestasi_model->update($this->input->post('jwi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jangkawaktuinvestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jangkawaktuinvestasi_model->get_by_id($id);

        if ($row) {
            $this->Jangkawaktuinvestasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jangkawaktuinvestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jangkawaktuinvestasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jwi_jangkawaktu', 'jwi jangkawaktu', 'trim|required');
	$this->form_validation->set_rules('jwi_keterangan', 'jwi keterangan', 'trim|required');
	$this->form_validation->set_rules('jwi_tgl', 'jwi tgl', 'trim|required');
	$this->form_validation->set_rules('jwi_flag', 'jwi flag', 'trim|required');
	$this->form_validation->set_rules('jwi_info', 'jwi info', 'trim|required');

	$this->form_validation->set_rules('jwi_id', 'jwi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jangkawaktuinvestasi.php */
/* Location: ./application/controllers/Jangkawaktuinvestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:24 */
/* http://harviacode.com */