<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phusimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Phusimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $phusimkesan = $this->Phusimkesan_model->get_limit_data($start, $q);

        $data = array(
            'phusimkesan_data' => $phusimkesan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phusimkesan/phusimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        $phusimkesan = $this->Phusimkesan_model->get_limit_data($start, $q);


        $data = array(
            'phusimkesan_data' => $phusimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phusimkesan/phusimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Phusimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'phus_id' => $row->phus_id,
		'phus_insentif' => $row->phus_insentif,
		'phus_gaji' => $row->phus_gaji,
		'phus_promosi' => $row->phus_promosi,
		'phus_lainlain' => $row->phus_lainlain,
		'phus_tgl' => $row->phus_tgl,
		'phus_flag' => $row->phus_flag,
		'phus_info' => $row->phus_info,'content' => 'backend/phusimkesan/phusimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('phusimkesan/create_action'),
	    'phus_id' => set_value('phus_id'),
	    'phus_insentif' => set_value('phus_insentif'),
	    'phus_gaji' => set_value('phus_gaji'),
	    'phus_promosi' => set_value('phus_promosi'),
	    'phus_lainlain' => set_value('phus_lainlain'),
	    'content' => 'backend/phusimkesan/phusimkesan_form',
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
		'phus_insentif' => $this->input->post('phus_insentif',TRUE),
		'phus_gaji' => $this->input->post('phus_gaji',TRUE),
		'phus_promosi' => $this->input->post('phus_promosi',TRUE),
		'phus_lainlain' => $this->input->post('phus_lainlain',TRUE),
		'phus_tgl' => $this->tgl,
		'phus_flag' => 0,
		'phus_info' => "",
	    );

            $this->Phusimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('phusimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Phusimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('phusimkesan/update_action'),
		'phus_id' => set_value('phus_id', $row->phus_id),
		'phus_insentif' => set_value('phus_insentif', $row->phus_insentif),
		'phus_gaji' => set_value('phus_gaji', $row->phus_gaji),
		'phus_promosi' => set_value('phus_promosi', $row->phus_promosi),
		'phus_lainlain' => set_value('phus_lainlain', $row->phus_lainlain),
	    'content' => 'backend/phusimkesan/phusimkesan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('phus_id', TRUE));
        } else {
            $data = array(
		'phus_insentif' => $this->input->post('phus_insentif',TRUE),
		'phus_gaji' => $this->input->post('phus_gaji',TRUE),
		'phus_promosi' => $this->input->post('phus_promosi',TRUE),
		'phus_lainlain' => $this->input->post('phus_lainlain',TRUE),
		'phus_flag' => 1,
	    );

            $this->Phusimkesan_model->update($this->input->post('phus_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('phusimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Phusimkesan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'phus_flag' => 2,
            );
            $this->Phusimkesan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('phusimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('phus_insentif', 'phus insentif', 'trim|required');
	$this->form_validation->set_rules('phus_gaji', 'phus gaji', 'trim|required');
	$this->form_validation->set_rules('phus_id', 'phus_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Phusimkesan.php */
/* Location: ./application/controllers/Phusimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-30 14:37:22 */
/* http://harviacode.com */