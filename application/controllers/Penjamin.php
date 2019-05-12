<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjamin extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjamin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjamin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjamin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjamin/index.html';
            $config['first_url'] = base_url() . 'penjamin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjamin_model->total_rows($q);
        $penjamin = $this->Penjamin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penjamin_data' => $penjamin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penjamin/penjamin_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjamin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjamin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjamin/index.html';
            $config['first_url'] = base_url() . 'penjamin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjamin_model->total_rows($q);
        $penjamin = $this->Penjamin_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penjamin_data' => $penjamin,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penjamin/penjamin_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penjamin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pen_id' => $row->pen_id,
		'pen_noktp' => $row->pen_noktp,
		'pen_nama' => $row->pen_nama,
		'pen_alamat' => $row->pen_alamat,
		'pen_nohp' => $row->pen_nohp,
		'pen_tgl' => $row->pen_tgl,
		'pen_flag' => $row->pen_flag,
		'pen_info' => $row->pen_info,'content' => 'backend/penjamin/penjamin_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjamin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('penjamin/create_action'),
	    'pen_id' => set_value('pen_id'),
	    'pen_noktp' => set_value('pen_noktp'),
	    'pen_nama' => set_value('pen_nama'),
	    'pen_alamat' => set_value('pen_alamat'),
	    'pen_nohp' => set_value('pen_nohp'),
	    'content' => 'backend/penjamin/penjamin_form',
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
		'pen_noktp' => $this->input->post('pen_noktp',TRUE),
		'pen_nama' => $this->input->post('pen_nama',TRUE),
		'pen_alamat' => $this->input->post('pen_alamat',TRUE),
		'pen_nohp' => $this->input->post('pen_nohp',TRUE),
		'pen_tgl' => $this->tgl,
		'pen_flag' => 0,
		'pen_info' => "",
	    );

            $this->Penjamin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penjamin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjamin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjamin/update_action'),
		'pen_id' => set_value('pen_id', $row->pen_id),
		'pen_noktp' => set_value('pen_noktp', $row->pen_noktp),
		'pen_nama' => set_value('pen_nama', $row->pen_nama),
		'pen_alamat' => set_value('pen_alamat', $row->pen_alamat),
		'pen_nohp' => set_value('pen_nohp', $row->pen_nohp),
	    'content' => 'backend/penjamin/penjamin_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjamin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pen_id', TRUE));
        } else {
            $data = array(
		'pen_noktp' => $this->input->post('pen_noktp',TRUE),
		'pen_nama' => $this->input->post('pen_nama',TRUE),
		'pen_alamat' => $this->input->post('pen_alamat',TRUE),
		'pen_nohp' => $this->input->post('pen_nohp',TRUE),
		'pen_flag' => 1,
	    );

            $this->Penjamin_model->update($this->input->post('pen_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjamin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjamin_model->get_by_id($id);

        if ($row) {
            $data = array (
                'pen_flag' => 2,
            );
            $this->Penjamin_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjamin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjamin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pen_noktp', 'pen noktp', 'trim|required');
	$this->form_validation->set_rules('pen_nama', 'pen nama', 'trim|required');
	$this->form_validation->set_rules('pen_alamat', 'pen alamat', 'trim|required');
	$this->form_validation->set_rules('pen_nohp', 'pen nohp', 'trim|required');

	$this->form_validation->set_rules('pen_id', 'pen_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penjamin.php */
/* Location: ./application/controllers/Penjamin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:17 */
/* http://harviacode.com */