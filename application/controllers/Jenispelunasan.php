<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispelunasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenispelunasan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispelunasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispelunasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispelunasan/index.html';
            $config['first_url'] = base_url() . 'jenispelunasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispelunasan_model->total_rows($q);
        $jenispelunasan = $this->Jenispelunasan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenispelunasan_data' => $jenispelunasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenispelunasan/jenispelunasan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispelunasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispelunasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispelunasan/index.html';
            $config['first_url'] = base_url() . 'jenispelunasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispelunasan_model->total_rows($q);
        $jenispelunasan = $this->Jenispelunasan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenispelunasan_data' => $jenispelunasan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenispelunasan/jenispelunasan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Jenispelunasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'jep_id' => $row->jep_id,
		'jep_jenis' => $row->jep_jenis,
		'jep_keterangan' => $row->jep_keterangan,
		'jep_tgl' => $row->jep_tgl,
		'jep_flag' => $row->jep_flag,
		'jep_info' => $row->jep_info,'content' => 'backend/jenispelunasan/jenispelunasan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispelunasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispelunasan/create_action'),
	    'jep_id' => set_value('jep_id'),
	    'jep_jenis' => set_value('jep_jenis'),
	    'jep_keterangan' => set_value('jep_keterangan'),
	    'content' => 'backend/jenispelunasan/jenispelunasan_form',
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
		'jep_jenis' => $this->input->post('jep_jenis',TRUE),
		'jep_keterangan' => $this->input->post('jep_keterangan',TRUE),
		'jep_tgl' => $this->tgl,
		'jep_flag' => 0,
		'jep_info' => "",
	    );

            $this->Jenispelunasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenispelunasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenispelunasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispelunasan/update_action'),
		'jep_id' => set_value('jep_id', $row->jep_id),
		'jep_jenis' => set_value('jep_jenis', $row->jep_jenis),
		'jep_keterangan' => set_value('jep_keterangan', $row->jep_keterangan),
	    'content' => 'backend/jenispelunasan/jenispelunasan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispelunasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jep_id', TRUE));
        } else {
            $data = array(
		'jep_jenis' => $this->input->post('jep_jenis',TRUE),
		'jep_keterangan' => $this->input->post('jep_keterangan',TRUE),
		'jep_flag' => 1,
	    );

            $this->Jenispelunasan_model->update($this->input->post('jep_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispelunasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenispelunasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'jep_flag' => 2,
            );
            $this->Jenispelunasan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispelunasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispelunasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jep_jenis', 'jep jenis', 'trim|required');
	$this->form_validation->set_rules('jep_keterangan', 'jep keterangan', 'trim|required');

	$this->form_validation->set_rules('jep_id', 'jep_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenispelunasan.php */
/* Location: ./application/controllers/Jenispelunasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 15:44:27 */
/* http://harviacode.com */