<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenissimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenissimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenissimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenissimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenissimpanan/index.html';
            $config['first_url'] = base_url() . 'jenissimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenissimpanan_model->total_rows($q);
        $jenissimpanan = $this->Jenissimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenissimpanan_data' => $jenissimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenissimpanan/jenissimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenissimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenissimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenissimpanan/index.html';
            $config['first_url'] = base_url() . 'jenissimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenissimpanan_model->total_rows($q);
        $jenissimpanan = $this->Jenissimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenissimpanan_data' => $jenissimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenissimpanan/jenissimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenissimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jsi_id' => $row->jsi_id,
		'jsi_simpanan' => $row->jsi_simpanan,
		'jsi_keterangan' => $row->jsi_keterangan,
		'jsi_tgl' => $row->jsi_tgl,
		'jsi_flag' => $row->jsi_flag,
		'jsi_info' => $row->jsi_info,'content' => 'backend/jenissimpanan/jenissimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('jenissimpanan/create_action'),
	    'jsi_id' => set_value('jsi_id'),
	    'jsi_simpanan' => set_value('jsi_simpanan'),
	    'jsi_keterangan' => set_value('jsi_keterangan'),
	    'content' => 'backend/jenissimpanan/jenissimpanan_form',
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
		'jsi_simpanan' => $this->input->post('jsi_simpanan',TRUE),
		'jsi_keterangan' => $this->input->post('jsi_keterangan',TRUE),
		'jsi_tgl' => $this->tgl,
		'jsi_flag' => 0,
		'jsi_info' => "",
	    );

            $this->Jenissimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenissimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenissimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenissimpanan/update_action'),
		'jsi_id' => set_value('jsi_id', $row->jsi_id),
		'jsi_simpanan' => set_value('jsi_simpanan', $row->jsi_simpanan),
		'jsi_keterangan' => set_value('jsi_keterangan', $row->jsi_keterangan),
	    'content' => 'backend/jenissimpanan/jenissimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jsi_id', TRUE));
        } else {
            $data = array(
		'jsi_simpanan' => $this->input->post('jsi_simpanan',TRUE),
		'jsi_keterangan' => $this->input->post('jsi_keterangan',TRUE),
		'jsi_flag' => 1,
	    );

            $this->Jenissimpanan_model->update($this->input->post('jsi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenissimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenissimpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'jsi_flag' => 2,
            );
            
            $this->Jenissimpanan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenissimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jsi_simpanan', 'jsi simpanan', 'trim|required');
	$this->form_validation->set_rules('jsi_keterangan', 'jsi keterangan', 'trim|required');
	$this->form_validation->set_rules('jsi_id', 'jsi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenissimpanan.php */
/* Location: ./application/controllers/Jenissimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:57:12 */
/* http://harviacode.com */