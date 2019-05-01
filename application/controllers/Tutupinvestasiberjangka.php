<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutupinvestasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tutupinvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tutupinvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tutupinvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'tutupinvestasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tutupinvestasiberjangka_model->total_rows($q);
        $tutupinvestasiberjangka = $this->Tutupinvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tutupinvestasiberjangka_data' => $tutupinvestasiberjangka,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/tutupinvestasiberjangka/tutupinvestasiberjangka_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tutupinvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tutupinvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tutupinvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'tutupinvestasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tutupinvestasiberjangka_model->total_rows($q);
        $tutupinvestasiberjangka = $this->Tutupinvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'tutupinvestasiberjangka_data' => $tutupinvestasiberjangka,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/tutupinvestasiberjangka/tutupinvestasiberjangka_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Tutupinvestasiberjangka_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tib_id' => $row->tib_id,
		'ivb_kode' => $row->ivb_kode,
		'tib_tgltutup' => $row->tib_tgltutup,
		'tib_catatan' => $row->tib_catatan,
		'tib_tgl' => $row->tib_tgl,
		'tib_flag' => $row->tib_flag,
		'tib_info' => $row->tib_info,'content' => 'backend/tutupinvestasiberjangka/tutupinvestasiberjangka_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tutupinvestasiberjangka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tutupinvestasiberjangka/create_action'),
	    'tib_id' => set_value('tib_id'),
	    'ivb_kode' => set_value('ivb_kode'),
	    'nm_ivb_kode' => set_value('nm_ivb_kode'),
	    'tib_tgltutup' => set_value('tib_tgltutup'),
	    'tib_catatan' => set_value('tib_catatan'),
	    'content' => 'backend/tutupinvestasiberjangka/tutupinvestasiberjangka_form',
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
		'tib_tgltutup' => $this->input->post('tib_tgltutup',TRUE),
		'tib_catatan' => $this->input->post('tib_catatan',TRUE),
		'tib_tgl' => $this->tgl,
		'tib_flag' => 0,
		'tib_info' => "",
	    );

            $this->Tutupinvestasiberjangka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tutupinvestasiberjangka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tutupinvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tutupinvestasiberjangka/update_action'),
		'tib_id' => set_value('tib_id', $row->tib_id),
		'ivb_kode' => set_value('ivb_kode', $row->ivb_kode),
		'nm_ivb_kode' => set_value('nm_ivb_kode', $row->ivb_kode),
		'tib_tgltutup' => set_value('tib_tgltutup', $row->tib_tgltutup),
		'tib_catatan' => set_value('tib_catatan', $row->tib_catatan),
	    'content' => 'backend/tutupinvestasiberjangka/tutupinvestasiberjangka_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tutupinvestasiberjangka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tib_id', TRUE));
        } else {
            $data = array(
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'tib_tgltutup' => $this->input->post('tib_tgltutup',TRUE),
		'tib_catatan' => $this->input->post('tib_catatan',TRUE),
		'tib_flag' => 1,
	    );

            $this->Tutupinvestasiberjangka_model->update($this->input->post('tib_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tutupinvestasiberjangka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tutupinvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array (
                'tib_flag' => 2,
            );
            $this->Tutupinvestasiberjangka_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tutupinvestasiberjangka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tutupinvestasiberjangka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ivb_kode', 'ivb kode', 'trim|required');
	$this->form_validation->set_rules('tib_tgltutup', 'tib tgltutup', 'trim|required');
	$this->form_validation->set_rules('tib_catatan', 'tib catatan', 'trim|required');

	$this->form_validation->set_rules('tib_id', 'tib_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tutupinvestasiberjangka.php */
/* Location: ./application/controllers/Tutupinvestasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:03:05 */
/* http://harviacode.com */