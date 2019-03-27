<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statuspeminjam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Statuspeminjam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'statuspeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'statuspeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'statuspeminjam/index.html';
            $config['first_url'] = base_url() . 'statuspeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Statuspeminjam_model->total_rows($q);
        $statuspeminjam = $this->Statuspeminjam_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'statuspeminjam_data' => $statuspeminjam,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/statuspeminjam/statuspeminjam_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'statuspeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'statuspeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'statuspeminjam/index.html';
            $config['first_url'] = base_url() . 'statuspeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Statuspeminjam_model->total_rows($q);
        $statuspeminjam = $this->Statuspeminjam_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'statuspeminjam_data' => $statuspeminjam,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/statuspeminjam/statuspeminjam_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Statuspeminjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'stp_id' => $row->stp_id,
		'ang_no' => $row->ang_no,
		'ssp_id' => $row->ssp_id,
		'pin_id' => $row->pin_id,
		'stp_tgl' => $row->stp_tgl,
		'stp_flag' => $row->stp_flag,
		'stp_info' => $row->stp_info,'content' => 'backend/statuspeminjam/statuspeminjam_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuspeminjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statuspeminjam/create_action'),
	    'stp_id' => set_value('stp_id'),
	    'ang_no' => set_value('ang_no'),
	    'ssp_id' => set_value('ssp_id'),
	    'pin_id' => set_value('pin_id'),
	    'stp_tgl' => set_value('stp_tgl'),
	    'stp_flag' => set_value('stp_flag'),
	    'stp_info' => set_value('stp_info'),
	    'content' => 'backend/statuspeminjam/statuspeminjam_form',
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
		'ang_no' => $this->input->post('ang_no',TRUE),
		'ssp_id' => $this->input->post('ssp_id',TRUE),
		'pin_id' => $this->input->post('pin_id',TRUE),
		'stp_tgl' => $this->input->post('stp_tgl',TRUE),
		'stp_flag' => $this->input->post('stp_flag',TRUE),
		'stp_info' => $this->input->post('stp_info',TRUE),
	    );

            $this->Statuspeminjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('statuspeminjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Statuspeminjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statuspeminjam/update_action'),
		'stp_id' => set_value('stp_id', $row->stp_id),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'ssp_id' => set_value('ssp_id', $row->ssp_id),
		'pin_id' => set_value('pin_id', $row->pin_id),
		'stp_tgl' => set_value('stp_tgl', $row->stp_tgl),
		'stp_flag' => set_value('stp_flag', $row->stp_flag),
		'stp_info' => set_value('stp_info', $row->stp_info),
	    'content' => 'backend/statuspeminjam/statuspeminjam_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuspeminjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('stp_id', TRUE));
        } else {
            $data = array(
		'ang_no' => $this->input->post('ang_no',TRUE),
		'ssp_id' => $this->input->post('ssp_id',TRUE),
		'pin_id' => $this->input->post('pin_id',TRUE),
		'stp_tgl' => $this->input->post('stp_tgl',TRUE),
		'stp_flag' => $this->input->post('stp_flag',TRUE),
		'stp_info' => $this->input->post('stp_info',TRUE),
	    );

            $this->Statuspeminjam_model->update($this->input->post('stp_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statuspeminjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Statuspeminjam_model->get_by_id($id);

        if ($row) {
            $this->Statuspeminjam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statuspeminjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuspeminjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('ssp_id', 'ssp id', 'trim|required');
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('stp_tgl', 'stp tgl', 'trim|required');
	$this->form_validation->set_rules('stp_flag', 'stp flag', 'trim|required');
	$this->form_validation->set_rules('stp_info', 'stp info', 'trim|required');

	$this->form_validation->set_rules('stp_id', 'stp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Statuspeminjam.php */
/* Location: ./application/controllers/Statuspeminjam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:58 */
/* http://harviacode.com */