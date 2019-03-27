<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pinjaman/index.html';
            $config['first_url'] = base_url() . 'pinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pinjaman_model->total_rows($q);
        $pinjaman = $this->Pinjaman_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pinjaman_data' => $pinjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/pinjaman/pinjaman_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pinjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pinjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pinjaman/index.html';
            $config['first_url'] = base_url() . 'pinjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pinjaman_model->total_rows($q);
        $pinjaman = $this->Pinjaman_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'pinjaman_data' => $pinjaman,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/pinjaman/pinjaman_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pin_id' => $row->pin_id,
		'ang_no' => $row->ang_no,
		'sea_id' => $row->sea_id,
		'bup_id' => $row->bup_id,
		'pop_id' => $row->pop_id,
		'wil_kode' => $row->wil_kode,
		'skp_id' => $row->skp_id,
		'pen_id' => $row->pen_id,
		'pin_pengajuan' => $row->pin_pengajuan,
		'pin_pinjaman' => $row->pin_pinjaman,
		'pin_tglpengajuan' => $row->pin_tglpengajuan,
		'pin_tglpencairan' => $row->pin_tglpencairan,
		'pin_marketing' => $row->pin_marketing,
		'pin_surveyor' => $row->pin_surveyor,
		'pin_survey' => $row->pin_survey,
		'pin_statuspinjaman' => $row->pin_statuspinjaman,
		'pin_tgl' => $row->pin_tgl,
		'pin_flag' => $row->pin_flag,
		'pin_info' => $row->pin_info,'content' => 'backend/pinjaman/pinjaman_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pinjaman/create_action'),
	    'pin_id' => set_value('pin_id'),
	    'ang_no' => set_value('ang_no'),
	    'sea_id' => set_value('sea_id'),
	    'bup_id' => set_value('bup_id'),
	    'pop_id' => set_value('pop_id'),
	    'wil_kode' => set_value('wil_kode'),
	    'skp_id' => set_value('skp_id'),
	    'pen_id' => set_value('pen_id'),
	    'pin_pengajuan' => set_value('pin_pengajuan'),
	    'pin_pinjaman' => set_value('pin_pinjaman'),
	    'pin_tglpengajuan' => set_value('pin_tglpengajuan'),
	    'pin_tglpencairan' => set_value('pin_tglpencairan'),
	    'pin_marketing' => set_value('pin_marketing'),
	    'pin_surveyor' => set_value('pin_surveyor'),
	    'pin_survey' => set_value('pin_survey'),
	    'pin_statuspinjaman' => set_value('pin_statuspinjaman'),
	    'pin_tgl' => set_value('pin_tgl'),
	    'pin_flag' => set_value('pin_flag'),
	    'pin_info' => set_value('pin_info'),
	    'content' => 'backend/pinjaman/pinjaman_form',
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
		'ang_no' => $this->input->post('ang_no',TRUE),
		'sea_id' => $this->input->post('sea_id',TRUE),
		'bup_id' => $this->input->post('bup_id',TRUE),
		'pop_id' => $this->input->post('pop_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'skp_id' => $this->input->post('skp_id',TRUE),
		'pen_id' => $this->input->post('pen_id',TRUE),
		'pin_pengajuan' => $this->input->post('pin_pengajuan',TRUE),
		'pin_pinjaman' => $this->input->post('pin_pinjaman',TRUE),
		'pin_tglpengajuan' => $this->input->post('pin_tglpengajuan',TRUE),
		'pin_tglpencairan' => $this->input->post('pin_tglpencairan',TRUE),
		'pin_marketing' => $this->input->post('pin_marketing',TRUE),
		'pin_surveyor' => $this->input->post('pin_surveyor',TRUE),
		'pin_survey' => $this->input->post('pin_survey',TRUE),
		'pin_statuspinjaman' => $this->input->post('pin_statuspinjaman',TRUE),
		'pin_tgl' => $this->input->post('pin_tgl',TRUE),
		'pin_flag' => $this->input->post('pin_flag',TRUE),
		'pin_info' => $this->input->post('pin_info',TRUE),
	    );

            $this->Pinjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pinjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pinjaman/update_action'),
		'pin_id' => set_value('pin_id', $row->pin_id),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'sea_id' => set_value('sea_id', $row->sea_id),
		'bup_id' => set_value('bup_id', $row->bup_id),
		'pop_id' => set_value('pop_id', $row->pop_id),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'skp_id' => set_value('skp_id', $row->skp_id),
		'pen_id' => set_value('pen_id', $row->pen_id),
		'pin_pengajuan' => set_value('pin_pengajuan', $row->pin_pengajuan),
		'pin_pinjaman' => set_value('pin_pinjaman', $row->pin_pinjaman),
		'pin_tglpengajuan' => set_value('pin_tglpengajuan', $row->pin_tglpengajuan),
		'pin_tglpencairan' => set_value('pin_tglpencairan', $row->pin_tglpencairan),
		'pin_marketing' => set_value('pin_marketing', $row->pin_marketing),
		'pin_surveyor' => set_value('pin_surveyor', $row->pin_surveyor),
		'pin_survey' => set_value('pin_survey', $row->pin_survey),
		'pin_statuspinjaman' => set_value('pin_statuspinjaman', $row->pin_statuspinjaman),
		'pin_tgl' => set_value('pin_tgl', $row->pin_tgl),
		'pin_flag' => set_value('pin_flag', $row->pin_flag),
		'pin_info' => set_value('pin_info', $row->pin_info),
	    'content' => 'backend/pinjaman/pinjaman_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'pin_id' => $this->input->post('pin_id',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'sea_id' => $this->input->post('sea_id',TRUE),
		'bup_id' => $this->input->post('bup_id',TRUE),
		'pop_id' => $this->input->post('pop_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'skp_id' => $this->input->post('skp_id',TRUE),
		'pen_id' => $this->input->post('pen_id',TRUE),
		'pin_pengajuan' => $this->input->post('pin_pengajuan',TRUE),
		'pin_pinjaman' => $this->input->post('pin_pinjaman',TRUE),
		'pin_tglpengajuan' => $this->input->post('pin_tglpengajuan',TRUE),
		'pin_tglpencairan' => $this->input->post('pin_tglpencairan',TRUE),
		'pin_marketing' => $this->input->post('pin_marketing',TRUE),
		'pin_surveyor' => $this->input->post('pin_surveyor',TRUE),
		'pin_survey' => $this->input->post('pin_survey',TRUE),
		'pin_statuspinjaman' => $this->input->post('pin_statuspinjaman',TRUE),
		'pin_tgl' => $this->input->post('pin_tgl',TRUE),
		'pin_flag' => $this->input->post('pin_flag',TRUE),
		'pin_info' => $this->input->post('pin_info',TRUE),
	    );

            $this->Pinjaman_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pinjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);

        if ($row) {
            $this->Pinjaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pinjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('sea_id', 'sea id', 'trim|required');
	$this->form_validation->set_rules('bup_id', 'bup id', 'trim|required');
	$this->form_validation->set_rules('pop_id', 'pop id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('skp_id', 'skp id', 'trim|required');
	$this->form_validation->set_rules('pen_id', 'pen id', 'trim|required');
	$this->form_validation->set_rules('pin_pengajuan', 'pin pengajuan', 'trim|required');
	$this->form_validation->set_rules('pin_pinjaman', 'pin pinjaman', 'trim|required');
	$this->form_validation->set_rules('pin_tglpengajuan', 'pin tglpengajuan', 'trim|required');
	$this->form_validation->set_rules('pin_tglpencairan', 'pin tglpencairan', 'trim|required');
	$this->form_validation->set_rules('pin_marketing', 'pin marketing', 'trim|required');
	$this->form_validation->set_rules('pin_surveyor', 'pin surveyor', 'trim|required');
	$this->form_validation->set_rules('pin_survey', 'pin survey', 'trim|required');
	$this->form_validation->set_rules('pin_statuspinjaman', 'pin statuspinjaman', 'trim|required');
	$this->form_validation->set_rules('pin_tgl', 'pin tgl', 'trim|required');
	$this->form_validation->set_rules('pin_flag', 'pin flag', 'trim|required');
	$this->form_validation->set_rules('pin_info', 'pin info', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pinjaman.php */
/* Location: ./application/controllers/Pinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:42 */
/* http://harviacode.com */