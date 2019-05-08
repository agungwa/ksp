<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasisimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasisimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasisimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasisimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasisimpanan/index.html';
            $config['first_url'] = base_url() . 'mutasisimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasisimpanan_model->total_rows($q);
        $mutasisimpanan = $this->Mutasisimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasisimpanan_data' => $mutasisimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasisimpanan/mutasisimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasisimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasisimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasisimpanan/index.html';
            $config['first_url'] = base_url() . 'mutasisimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasisimpanan_model->total_rows($q);
        $mutasisimpanan = $this->Mutasisimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'mutasisimpanan_data' => $mutasisimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasisimpanan/mutasisimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Mutasisimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'mus_id' => $row->mus_id,
		'sim_kode' => $row->sim_kode,
		'mus_tglmutasi' => $row->mus_tglmutasi,
		'mus_asal' => $row->mus_asal,
		'mus_tujuan' => $row->mus_tujuan,
		'mus_status' => $row->mus_status,
		'mus_tgl' => $row->mus_tgl,
		'mus_flag' => $row->mus_flag,
		'mus_info' => $row->mus_info,'content' => 'backend/mutasisimpanan/mutasisimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mutasisimpanan/create_action'),
	    'mus_id' => set_value('mus_id'),
        'sim_kode' => set_value('sim_kode'),
        'nm_sim_kode' => set_value('nm_sim_kode'),
	    'mus_tglmutasi' => set_value('mus_tglmutasi'),
	    'mus_asal' => set_value('mus_asal'),
	    'nm_mus_asal' => set_value('nm_mus_asal'),
	    'mus_tujuan' => set_value('mus_tujuan'),
	    'nm_mus_tujuan' => set_value('nm_mus_tujuan'),
	    'mus_status' => set_value('mus_status'),
	    'content' => 'backend/mutasisimpanan/mutasisimpanan_form',
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
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'mus_tglmutasi' => $this->input->post('mus_tglmutasi',TRUE),
		'mus_asal' => $this->input->post('mus_asal',TRUE),
		'mus_tujuan' => $this->input->post('mus_tujuan',TRUE),
		'mus_status' => $this->input->post('mus_status',TRUE),
		'mus_tgl' => 0,
		'mus_flag' => $this->tgl,
		'mus_info' => "",
	    );

            $this->Mutasisimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mutasisimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mutasisimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasisimpanan/update_action'),
		'mus_id' => set_value('mus_id', $row->mus_id),
        'sim_kode' => set_value('sim_kode'),
        'nm_sim_kode' => set_value('nm_sim_kode', $row->sim_kode),
		'mus_tglmutasi' => set_value('mus_tglmutasi', $row->mus_tglmutasi),
		'mus_asal' => set_value('mus_asal', $row->mus_asal),
		'nm_mus_asal' => set_value('nm_mus_asal', $row->wil_nama),
		'mus_tujuan' => set_value('mus_tujuan', $row->mus_tujuan),
		'nm_mus_tujuan' => set_value('nm_mus_tujuan', $row->wil_nama),
		'mus_status' => set_value('mus_status', $row->mus_status),
	    'content' => 'backend/mutasisimpanan/mutasisimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('mus_id', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'mus_tglmutasi' => $this->input->post('mus_tglmutasi',TRUE),
		'mus_asal' => $this->input->post('mus_asal',TRUE),
		'mus_tujuan' => $this->input->post('mus_tujuan',TRUE),
		'mus_status' => $this->input->post('mus_status',TRUE),
		'mus_flag' => "",
	    );

            $this->Mutasisimpanan_model->update($this->input->post('mus_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasisimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mutasisimpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'mus_flag' => 2,
            );
            $this->Mutasisimpanan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasisimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasisimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('mus_tglmutasi', 'mus tglmutasi', 'trim|required');
	$this->form_validation->set_rules('mus_asal', 'mus asal', 'trim|required');
	$this->form_validation->set_rules('mus_tujuan', 'mus tujuan', 'trim|required');
	$this->form_validation->set_rules('mus_status', 'mus status', 'trim|required');

	$this->form_validation->set_rules('mus_id', 'mus_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mutasisimpanan.php */
/* Location: ./application/controllers/Mutasisimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:32 */
/* http://harviacode.com */