<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpananwajib extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Settingsimpanan_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpananwajib/index.html';
            $config['first_url'] = base_url() . 'simpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpananwajib_model->total_rows($q);
        $simpananwajib = $this->Simpananwajib_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'simpananwajib_data' => $simpananwajib,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpananwajib/simpananwajib_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simpananwajib/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'simpananwajib/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'simpananwajib/index.html';
            $config['first_url'] = base_url() . 'simpananwajib/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simpananwajib_model->total_rows($q);
        $simpananwajib = $this->Simpananwajib_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'simpananwajib_data' => $simpananwajib,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/simpananwajib/simpananwajib_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function setorsimpananwajib($id) 
    {
        $settingsimpanan = $this->Settingsimpanan_model->get_by_id(1);
        $row = $this->Simpananwajib_model->get_by_id($id);
        $setoransimpananwajib = $this->Setoransimpananwajib_model->get_data_ssw($id);
        $siw_status = $this->statusSimpananwajib;
        if ($row) {
            $data = array(
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row(),
                'setoransimpananwajib_data' => $setoransimpananwajib,
                'settingsimpanan_data' => $settingsimpanan,
        'siw_id' => $row->siw_id,
		'ang_no' => $row->ang_no,        
		'nama_ang_no' => $ang_no->ang_nama,
		'ses_id' => $row->ses_id,
		'siw_tglbayar' => $row->siw_tglbayar,
		'siw_status' => $siw_status[$row->siw_status],
		'siw_tglambil' => $row->siw_tglambil,
		'siw_tgl' => $row->siw_tgl,
		'siw_flag' => $row->siw_flag,
		'siw_info' => $row->siw_info,'content' => 'backend/simpananwajib/setorsimpananwajib',
        );
        ini_set('display_errors','off');        
            $this->load->view(
            layout(), $data);
        }
    }

    public function setorsimpananwajib_action()
    {
        $total = $this->input->post('total',TRUE)+$this->input->post('ssw_jmlsetor',TRUE);
        $max = $this->input->post('max',TRUE);
        if ($total < $max){
            $statusanggota = 1;
        } else if ($total == $max){
            $statusanggota = 2;
        }
        var_dump($total);
        var_dump($max);
        var_dump($statusanggota);
        //insert data setoran simpanan wajib
        $dataSetoran = array(
            'siw_id' => $this->input->post('siw_id',TRUE),
            'ssw_tglsetor' => $this->tgl,
            'ssw_jmlsetor' => $this->input->post('ssw_jmlsetor',TRUE),
            'ssw_tgl' => $this->tgl,
            'ssw_flag' => 0,
            'ssw_info' => "",
            );
            $this->Setoransimpananwajib_model->insert($dataSetoran);

        $dataAnggota = array(
            'ang_no' => $this->input->post('ang_no',TRUE),
            'ang_status' => $statusanggota,
             );
            $this->Anggota_model->update($this->input->post('ang_no', TRUE), $dataAnggota);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota/?p=4'));
        
    }

    //tarik simpanan wajib
    public function tariksimpananwajib($id) 
    {
        $settingsimpanan = $this->Settingsimpanan_model->get_by_id(1);
        $row = $this->Simpananwajib_model->get_by_id($id);
        $setoransimpananwajib = $this->Setoransimpananwajib_model->get_data_ssw($id);
        $siw_status = $this->statusSimpananwajib;
        if ($row) {
            $data = array(
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row(),
                'settingsimpanan_data' => $settingsimpanan,
                'setoransimpananwajib_data' => $setoransimpananwajib,
        'siw_id' => $row->siw_id,
		'ang_no' => $row->ang_no,        
		'nama_ang_no' => $ang_no->ang_nama,
		'ses_id' => $row->ses_id,
		'siw_tglbayar' => $row->siw_tglbayar,
		'siw_status' => $siw_status[$row->siw_status],
		'siw_tglambil' => $row->siw_tglambil,
		'siw_tgl' => $row->siw_tgl,
		'siw_flag' => $row->siw_flag,
		'siw_info' => $row->siw_info,'content' => 'backend/simpananwajib/tariksimpananwajib',
	    );
            $this->load->view(
            layout(), $data);
        }
    }

    public function tariksimpananwajib_action()
    {
        //update data simpanan wajib
        $dataSimpananwajib = array(
            'siw_status' => 1,
            'siw_flag' => 1,
            'siw_tglambil' => $this->tgl,
            );
        $this->Simpananwajib_model->update($this->input->post('siw_id', TRUE), $dataSimpananwajib);
        //insert data penarikan simpanan wajib
        $dataPenarikansiw = array(
            'siw_id' => $this->input->post('siw_id',TRUE),
            'psw_tglpenarikan' => $this->tgl,
            'psw_jumlah' => $this->input->post('psw_jumlah',TRUE),
            'psw_tgl' => $this->tgl,
            'psw_flag' => 0,
            'psw_info' => "",
            );
                $this->Penarikansimpananwajib_model->insert($dataPenarikansiw);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('anggota/?p=3'));
        
    }


    public function read($id) 
    {
        
        $settingsimpanan = $this->Settingsimpanan_model->get_by_id(1);
        $row = $this->Simpananwajib_model->get_by_id($id);
        $setoransimpananwajib = $this->Setoransimpananwajib_model->get_data_ssw($id);
        $siw_status = $this->statusSimpananwajib;
        if ($row) {
            $data = array(
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row(),
                'setoransimpananwajib_data' => $setoransimpananwajib,
                'settingsimpanan_data' => $settingsimpanan,
        'siw_id' => $row->siw_id,
		'ang_no' => $row->ang_no,        
		'nama_ang_no' => $ang_no->ang_nama,
		'ses_id' => $row->ses_id,
		'siw_tglbayar' => $row->siw_tglbayar,
		'siw_status' => $siw_status[$row->siw_status],
		'siw_tglambil' => $row->siw_tglambil,
		'siw_tgl' => $row->siw_tgl,
		'siw_flag' => $row->siw_flag,
        'siw_info' => $row->siw_info,'content' => 'backend/simpananwajib/simpananwajib_read',
        	
        
        );
        ini_set('display_errors','off');
            $this->load->view(
            layout(), $data);
        }
    }


    public function read_action() 
    {
        //insert data setoran simpanan wajib
        $dataSetoran = array(
            'siw_id' => $this->input->post('siw_id',TRUE),
            'ssw_tglsetor' => $this->tgl,
            'ssw_jmlsetor' => $this->input->post('ssw_jmlsetor',TRUE),
            'ssw_tgl' => $this->tgl,
            'ssw_flag' => 0,
            'ssw_info' => "",
            );
                $this->Setoransimpananwajib_model->insert($dataSetoran);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('anggota/?p=2'));
        
    }


    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('simpananwajib/create_action'),
	    'siw_id' => set_value('siw_id'),
	    'ang_no' => set_value('ang_no'),
	    'nm_ang_no' => set_value('nm_ang_no'),
        'ses_id' => set_value('ses_id'),
        'nm_ses_id' => set_value('nm_ses_id'),
	    'siw_tglbayar' => set_value('siw_tglbayar'),
	    'siw_status' => set_value('siw_status'),
	    'siw_tglambil' => set_value('siw_tglambil'),
	    'content' => 'backend/simpananwajib/simpananwajib_form',
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
		'ses_id' => $this->input->post('ses_id',TRUE),
		'siw_tglbayar' => $this->input->post('siw_tglbayar',TRUE),
		'siw_status' => $this->input->post('siw_status',TRUE),
		'siw_tglambil' => $this->input->post('siw_tglambil',TRUE),
		'siw_tgl' => $this->tgl,
		'siw_flag' => 0,
		'siw_info' => "",
	    );

            $this->Simpananwajib_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpananwajib'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Simpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('simpananwajib/update_action'),
		'siw_id' => set_value('siw_id', $row->siw_id),
		'nm_ang_no' => set_value('nm_ng_no', $row->ang_nama),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'nm_ses_id' => set_value('nm_ses_id', $row->ses_nama),
		'ses_id' => set_value('ses_id', $row->ses_id),
		'siw_tglbayar' => set_value('siw_tglbayar', $row->siw_tglbayar),
		'siw_status' => set_value('siw_status', $row->siw_status),
		'siw_tglambil' => set_value('siw_tglambil', $row->siw_tglambil),
	    'content' => 'backend/simpananwajib/simpananwajib_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananwajib'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('siw_id', TRUE));
        } else {
            $data = array(
		'ang_no' => $this->input->post('ang_no',TRUE),
		'ses_id' => $this->input->post('ses_id',TRUE),
		'siw_tglbayar' => $this->input->post('siw_tglbayar',TRUE),
		'siw_status' => $this->input->post('siw_status',TRUE),
		'siw_tglambil' => $this->input->post('siw_tglambil',TRUE),
		'siw_flag' => 1,

	    );

            $this->Simpananwajib_model->update($this->input->post('siw_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpananwajib'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simpananwajib_model->get_by_id($id);

        if ($row) {
            $data = array (
                'siw_flag' => 2,
            );
            $this->Simpananwajib_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simpananwajib'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpananwajib'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('ses_id', 'ses id', 'trim|required');
	$this->form_validation->set_rules('siw_tglbayar', 'siw tglbayar', 'trim|required');
	$this->form_validation->set_rules('siw_status', 'siw status', 'trim|required');
	$this->form_validation->set_rules('siw_tglambil', 'siw tglambil', 'trim|required');
	$this->form_validation->set_rules('siw_id', 'siw_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpananwajib.php */
/* Location: ./application/controllers/Simpananwajib.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:50 */
/* http://harviacode.com */