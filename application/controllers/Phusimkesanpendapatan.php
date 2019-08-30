<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phusimkesanpendapatan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Phusimkesanpendapatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $phusimkesanpendapatan = $this->Phusimkesanpendapatan_model->get_limit_data($start, $q);

        $data = array(
            'phusimkesanpendapatan_data' => $phusimkesanpendapatan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phusimkesanpendapatan/phusimkesanpendapatan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
      
        $phusimkesanpendapatan = $this->Phusimkesanpendapatan_model->get_limit_data( $start, $q);


        $data = array(
            'phusimkesanpendapatan_data' => $phusimkesanpendapatan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phusimkesanpendapatan/phusimkesanpendapatan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Phusimkesanpendapatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'phsp_id' => $row->phsp_id,
		'phsp_klaim' => $row->phsp_klaim,
		'phsp_tarik' => $row->phsp_tarik,
		'phsp_gugur' => $row->phsp_gugur,
		'phsp_administrasi' => $row->phsp_administrasi,
		'phsp_lainlain' => $row->phsp_lainlain,
		'phsp_tgl' => $row->phsp_tgl,
		'phsp_flag' => $row->phsp_flag,
		'phsp_info' => $row->phsp_info,'content' => 'backend/phusimkesanpendapatan/phusimkesanpendapatan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesanpendapatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('phusimkesanpendapatan/create_action'),
	    'phsp_id' => set_value('phsp_id'),
	    'phsp_klaim' => set_value('phsp_klaim'),
	    'phsp_tarik' => set_value('phsp_tarik'),
	    'phsp_gugur' => set_value('phsp_gugur'),
	    'phsp_administrasi' => set_value('phsp_administrasi'),
	    'phsp_lainlain' => set_value('phsp_lainlain'),
	    'content' => 'backend/phusimkesanpendapatan/phusimkesanpendapatan_form',
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
		'phsp_klaim' => $this->input->post('phsp_klaim',TRUE),
		'phsp_tarik' => $this->input->post('phsp_tarik',TRUE),
		'phsp_gugur' => $this->input->post('phsp_gugur',TRUE),
		'phsp_administrasi' => $this->input->post('phsp_administrasi',TRUE),
		'phsp_lainlain' => $this->input->post('phsp_lainlain',TRUE),
		'phsp_tgl' => $this->tgl,
		'phsp_flag' => 0,
		'phsp_info' => "",
	    );

            $this->Phusimkesanpendapatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('phusimkesanpendapatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Phusimkesanpendapatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('phusimkesanpendapatan/update_action'),
		'phsp_id' => set_value('phsp_id', $row->phsp_id),
		'phsp_klaim' => set_value('phsp_klaim', $row->phsp_klaim),
		'phsp_tarik' => set_value('phsp_tarik', $row->phsp_tarik),
		'phsp_gugur' => set_value('phsp_gugur', $row->phsp_gugur),
		'phsp_administrasi' => set_value('phsp_administrasi', $row->phsp_administrasi),
		'phsp_lainlain' => set_value('phsp_lainlain', $row->phsp_lainlain),
	    'content' => 'backend/phusimkesanpendapatan/phusimkesanpendapatan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesanpendapatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('phsp_id', TRUE));
        } else {
            $data = array(
		'phsp_klaim' => $this->input->post('phsp_klaim',TRUE),
		'phsp_tarik' => $this->input->post('phsp_tarik',TRUE),
		'phsp_gugur' => $this->input->post('phsp_gugur',TRUE),
		'phsp_administrasi' => $this->input->post('phsp_administrasi',TRUE),
		'phsp_lainlain' => $this->input->post('phsp_lainlain',TRUE),
		'phsp_flag' => 1,
	    );

            $this->Phusimkesanpendapatan_model->update($this->input->post('phsp_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('phusimkesanpendapatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Phusimkesanpendapatan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'phsp_flag' => 2,
            );
            $this->Phusimkesanpendapatan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('phusimkesanpendapatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phusimkesanpendapatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('phsp_klaim', 'phsp klaim', 'trim|required');
	$this->form_validation->set_rules('phsp_tarik', 'phsp tarik', 'trim|required');
	$this->form_validation->set_rules('phsp_gugur', 'phsp gugur', 'trim|required');
	$this->form_validation->set_rules('phsp_administrasi', 'phsp administrasi', 'trim|required');

	$this->form_validation->set_rules('phsp_id', 'phsp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Phusimkesanpendapatan.php */
/* Location: ./application/controllers/Phusimkesanpendapatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-30 16:25:51 */
/* http://harviacode.com */