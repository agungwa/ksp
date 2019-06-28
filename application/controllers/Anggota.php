<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Settingsimpanan_model');
        $this->load->model('Simpananpokok_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->pendaftaran();
                break;
            case  2:
                $this->listdata();
                break;
            case  3:
                $this->tariksiw();
                break;
            case  4:
                $this->setorsiw();
                break;
                    
            default:
                $this->pendaftaran();
                break;
        }
    } 

    //pendaftaran anggota
    public function pendaftaran(){
    $dt = $this->Settingsimpanan_model->get_datasetor()->row();
        
        $data = array( 

        //$row = $this->Settingsimpanan_model->get_datasetor(),
        'kode' => $this->Pengkodean->kode(),
        'content' => 'backend/anggota/anggota',
        'item'=> 'pendaftaran/pendaftaran.php',
        'active' => 1,
    );

        $this->load->view(layout(), $data,$dt);
    }

    //setor simpanan wajib
    public function setorsiw(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $setorsiw = null;
        
        //data simpanan
        if ($q<>''){
            $ang_status = $this->statusAnggota;
            $row = $this->Anggota_model->get_by_id($q);
            $simpananwajib = $this->Simpananwajib_model->get_data_siw($q);
            $simpananpokok = $this->Simpananpokok_model->get_data_sip($q);
            if ($row) {
                $setorsiw = array(
                    'simpananwajib_data' => $simpananwajib,
                    'simpananpokok_data' => $simpananpokok,
            'ang_no' => $row->ang_no,
            'ang_nama' => $row->ang_nama,
            'ang_alamat' => $row->ang_alamat,
            'ang_noktp' => $row->ang_noktp,
            'ang_nokk' => $row->ang_nokk,
            'ang_nohp' => $row->ang_nohp,
            'ang_tgllahir' => $row->ang_tgllahir,
            'ang_status' => $ang_status[$row->ang_status],
            'ang_tgl' => $row->ang_tgl,
            'ang_flag' => $row->ang_flag,
            'ang_info' => $row->ang_info,
	    );
            }
        }

        $data = array(
            'content' => 'backend/anggota/anggota',
            'item'=> 'setorsiw/setorsiw.php',
            'q' => $q,
            'active' => 4,
            'setorsiw' => $setorsiw,
        );
        $this->load->view(layout(), $data);
    }

    //tarik simpanan wajib
    public function tariksiw(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $tariksiw = null;
        
        //data simpanan
        if ($q<>''){
            $ang_status = $this->statusAnggota;
            $row = $this->Anggota_model->get_by_id($q);
            $simpananwajib = $this->Simpananwajib_model->get_data_siw($q);
            $simpananpokok = $this->Simpananpokok_model->get_data_sip($q);
            if ($row) {
                $tariksiw = array(
                    'simpananwajib_data' => $simpananwajib,
                    'simpananpokok_data' => $simpananpokok,
            'ang_no' => $row->ang_no,
            'ang_nama' => $row->ang_nama,
            'ang_alamat' => $row->ang_alamat,
            'ang_noktp' => $row->ang_noktp,
            'ang_nokk' => $row->ang_nokk,
            'ang_nohp' => $row->ang_nohp,
            'ang_tgllahir' => $row->ang_tgllahir,
            'ang_status' => $ang_status[$row->ang_status],
            'ang_tgl' => $row->ang_tgl,
            'ang_flag' => $row->ang_flag,
            'ang_info' => $row->ang_info,
	    );
            }
        }

        $data = array(
            'content' => 'backend/anggota/anggota',
            'item'=> 'tariksiw/tariksiw.php',
            'q' => $q,
            'active' => 3,
            'tariksiw' => $tariksiw,
        );
        $this->load->view(layout(), $data);
    }


    public function pendaftaran_action() 
    {
            $dataPenfataran = array(
                'ang_no' => $this->input->post('ang_no',TRUE),
                'ang_nama' => $this->input->post('ang_nama',TRUE),
                'ang_alamat' => $this->input->post('ang_alamat',TRUE),
                'ang_noktp' => $this->input->post('ang_noktp',TRUE),
                'ang_nokk' => $this->input->post('ang_nokk',TRUE),
                'ang_nohp' => $this->input->post('ang_nohp',TRUE),
                'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
                'ang_status' => $this->input->post('ang_status',TRUE),
                'ang_tgl' => $this->tgl,
                'ang_flag' => 0,
                'ang_info' => "",
	            );
            $this->Anggota_model->savePendaftaran($dataPenfataran);

            //save data simpanan pokok
            $dataSimpananPokok = array(
                'ang_no' => $this->input->post('ang_no',TRUE),
                'ses_id' => 2,
                'sip_setoran' => $this->input->post('sip_setoran',TRUE),
                'sip_tglbayar' => $this->input->post('sip_tglbayar',TRUE),
                'sip_tgl' => $this->tgl,
                'sip_flag' => 0,
                'sip_info' => "",
                );
            $this->Simpananpokok_model->insert($dataSimpananPokok);

            //save data simpanan wajib
            $dataSimpananWajib = array(
                'ang_no' => $this->input->post('ang_no',TRUE),
                'ses_id' => 1,
                'siw_tglbayar' => $this->tgl,
                'siw_status' => $this->input->post('siw_status',TRUE),
                'siw_tglambil' => $this->input->post('siw_tglambil',TRUE),
                'siw_tgl' => $this->tgl,
                'siw_flag' => 0,
                'siw_info' => "",
                );
            $this->Simpananwajib_model->insert($dataSimpananWajib);            

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        
    }

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        /*if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }*/

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $wilayah = $this->Wilayah_model->get_all();

        $data = array(
            'anggota_data' => $anggota,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 2,
            'content' => 'backend/anggota/anggota',
            'item' => 'anggota_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'anggota_data' => $anggota,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/anggota/anggota_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
            
        $row = $this->Anggota_model->get_by_id($id);
        $simpananwajib = $this->Simpananwajib_model->get_data_siw($id);
        $simpananpokok = $this->Simpananpokok_model->get_data_sip($id);
        $ang_status = $this->statusAnggota;
        if ($row) {
            $data = array(
                'simpananwajib_data' => $simpananwajib,
                'simpananpokok_data' => $simpananpokok,
		'ang_no' => $row->ang_no,
		'ang_nama' => $row->ang_nama,
		'ang_alamat' => $row->ang_alamat,
		'ang_noktp' => $row->ang_noktp,
		'ang_nokk' => $row->ang_nokk,
		'ang_nohp' => $row->ang_nohp,
		'ang_tgllahir' => $row->ang_tgllahir,
		'ang_status' => $ang_status[$row->ang_status],
		'ang_tgl' => $row->ang_tgl,
		'ang_flag' => $row->ang_flag,
		'ang_info' => $row->ang_info,'content' => 'backend/anggota/anggota_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('anggota/create_action'),
	    'ang_no' => set_value('ang_no'),
	    'ang_nama' => set_value('ang_nama'),
	    'ang_alamat' => set_value('ang_alamat'),
	    'ang_noktp' => set_value('ang_noktp'),
	    'ang_nokk' => set_value('ang_nokk'),
	    'ang_nohp' => set_value('ang_nohp'),
	    'ang_tgllahir' => set_value('ang_tgllahir'),
	    'ang_status' => set_value('ang_status'),
	    'content' => 'backend/anggota/anggota_form',
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
		'ang_nama' => $this->input->post('ang_nama',TRUE),
		'ang_alamat' => $this->input->post('ang_alamat',TRUE),
		'ang_noktp' => $this->input->post('ang_noktp',TRUE),
		'ang_nokk' => $this->input->post('ang_nokk',TRUE),
		'ang_nohp' => $this->input->post('ang_nohp',TRUE),
		'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
		'ang_status' => $this->input->post('ang_status',TRUE),
		'ang_tgl' => $this->tgl,
		'ang_flag' => 0,
		'ang_info' => "",
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        $simpananpokok = $this->Simpananpokok_model->get_data_sip($id);
        if ($row) {
            $data = array(
                //'simpananpokok_data' => $simpananpokok,
		'kode' => set_value('ang_no', $row->ang_no),
		'ang_nama' => set_value('ang_nama', $row->ang_nama),
		'ang_alamat' => set_value('ang_alamat', $row->ang_alamat),
		'ang_noktp' => set_value('ang_noktp', $row->ang_noktp),
		'ang_nokk' => set_value('ang_nokk', $row->ang_nokk),
		'ang_nohp' => set_value('ang_nohp', $row->ang_nohp),
		'ang_tgllahir' => set_value('ang_tgllahir', $row->ang_tgllahir),
		'ang_status' => set_value('ang_status', $row->ang_tgllahir),
        'content' => 'backend/anggota/anggota',
        'item'=> 'pendaftaran/pendaftaranedit.php',
        'active' => 4,
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ang_no', TRUE));
        } else {
            $data = array(
		'ang_nama' => $this->input->post('ang_nama',TRUE),
		'ang_alamat' => $this->input->post('ang_alamat',TRUE),
		'ang_noktp' => $this->input->post('ang_noktp',TRUE),
		'ang_nokk' => $this->input->post('ang_nokk',TRUE),
		'ang_nohp' => $this->input->post('ang_nohp',TRUE),
		'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
		'ang_status' => $this->input->post('ang_status',TRUE),
		'ang_tgl' => $this->tgl,
		'ang_flag' => 1,
		'ang_info' => "",
	    );

            $this->Anggota_model->update($this->input->post('ang_no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'ang_flag' => 2
            );
            $this->Anggota_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_nama', 'ang nama', 'trim|required');
	$this->form_validation->set_rules('ang_alamat', 'ang alamat', 'trim|required');
	$this->form_validation->set_rules('ang_noktp', 'ang noktp', 'trim|required');
	$this->form_validation->set_rules('ang_nokk', 'ang nokk', 'trim|required');
	$this->form_validation->set_rules('ang_nohp', 'ang nohp', 'trim|required');
	$this->form_validation->set_rules('ang_tgllahir', 'ang tgllahir', 'trim|required');
	$this->form_validation->set_rules('ang_status', 'ang status', 'trim|required');

	$this->form_validation->set_rules('ang_no', 'ang_no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:40:16 */
/* http://harviacode.com */