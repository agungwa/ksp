<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keuntunganinvestasi extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Keuntunganinvestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'keuntunganinvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'keuntunganinvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'keuntunganinvestasi/index.html';
            $config['first_url'] = base_url() . 'keuntunganinvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Keuntunganinvestasi_model->total_rows($q);
        $keuntunganinvestasi = $this->Keuntunganinvestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'keuntunganinvestasi_data' => $keuntunganinvestasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/keuntunganinvestasi/keuntunganinvestasi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'keuntunganinvestasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'keuntunganinvestasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'keuntunganinvestasi/index.html';
            $config['first_url'] = base_url() . 'keuntunganinvestasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Keuntunganinvestasi_model->total_rows($q);
        $keuntunganinvestasi = $this->Keuntunganinvestasi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'keuntunganinvestasi_data' => $keuntunganinvestasi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/keuntunganinvestasi/keuntunganinvestasi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Keuntunganinvestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kiv_id' => $row->kiv_id,
		'pib_id' => $row->pib_id,
		'kiv_jmlkeuntungan' => $row->kiv_jmlkeuntungan,
		'kiv_tglkeuntungan' => $row->kiv_tglkeuntungan,
		'kiv_tgl' => $row->kiv_tgl,
		'kiv_flag' => $row->kiv_flag,
		'kiv_info' => $row->kiv_info,'content' => 'backend/keuntunganinvestasi/keuntunganinvestasi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keuntunganinvestasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('keuntunganinvestasi/create_action'),
	    'kiv_id' => set_value('kiv_id'),
	    'pib_id' => set_value('pib_id'),
	    'nm_pib_id' => set_value('nm_pib_id'),
	    'kiv_jmlkeuntungan' => set_value('kiv_jmlkeuntungan'),
	    'kiv_tglkeuntungan' => set_value('kiv_tglkeuntungan'),
	    'content' => 'backend/keuntunganinvestasi/keuntunganinvestasi_form',
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
		'pib_id' => $this->input->post('pib_id',TRUE),
		'kiv_jmlkeuntungan' => $this->input->post('kiv_jmlkeuntungan',TRUE),
		'kiv_tglkeuntungan' => $this->input->post('kiv_tglkeuntungan',TRUE),
		'kiv_tgl' => $this->tgl,
		'kiv_flag' => 0,
		'kiv_info' => "",
	    );

            $this->Keuntunganinvestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('keuntunganinvestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Keuntunganinvestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('keuntunganinvestasi/update_action'),
		'kiv_id' => set_value('kiv_id', $row->kiv_id),
		'pib_id' => set_value('pib_id', $row->pib_id),
		'nm_pib_id' => set_value('nm_pib_id', $row->ivb_kode),
		'kiv_jmlkeuntungan' => set_value('kiv_jmlkeuntungan', $row->kiv_jmlkeuntungan),
		'kiv_tglkeuntungan' => set_value('kiv_tglkeuntungan', $row->kiv_tglkeuntungan),
	    'content' => 'backend/keuntunganinvestasi/keuntunganinvestasi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keuntunganinvestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kiv_id', TRUE));
        } else {
            $data = array(
		'pib_id' => $this->input->post('pib_id',TRUE),
		'kiv_jmlkeuntungan' => $this->input->post('kiv_jmlkeuntungan',TRUE),
		'kiv_tglkeuntungan' => $this->input->post('kiv_tglkeuntungan',TRUE),
		'kiv_flag' => 1,
	    );

            $this->Keuntunganinvestasi_model->update($this->input->post('kiv_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('keuntunganinvestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Keuntunganinvestasi_model->get_by_id($id);

        if ($row) {
            $data = array (
                'kiv_flag' => 2,
            );
            $this->Keuntunganinvestasi_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('keuntunganinvestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keuntunganinvestasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pib_id', 'pib id', 'trim|required');
	$this->form_validation->set_rules('kiv_jmlkeuntungan', 'kiv jmlkeuntungan', 'trim|required');
	$this->form_validation->set_rules('kiv_tglkeuntungan', 'kiv tglkeuntungan', 'trim|required');

	$this->form_validation->set_rules('kiv_id', 'kiv_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keuntunganinvestasi.php */
/* Location: ./application/controllers/Keuntunganinvestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:11 */
/* http://harviacode.com */