<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phu extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Phu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        
		$phu = $this->Phu_model->get_limit_data($start, $q);
        $data = array(
            'phu_data' => $phu,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phu/phu_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        $phu = $this->Phu_model->get_limit_data( $start, $q);


        $data = array(
            'phu_data' => $phu,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/phu/phu_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Phu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'phu_gaji' => $row->phu_gaji,
		'phu_operasional' => $row->phu_operasional,
		'phu_lps' => $row->phu_lps,
		'phu_komunikasi' => $row->phu_komunikasi,
		'phu_perlengkapan' => $row->phu_perlengkapan,
		'phu_penyusutan' => $row->phu_penyusutan,
		'phu_asuransi' => $row->phu_asuransi,
		'phu_insentif' => $row->phu_insentif,
		'phu_pajakkendaraan' => $row->phu_pajakkendaraan,
		'phu_rapat' => $row->phu_rapat,
		'phu_atk' => $row->phu_atk,
		'phu_keamanan' => $row->phu_keamanan,
		'phu_phpinjaman' => $row->phu_phpinjaman,
		'phu_sosial' => $row->phu_sosial,
		'phu_tayakuran' => $row->phu_tayakuran,
		'phu_koran' => $row->phu_koran,
		'phu_pajakkoprasi' => $row->phu_pajakkoprasi,
		'phu_servicekendaraan' => $row->phu_servicekendaraan,
		'phu_konsumsi' => $row->phu_konsumsi,
		'phu_rat' => $row->phu_rat,
		'phu_thr' => $row->phu_thr,
		'phu_nonoprasional' => $row->phu_nonoprasional,
		'phu_perawatankantor' => $row->phu_perawatankantor,
		'phu_tgl' => $row->phu_tgl,
		'phu_info' => $row->phu_info,
		'phu_flag' => $row->phu_flag,'content' => 'backend/phu/phu_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('phu/create_action'),
	    'phu_id' => set_value('phu_id'),
	    'phu_gaji' => set_value('phu_gaji'),
	    'phu_operasional' => set_value('phu_operasional'),
	    'phu_lps' => set_value('phu_lps'),
	    'phu_komunikasi' => set_value('phu_komunikasi'),
	    'phu_perlengkapan' => set_value('phu_perlengkapan'),
	    'phu_penyusutan' => set_value('phu_penyusutan'),
	    'phu_asuransi' => set_value('phu_asuransi'),
	    'phu_insentif' => set_value('phu_insentif'),
	    'phu_pajakkendaraan' => set_value('phu_pajakkendaraan'),
	    'phu_rapat' => set_value('phu_rapat'),
	    'phu_atk' => set_value('phu_atk'),
	    'phu_keamanan' => set_value('phu_keamanan'),
	    'phu_phpinjaman' => set_value('phu_phpinjaman'),
	    'phu_sosial' => set_value('phu_sosial'),
	    'phu_tayakuran' => set_value('phu_tayakuran'),
	    'phu_koran' => set_value('phu_koran'),
	    'phu_pajakkoprasi' => set_value('phu_pajakkoprasi'),
	    'phu_servicekendaraan' => set_value('phu_servicekendaraan'),
	    'phu_konsumsi' => set_value('phu_konsumsi'),
	    'phu_rat' => set_value('phu_rat'),
	    'phu_thr' => set_value('phu_thr'),
	    'phu_nonoprasional' => set_value('phu_nonoprasional'),
	    'phu_perawatankantor' => set_value('phu_perawatankantor'),
	    'content' => 'backend/phu/phu_form',
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
		'phu_gaji' => $this->input->post('phu_gaji',TRUE),
		'phu_operasional' => $this->input->post('phu_operasional',TRUE),
		'phu_lps' => $this->input->post('phu_lps',TRUE),
		'phu_komunikasi' => $this->input->post('phu_komunikasi',TRUE),
		'phu_perlengkapan' => $this->input->post('phu_perlengkapan',TRUE),
		'phu_penyusutan' => $this->input->post('phu_penyusutan',TRUE),
		'phu_asuransi' => $this->input->post('phu_asuransi',TRUE),
		'phu_insentif' => $this->input->post('phu_insentif',TRUE),
		'phu_pajakkendaraan' => $this->input->post('phu_pajakkendaraan',TRUE),
		'phu_rapat' => $this->input->post('phu_rapat',TRUE),
		'phu_atk' => $this->input->post('phu_atk',TRUE),
		'phu_keamanan' => $this->input->post('phu_keamanan',TRUE),
		'phu_phpinjaman' => $this->input->post('phu_phpinjaman',TRUE),
		'phu_sosial' => $this->input->post('phu_sosial',TRUE),
		'phu_tayakuran' => $this->input->post('phu_tayakuran',TRUE),
		'phu_koran' => $this->input->post('phu_koran',TRUE),
		'phu_pajakkoprasi' => $this->input->post('phu_pajakkoprasi',TRUE),
		'phu_servicekendaraan' => $this->input->post('phu_servicekendaraan',TRUE),
		'phu_konsumsi' => $this->input->post('phu_konsumsi',TRUE),
		'phu_rat' => $this->input->post('phu_rat',TRUE),
		'phu_thr' => $this->input->post('phu_thr',TRUE),
		'phu_nonoprasional' => $this->input->post('phu_nonoprasional',TRUE),
		'phu_perawatankantor' => $this->input->post('phu_perawatankantor',TRUE),
		'phu_tgl' => $this->tgl,
		'phu_info' => "",
		'phu_flag' => 0,
	    );

            $this->Phu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('phu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Phu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('phu/update_action'),
		'phu_id' => set_value('phu_id', $row->phu_id),
		'phu_gaji' => set_value('phu_gaji', $row->phu_gaji),
		'phu_operasional' => set_value('phu_operasional', $row->phu_operasional),
		'phu_lps' => set_value('phu_lps', $row->phu_lps),
		'phu_komunikasi' => set_value('phu_komunikasi', $row->phu_komunikasi),
		'phu_perlengkapan' => set_value('phu_perlengkapan', $row->phu_perlengkapan),
		'phu_penyusutan' => set_value('phu_penyusutan', $row->phu_penyusutan),
		'phu_asuransi' => set_value('phu_asuransi', $row->phu_asuransi),
		'phu_insentif' => set_value('phu_insentif', $row->phu_insentif),
		'phu_pajakkendaraan' => set_value('phu_pajakkendaraan', $row->phu_pajakkendaraan),
		'phu_rapat' => set_value('phu_rapat', $row->phu_rapat),
		'phu_atk' => set_value('phu_atk', $row->phu_atk),
		'phu_keamanan' => set_value('phu_keamanan', $row->phu_keamanan),
		'phu_phpinjaman' => set_value('phu_phpinjaman', $row->phu_phpinjaman),
		'phu_sosial' => set_value('phu_sosial', $row->phu_sosial),
		'phu_tayakuran' => set_value('phu_tayakuran', $row->phu_tayakuran),
		'phu_koran' => set_value('phu_koran', $row->phu_koran),
		'phu_pajakkoprasi' => set_value('phu_pajakkoprasi', $row->phu_pajakkoprasi),
		'phu_servicekendaraan' => set_value('phu_servicekendaraan', $row->phu_servicekendaraan),
		'phu_konsumsi' => set_value('phu_konsumsi', $row->phu_konsumsi),
		'phu_rat' => set_value('phu_rat', $row->phu_rat),
		'phu_thr' => set_value('phu_thr', $row->phu_thr),
		'phu_nonoprasional' => set_value('phu_nonoprasional', $row->phu_nonoprasional),
		'phu_perawatankantor' => set_value('phu_perawatankantor', $row->phu_perawatankantor),
	    'content' => 'backend/phu/phu_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('phu_id', TRUE));
        } else {
            $data = array(
		'phu_gaji' => $this->input->post('phu_gaji',TRUE),
		'phu_operasional' => $this->input->post('phu_operasional',TRUE),
		'phu_lps' => $this->input->post('phu_lps',TRUE),
		'phu_komunikasi' => $this->input->post('phu_komunikasi',TRUE),
		'phu_perlengkapan' => $this->input->post('phu_perlengkapan',TRUE),
		'phu_penyusutan' => $this->input->post('phu_penyusutan',TRUE),
		'phu_asuransi' => $this->input->post('phu_asuransi',TRUE),
		'phu_insentif' => $this->input->post('phu_insentif',TRUE),
		'phu_pajakkendaraan' => $this->input->post('phu_pajakkendaraan',TRUE),
		'phu_rapat' => $this->input->post('phu_rapat',TRUE),
		'phu_atk' => $this->input->post('phu_atk',TRUE),
		'phu_keamanan' => $this->input->post('phu_keamanan',TRUE),
		'phu_phpinjaman' => $this->input->post('phu_phpinjaman',TRUE),
		'phu_sosial' => $this->input->post('phu_sosial',TRUE),
		'phu_tayakuran' => $this->input->post('phu_tayakuran',TRUE),
		'phu_koran' => $this->input->post('phu_koran',TRUE),
		'phu_pajakkoprasi' => $this->input->post('phu_pajakkoprasi',TRUE),
		'phu_servicekendaraan' => $this->input->post('phu_servicekendaraan',TRUE),
		'phu_konsumsi' => $this->input->post('phu_konsumsi',TRUE),
		'phu_rat' => $this->input->post('phu_rat',TRUE),
		'phu_thr' => $this->input->post('phu_thr',TRUE),
		'phu_nonoprasional' => $this->input->post('phu_nonoprasional',TRUE),
		'phu_perawatankantor' => $this->input->post('phu_perawatankantor',TRUE),
		'phu_flag' => 1,
	    );

            $this->Phu_model->update($this->input->post('phu_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('phu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Phu_model->get_by_id($id);

        if ($row) {
            $data = array(
            'phu_flag' => 2,
            );
            $this->Phu_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('phu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('phu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('phu_gaji', 'phu gaji', 'trim|required');
	$this->form_validation->set_rules('phu_operasional', 'phu operasional', 'trim|required');
	$this->form_validation->set_rules('phu_lps', 'phu lps', 'trim|required');
	$this->form_validation->set_rules('phu_komunikasi', 'phu komunikasi', 'trim|required');
	$this->form_validation->set_rules('phu_perlengkapan', 'phu perlengkapan', 'trim|required');
	$this->form_validation->set_rules('phu_penyusutan', 'phu penyusutan', 'trim|required');
	$this->form_validation->set_rules('phu_asuransi', 'phu asuransi', 'trim|required');
	$this->form_validation->set_rules('phu_insentif', 'phu insentif', 'trim|required');
	$this->form_validation->set_rules('phu_pajakkendaraan', 'phu pajakkendaraan', 'trim|required');
	$this->form_validation->set_rules('phu_rapat', 'phu rapat', 'trim|required');
	$this->form_validation->set_rules('phu_atk', 'phu atk', 'trim|required');
	$this->form_validation->set_rules('phu_keamanan', 'phu keamanan', 'trim|required');
	$this->form_validation->set_rules('phu_phpinjaman', 'phu phpinjaman', 'trim|required');
	$this->form_validation->set_rules('phu_sosial', 'phu sosial', 'trim|required');
	$this->form_validation->set_rules('phu_tayakuran', 'phu tayakuran', 'trim|required');
	$this->form_validation->set_rules('phu_koran', 'phu koran', 'trim|required');
	$this->form_validation->set_rules('phu_pajakkoprasi', 'phu pajakkoprasi', 'trim|required');
	$this->form_validation->set_rules('phu_servicekendaraan', 'phu servicekendaraan', 'trim|required');
	$this->form_validation->set_rules('phu_konsumsi', 'phu konsumsi', 'trim|required');
	$this->form_validation->set_rules('phu_rat', 'phu rat', 'trim|required');
	$this->form_validation->set_rules('phu_thr', 'phu thr', 'trim|required');
	$this->form_validation->set_rules('phu_nonoprasional', 'phu nonoprasional', 'trim|required');
	$this->form_validation->set_rules('phu_perawatankantor', 'phu perawatankantor', 'trim|required');
	$this->form_validation->set_rules('phu_id', 'phu_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Phu.php */
/* Location: ./application/controllers/Phu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-02 14:24:30 */
/* http://harviacode.com */