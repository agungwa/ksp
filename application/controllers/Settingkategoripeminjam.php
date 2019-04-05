<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingkategoripeminjam extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Settingkategoripeminjam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingkategoripeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingkategoripeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingkategoripeminjam/index.html';
            $config['first_url'] = base_url() . 'settingkategoripeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingkategoripeminjam_model->total_rows($q);
        $settingkategoripeminjam = $this->Settingkategoripeminjam_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'settingkategoripeminjam_data' => $settingkategoripeminjam,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingkategoripeminjam/settingkategoripeminjam_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingkategoripeminjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingkategoripeminjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingkategoripeminjam/index.html';
            $config['first_url'] = base_url() . 'settingkategoripeminjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingkategoripeminjam_model->total_rows($q);
        $settingkategoripeminjam = $this->Settingkategoripeminjam_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'settingkategoripeminjam_data' => $settingkategoripeminjam,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingkategoripeminjam/settingkategoripeminjam_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Settingkategoripeminjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'skp_id' => $row->skp_id,
		'skp_kategori' => $row->skp_kategori,
        'content' => 'backend/settingkategoripeminjam/settingkategoripeminjam_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingkategoripeminjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('settingkategoripeminjam/create_action'),
	    'skp_id' => set_value('skp_id'),
	    'skp_kategori' => set_value('skp_kategori'),
	    'content' => 'backend/settingkategoripeminjam/settingkategoripeminjam_form',
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
		'skp_kategori' => $this->input->post('skp_kategori',TRUE),
		'skp_tgl' => $this->tgl,
		'skp_flag' => 0,
		'skp_info' => "",
	    );

            $this->Settingkategoripeminjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('settingkategoripeminjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Settingkategoripeminjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('settingkategoripeminjam/update_action'),
		'skp_id' => set_value('skp_id', $row->skp_id),
		'skp_kategori' => set_value('skp_kategori', $row->skp_kategori),
	    'content' => 'backend/settingkategoripeminjam/settingkategoripeminjam_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingkategoripeminjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('skp_id', TRUE));
        } else {
            $data = array(
		'skp_kategori' => $this->input->post('skp_kategori',TRUE),
		'skp_flag' => 1,
	    );

            $this->Settingkategoripeminjam_model->update($this->input->post('skp_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('settingkategoripeminjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Settingkategoripeminjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'skp_flag' => 2,
                );

            $this->Settingkategoripeminjam_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('settingkategoripeminjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingkategoripeminjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('skp_kategori', 'skp kategori', 'trim|required');

	$this->form_validation->set_rules('skp_id', 'skp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Settingkategoripeminjam.php */
/* Location: ./application/controllers/Settingkategoripeminjam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:40 */
/* http://harviacode.com */