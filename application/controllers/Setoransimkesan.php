<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->setoran();
                break;
            case  2:
                $this->titipan();
                break;
            case  3:
                $this->listSetoran();
                break;
            case  4:
                $this->listTitipan();
                break;

            default:
                $this->setoran();
                break;
        }
    } 

    public function setoran(){
        $data = array(
            'content' => 'backend/setoransimkesan/index',
            'item'=> 'setoransimkesan_form.php',
            'active' => 1
        );

        $this->load->view(layout(), $data);
    }

    public function titipan(){
        $data = array(
            'content' => 'backend/setoransimkesan/index',
            'item'=> 'setoransimkesan_form.php',
            'active' => 2
        );

        $this->load->view(layout(), $data);
    }

    public function listSetoran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimkesan_model->total_rows($q);
        $setoransimkesan = $this->Setoransimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,  
            'active' => 4,          
            'content' => 'backend/setoransimkesan/index',
            'item'=> 'setoransimkesan_list.php',
        );
        $this->load->view(layout(), $data);
    }


    public function listTitipan(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimkesan_model->total_rows($q);
        $setoransimkesan = $this->Setoransimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 4,
            'content' => 'backend/setoransimkesan/index',
            'item'=> 'setoransimkesan_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'setoransimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'setoransimkesan/index.html';
            $config['first_url'] = base_url() . 'setoransimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Setoransimkesan_model->total_rows($q);
        $setoransimkesan = $this->Setoransimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/setoransimkesan/setoransimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'ssk_id' => $row->ssk_id,
    		'sik_kode' => $row->sik_kode,
    		'ssk_tglsetoran' => $row->ssk_tglsetoran,
    		'ssk_tglbayar' => $row->ssk_tglbayar,
    		'ssk_jmlsetor' => $row->ssk_jmlsetor,
    		'ssk_status' => $row->ssk_status,
            'content' => 'backend/setoransimkesan/setoransimkesan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('setoransimkesan/create_action'),
    	    'ssk_id' => set_value('ssk_id'),
    	    'sik_kode' => set_value('sik_kode'),
            'nm_sik_kode' => set_value('nm_sik_kode'),
    	    'ssk_tglsetoran' => set_value('ssk_tglsetoran'),
    	    'ssk_tglbayar' => set_value('ssk_tglbayar'),
    	    'ssk_jmlsetor' => set_value('ssk_jmlsetor'),
    	    'ssk_status' => set_value('ssk_status'),
    	    'ssk_tgl' => set_value('ssk_tgl'),
    	    'ssk_flag' => set_value('ssk_flag'),
    	    'ssk_info' => set_value('ssk_info'),
    	    'content' => 'backend/setoransimkesan/setoransimkesan_form',
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
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'ssk_tglsetoran' => $this->input->post('ssk_tglsetoran',TRUE),
    		'ssk_tglbayar' => $this->input->post('ssk_tglbayar',TRUE),
    		'ssk_jmlsetor' => $this->input->post('ssk_jmlsetor',TRUE),
    		'ssk_status' => $this->input->post('ssk_status',TRUE),
    		'ssk_tgl' => $this->tgl,
    		'ssk_flag' => 0,
    		'ssk_info' => "",
    	    );

            $this->Setoransimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setoransimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setoransimkesan/update_action'),
        		'ssk_id' => set_value('ssk_id', $row->ssk_id),
        		'sik_kode' => set_value('sik_kode', $row->sik_kode),
                'nm_sik_kode' => set_value('nm_sik_kode', $row->sik_kode),
        		'ssk_tglsetoran' => set_value('ssk_tglsetoran', $row->ssk_tglsetoran),
        		'ssk_tglbayar' => set_value('ssk_tglbayar', $row->ssk_tglbayar),
        		'ssk_jmlsetor' => set_value('ssk_jmlsetor', $row->ssk_jmlsetor),
        		'ssk_status' => set_value('ssk_status', $row->ssk_status),
        	    'content' => 'backend/setoransimkesan/setoransimkesan_update',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoransimkesan'));
        }
    }
    
    public function update_action() 
    {
            $data = array(
    		'ssk_jmlsetor' => $this->input->post('ssk_jmlsetor',TRUE),
    		'ssk_flag' => 1,
    	    );

            $this->Setoransimkesan_model->update($this->input->post('ssk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simkesan/setoransimkesan/'.$this->input->post('sik_kode',TRUE)));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Setoransimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'ssk_flag' => 2,
            );

            $this->Setoransimkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simkesan/setoransimkesan/'.$row->sik_kode));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan/setoransimkesan/'.$row->sik_kode));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');

	$this->form_validation->set_rules('ssk_id', 'ssk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setoransimkesan.php */
/* Location: ./application/controllers/Setoransimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:13 */
/* http://harviacode.com */