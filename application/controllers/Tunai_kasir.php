<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunai_kasir extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tunai_kasir_model');
        $this->load->library('form_validation');
    }

    public function input_tunai(){
        $data = array(
        'content' => 'backend/tunai_kasir/input_tunai',
        );
        $this->load->view(layout(), $data);
    }

    public function inputtunai_action(){
        $data = array(
            'tun_jumlah' => $this->input->post('tun_jumlah',TRUE),
            'wil_kode' => $this->input->post('wil_kode',TRUE),
            'tun_jenis' => $this->input->post('tun_jenis',TRUE),
            'tun_kantor' => $this->input->post('tun_kantor',TRUE),
            'tun_tanggal' => $this->input->post('tun_tanggal',TRUE),
            'tun_tgl' => $this->tgl,
            'tun_flag' => 0,
            'tun_info' => "",
        );
        $this->Tunai_kasir_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('tunai_kasir/input_tunai'));
    }


    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $tunai_kasir = $this->Tunai_kasir_model->get_limit_data($start, $q);


        $data = array(
            'tunai_kasir_data' => $tunai_kasir,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/tunai_kasir/tunai_kasir_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tunai_kasir/index.html?q='  . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'tunai_kasir/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'tunai_kasir/index.html';
            $config['first_url'] = base_url() . 'tunai_kasir/index.html';
        }
        $tunai_kasir = $this->Tunai_kasir_model->get_limit_data( $start, $q);


        $data = array(
            'tunai_kasir_data' => $tunai_kasir,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/tunai_kasir/tunai_kasir_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Tunai_kasir_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tun_id' => $row->tun_id,
		'tun_jumlah' => $row->tun_jumlah,
		'tun_jenis' => $row->tun_jenis,
		'tun_kantor' => $row->tun_kantor,
		'tun_tanggal' => $row->tun_tanggal,
		'tun_tgl' => $row->tun_tgl,
		'tun_flag' => $row->tun_flag,
		'tun_info' => $row->tun_info,'content' => 'backend/tunai_kasir/tunai_kasir_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunai_kasir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tunai_kasir/create_action'),
	    'tun_id' => set_value('tun_id'),
	    'tun_jumlah' => set_value('tun_jumlah'),
	    'tun_jenis' => set_value('tun_jenis'),
	    'tun_kantor' => set_value('tun_kantor'),
	    'tun_tanggal' => set_value('tun_tanggal'),
	    'tun_tgl' => set_value('tun_tgl'),
	    'tun_flag' => set_value('tun_flag'),
	    'tun_info' => set_value('tun_info'),
	    'content' => 'backend/tunai_kasir/tunai_kasir_form',
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
		'tun_jumlah' => $this->input->post('tun_jumlah',TRUE),
		'tun_jenis' => $this->input->post('tun_jenis',TRUE),
		'tun_kantor' => $this->input->post('tun_kantor',TRUE),
		'tun_tanggal' => $this->input->post('tun_tanggal',TRUE),
		'tun_tgl' => $this->tgl,
		'tun_flag' => 0,
		'tun_info' => "",
	    );

            $this->Tunai_kasir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tunai_kasir'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tunai_kasir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tunai_kasir/update_action'),
		'tun_id' => set_value('tun_id', $row->tun_id),
		'tun_jumlah' => set_value('tun_jumlah', $row->tun_jumlah),
		'tun_jenis' => set_value('tun_jenis', $row->tun_jenis),
		'tun_kantor' => set_value('tun_kantor', $row->tun_kantor),
		'tun_tanggal' => set_value('tun_tanggal', $row->tun_tanggal),
		'tun_tgl' => set_value('tun_tgl', $row->tun_tgl),
		'tun_flag' => set_value('tun_flag', $row->tun_flag),
		'tun_info' => set_value('tun_info', $row->tun_info),
	    'content' => 'backend/tunai_kasir/tunai_kasir_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunai_kasir'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tun_id', TRUE));
        } else {
            $data = array(
		'tun_jumlah' => $this->input->post('tun_jumlah',TRUE),
		'tun_jenis' => $this->input->post('tun_jenis',TRUE),
		'tun_kantor' => $this->input->post('tun_kantor',TRUE),
		'tun_tanggal' => $this->input->post('tun_tanggal',TRUE),
		'tun_tgl' => $this->tgl,
		'tun_flag' => 1,
		'tun_info' => "",
	    );

            $this->Tunai_kasir_model->update($this->input->post('tun_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tunai_kasir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tunai_kasir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'tun_flag' => 2,
            );
            $this->Tunai_kasir_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tunai_kasir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunai_kasir'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tun_jumlah', 'tun jumlah', 'trim|required');
	$this->form_validation->set_rules('tun_jenis', 'tun jenis', 'trim|required');
	$this->form_validation->set_rules('tun_kantor', 'tun kantor', 'trim|required');
	$this->form_validation->set_rules('tun_tanggal', 'tun tanggal', 'trim|required');
	$this->form_validation->set_rules('tun_tgl', 'tun tgl', 'trim|required');
	$this->form_validation->set_rules('tun_flag', 'tun flag', 'trim|required');
	$this->form_validation->set_rules('tun_info', 'tun info', 'trim|required');

	$this->form_validation->set_rules('tun_id', 'tun_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tunai_kasir.php */
/* Location: ./application/controllers/Tunai_kasir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-29 06:45:36 */
/* http://harviacode.com */