<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenissetoran extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenissetoran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenissetoran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenissetoran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenissetoran/index.html';
            $config['first_url'] = base_url() . 'jenissetoran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenissetoran_model->total_rows($q);
        $jenissetoran = $this->Jenissetoran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenissetoran_data' => $jenissetoran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenissetoran/jenissetoran_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenissetoran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenissetoran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenissetoran/index.html';
            $config['first_url'] = base_url() . 'jenissetoran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenissetoran_model->total_rows($q);
        $jenissetoran = $this->Jenissetoran_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenissetoran_data' => $jenissetoran,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenissetoran/jenissetoran_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenissetoran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jse_id' => $row->jse_id,
		'jse_setoran' => $row->jse_setoran,
		'jse_keterangan' => $row->jse_keterangan,
		'jse_tgl' => $row->jse_tgl,
		'jse_flag' => $row->jse_flag,
		'jse_info' => $row->jse_info,'content' => 'backend/jenissetoran/jenissetoran_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissetoran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenissetoran/create_action'),
	    'jse_id' => set_value('jse_id'),
	    'jse_setoran' => set_value('jse_setoran'),
	    'jse_keterangan' => set_value('jse_keterangan'),
	    'content' => 'backend/jenissetoran/jenissetoran_form',
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
		'jse_setoran' => $this->input->post('jse_setoran',TRUE),
		'jse_keterangan' => $this->input->post('jse_keterangan',TRUE),
		'jse_tgl' => $this->tgl,
		'jse_flag' => 0,
		'jse_info' => "",
	    );

            $this->Jenissetoran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenissetoran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenissetoran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenissetoran/update_action'),
		'jse_id' => set_value('jse_id', $row->jse_id),
		'jse_setoran' => set_value('jse_setoran', $row->jse_setoran),
		'jse_keterangan' => set_value('jse_keterangan', $row->jse_keterangan),
	    'content' => 'backend/jenissetoran/jenissetoran_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissetoran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jse_id', TRUE));
        } else {
            $data = array(
		'jse_setoran' => $this->input->post('jse_setoran',TRUE),
		'jse_keterangan' => $this->input->post('jse_keterangan',TRUE),
		'jse_flag' => 1,
	    );

            $this->Jenissetoran_model->update($this->input->post('jse_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenissetoran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenissetoran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'jse_flag' => 2,
                 );
                 
            $this->Jenissetoran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenissetoran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenissetoran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jse_setoran', 'jse setoran', 'trim|required');
	$this->form_validation->set_rules('jse_keterangan', 'jse keterangan', 'trim|required');
	$this->form_validation->set_rules('jse_id', 'jse_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenissetoran.php */
/* Location: ./application/controllers/Jenissetoran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:57:04 */
/* http://harviacode.com */