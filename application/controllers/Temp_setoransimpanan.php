<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_setoransimpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Temp_setoransimpanan_model');
        $this->load->library('form_validation');
    }

    public function index(){

        $simpanan = $this->Simpanan_model->get_simpanan_aktif();
        $datetoday = date("m-d", strtotime($this->tgl));
        $totalsimpanan = 0;
    	foreach ($simpanan as $key => $value) {
            $setoran = $this->Setoransimpanan_model->get_hitung($value->sim_kode,$datetoday);
    		foreach ($setoran as $k => $item) {
                $totalsimpanan ++;
                }
            }
            echo $datetoday , "Total simpanan" , $totalsimpanan;
            for($num=1; $num<=$totalsimpanan; $num++){
                //$tanggalDuedate = date("Y-m-d", strtotime($jatuhtempo.' + '.$no.' Months'));
                $dataTemp = array(
                   
                    );
                //$this->Temp_setoransimpanan_model->insert($dataTemp);
            }

    }
    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $temp_setoransimpanan = $this->Temp_setoransimpanan_model->get_limit_data($start, $q);


        $data = array(
            'temp_setoransimpanan_data' => $temp_setoransimpanan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/temp_setoransimpanan/temp_setoransimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'temp_setoransimpanan/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'temp_setoransimpanan/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'temp_setoransimpanan/index.html';
            $config['first_url'] = base_url() . 'temp_setoransimpanan/index.html';
        }
        $temp_setoransimpanan = $this->Temp_setoransimpanan_model->get_limit_data( $start, $q);


        $data = array(
            'temp_setoransimpanan_data' => $temp_setoransimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/temp_setoransimpanan/temp_setoransimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Temp_setoransimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tes_id' => $row->tes_id,
		'sim_kode' => $row->sim_kode,
		'tes_totalsetor' => $row->tes_totalsetor,
		'tes_periode' => $row->tes_periode,
		'tes_tgl' => $row->tes_tgl,
		'tes_flag' => $row->tes_flag,
		'tes_info' => $row->tes_info,'content' => 'backend/temp_setoransimpanan/temp_setoransimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_setoransimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('temp_setoransimpanan/create_action'),
	    'tes_id' => set_value('tes_id'),
	    'sim_kode' => set_value('sim_kode'),
	    'tes_totalsetor' => set_value('tes_totalsetor'),
	    'tes_periode' => set_value('tes_periode'),
	    'content' => 'backend/temp_setoransimpanan/temp_setoransimpanan_form',
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
		'tes_totalsetor' => $this->input->post('tes_totalsetor',TRUE),
		'tes_periode' => $this->input->post('tes_periode',TRUE),
		'tes_tgl' => $this->tgl,
		'tes_flag' => 0,
		'tes_info' => ""
	    );

            $this->Temp_setoransimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('temp_setoransimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Temp_setoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('temp_setoransimpanan/update_action'),
		'tes_id' => set_value('tes_id', $row->tes_id),
		'sim_kode' => set_value('sim_kode', $row->sim_kode),
		'tes_totalsetor' => set_value('tes_totalsetor', $row->tes_totalsetor),
		'tes_periode' => set_value('tes_periode', $row->tes_periode),
	    'content' => 'backend/temp_setoransimpanan/temp_setoransimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_setoransimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tes_id', TRUE));
        } else {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'tes_totalsetor' => $this->input->post('tes_totalsetor',TRUE),
		'tes_periode' => $this->input->post('tes_periode',TRUE),
		'tes_flag' => 1,
	    );

            $this->Temp_setoransimpanan_model->update($this->input->post('tes_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('temp_setoransimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Temp_setoransimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'tes_flag' => 2,
            );
            $this->Temp_setoransimpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('temp_setoransimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_setoransimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('tes_totalsetor', 'tes totalsetor', 'trim|required');
	$this->form_validation->set_rules('tes_periode', 'tes periode', 'trim|required');

	$this->form_validation->set_rules('tes_id', 'tes_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Temp_setoransimpanan.php */
/* Location: ./application/controllers/Temp_setoransimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-28 16:23:48 */
/* http://harviacode.com */