<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lainlain extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lainlain_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->listdata();
                break;
            case  2:
                $this->inputdata($active);
                break;
            case  3:
                $this->inputdata($active);
                break;
            case  4:
                $this->inputdata($active);
                break;
            case  5:
                $this->inputdata($active);
                break;
            case  6:
                $this->inputdata($active);
                break;
            case  7:
                $this->setupinput();
                break;
                    
            default:
                $this->listdata();
                break;
        }
    }
   
    public function setupinput(){
         $active = urldecode($this->input->get('active', TRUE));
         $data = array(
         'active' => $active,
         'content' => 'backend/lainlain/setupinput.php',
         );
         $this->load->view(layout(), $data);
     } 

    public function inputdata($active) 
    {
        
        $this->jenis = array(0=>"Simpanan", 1=>"Investasi", 2=>"Simkesan", 3=>"Pinjaman", 4=>"Kasbon");
        $this->inout = array(0=>"Masuk", 1=>"Keluar");
        $m = urldecode($this->input->get('m', TRUE));
        if($active == 2){ 
            $j = 0; //simpanan
        }
        else if($active == 3){
            $j = 1; //investasi
        }
        else if($active == 4){
            $j = 2; //simkesan
        }
        else if($active == 5){
            $j = 3; //pinjaman
        }
        else if($active == 6){
            $j = 4; //kasir
        }
        $data = array(
            'j' => $j,
            'm' => $m,
            'active' => $active,
            'button' => 'input',
            'action' => site_url('lainlain/inputdata_action'),
	    'content' => 'backend/lainlain/lainlain_input',
	);
        $this->load->view(layout(), $data);
    }
    
    public function inputdata_action() 
    {
        $active = $this->input->post('active',TRUE);
            $data = array(
		'lln_jumlah' => $this->input->post('lln_jumlah',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'lln_jenis' => $this->input->post('lln_jenis',TRUE),
		'lln_inout' => $this->input->post('lln_inout',TRUE),
		'lln_tanggal' => $this->input->post('lln_tanggal',TRUE),
		'lln_keterangan' => $this->input->post('lln_keterangan',TRUE),
		'lln_tgl' => $this->tgl,
		'lln_flag' => 0,
		'lln_info' => "",
	    );

            $this->Lainlain_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lainlain/setupinput/?active='.$active));
        
    }


    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));;
        $lainlain = $this->Lainlain_model->get_limit_data( $start, $q);


        $data = array(
            'lainlain_data' => $lainlain,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/lainlain/lainlain_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lainlain/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'lainlain/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'lainlain/index.html';
            $config['first_url'] = base_url() . 'lainlain/index.html';
        }
        $lainlain = $this->Lainlain_model->get_limit_data($start, $q);


        $data = array(
            'lainlain_data' => $lainlain,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/lainlain/lainlain_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Lainlain_model->get_by_id($id);
        if ($row) {
            $data = array(
		'lln_id' => $row->lln_id,
		'lln_jumlah' => $row->lln_jumlah,
		'lln_jenis' => $row->lln_jenis,
		'lln_inout' => $row->lln_inout,
		'lln_tanggal' => $row->lln_tanggal,
		'lln_tgl' => $row->lln_tgl,
		'lln_flag' => $row->lln_flag,
		'lln_info' => $row->lln_info,'content' => 'backend/lainlain/lainlain_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lainlain'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lainlain/create_action'),
	    'lln_id' => set_value('lln_id'),
	    'lln_jumlah' => set_value('lln_jumlah'),
	    'lln_jenis' => set_value('lln_jenis'),
	    'lln_inout' => set_value('lln_inout'),
	    'lln_tanggal' => set_value('lln_tanggal'),
	    'lln_tgl' => set_value('lln_tgl'),
	    'lln_flag' => set_value('lln_flag'),
	    'lln_info' => set_value('lln_info'),
	    'content' => 'backend/lainlain/lainlain_form',
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
		'lln_jumlah' => $this->input->post('lln_jumlah',TRUE),
		'lln_jenis' => $this->input->post('lln_jenis',TRUE),
		'lln_inout' => $this->input->post('lln_inout',TRUE),
		'lln_tanggal' => $this->input->post('lln_tanggal',TRUE),
		'lln_tgl' => $this->tgl,
		'lln_flag' => 0,
		'lln_info' => "",
	    );

            $this->Lainlain_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lainlain'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lainlain_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lainlain/update_action'),
		'lln_id' => set_value('lln_id', $row->lln_id),
		'lln_jumlah' => set_value('lln_jumlah', $row->lln_jumlah),
		'lln_jenis' => set_value('lln_jenis', $row->lln_jenis),
		'lln_inout' => set_value('lln_inout', $row->lln_inout),
		'lln_tanggal' => set_value('lln_tanggal', $row->lln_tanggal),
		'lln_tgl' => set_value('lln_tgl', $row->lln_tgl),
		'lln_flag' => set_value('lln_flag', $row->lln_flag),
		'lln_info' => set_value('lln_info', $row->lln_info),
	    'content' => 'backend/lainlain/lainlain_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lainlain'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('lln_id', TRUE));
        } else {
            $data = array(
		'lln_jumlah' => $this->input->post('lln_jumlah',TRUE),
		'lln_jenis' => $this->input->post('lln_jenis',TRUE),
		'lln_inout' => $this->input->post('lln_inout',TRUE),
		'lln_tanggal' => $this->input->post('lln_tanggal',TRUE),
		'lln_flag' => 1,
	    );

            $this->Lainlain_model->update($this->input->post('lln_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lainlain'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lainlain_model->get_by_id($id);

        if ($row) {
            $data = array(
                'lln_flag' => 2,
            );
            
            $this->Lainlain_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lainlain'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lainlain'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('lln_jumlah', 'lln jumlah', 'trim|required');
	$this->form_validation->set_rules('lln_jenis', 'lln jenis', 'trim|required');
	$this->form_validation->set_rules('lln_inout', 'lln inout', 'trim|required');
	$this->form_validation->set_rules('lln_tanggal', 'lln tanggal', 'trim|required');

	$this->form_validation->set_rules('lln_id', 'lln_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lainlain.php */
/* Location: ./application/controllers/Lainlain.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-23 15:22:52 */
/* http://harviacode.com */