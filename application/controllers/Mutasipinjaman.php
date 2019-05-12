<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasipinjaman extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasipinjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasipinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasipinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasipinjaman/index.html';
            $config['first_url'] = base_url() . 'mutasipinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasipinjaman_model->total_rows($q);
        $mutasipinjaman = $this->Mutasipinjaman_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasipinjaman_data' => $mutasipinjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasipinjaman/mutasipinjaman_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasipinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasipinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasipinjaman/index.html';
            $config['first_url'] = base_url() . 'mutasipinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasipinjaman_model->total_rows($q);
        $mutasipinjaman = $this->Mutasipinjaman_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'mutasipinjaman_data' => $mutasipinjaman,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/mutasipinjaman/mutasipinjaman_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Mutasipinjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'mup_id' => $row->mup_id,
    		'pin_id' => $row->pin_id,
    		'mup_tglmutasi' => $row->mup_tglmutasi,
    		'mup_asal' => $row->mup_asal,
    		'mup_tujuan' => $row->mup_tujuan,
    		'mup_status' => $row->mup_status,
            'content' => 'backend/mutasipinjaman/mutasipinjaman_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasipinjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('mutasipinjaman/create_action'),
    	    'mup_id' => set_value('mup_id'),
    	    'pin_id' => set_value('pin_id'),
            'nm_pin_id' => set_value('nm_pin_id'),
    	    'mup_tglmutasi' => set_value('mup_tglmutasi'),
    	    'mup_asal' => set_value('mup_asal'),
    	    'mup_tujuan' => set_value('mup_tujuan'),
    	    'mup_status' => set_value('mup_status'),
    	    'content' => 'backend/mutasipinjaman/mutasipinjaman_form',
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
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'mup_tglmutasi' => $this->input->post('mup_tglmutasi',TRUE),
    		'mup_asal' => $this->input->post('mup_asal',TRUE),
    		'mup_tujuan' => $this->input->post('mup_tujuan',TRUE),
    		'mup_status' => $this->input->post('mup_status',TRUE),
    		'mup_tgl' => $this->tgl,
    		'mup_flag' => 0,
    		'mup_info' => "",
    	    );

            $this->Mutasipinjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mutasipinjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mutasipinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasipinjaman/update_action'),
        		'mup_id' => set_value('mup_id', $row->mup_id),
        		'pin_id' => set_value('pin_id', $row->pin_id),
                'nm_pin_id' => set_value('pin_id', $row->pin_id),
        		'mup_tglmutasi' => set_value('mup_tglmutasi', $row->mup_tglmutasi),
        		'mup_asal' => set_value('mup_asal', $row->mup_asal),
        		'mup_tujuan' => set_value('mup_tujuan', $row->mup_tujuan),
        		'mup_status' => set_value('mup_status', $row->mup_status),
        	    'content' => 'backend/mutasipinjaman/mutasipinjaman_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasipinjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('mup_id', TRUE));
        } else {
            $data = array(
    		'pin_id' => $this->input->post('pin_id',TRUE),
    		'mup_tglmutasi' => $this->input->post('mup_tglmutasi',TRUE),
    		'mup_asal' => $this->input->post('mup_asal',TRUE),
    		'mup_tujuan' => $this->input->post('mup_tujuan',TRUE),
    		'mup_status' => $this->input->post('mup_status',TRUE),
    		'mup_flag' => 1,
    	    );

            $this->Mutasipinjaman_model->update($this->input->post('mup_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasipinjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mutasipinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
            'mup_flag' => 2,
            );

            $this->Mutasipinjaman_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasipinjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasipinjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('mup_tglmutasi', 'mup tglmutasi', 'trim|required');
	$this->form_validation->set_rules('mup_asal', 'mup asal', 'trim|required');
	$this->form_validation->set_rules('mup_tujuan', 'mup tujuan', 'trim|required');
	$this->form_validation->set_rules('mup_status', 'mup status', 'trim|required');

	$this->form_validation->set_rules('mup_id', 'mup_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mutasipinjaman.php */
/* Location: ./application/controllers/Mutasipinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:58 */
/* http://harviacode.com */