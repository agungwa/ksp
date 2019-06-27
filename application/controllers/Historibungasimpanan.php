<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Historibungasimpanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Historibungasimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'historibungasimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'historibungasimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'historibungasimpanan/index.html';
            $config['first_url'] = base_url() . 'historibungasimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Historibungasimpanan_model->total_rows($q);
        $historibungasimpanan = $this->Historibungasimpanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'historibungasimpanan_data' => $historibungasimpanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/historibungasimpanan/historibungasimpanan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'historibungasimpanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'historibungasimpanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'historibungasimpanan/index.html';
            $config['first_url'] = base_url() . 'historibungasimpanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Historibungasimpanan_model->total_rows($q);
        $historibungasimpanan = $this->Historibungasimpanan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'historibungasimpanan_data' => $historibungasimpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/historibungasimpanan/historibungasimpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Historibungasimpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'hbs_id' => $row->hbs_id,
		'ang_no' => $row->ang_no,
		'hbs_tglterakhir' => $row->hbs_tglterakhir,
		'hbs_tgl' => $row->hbs_tgl,
		'hbs_flag' => $row->hbs_flag,
		'hbs_info' => $row->hbs_info,'content' => 'backend/historibungasimpanan/historibungasimpanan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('historibungasimpanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('historibungasimpanan/create_action'),
	    'hbs_id' => set_value('hbs_id'),
	    'ang_no' => set_value('ang_no'),
	    'hbs_tglterakhir' => set_value('hbs_tglterakhir'),
	    'content' => 'backend/historibungasimpanan/historibungasimpanan_form',
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
		'hbs_tglterakhir' => $this->input->post('hbs_tglterakhir',TRUE),
		'hbs_tgl' => $this->tgl,
		'hbs_flag' => 0,
		'hbs_info' => "",
	    );

            $this->Historibungasimpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('historibungasimpanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Historibungasimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('historibungasimpanan/update_action'),
		'hbs_id' => set_value('hbs_id', $row->hbs_id),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'hbs_tglterakhir' => set_value('hbs_tglterakhir', $row->hbs_tglterakhir),
	    'content' => 'backend/historibungasimpanan/historibungasimpanan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('historibungasimpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('hbs_id', TRUE));
        } else {
            $data = array(
		'ang_no' => $this->input->post('ang_no',TRUE),
		'hbs_tglterakhir' => $this->input->post('hbs_tglterakhir',TRUE),
		'hbs_flag' => 1,
	    );

            $this->Historibungasimpanan_model->update($this->input->post('hbs_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('historibungasimpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Historibungasimpanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'hbs_flag' => 2,
            );
            $this->Historibungasimpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('historibungasimpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('historibungasimpanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('hbs_tglterakhir', 'hbs tglterakhir', 'trim|required');
	$this->form_validation->set_rules('hbs_id', 'hbs_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Historibungasimpanan.php */
/* Location: ./application/controllers/Historibungasimpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-26 13:41:37 */
/* http://harviacode.com */