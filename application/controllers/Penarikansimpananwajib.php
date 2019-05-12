<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikansimpananwajib extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimpananwajib/index.html';
            $config['first_url'] = base_url() . 'penarikansimpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimpananwajib_model->total_rows($q);
        $penarikansimpananwajib = $this->Penarikansimpananwajib_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penarikansimpananwajib_data' => $penarikansimpananwajib,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimpananwajib/penarikansimpananwajib_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikansimpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikansimpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikansimpananwajib/index.html';
            $config['first_url'] = base_url() . 'penarikansimpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikansimpananwajib_model->total_rows($q);
        $penarikansimpananwajib = $this->Penarikansimpananwajib_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penarikansimpananwajib_data' => $penarikansimpananwajib,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikansimpananwajib/penarikansimpananwajib_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penarikansimpananwajib_model->get_by_id($id);
        if ($row) {
            $data = array(
		'psw_id' => $row->psw_id,
		'siw_id' => $row->siw_id,
		'psw_tglpenarikan' => $row->psw_tglpenarikan,
		'psw_jumlah' => $row->psw_jumlah,
		'psw_tgl' => $row->psw_tgl,
		'psw_flag' => $row->psw_flag,
		'psw_info' => $row->psw_info,'content' => 'backend/penarikansimpananwajib/penarikansimpananwajib_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpananwajib'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('penarikansimpananwajib/create_action'),
	    'psw_id' => set_value('psw_id'),
	    'nm_siw_id' => set_value('nm_siw_id'),
	    'siw_id' => set_value('siw_id'),
	    'psw_tglpenarikan' => set_value('psw_tglpenarikan'),
	    'psw_jumlah' => set_value('psw_jumlah'),
	    'content' => 'backend/penarikansimpananwajib/penarikansimpananwajib_form',
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
		'psw_tglpenarikan' => $this->input->post('psw_tglpenarikan',TRUE),
		'psw_jumlah' => $this->input->post('psw_jumlah',TRUE),
		'psw_tgl' => $this->tgl,
		'psw_flag' => 0,
		'psw_info' => "",
	    );

            $this->Penarikansimpananwajib_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penarikansimpananwajib'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penarikansimpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penarikansimpananwajib/update_action'),
		'psw_id' => set_value('psw_id', $row->psw_id),
		'nm_siw_id' => set_value('nm_siw_id', $row->ang_no),
		'siw_id' => set_value('siw_id', $row->siw_id),
		'psw_tglpenarikan' => set_value('psw_tglpenarikan', $row->psw_tglpenarikan),
		'psw_jumlah' => set_value('psw_jumlah', $row->psw_jumlah),
	    'content' => 'backend/penarikansimpananwajib/penarikansimpananwajib_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpananwajib'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('psw_id', TRUE));
        } else {
            $data = array(
		'siw_id' => $this->input->post('siw_id',TRUE),
		'psw_tglpenarikan' => $this->input->post('psw_tglpenarikan',TRUE),
		'psw_jumlah' => $this->input->post('psw_jumlah',TRUE),
		'psw_flag' => 1,
	    );

            $this->Penarikansimpananwajib_model->update($this->input->post('psw_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penarikansimpananwajib'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penarikansimpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array (
                'psw_flag' => 2,
            );
            $this->Penarikansimpananwajib_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penarikansimpananwajib'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikansimpananwajib'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('siw_id', 'siw id', 'trim|required');
	$this->form_validation->set_rules('psw_tglpenarikan', 'psw tglpenarikan', 'trim|required');
	$this->form_validation->set_rules('psw_jumlah', 'psw jumlah', 'trim|required');
	$this->form_validation->set_rules('psw_tgl', 'psw tgl', 'trim|required');
	$this->form_validation->set_rules('psw_flag', 'psw flag', 'trim|required');
	$this->form_validation->set_rules('psw_info', 'psw info', 'trim|required');

	$this->form_validation->set_rules('psw_id', 'psw_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penarikansimpananwajib.php */
/* Location: ./application/controllers/Penarikansimpananwajib.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-26 02:42:27 */
/* http://harviacode.com */