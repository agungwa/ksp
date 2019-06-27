<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bungasetoransimpanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungasetoransimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungasetoransimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungasetoransimpanan/index.html';
            $config['first_url'] = base_url() . 'bungasetoransimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungasetoransimpanan_model->total_rows($q);
        $bungasetoransimpanan = $this->Bungasetoransimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bungasetoransimpanan_data' => $bungasetoransimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungasetoransimpanan/bungasetoransimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bungasetoransimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bungasetoransimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bungasetoransimpanan/index.html';
            $config['first_url'] = base_url() . 'bungasetoransimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bungasetoransimpanan_model->total_rows($q);
        $bungasetoransimpanan = $this->Bungasetoransimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'bungasetoransimpanan_data' => $bungasetoransimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/bungasetoransimpanan/bungasetoransimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Bungasetoransimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bss_id' => $row->bss_id,
		'sim_kode' => $row->sim_kode,
		'bss_saldosimpanan' => $row->bss_saldosimpanan,
		'bss_saldobulanini' => $row->bss_saldobulanini,
		'bss_tglbunga' => $row->bss_tglbunga,
		'bss_tgl' => $row->bss_tgl,
		'bss_flag' => $row->bss_flag,
		'bss_info' => $row->bss_info,'content' => 'backend/bungasetoransimpanan/bungasetoransimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasetoransimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bungasetoransimpanan/create_action'),
	    'bss_id' => set_value('bss_id'),
	    'sim_kode' => set_value('sim_kode'),
	    'bss_saldosimpanan' => set_value('bss_saldosimpanan'),
	    'bss_saldobulanini' => set_value('bss_saldobulanini'),
	    'bss_tglbunga' => set_value('bss_tglbunga'),
	    'content' => 'backend/bungasetoransimpanan/bungasetoransimpanan_form',
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
		'bss_saldosimpanan' => $this->input->post('bss_saldosimpanan',TRUE),
		'bss_saldobulanini' => $this->input->post('bss_saldobulanini',TRUE),
		'bss_tglbunga' => $this->input->post('bss_tglbunga',TRUE),
		'bss_tgl' => $this->tgl,
		'bss_flag' => 0,
		'bss_info' => "",
	    );

            $this->Bungasetoransimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bungasetoransimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bungasetoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bungasetoransimpanan/update_action'),
		'bss_id' => set_value('bss_id', $row->bss_id),
		'sim_kode' => set_value('sim_kode', $row->sim_kode),
		'bss_saldosimpanan' => set_value('bss_saldosimpanan', $row->bss_saldosimpanan),
		'bss_saldobulanini' => set_value('bss_saldobulanini', $row->bss_saldobulanini),
		'bss_tglbunga' => set_value('bss_tglbunga', $row->bss_tglbunga),
	    'content' => 'backend/bungasetoransimpanan/bungasetoransimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasetoransimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('bss_id', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'bss_saldosimpanan' => $this->input->post('bss_saldosimpanan',TRUE),
		'bss_saldobulanini' => $this->input->post('bss_saldobulanini',TRUE),
		'bss_tglbunga' => $this->input->post('bss_tglbunga',TRUE),
		'bss_flag' => 1,
	    );

            $this->Bungasetoransimpanan_model->update($this->input->post('bss_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bungasetoransimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bungasetoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'bss_flag' => 2,
            );
            $this->Bungasetoransimpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bungasetoransimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bungasetoransimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('bss_saldosimpanan', 'bss saldosimpanan', 'trim|required');
	$this->form_validation->set_rules('bss_saldobulanini', 'bss saldobulanini', 'trim|required');
	$this->form_validation->set_rules('bss_tglbunga', 'bss tglbunga', 'trim|required');

	$this->form_validation->set_rules('bss_id', 'bss_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bungasetoransimpanan.php */
/* Location: ./application/controllers/Bungasetoransimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-26 13:52:27 */
/* http://harviacode.com */