<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikaninvestasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikaninvestasiberjangka_model->total_rows($q);
        $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikaninvestasiberjangka_model->total_rows($q);
        $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pib_id' => $row->pib_id,
		'ivb_kode' => $row->ivb_kode,
		'pib_penarikanke' => $row->pib_penarikanke,
		'pib_jmlkeuntungan' => $row->pib_jmlkeuntungan,
		'pib_jmlditerima' => $row->pib_jmlditerima,
		'pib_tgl' => $row->pib_tgl,
		'pib_flag' => $row->pib_flag,
		'pib_info' => $row->pib_info,'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penarikaninvestasiberjangka/create_action'),
	    'pib_id' => set_value('pib_id'),
	    'ivb_kode' => set_value('ivb_kode'),
	    'nm_ivb_kode' => set_value('nm_ivb_kode'),
	    'pib_penarikanke' => set_value('pib_penarikanke'),
	    'pib_jmlkeuntungan' => set_value('pib_jmlkeuntungan'),
	    'pib_jmlditerima' => set_value('pib_jmlditerima'),
	    'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_form',
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
		'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
		'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
		'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
		'pib_tgl' => $this->tgl,
		'pib_flag' => 0,
		'pib_info' => "",
	    );

            $this->Penarikaninvestasiberjangka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penarikaninvestasiberjangka/update_action'),
		'pib_id' => set_value('pib_id', $row->pib_id),
		'ivb_kode' => set_value('ivb_kode', $row->ivb_kode),
		'nm_ivb_kode' => set_value('ivb_kode', $row->nm_ivb_kode),
		'pib_penarikanke' => set_value('pib_penarikanke', $row->pib_penarikanke),
		'pib_jmlkeuntungan' => set_value('pib_jmlkeuntungan', $row->pib_jmlkeuntungan),
		'pib_jmlditerima' => set_value('pib_jmlditerima', $row->pib_jmlditerima),
	    'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pib_id', TRUE));
        } else {
            $data = array(
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
		'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
		'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
		'pib_flag' => 1,
	    );

            $this->Penarikaninvestasiberjangka_model->update($this->input->post('pib_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array (
                'pib_flag' => 2,
            );
            $this->Penarikaninvestasiberjangka_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ivb_kode', 'ivb kode', 'trim|required');
	$this->form_validation->set_rules('pib_penarikanke', 'pib penarikanke', 'trim|required');
	$this->form_validation->set_rules('pib_jmlkeuntungan', 'pib jmlkeuntungan', 'trim|required');
	$this->form_validation->set_rules('pib_jmlditerima', 'pib jmlditerima', 'trim|required');
	$this->form_validation->set_rules('pib_id', 'pib_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penarikaninvestasiberjangka.php */
/* Location: ./application/controllers/Penarikaninvestasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:55 */
/* http://harviacode.com */