<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settingangsuran extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Settingangsuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingangsuran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingangsuran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingangsuran/index.html';
            $config['first_url'] = base_url() . 'settingangsuran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingangsuran_model->total_rows($q);
        $settingangsuran = $this->Settingangsuran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'settingangsuran_data' => $settingangsuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingangsuran/settingangsuran_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'settingangsuran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'settingangsuran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'settingangsuran/index.html';
            $config['first_url'] = base_url() . 'settingangsuran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Settingangsuran_model->total_rows($q);
        $settingangsuran = $this->Settingangsuran_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'settingangsuran_data' => $settingangsuran,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/settingangsuran/settingangsuran_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Settingangsuran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'sea_id' => $row->sea_id,
		'sea_tenor' => $row->sea_tenor,
        'content' => 'backend/settingangsuran/settingangsuran_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingangsuran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('settingangsuran/create_action'),
	    'sea_id' => set_value('sea_id'),
	    'sea_tenor' => set_value('sea_tenor'),
	    'content' => 'backend/settingangsuran/settingangsuran_form',
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
		'sea_tenor' => $this->input->post('sea_tenor',TRUE),
		'sea_tgl' => $this->tgl,
		'sea_flag' => 0,
		'sea_info' => "",
	    );

            $this->Settingangsuran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('settingangsuran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Settingangsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('settingangsuran/update_action'),
		'sea_id' => set_value('sea_id', $row->sea_id),
		'sea_tenor' => set_value('sea_tenor', $row->sea_tenor),
	    'content' => 'backend/settingangsuran/settingangsuran_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingangsuran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sea_id', TRUE));
        } else {
            $data = array(
		          'sea_tenor' => $this->input->post('sea_tenor',TRUE),
		          'sea_flag' => 1,
	               );

            $this->Settingangsuran_model->update($this->input->post('sea_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('settingangsuran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Settingangsuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                  'sea_flag' => 2,
                   );

            $this->Settingangsuran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('settingangsuran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('settingangsuran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sea_tenor', 'sea tenor', 'trim|required');

	$this->form_validation->set_rules('sea_id', 'sea_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Settingangsuran.php */
/* Location: ./application/controllers/Settingangsuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:25 */
/* http://harviacode.com */