<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ahliwarissimkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ahliwarissimkesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ahliwarissimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ahliwarissimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ahliwarissimkesan/index.html';
            $config['first_url'] = base_url() . 'ahliwarissimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ahliwarissimkesan_model->total_rows($q);
        $ahliwarissimkesan = $this->Ahliwarissimkesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ahliwarissimkesan_data' => $ahliwarissimkesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/ahliwarissimkesan/ahliwarissimkesan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ahliwarissimkesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ahliwarissimkesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ahliwarissimkesan/index.html';
            $config['first_url'] = base_url() . 'ahliwarissimkesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ahliwarissimkesan_model->total_rows($q);
        $ahliwarissimkesan = $this->Ahliwarissimkesan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'ahliwarissimkesan_data' => $ahliwarissimkesan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/ahliwarissimkesan/ahliwarissimkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Ahliwarissimkesan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'aws_id' => $row->aws_id,
    		'sik_kode' => $row->sik_kode,
    		'aws_noid' => $row->aws_noid,
    		'aws_jenisid' => $row->aws_jenisid,
    		'aws_nama' => $row->aws_nama,
    		'aws_alamat' => $row->aws_alamat,
    		'aws_hubungan' => $row->aws_hubungan,
    		'aws_lampiran' => $row->aws_lampiran,
    		'content' => 'backend/ahliwarissimkesan/ahliwarissimkesan_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahliwarissimkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('ahliwarissimkesan/create_action'),
    	    'aws_id' => set_value('aws_id'),
    	    'sik_kode' => set_value('sik_kode'),
            'nm_sik_kode' => set_value('nm_sik_kode'),
    	    'aws_noid' => set_value('aws_noid'),
    	    'aws_jenisid' => set_value('aws_jenisid'),
    	    'aws_nama' => set_value('aws_nama'),
    	    'aws_alamat' => set_value('aws_alamat'),
    	    'aws_hubungan' => set_value('aws_hubungan'),
    	    'aws_lampiran' => set_value('aws_lampiran'),
    	    'aws_tgl' => set_value('aws_tgl'),
    	    'aws_flag' => set_value('aws_flag'),
    	    'aws_info' => set_value('aws_info'),
    	    'content' => 'backend/ahliwarissimkesan/ahliwarissimkesan_form',
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
    		'aws_noid' => $this->input->post('aws_noid',TRUE),
    		'aws_jenisid' => $this->input->post('aws_jenisid',TRUE),
    		'aws_nama' => $this->input->post('aws_nama',TRUE),
    		'aws_alamat' => $this->input->post('aws_alamat',TRUE),
    		'aws_hubungan' => $this->input->post('aws_hubungan',TRUE),
    		'aws_lampiran' => $this->input->post('aws_lampiran',TRUE),
    		'aws_tgl' => $this->tgl,
    		'aws_flag' => 0,
    		'aws_info' => "",
    	    );

            $this->Ahliwarissimkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ahliwarissimkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ahliwarissimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ahliwarissimkesan/update_action'),
        		'aws_id' => set_value('aws_id', $row->aws_id),
        		'sik_kode' => set_value('sik_kode', $row->sik_kode),
                'nm_sik_kode' => set_value('sik_kode', $row->sik_kode),
        		'aws_noid' => set_value('aws_noid', $row->aws_noid),
        		'aws_jenisid' => set_value('aws_jenisid', $row->aws_jenisid),
        		'aws_nama' => set_value('aws_nama', $row->aws_nama),
        		'aws_alamat' => set_value('aws_alamat', $row->aws_alamat),
        		'aws_hubungan' => set_value('aws_hubungan', $row->aws_hubungan),
        		'aws_lampiran' => set_value('aws_lampiran', $row->aws_lampiran),
        		'aws_tgl' => set_value('aws_tgl', $row->aws_tgl),
        		'aws_flag' => set_value('aws_flag', $row->aws_flag),
        		'aws_info' => set_value('aws_info', $row->aws_info),
        	    'content' => 'backend/ahliwarissimkesan/ahliwarissimkesan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahliwarissimkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('aws_id', TRUE));
        } else {
            $data = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'aws_noid' => $this->input->post('aws_noid',TRUE),
    		'aws_jenisid' => $this->input->post('aws_jenisid',TRUE),
    		'aws_nama' => $this->input->post('aws_nama',TRUE),
    		'aws_alamat' => $this->input->post('aws_alamat',TRUE),
    		'aws_hubungan' => $this->input->post('aws_hubungan',TRUE),
    		'aws_lampiran' => $this->input->post('aws_lampiran',TRUE),
    		'aws_flag' => 1
    	    );

            $this->Ahliwarissimkesan_model->update($this->input->post('aws_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ahliwarissimkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ahliwarissimkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'aws_flag' => 2
            );

            $this->Ahliwarissimkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ahliwarissimkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahliwarissimkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sik_kode', 'sik kode', 'trim|required');
	$this->form_validation->set_rules('aws_noid', 'aws noid', 'trim|required');
	$this->form_validation->set_rules('aws_jenisid', 'aws jenisid', 'trim|required');
	$this->form_validation->set_rules('aws_nama', 'aws nama', 'trim|required');
	$this->form_validation->set_rules('aws_alamat', 'aws alamat', 'trim|required');
	$this->form_validation->set_rules('aws_hubungan', 'aws hubungan', 'trim|required');
	$this->form_validation->set_rules('aws_lampiran', 'aws lampiran', 'trim|required');

	$this->form_validation->set_rules('aws_id', 'aws_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ahliwarissimkesan.php */
/* Location: ./application/controllers/Ahliwarissimkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:39:31 */
/* http://harviacode.com */