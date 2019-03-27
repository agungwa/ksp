<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Potonganprovisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Potonganprovisi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'potonganprovisi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'potonganprovisi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'potonganprovisi/index.html';
            $config['first_url'] = base_url() . 'potonganprovisi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Potonganprovisi_model->total_rows($q);
        $potonganprovisi = $this->Potonganprovisi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'potonganprovisi_data' => $potonganprovisi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/potonganprovisi/potonganprovisi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'potonganprovisi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'potonganprovisi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'potonganprovisi/index.html';
            $config['first_url'] = base_url() . 'potonganprovisi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Potonganprovisi_model->total_rows($q);
        $potonganprovisi = $this->Potonganprovisi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'potonganprovisi_data' => $potonganprovisi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/potonganprovisi/potonganprovisi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Potonganprovisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pop_id' => $row->pop_id,
		'pop_potongan' => $row->pop_potongan,
		'pop_tgl' => $row->pop_tgl,
		'pop_flag' => $row->pop_flag,
		'pop_info' => $row->pop_info,'content' => 'backend/potonganprovisi/potonganprovisi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('potonganprovisi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('potonganprovisi/create_action'),
	    'pop_id' => set_value('pop_id'),
	    'pop_potongan' => set_value('pop_potongan'),
	    'pop_tgl' => set_value('pop_tgl'),
	    'pop_flag' => set_value('pop_flag'),
	    'pop_info' => set_value('pop_info'),
	    'content' => 'backend/potonganprovisi/potonganprovisi_form',
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
		'pop_potongan' => $this->input->post('pop_potongan',TRUE),
		'pop_tgl' => $this->input->post('pop_tgl',TRUE),
		'pop_flag' => $this->input->post('pop_flag',TRUE),
		'pop_info' => $this->input->post('pop_info',TRUE),
	    );

            $this->Potonganprovisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('potonganprovisi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Potonganprovisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('potonganprovisi/update_action'),
		'pop_id' => set_value('pop_id', $row->pop_id),
		'pop_potongan' => set_value('pop_potongan', $row->pop_potongan),
		'pop_tgl' => set_value('pop_tgl', $row->pop_tgl),
		'pop_flag' => set_value('pop_flag', $row->pop_flag),
		'pop_info' => set_value('pop_info', $row->pop_info),
	    'content' => 'backend/potonganprovisi/potonganprovisi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('potonganprovisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pop_id', TRUE));
        } else {
            $data = array(
		'pop_potongan' => $this->input->post('pop_potongan',TRUE),
		'pop_tgl' => $this->input->post('pop_tgl',TRUE),
		'pop_flag' => $this->input->post('pop_flag',TRUE),
		'pop_info' => $this->input->post('pop_info',TRUE),
	    );

            $this->Potonganprovisi_model->update($this->input->post('pop_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('potonganprovisi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Potonganprovisi_model->get_by_id($id);

        if ($row) {
            $this->Potonganprovisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('potonganprovisi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('potonganprovisi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pop_potongan', 'pop potongan', 'trim|required');
	$this->form_validation->set_rules('pop_tgl', 'pop tgl', 'trim|required');
	$this->form_validation->set_rules('pop_flag', 'pop flag', 'trim|required');
	$this->form_validation->set_rules('pop_info', 'pop info', 'trim|required');

	$this->form_validation->set_rules('pop_id', 'pop_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Potonganprovisi.php */
/* Location: ./application/controllers/Potonganprovisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:53 */
/* http://harviacode.com */