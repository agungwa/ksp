<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimpananwajib extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setoransimpananwajib_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimpananwajib/index.html';
            $config['first_url'] = base_url() . 'setoransimpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimpananwajib_model->total_rows($q);
        $setoransimpananwajib = $this->Setoransimpananwajib_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'setoransimpananwajib_data' => $setoransimpananwajib,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimpananwajib/setoransimpananwajib_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimpananwajib/index.html';
            $config['first_url'] = base_url() . 'setoransimpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimpananwajib_model->total_rows($q);
        $setoransimpananwajib = $this->Setoransimpananwajib_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'setoransimpananwajib_data' => $setoransimpananwajib,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimpananwajib/setoransimpananwajib_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Setoransimpananwajib_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ssw_id' => $row->ssw_id,
		'siw_id' => $row->siw_id,
		'ssw_tglsetor' => $row->ssw_tglsetor,
		'ssw_jmlsetor' => $row->ssw_jmlsetor,
		'ssw_tgl' => $row->ssw_tgl,
		'ssw_flag' => $row->ssw_flag,
		'ssw_info' => $row->ssw_info,'content' => 'backend/setoransimpananwajib/setoransimpananwajib_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimpananwajib'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setoransimpananwajib/create_action'),
	    'ssw_id' => set_value('ssw_id'),
	    'siw_id' => set_value('siw_id'),
	    'nm_siw_id' => set_value('nm_siw_id'),
	    'ssw_tglsetor' => set_value('ssw_tglsetor'),
	    'ssw_jmlsetor' => set_value('ssw_jmlsetor'),
	    'content' => 'backend/setoransimpananwajib/setoransimpananwajib_form',
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
		'siw_id' => $this->input->post('siw_id',TRUE),
		'ssw_tglsetor' => $this->input->post('ssw_tglsetor',TRUE),
		'ssw_jmlsetor' => $this->input->post('ssw_jmlsetor',TRUE),
		'ssw_tgl' => $this->tgl,
		'ssw_flag' => 0,
		'ssw_info' => "",
	    );

            $this->Setoransimpananwajib_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setoransimpananwajib/create'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setoransimpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setoransimpananwajib/update_action'),
		'ssw_id' => set_value('ssw_id', $row->ssw_id),
		'siw_id' => set_value('siw_id', $row->siw_id),
		'ssw_tglsetor' => set_value('ssw_tglsetor', $row->ssw_tglsetor),
		'ssw_jmlsetor' => set_value('ssw_jmlsetor', $row->ssw_jmlsetor),
	    'content' => 'backend/setoransimpananwajib/setoransimpananwajib_edit',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananwajib/setorsimpananwajib/'.$siw_id));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ssw_id', TRUE));
        } else {
            $data = array(
		'siw_id' => $this->input->post('siw_id',TRUE),
		'ssw_tglsetor' => $this->input->post('ssw_tglsetor',TRUE),
		'ssw_jmlsetor' => $this->input->post('ssw_jmlsetor',TRUE),
		'ssw_flag' => 1,
	    );

            $this->Setoransimpananwajib_model->update($this->input->post('ssw_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota/?p=2'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setoransimpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array (
                'ssw_flag' => 2,
            );
            $this->Setoransimpananwajib_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setoransimpananwajib'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimpananwajib'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('siw_id', 'siw id', 'trim|required');
	$this->form_validation->set_rules('ssw_tglsetor', 'ssw tglsetor', 'trim|required');
	$this->form_validation->set_rules('ssw_jmlsetor', 'ssw jmlsetor', 'trim|required');

	$this->form_validation->set_rules('ssw_id', 'ssw_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setoransimpananwajib.php */
/* Location: ./application/controllers/Setoransimpananwajib.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-19 11:24:33 */
/* http://harviacode.com */