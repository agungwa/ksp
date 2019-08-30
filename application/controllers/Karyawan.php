<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Karyawansimpanan_model');
        $this->load->model('Karyawanijasah_model');
        $this->load->model('Keluargakaryawan_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $karyawan = $this->Karyawan_model->get_limit_data( $start, $q);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawan/karyawan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        

        $karyawan = $this->Karyawan_model->get_limit_data( $start, $q);

        $data = array(
            'karyawan_data' => $karyawan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/karyawan/karyawan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        $karyawansimpanan = $this->Karyawansimpanan_model->get_by_kar($id);
        $karyawanijasah = $this->Karyawanijasah_model->get_by_kar($id);
        $karyawankeluarga = $this->Keluargakaryawan_model->get_by_kar($id);
        if ($row) {
			$jab_kode = $this->db->get_where('jabatan', array('jab_kode' => $row->jab_kode))->row();
            $data = array(
                'karyawansimpanan' => $karyawansimpanan,
                'karyawanijasah' => $karyawanijasah,
                'karyawankeluarga' => $karyawankeluarga,
		'kar_kode' => $row->kar_kode,
		'kar_nama' => $row->kar_nama,
		'kar_nik' => $row->kar_nik,
		'jab_kode' => $jab_kode->jab_nama,
		'kar_alamat' => $row->kar_alamat,
		'kar_nohp' => $row->kar_nohp,
		'kar_status' => $row->kar_status,
        'content' => 'backend/karyawan/karyawan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'kode' => $this->Pengkodean->karyawan(),
            'button' => 'Simpan',
            'action' => site_url('karyawan/create_action'),
    	    'kar_kode' => set_value('kar_kode'),
    	    'kar_nama' => set_value('kar_nama'),
    	    'jab_kode' => set_value('jab_kode'),
            'nm_jab_kode' => set_value('nm_jab_kode'),
    	    'kar_alamat' => set_value('kar_alamat'),
    	    'kar_nohp' => set_value('kar_nohp'),
    	    'kar_simpanan' => set_value('kar_simpanan'),
    	    'kar_tgl' => set_value('kar_tgl'),
    	    'kar_flag' => set_value('kar_flag'),
    	    'kar_info' => set_value('kar_info'),
    	    'content' => 'backend/karyawan/karyawan_form',
    	);
        $this->load->view(layout(), $data);
    }
    
    public function create_action() 
    {
            $dataKaryawan = array(
            'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'kar_nama' => $this->input->post('kar_nama',TRUE),
    		'kar_nik' => $this->input->post('kar_nik',TRUE),
    		'jab_kode' => $this->input->post('jab_kode',TRUE),
    		'kar_alamat' => $this->input->post('kar_alamat',TRUE),
    		'kar_nohp' => $this->input->post('kar_nohp',TRUE),
    		'kar_simpanan' => $this->input->post('kar_simpanan',TRUE),
    		'kar_status' => 0,
    		'kar_tgl' => $this->tgl,
    		'kar_flag' => 0,
            'kar_info' => "",
            );
            $this->Karyawan_model->insert($dataKaryawan);

            $dataSimpanankaryawan = array(
                'kar_kode' => $this->input->post('kar_kode',TRUE),
                'ksi_simpanan' => $this->input->post('ksi_simpanan',TRUE),
                'ksi_status' => 0,
                'ksi_tgl' => $this->tgl,
                'ksi_flag' => 0,
                'ksi_info' => "",
            );
            $this->Karyawansimpanan_model->insert($dataSimpanankaryawan);

            $dataIjasah = array(
                'kar_kode' => $this->input->post('kar_kode',TRUE),
                'kij_sd' => $this->input->post('kij_sd',TRUE),
                'kij_smp' => $this->input->post('kij_smp',TRUE),
                'kij_sma' => $this->input->post('kij_sma',TRUE),
                'kij_d3' => $this->input->post('kij_d3',TRUE),
                'kij_s1' => $this->input->post('kij_s1',TRUE),
                'kij_s2' => $this->input->post('kij_s2',TRUE),
                'kij_s3' => $this->input->post('kij_s3',TRUE),
                'kij_lainlain' => $this->input->post('kij_lainlain',TRUE),
                'kij_status' => 0,
                'kij_tgl' => $this->tgl,
                'kij_flag' => 0,
                'kij_info' => "",
                );
            $this->Karyawanijasah_model->insert($dataIjasah);

            $dataKeluarga = array(
                'kar_kode' => $this->input->post('kar_kode',TRUE),
                'kka_nama' => $this->input->post('kka_nama',TRUE),
                'kka_hubungan' => $this->input->post('kka_hubungan',TRUE),
                'kka_alamat' => $this->input->post('kka_alamat',TRUE),
                'kka_nohp' => $this->input->post('kka_nohp',TRUE),
                'kka_tgl' => $this->tgl,
                'kka_flag' => 0,
                'kka_info' => "",
                );
        
                    $this->Keluargakaryawan_model->insert($dataKeluarga);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawan'));
    }
    
    public function update($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
        		'kar_kode' => set_value('kar_kode', $row->kar_kode),
        		'kar_nama' => set_value('kar_nama', $row->kar_nama),
        		'jab_kode' => set_value('jab_kode', $row->jab_kode),
                'nm_jab_kode' => set_value('jab_kode', $row->jab_kode),
        		'kar_alamat' => set_value('kar_alamat', $row->kar_alamat),
        		'kar_nohp' => set_value('kar_nohp', $row->kar_nohp),
        		'kar_simpanan' => set_value('kar_nohp', $row->kar_simpanan),
        	    'content' => 'backend/karyawan/karyawan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kar_kode', TRUE));
        } else {
            $data = array(
    		'kar_nama' => $this->input->post('kar_nama',TRUE),
    		'jab_kode' => $this->input->post('jab_kode',TRUE),
    		'kar_alamat' => $this->input->post('kar_alamat',TRUE),
    		'kar_nohp' => $this->input->post('kar_nohp',TRUE),
    		'kar_simpanan' => $this->input->post('kar_simpanan',TRUE),
    		'kar_flag' => 1,
    	    );

            $this->Karyawan_model->update($this->input->post('kar_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'kar_flag' => 2,
            );

            $this->Karyawan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kar_nama', 'kar nama', 'trim|required');
	$this->form_validation->set_rules('jab_kode', 'jab kode', 'trim|required');
	$this->form_validation->set_rules('kar_alamat', 'kar alamat', 'trim|required');
	$this->form_validation->set_rules('kar_nohp', 'kar nohp', 'trim|required');

	$this->form_validation->set_rules('kar_kode', 'kar_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:58:04 */
/* http://harviacode.com */