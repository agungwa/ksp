<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simkesan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Plansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->pendaftaran();
                break;
            case  2:
                $this->listdata();
                break;
            /*case  3:
                $this->tariksimpanan();
                break;*/
                    
            default:
                $this->pendaftaran();
                break;
        }
    } 

    public function pendaftaran(){
        $data = array(
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'pendaftaran/pendaftaran.php',
            'active' => 1,
        );

        $this->load->view(layout(), $data);
    }

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
       /* if ($q <> '') {
            $config['base_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simkesan/index.html';
            $config['first_url'] = base_url() . 'simkesan/index.html';
        }*/

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simkesan_model->total_rows($q);
        $simkesan = $this->Simkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();

        $data = array(
            'simkesan_data' => $simkesan,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'plansimkesan_data' => $plansimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'simkesan_list.php',
            'active' => 2,
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simkesan/index.html';
            $config['first_url'] = base_url() . 'simkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simkesan_model->total_rows($q);
        $simkesan = $this->Simkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'simkesan_data' => $simkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simkesan/simkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'sik_kode' => $row->sik_kode,
		'ang_no' => $row->ang_no,
		'kar_kode' => $row->kar_kode,
		'psk_id' => $row->psk_id,
		'wil_kode' => $row->wil_kode,
		'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
		'sik_tglberakhir' => $row->sik_tglberakhir,
		'sik_status' => $row->sik_status,
		'sik_tgl' => $row->sik_tgl,
		'sik_flag' => $row->sik_flag,
		'sik_info' => $row->sik_info,'content' => 'backend/simkesan/simkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('simkesan/create_action'),
    	    'sik_kode' => set_value('sik_kode'),
    	    'ang_no' => set_value('ang_no'),
            'nm_ang_no' => set_value('nm_ang_no'),
    	    'kar_kode' => set_value('kar_kode'),
            'nm_kar_kode' => set_value('nm_kar_kode'),
    	    'psk_id' => set_value('psk_id'),
            'nm_psk_id' => set_value('nm_psk_id'),
    	    'wil_kode' => set_value('wil_kode'),
            'nm_wil_kode' => set_value('nm_wil_kode'),
    	    'sik_tglpendaftaran' => set_value('sik_tglpendaftaran'),
    	    'sik_tglberakhir' => set_value('sik_tglberakhir'),
    	    'sik_status' => set_value('sik_status'),
    	    'content' => 'backend/simkesan/simkesan_form',
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
    		'ang_no' => $this->input->post('ang_no',TRUE),
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'psk_id' => $this->input->post('psk_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'sik_tglpendaftaran' => $this->input->post('sik_tglpendaftaran',TRUE),
    		'sik_tglberakhir' => $this->input->post('sik_tglberakhir',TRUE),
    		'sik_status' => $this->input->post('sik_status',TRUE),
    		'sik_tgl' => $this->tgl,
    		'sik_flag' => 0,
    		'sik_info' => "",
    	    );

            $this->Simkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('simkesan/update_action'),
        		'sik_kode' => set_value('sik_kode', $row->sik_kode),
        		'ang_no' => set_value('ang_no', $row->ang_no),
                'nm_ang_no' => set_value('ang_no', $row->ang_no),
        		'kar_kode' => set_value('kar_kode', $row->kar_kode),
                'nm_kar_kode' => set_value('kar_kode', $row->kar_kode),
        		'psk_id' => set_value('psk_id', $row->psk_id),
                'nm_psk_id' => set_value('psk_id', $row->psk_id),
        		'wil_kode' => set_value('wil_kode', $row->wil_kode),
                'nm_wil_kode' => set_value('wil_kode', $row->wil_kode),
        		'sik_tglpendaftaran' => set_value('sik_tglpendaftaran', $row->sik_tglpendaftaran),
        		'sik_tglberakhir' => set_value('sik_tglberakhir', $row->sik_tglberakhir),
        		'sik_status' => set_value('sik_status', $row->sik_status),
        	    'content' => 'backend/simkesan/simkesan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sik_kode', TRUE));
        } else {
            $data = array(
    		'ang_no' => $this->input->post('ang_no',TRUE),
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'psk_id' => $this->input->post('psk_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'sik_tglpendaftaran' => $this->input->post('sik_tglpendaftaran',TRUE),
    		'sik_tglberakhir' => $this->input->post('sik_tglberakhir',TRUE),
    		'sik_status' => $this->input->post('sik_status',TRUE),
    		'sik_flag' => 1,
    	    );

            $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'sik_flag' => 2,
            );

            $this->Simkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('psk_id', 'psk id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('sik_tglpendaftaran', 'sik tglpendaftaran', 'trim|required');
	$this->form_validation->set_rules('sik_tglberakhir', 'sik tglberakhir', 'trim|required');
	$this->form_validation->set_rules('sik_status', 'sik status', 'trim|required');
	$this->form_validation->set_rules('sik_kode', 'sik_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simkesan.php */
/* Location: ./application/controllers/Simkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:29 */
/* http://harviacode.com */