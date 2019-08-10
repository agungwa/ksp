<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neracakewajibanjangkapanjang extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Neracakewajibanjangkapanjang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $neracakewajibanjangkapanjang = $this->Neracakewajibanjangkapanjang_model->get_limit_data($start, $q);

        $data = array(
            'neracakewajibanjangkapanjang_data' => $neracakewajibanjangkapanjang,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakewajibanjangkapanjang/neracakewajibanjangkapanjang_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        $neracakewajibanjangkapanjang = $this->Neracakewajibanjangkapanjang_model->get_limit_data( $start, $q);


        $data = array(
            'neracakewajibanjangkapanjang_data' => $neracakewajibanjangkapanjang,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/neracakewajibanjangkapanjang/neracakewajibanjangkapanjang_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Neracakewajibanjangkapanjang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'njp_id' => $row->njp_id,
		'njp_tanggal' => $row->njp_tanggal,
		'njp_rekeningkoran' => $row->njp_rekeningkoran,
		'njp_modalpenyertaan' => $row->njp_modalpenyertaan,
		'njp_tgl' => $row->njp_tgl,
		'njp_flag' => $row->njp_flag,
		'njp_info' => $row->njp_info,'content' => 'backend/neracakewajibanjangkapanjang/neracakewajibanjangkapanjang_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakewajibanjangkapanjang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('neracakewajibanjangkapanjang/create_action'),
	    'njp_id' => set_value('njp_id'),
	    'njp_tanggal' => set_value('njp_tanggal'),
	    'njp_rekeningkoran' => set_value('njp_rekeningkoran'),
	    'njp_modalpenyertaan' => set_value('njp_modalpenyertaan'),
	    'content' => 'backend/neracakewajibanjangkapanjang/neracakewajibanjangkapanjang_form',
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
		'njp_tanggal' => $this->input->post('njp_tanggal',TRUE),
		'njp_rekeningkoran' => $this->input->post('njp_rekeningkoran',TRUE),
		'njp_modalpenyertaan' => $this->input->post('njp_modalpenyertaan',TRUE),
		'njp_tgl' => $this->tgl,
		'njp_flag' => 0,
		'njp_info' => "",
	    );

            $this->Neracakewajibanjangkapanjang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('neracakewajibanjangkapanjang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Neracakewajibanjangkapanjang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('neracakewajibanjangkapanjang/update_action'),
		'njp_id' => set_value('njp_id', $row->njp_id),
		'njp_tanggal' => set_value('njp_tanggal', $row->njp_tanggal),
		'njp_rekeningkoran' => set_value('njp_rekeningkoran', $row->njp_rekeningkoran),
		'njp_modalpenyertaan' => set_value('njp_modalpenyertaan', $row->njp_modalpenyertaan),
	    'content' => 'backend/neracakewajibanjangkapanjang/neracakewajibanjangkapanjang_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakewajibanjangkapanjang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('njp_id', TRUE));
        } else {
            $data = array(
		'njp_tanggal' => $this->input->post('njp_tanggal',TRUE),
		'njp_rekeningkoran' => $this->input->post('njp_rekeningkoran',TRUE),
		'njp_modalpenyertaan' => $this->input->post('njp_modalpenyertaan',TRUE),
		'njp_tgl' => $this->tgl,
		'njp_flag' => 1,
		'njp_info' => "",
	    );

            $this->Neracakewajibanjangkapanjang_model->update($this->input->post('njp_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('neracakewajibanjangkapanjang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Neracakewajibanjangkapanjang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'njp_flag' => 2,
            );
            $this->Neracakewajibanjangkapanjang_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('neracakewajibanjangkapanjang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('neracakewajibanjangkapanjang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('njp_tanggal', 'njp tanggal', 'trim|required');
	$this->form_validation->set_rules('njp_rekeningkoran', 'njp rekeningkoran', 'trim|required');
	$this->form_validation->set_rules('njp_modalpenyertaan', 'njp modalpenyertaan', 'trim|required');

	$this->form_validation->set_rules('njp_id', 'njp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Neracakewajibanjangkapanjang.php */
/* Location: ./application/controllers/Neracakewajibanjangkapanjang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-10 00:18:54 */
/* http://harviacode.com */