<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neracakasbank extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Neracakasbank_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $neracakasbank = $this->Neracakasbank_model->get_limit_data( $start, $q);

        $data = array(
            'neracakasbank_data' => $neracakasbank,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakasbank/neracakasbank_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');

        $neracakasbank = $this->Neracakasbank_model->get_limit_data($start, $q);


        $data = array(
            'neracakasbank_data' => $neracakasbank,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakasbank/neracakasbank_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Neracakasbank_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nkb_id' => $row->nkb_id,
		'nkb_tanggal' => $row->nkb_tanggal,
		'nkb_jumlah' => $row->nkb_jumlah,
		'nkb_tgl' => $row->nkb_tgl,
		'nkb_flag' => $row->nkb_flag,
		'nkb_info' => $row->nkb_info,'content' => 'backend/neracakasbank/neracakasbank_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbank'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('neracakasbank/create_action'),
	    'nkb_id' => set_value('nkb_id'),
	    'nkb_tanggal' => set_value('nkb_tanggal'),
	    'nkb_jumlah' => set_value('nkb_jumlah'),
	    'content' => 'backend/neracakasbank/neracakasbank_form',
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
		'nkb_tanggal' => $this->input->post('nkb_tanggal',TRUE),
		'nkb_jumlah' => $this->input->post('nkb_jumlah',TRUE),
		'nkb_tgl' => $this->tgl,
		'nkb_flag' => 0,
		'nkb_info' => "",
	    );

            $this->Neracakasbank_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('neracakasbank'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Neracakasbank_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('neracakasbank/update_action'),
		'nkb_id' => set_value('nkb_id', $row->nkb_id),
		'nkb_tanggal' => set_value('nkb_tanggal', $row->nkb_tanggal),
		'nkb_jumlah' => set_value('nkb_jumlah', $row->nkb_jumlah),
	    'content' => 'backend/neracakasbank/neracakasbank_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbank'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nkb_id', TRUE));
        } else {
            $data = array(
		'nkb_tanggal' => $this->input->post('nkb_tanggal',TRUE),
		'nkb_jumlah' => $this->input->post('nkb_jumlah',TRUE),
		'nkb_flag' => 1,
	    );

            $this->Neracakasbank_model->update($this->input->post('nkb_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('neracakasbank'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Neracakasbank_model->get_by_id($id);

        if ($row) {
            $data = array (
                'nkb_flag' => 2,
            );
            $this->Neracakasbank_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('neracakasbank'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakasbank'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nkb_tanggal', 'nkb tanggal', 'trim|required');
	$this->form_validation->set_rules('nkb_jumlah', 'nkb jumlah', 'trim|required');

	$this->form_validation->set_rules('nkb_id', 'nkb_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Neracakasbank.php */
/* Location: ./application/controllers/Neracakasbank.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-09 06:23:53 */
/* http://harviacode.com */