<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelunasan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelunasan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelunasan/index.html';
            $config['first_url'] = base_url() . 'pelunasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelunasan_model->total_rows($q);
        $pelunasan = $this->Pelunasan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelunasan_data' => $pelunasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/pelunasan/pelunasan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelunasan/index.html';
            $config['first_url'] = base_url() . 'pelunasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelunasan_model->total_rows($q);
        $pelunasan = $this->Pelunasan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'pelunasan_data' => $pelunasan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/pelunasan/pelunasan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pel_id' => $row->pel_id,
		'jep_id' => $row->jep_id,
		'pin_id' => $row->pin_id,
		'pel_tgl' => $row->pel_tgl,
		'pel_flag' => $row->pel_flag,
		'pel_info' => $row->pel_info,'content' => 'backend/pelunasan/pelunasan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('pelunasan/create_action'),
	    'pel_id' => set_value('pel_id'),
	    'jep_id' => set_value('jep_id'),
	    'nm_jep_id' => set_value('nm_jep_id'),
	    'pin_id' => set_value('pin_id'),
	    'nm_pin_id' => set_value('nm_pin_id'),
	    'content' => 'backend/pelunasan/pelunasan_form',
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
		'jep_id' => $this->input->post('jep_id',TRUE),
		'pin_id' => $this->input->post('pin_id',TRUE),
		'pel_tgl' => $this->tgl,
		'pel_flag' => 0,
		'pel_info' => "",
	    );

            $this->Pelunasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelunasan/update_action'),
		'pel_id' => set_value('pel_id', $row->pel_id),
		'jep_id' => set_value('jep_id', $row->jep_id),
		'nm_jep_id' => set_value('nm_jep_id', $row->jep_jenis),
		'pin_id' => set_value('pin_id', $row->pin_id),
		'nm_pin_id' => set_value('nm_pin_id', $row->pin_id),
	    'content' => 'backend/pelunasan/pelunasan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pel_id', TRUE));
        } else {
            $data = array(
		'jep_id' => $this->input->post('jep_id',TRUE),
		'pin_id' => $this->input->post('pin_id',TRUE),
		'pel_flag' => 1,
	    );

            $this->Pelunasan_model->update($this->input->post('pel_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'pel_flag' => 2,
            );
            $this->Pelunasan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelunasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jep_id', 'jep id', 'trim|required');
    $this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
    
	$this->form_validation->set_rules('pel_id', 'pel_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pelunasan.php */
/* Location: ./application/controllers/Pelunasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:49 */
/* http://harviacode.com */