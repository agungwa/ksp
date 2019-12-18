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
        $this->load->model('Pinjaman_model');
        $this->load->model('Simpanan_model');
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Simkesan_model');
        $this->load->model('Simpananpokok_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpanan_model');
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
            case  5:
                $this->pengajuan();
                break;
            case  6:
                $this->anggotalist();
                break;
            case  7:
                $this->setoranwajib();
                break;
                    
            default:
                $this->pendaftaran();
                break;
        }
    }

    //Pengajuan anggota
    public function pengajuan(){
        
        $row = $this->Settingsimpanan_model->get_by_id(2);
        if ($row) {
        $data = array (
            'ses_min' => set_value('ses_min', $row->ses_min),
            'content' => 'backend/anggota/anggota',
            'item'=> 'pendaftaran/pengajuan.php',
            'active' => 5,
        );
    };
        $this->load->view(layout(), $data);
    }

    public function pengajuan_action() 
    {
            $dataPenfataran = array(
                'ang_no' => $this->input->post('ang_no',TRUE),
                'ang_nama' => $this->input->post('ang_nama',TRUE),
                'ang_alamat' => $this->input->post('ang_alamat',TRUE),
                'ang_noktp' => $this->input->post('ang_noktp',TRUE),
                'ang_nokk' => $this->input->post('ang_nokk',TRUE),
                'ang_nohp' => $this->input->post('ang_nohp',TRUE),
                'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
                'ang_tempatlahir' => $this->input->post('ang_tempatlahir',TRUE),
                'ang_status' => 0,
                'ang_tgl' => NUll,
                'ang_flag' => 0,
                'ang_info' => "",
	            );
            $this->Anggota_model->savePendaftaran($dataPenfataran);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        
    }

    
    public function pengajuanupdate($id) 
    {
        $setting = $this->Settingsimpanan_model->get_by_id(2);
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
                'setting_data' => $setting,
		'ang_no' => set_value('ang_no', $row->ang_no),
		'ang_nama' => set_value('ang_nama', $row->ang_nama),
		'ang_alamat' => set_value('ang_alamat', $row->ang_alamat),
		'ang_noktp' => set_value('ang_noktp', $row->ang_noktp),
		'ang_nokk' => set_value('ang_nokk', $row->ang_nokk),
		'ang_nohp' => set_value('ang_nohp', $row->ang_nohp),
        'ang_tgllahir' => set_value('ang_tgllahir', $row->ang_tgllahir),
        'ang_tempatlahir' => set_value('ang_tempatlahir', $row->ang_tempatlahir),
        'content' => 'backend/anggota/pendaftaran/pengajuanupdate',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota/?p=2'));
        }
    }
    
    public function pengajuanupdate_action() 
    {
          $data = array(
		'ang_nama' => $this->input->post('ang_nama',TRUE),
		'ang_alamat' => $this->input->post('ang_alamat',TRUE),
		'ang_noktp' => $this->input->post('ang_noktp',TRUE),
		'ang_nokk' => $this->input->post('ang_nokk',TRUE),
		'ang_nohp' => $this->input->post('ang_nohp',TRUE),
        'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
        'ang_tempatlahir' => $this->input->post('ang_tempatlahir',TRUE),
        'ang_status' => 1,
		'ang_flag' => 1,
	    );
            $this->Anggota_model->update($this->input->post('ang_no', TRUE), $data);
            
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
            'siw_status' => 0,
            'siw_tglambil' => $this->input->post('siw_tglambil',TRUE),
            'siw_tgl' => $this->tgl,
            'siw_flag' => 0,
            'siw_info' => "",
            );
        $this->Simpananwajib_model->insert($dataSimpananWajib);   

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota/?p=2'));
        
    }

    //pendaftaran anggota
    public function pendaftaran(){
        $nowYear = date('dmy');
    
        $row = $this->Settingsimpanan_model->get_by_id(2);
        if ($row) {
        $data = array (
            'ses_min' => set_value('ses_min', $row->ses_min),
            'kode' => $this->Pengkodean->kode($nowYear),
            'content' => 'backend/anggota/anggota',
            'item'=> 'pendaftaran/pendaftaran.php',
            'active' => 1,
        );
    };
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
                'ang_tempatlahir' => $this->input->post('ang_tempatlahir',TRUE),
                'ang_tgllahir' => $this->input->post('ang_tgllahir',TRUE),
                'ang_status' => 1,
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
                'siw_status' => 0,
                'siw_tglambil' => $this->input->post('siw_tglambil',TRUE),
                'siw_tgl' => $this->tgl,
                'siw_flag' => 0,
                'siw_info' => "",
                );
            $this->Simpananwajib_model->insert($dataSimpananWajib);   

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        
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


    

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $s = urldecode($this->input->get('s', TRUE));
        $u = urldecode($this->input->get('u', TRUE));
		$f = urldecode($this->input->get('f', TRUE)); //dari tgl
		$t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start 	= intval($this->input->get('start'));
		
		$satu	= 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedatenow = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedatenow;}
		
        $anggota = $this->Anggota_model->get_limit_data($start, $q);
        
        $dataanggota = array();$i=0;
        foreach ($anggota as $key=>$item) {
            if (
                ( $u=='all' && $s=='all') || 
                ( $u=='all' && $item->ang_status == $s) || 
                ( $item->ang_no == $u && $s=='all') || 
                ( $item->ang_no == $u && $item->ang_status == $s)) {
				
				$tgl_daftar = $item->ang_tgl;
				$f = date("Y-m-d", strtotime($f));
				$t = date("Y-m-d", strtotime($t));
				
				if (($tgl_daftar >= $f && $tgl_daftar <= date("Y-m-d", strtotime($t.' + '.$satu.' Days')))) {
                    $dataanggota[$key] = array(
                        'ang_no' => $item->ang_no,
                        'ang_nama' => $item->ang_nama,
                        'ang_alamat' => $item->ang_alamat,
                        'ang_noktp' => $item->ang_noktp,
                        'ang_nokk' => $item->ang_nokk,
                        'ang_nohp' => $item->ang_nohp,
                        'ang_tgllahir' => $item->ang_tgllahir,
                        'ang_status' => $this->statusAnggota[$item->ang_status],
                        'ang_tgl' => date("Y-m-d", strtotime($item->ang_tgl)),
                        'ang_flag' => $item->ang_flag,
                        'ang_info' => $item->ang_info,
                    );
				}
            }
        }
        
        $data = array(
            'anggota_data' => $anggota,
            'dataanggota' => $dataanggota,
            'u' => $u,
            's' => $s,
            'q' => $q,
			'f' => $f,
			't' => $t,
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
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q) .'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $anggota = $this->Anggota_model->get_limit_data($start, $q);


        $data = array(
            'anggota_data' => $anggota,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/anggota/anggota_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }


    public function anggotalist()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $anggota = $this->Anggota_model->get_limit_data($start, $q);


        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/anggota/anggota',
            'item' => 'anggotalist.php',
            'active' => 6,
        );
        $this->load->view(layout(), $data);
    }


    public function read($id) 
    {
            
        $row = $this->Anggota_model->get_by_id($id);
        $simpananwajib = $this->Simpananwajib_model->get_data_siw($id);
        $simpananpokok = $this->Simpananpokok_model->get_data_sip($id);
        $simpanan = $this->Simpanan_model->get_data_byang($id);
        $pinjaman = $this->Pinjaman_model->get_data_byang($id);
        $simkesan = $this->Simkesan_model->get_data_byang($id);
        $investasi = $this->Investasiberjangka_model->get_data_byang($id);
        $ang_status = $this->statusAnggota;
        if ($row) {
            $data = array(
                'simpananwajib_data' => $simpananwajib,
                'simpananpokok_data' => $simpananpokok,
                'simpanan_data' => $simpanan,
                'pinjaman_data' => $pinjaman,
                'simkesan_data' => $simkesan,
                'investasi_data' => $investasi,
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

    
    public function setoranwajib()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu = 1;
        $n=1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedatenow = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedatenow;}
        $datasetoranwajib = array();
        $setoranAktif = $this->Simpananwajib_model->get_aktif();
        $anggota = $this->Anggota_model->get_limit_data($start, $q);
    	foreach ($setoranAktif as $key => $value) {
    		$setoran = $this->Setoransimpananwajib_model->get_data_ssw($value->siw_id); 
            foreach ($setoran as $k=>$item) {
                $siw_id = $this->db->get_where('Simpananwajib', array('siw_id' => $item->siw_id))->row();
                $ang_no = $this->db->get_where('Anggota', array('ang_no' => $siw_id->ang_no))->row();
                //$wil_kode = $sim_kode->wil_kode;
                $tanggalDuedate = $item->ssw_tglsetor;
                $f = date("Y-m-d", strtotime($f));
                $t = date("Y-m-d", strtotime($t));

                if (($tanggalDuedate >= $f && $tanggalDuedate <= $t)) {
                    $datasetoranwajib[$n] = array(
                    'ssw_id' => $item->ssw_id,
                    'siw_id' => $siw_id->ang_no,
                    'ang_no' => $ang_no->ang_nama,
                    'ang_alamat' => $ang_no->ang_alamat,
                    'ssw_tglsetor' => $item->ssw_tglsetor,
                    'ssw_jmlsetor' => $item->ssw_jmlsetor,
                    'ssw_tgl' => $item->ssw_tgl,
                    );
                    $n++;
                }
            }
        }
       // var_dump($datasetoran);
        $data = array(
            'datasetoranwajib' => $datasetoranwajib,
            'q' => $q,
            'f' => $f,
            't' => $t,
            'start' => $start,
            'content' => 'backend/anggota/anggota',
            'item' => 'simpananwajib_list.php',
            'active' => 7,
        );
        $this->load->view(layout(), $data);
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
        if ($row) {
            $data = array(
		'ang_no' => set_value('ang_no', $row->ang_no),
		'ang_nama' => set_value('ang_nama', $row->ang_nama),
		'ang_alamat' => set_value('ang_alamat', $row->ang_alamat),
		'ang_noktp' => set_value('ang_noktp', $row->ang_noktp),
		'ang_nokk' => set_value('ang_nokk', $row->ang_nokk),
		'ang_nohp' => set_value('ang_nohp', $row->ang_nohp),
        'ang_tgllahir' => set_value('ang_tgllahir', $row->ang_tgllahir),
        'ang_tempatlahir' => set_value('ang_tempatlahir', $row->ang_tempatlahir),
        'content' => 'backend/anggota/pendaftaran/pendaftaranedit',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota/?p=2'));
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
        'ang_tempatlahir' => $this->input->post('ang_tempatlahir',TRUE),
		'ang_flag' => 1,
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
	$this->form_validation->set_rules('ang_no', 'ang_no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:40:16 */
/* http://harviacode.com */