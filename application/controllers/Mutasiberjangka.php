<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasiberjangka_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasiberjangka/index.html';
            $config['first_url'] = base_url() . 'mutasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasiberjangka_model->total_rows($q);
        $mutasiberjangka = $this->Mutasiberjangka_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasiberjangka_data' => $mutasiberjangka,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasiberjangka/mutasiberjangka_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasiberjangka/index.html';
            $config['first_url'] = base_url() . 'mutasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasiberjangka_model->total_rows($q);
        $mutasiberjangka = $this->Mutasiberjangka_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'mutasiberjangka_data' => $mutasiberjangka,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasiberjangka/mutasiberjangka_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Mutasiberjangka_model->get_by_id($id);
        if ($row) {
            $data = array(
		'mib_id' => $row->mib_id,
		'ivb_kode' => $row->ivb_kode,
		'mib_tglmutasi' => $row->mib_tglmutasi,
		'mib_asal' => $row->mib_asal,
		'mib_tujuan' => $row->mib_tujuan,
		'mib_status' => $row->mib_status,
		'mib_tgl' => $row->mib_tgl,
		'mib_flag' => $row->mib_flag,
		'mib_info' => $row->mib_info,'content' => 'backend/mutasiberjangka/mutasiberjangka_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasiberjangka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('mutasiberjangka/create_action'),
	    'mib_id' => set_value('mib_id'),
	    'ivb_kode' => set_value('ivb_kode'),
	    'nm_ivb_kode' => set_value('nm_ivb_kode'),
	    'mib_tglmutasi' => set_value('mib_tglmutasi'),
	    'mib_asal' => set_value('mib_asal'),
	    'mib_tujuan' => set_value('mib_tujuan'),
	    'mib_status' => set_value('mib_status'),
	    'content' => 'backend/mutasiberjangka/mutasiberjangka_form',
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
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'mib_tglmutasi' => $this->input->post('mib_tglmutasi',TRUE),
		'mib_asal' => $this->input->post('mib_asal',TRUE),
		'mib_tujuan' => $this->input->post('mib_tujuan',TRUE),
		'mib_status' => $this->input->post('mib_status',TRUE),
		'mib_tgl' => $this->tgl,
		'mib_flag' => 0,
		'mib_info' => "",
	    );

            $this->Mutasiberjangka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mutasiberjangka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mutasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasiberjangka/update_action'),
		'mib_id' => set_value('mib_id', $row->mib_id),
		'ivb_kode' => set_value('ivb_kode', $row->ivb_kode),
		'nm_ivb_kode' => set_value('nm_ivb_kode', $row->ivb_kode),
		'mib_tglmutasi' => set_value('mib_tglmutasi', $row->mib_tglmutasi),
		'mib_asal' => set_value('mib_asal', $row->mib_asal),
		'mib_tujuan' => set_value('mib_tujuan', $row->mib_tujuan),
		'mib_status' => set_value('mib_status', $row->mib_status),
	    'content' => 'backend/mutasiberjangka/mutasiberjangka_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasiberjangka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('mib_id', TRUE));
        } else {
            $data = array(
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'mib_tglmutasi' => $this->input->post('mib_tglmutasi',TRUE),
		'mib_asal' => $this->input->post('mib_asal',TRUE),
		'mib_tujuan' => $this->input->post('mib_tujuan',TRUE),
		'mib_status' => $this->input->post('mib_status',TRUE),
		'mib_flag' => 1,
	    );

            $this->Mutasiberjangka_model->update($this->input->post('mib_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasiberjangka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mutasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array (
                'mib_flag' => 2,
            );
            $this->Mutasiberjangka_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasiberjangka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasiberjangka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ivb_kode', 'ivb kode', 'trim|required');
	$this->form_validation->set_rules('mib_tglmutasi', 'mib tglmutasi', 'trim|required');
	$this->form_validation->set_rules('mib_asal', 'mib asal', 'trim|required');
	$this->form_validation->set_rules('mib_tujuan', 'mib tujuan', 'trim|required');
	$this->form_validation->set_rules('mib_status', 'mib status', 'trim|required');

	$this->form_validation->set_rules('mib_id', 'mib_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mutasiberjangka.php */
/* Location: ./application/controllers/Mutasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:47 */
/* http://harviacode.com */