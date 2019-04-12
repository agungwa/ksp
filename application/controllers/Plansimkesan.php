<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plansimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'plansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'plansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'plansimkesan/index.html';
            $config['first_url'] = base_url() . 'plansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Plansimkesan_model->total_rows($q);
        $plansimkesan = $this->Plansimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'plansimkesan_data' => $plansimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/plansimkesan/plansimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'plansimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'plansimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'plansimkesan/index.html';
            $config['first_url'] = base_url() . 'plansimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Plansimkesan_model->total_rows($q);
        $plansimkesan = $this->Plansimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'plansimkesan_data' => $plansimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/plansimkesan/plansimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Plansimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'psk_id' => $row->psk_id,
		'psk_plan' => $row->psk_plan,
		'psk_setoran' => $row->psk_setoran,
		'psk_keterangan' => $row->psk_keterangan,
		'psk_tgl' => $row->psk_tgl,
		'psk_flag' => $row->psk_flag,
		'psk_info' => $row->psk_info,'content' => 'backend/plansimkesan/plansimkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plansimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('plansimkesan/create_action'),
    	    'psk_id' => set_value('psk_id'),
    	    'psk_plan' => set_value('psk_plan'),
    	    'psk_setoran' => set_value('psk_setoran'),
    	    'psk_keterangan' => set_value('psk_keterangan'),
    	    'content' => 'backend/plansimkesan/plansimkesan_form',
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
    		'psk_plan' => $this->input->post('psk_plan',TRUE),
    		'psk_setoran' => $this->input->post('psk_setoran',TRUE),
    		'psk_keterangan' => $this->input->post('psk_keterangan',TRUE),
    		'psk_tgl' => $this->tgl,
    		'psk_flag' => 0,
    		'psk_info' => "",
    	    );

            $this->Plansimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('plansimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Plansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('plansimkesan/update_action'),
        		'psk_id' => set_value('psk_id', $row->psk_id),
        		'psk_plan' => set_value('psk_plan', $row->psk_plan),
        		'psk_setoran' => set_value('psk_setoran', $row->psk_setoran),
        		'psk_keterangan' => set_value('psk_keterangan', $row->psk_keterangan),
        	    'content' => 'backend/plansimkesan/plansimkesan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plansimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('psk_id', TRUE));
        } else {
            $data = array(
    		'psk_plan' => $this->input->post('psk_plan',TRUE),
    		'psk_setoran' => $this->input->post('psk_setoran',TRUE),
    		'psk_keterangan' => $this->input->post('psk_keterangan',TRUE),
            'psk_flag' => 1,
    	    );

            $this->Plansimkesan_model->update($this->input->post('psk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('plansimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Plansimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'psk_flag' => 2,
            );

            $this->Plansimkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('plansimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plansimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('psk_plan', 'psk plan', 'trim|required');
	$this->form_validation->set_rules('psk_setoran', 'psk setoran', 'trim|required');
	$this->form_validation->set_rules('psk_keterangan', 'psk keterangan', 'trim|required');

	$this->form_validation->set_rules('psk_id', 'psk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Plansimkesan.php */
/* Location: ./application/controllers/Plansimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:47 */
/* http://harviacode.com */