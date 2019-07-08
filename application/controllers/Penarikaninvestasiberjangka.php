<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikaninvestasiberjangka extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');
        $this->load->model('Wilayah_model');
        $this->load->library('form_validation');
    }


    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->penarikandidepan();
                break;
            case  2:
                $this->penarikanperbulan();
                break;
            case  3:
                $this->penarikandibelakang();
                break;
            case  4:
                $this->listdata();
                break;
            case  5:
                $this->tarikpenarikanperbulan();
                break;
                    
            default:
                $this->listdata();
                break;
        }
    } 

     //penarikan investasi didepan
     public function penarikandidepan(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
        $investasiberjangka = $this->Investasiberjangka_model->get_investasi_didepan($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $wilayah = $this->Wilayah_model->get_all();

        $data = array(
            'wilayah_data' => $wilayah,
            'investasiberjangka_data' => $investasiberjangka,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
            'item'=> 'penarikandidepan/penarikandidepan.php',
            'active' => 1,
            );
        $this->load->view(layout(), $data);
    }

    public function tarikpenarikandidepan() 
    {
        $q = urldecode($this->input->get('q', TRUE));
        $tarikpenarikandidepan = null;

        if ($q<>''){
                $row = $this->Investasiberjangka_model->get_by_id($q);
                $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_data_ivb($q);
                //var_dump($penarikaninvestasiberjangka);               
                if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

                $tarikpenarikandidepan = array(
                    'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
                    'ivb_kode' => $row->ivb_kode,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'kar_kode' => $kar_kode->kar_nama,
                    'wil_kode' => $wil_kode->wil_nama,
                    'jwi_id' => $jwi_id->jwi_jangkawaktu,
                    'jiv_id' => $jiv_id->jiv_jasa,
                    'biv_id' => $biv_id->biv_bunga,
                    'ivb_jumlah' => $row->ivb_jumlah,
                    'ivb_tglpendaftaran' => $row->ivb_tglpendaftaran,
                    'ivb_tglperpanjangan' => $row->ivb_tglperpanjangan,
                    'jatuhtempo' => $tanggalDuedate,
                    'ivb_status' => $ivb_status[$row->ivb_status],
                    'ivb_tgl' => $row->ivb_tgl,
                    'ivb_flag' => $row->ivb_flag,
                    'ivb_info' => $row->ivb_info,
                    );
                }
            }
            $data = array(
                'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
                'item'=> 'penarikandidepan/tarik.php',
                'q' => $q,
                'active' => 5,
                'tarikpenarikandidepan' => $tarikpenarikandidepan,
            );
            $this->load->view(
            layout(), $data);
        }

        public function tarikpenarikandidepan_action() 
    {
        //insert data penarikan
        $dataTarik = array(
            'ivb_kode' => $this->input->post('ivb_kode',TRUE),
            'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
            'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
            'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
            'pib_tgl' => $this->tgl,
            'pib_flag' => 0,
            'pib_info' => "",
            );
                $this->Penarikaninvestasiberjangka_model->insert($dataTarik);
                $this->session->set_flashdata('message', 'Create Record Success');

        //update data pinjaman
       /* $dataInvestasi = array(
            'ivb_status' => 1,
            );
        $this->Investasiberjangka_model->update($this->input->post('ivb_kode', TRUE), $dataInvestasi);*/
                redirect(site_url('penarikaninvestasiberjangka/?p=1'));
        
    }

    //penarikan investasi per bulan
    public function penarikanperbulan(){
        {
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));
    
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
            $investasiberjangka = $this->Investasiberjangka_model->get_investasi_perbulan($config['per_page'], $start, $q);
    
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            
            $wilayah = $this->Wilayah_model->get_all();
    
            $data = array(
                'wilayah_data' => $wilayah,
                'investasiberjangka_data' => $investasiberjangka,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
                'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
                'item'=> 'penarikanperbulan/penarikanperbulan.php',
                'active' => 2,
                );
            $this->load->view(layout(), $data);
        }

    }

    public function tarikpenarikanperbulan() 
    {
        $q = urldecode($this->input->get('q', TRUE));
        $tarikpenarikanperbulan = null;

        if ($q<>''){
                $row = $this->Investasiberjangka_model->get_by_id($q);
                $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_data_ivb($q);
                //var_dump($penarikaninvestasiberjangka);               
                if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

                $tarikpenarikanperbulan = array(
                    'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
                    'ivb_kode' => $row->ivb_kode,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'kar_kode' => $kar_kode->kar_nama,
                    'wil_kode' => $wil_kode->wil_nama,
                    'jwi_id' => $jwi_id->jwi_jangkawaktu,
                    'jiv_id' => $jiv_id->jiv_jasa,
                    'biv_id' => $biv_id->biv_bunga,
                    'ivb_jumlah' => $row->ivb_jumlah,
                    'ivb_tglpendaftaran' => $row->ivb_tglpendaftaran,
                    'ivb_tglperpanjangan' => $row->ivb_tglperpanjangan,
                    'jatuhtempo' => $tanggalDuedate,
                    'ivb_status' => $ivb_status[$row->ivb_status],
                    'ivb_tgl' => $row->ivb_tgl,
                    'ivb_flag' => $row->ivb_flag,
                    'ivb_info' => $row->ivb_info,
                    );
                }
            }
            $data = array(
                'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
                'item'=> 'penarikanperbulan/tarik.php',
                'q' => $q,
                'active' => 5,
                'tarikpenarikanperbulan' => $tarikpenarikanperbulan,
            );
            $this->load->view(
            layout(), $data);
        }

        public function tarikpenarikanperbulan_action() 
    {
        //insert data penarikan
        $dataTarik = array(
            'ivb_kode' => $this->input->post('ivb_kode',TRUE),
            'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
            'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
            'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
            'pib_tgl' => $this->tgl,
            'pib_flag' => 0,
            'pib_info' => "",
            );
                $this->Penarikaninvestasiberjangka_model->insert($dataTarik);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('penarikaninvestasiberjangka/?p=2'));
        
    }

    //penarikan investasi dibelakang
    public function penarikandibelakang(){
        $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));
    
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Investasiberjangka_model->total_rows($q);
            $investasiberjangka = $this->Investasiberjangka_model->get_investasi_dibelakang($config['per_page'], $start, $q);
    
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            
            $wilayah = $this->Wilayah_model->get_all();
    
            $data = array(
                'wilayah_data' => $wilayah,
                'investasiberjangka_data' => $investasiberjangka,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
                'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
                'item'=> 'penarikandibelakang/penarikandibelakang.php',
                'active' => 3,
                );

        $this->load->view(layout(), $data);
    }

    public function tarikpenarikandibelakang() 
    {
        $q = urldecode($this->input->get('q', TRUE));
        $tarikpenarikandibelakang = null;

        if ($q<>''){
                $row = $this->Investasiberjangka_model->get_by_id($q);
                $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_data_ivb($q);
                //var_dump($penarikaninvestasiberjangka);               
                if ($row) {
                $ivb_status = $this->statusInvestasi;                
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $jwi_id = $this->db->get_where('jangkawaktuinvestasi', array('jwi_id' => $row->jwi_id))->row();
                $jiv_id = $this->db->get_where('jasainvestasi', array('jiv_id' => $row->jiv_id))->row();
                $biv_id = $this->db->get_where('bungainvestasi', array('biv_id' => $row->biv_id))->row();
                $tanggalDuedate = date("Y-m-d", strtotime($row->ivb_tglpendaftaran.' + '.$jwi_id->jwi_jangkawaktu.' Months'));

                $tarikpenarikandibelakang = array(
                    'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
                    'ivb_kode' => $row->ivb_kode,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'kar_kode' => $kar_kode->kar_nama,
                    'wil_kode' => $wil_kode->wil_nama,
                    'jwi_id' => $jwi_id->jwi_jangkawaktu,
                    'jiv_id' => $jiv_id->jiv_jasa,
                    'biv_id' => $biv_id->biv_bunga,
                    'ivb_jumlah' => $row->ivb_jumlah,
                    'ivb_tglpendaftaran' => $row->ivb_tglpendaftaran,
                    'ivb_tglperpanjangan' => $row->ivb_tglperpanjangan,
                    'jatuhtempo' => $tanggalDuedate,
                    'ivb_status' => $ivb_status[$row->ivb_status],
                    'ivb_tgl' => $row->ivb_tgl,
                    'ivb_flag' => $row->ivb_flag,
                    'ivb_info' => $row->ivb_info,
                    );
                }
            }
            $data = array(
                'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
                'item'=> 'penarikandibelakang/tarik.php',
                'q' => $q,
                'active' => 5,
                'tarikpenarikandibelakang' => $tarikpenarikandibelakang,
            );
            $this->load->view(
            layout(), $data);
        }

        public function tarikpenarikandibelakang_action() 
    {
        //insert data penarikan
        $dataTarik = array(
            'ivb_kode' => $this->input->post('ivb_kode',TRUE),
            'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
            'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
            'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
            'pib_tgl' => $this->tgl,
            'pib_flag' => 0,
            'pib_info' => "",
            );
                $this->Penarikaninvestasiberjangka_model->insert($dataTarik);
                $this->session->set_flashdata('message', 'Create Record Success');

        //update data pinjaman
       /* $dataInvestasi = array(
            'ivb_status' => 1,
            );
        $this->Investasiberjangka_model->update($this->input->post('ivb_kode', TRUE), $dataInvestasi);*/
                redirect(site_url('penarikaninvestasiberjangka/?p=1'));
        
    }

    public function listdata()
    {
        
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        
       /* if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
        } */

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikaninvestasiberjangka_model->total_rows($q);
        $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q, $f, $t);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $wilayah = $this->Wilayah_model->get_all();
        
        $datapenarikan = array();
        foreach ($penarikaninvestasiberjangka as $key=>$item) {
            $ivb_kode = $this->db->get_where('investasiberjangka', array('ivb_kode' => $item->ivb_kode))->row();
            $tanggalDuedate = $item->pib_tgl;
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));
            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $ivb_kode->wil_kode == $w)) {
                $datapenarikan[$key] = array(
                    'pib_id' => $item->pib_id,
                    'ivb_kode' => $item->ivb_kode,
                    'pib_penarikanke' => $item->pib_penarikanke,
                    'pib_jmlkeuntungan' => $item->pib_jmlkeuntungan,
                    'pib_jmlditerima' => $item->pib_jmlditerima,
                    'pib_tgl' => $item->pib_tgl,
                    'pib_flag' => $item->pib_flag,
                    'pib_info' => $item->pib_info,
                    
                );
            }
        }

        $data = array(
            'penarikaninvestasiberjangka_data' => $datapenarikan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'active' => 4,
            'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka',
            'item' => 'penarikaninvestasiberjangka_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
            $config['first_url'] = base_url() . 'penarikaninvestasiberjangka/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penarikaninvestasiberjangka_model->total_rows($q);
        $penarikaninvestasiberjangka = $this->Penarikaninvestasiberjangka_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'penarikaninvestasiberjangka_data' => $penarikaninvestasiberjangka,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pib_id' => $row->pib_id,
		'ivb_kode' => $row->ivb_kode,
		'pib_penarikanke' => $row->pib_penarikanke,
		'pib_jmlkeuntungan' => $row->pib_jmlkeuntungan,
		'pib_jmlditerima' => $row->pib_jmlditerima,
		'pib_tgl' => $row->pib_tgl,
		'pib_flag' => $row->pib_flag,
		'pib_info' => $row->pib_info,'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('penarikaninvestasiberjangka/create_action'),
	    'pib_id' => set_value('pib_id'),
	    'ivb_kode' => set_value('ivb_kode'),
	    'nm_ivb_kode' => set_value('nm_ivb_kode'),
	    'pib_penarikanke' => set_value('pib_penarikanke'),
	    'pib_jmlkeuntungan' => set_value('pib_jmlkeuntungan'),
	    'pib_jmlditerima' => set_value('pib_jmlditerima'),
	    'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_form',
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
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
		'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
		'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
		'pib_tgl' => $this->tgl,
		'pib_flag' => 0,
		'pib_info' => "",
	    );

            $this->Penarikaninvestasiberjangka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penarikaninvestasiberjangka/update_action'),
		'pib_id' => set_value('pib_id', $row->pib_id),
		'ivb_kode' => set_value('ivb_kode', $row->ivb_kode),
		'nm_ivb_kode' => set_value('ivb_kode', $row->nm_ivb_kode),
		'pib_penarikanke' => set_value('pib_penarikanke', $row->pib_penarikanke),
		'pib_jmlkeuntungan' => set_value('pib_jmlkeuntungan', $row->pib_jmlkeuntungan),
		'pib_jmlditerima' => set_value('pib_jmlditerima', $row->pib_jmlditerima),
	    'content' => 'backend/penarikaninvestasiberjangka/penarikaninvestasiberjangka_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pib_id', TRUE));
        } else {
            $data = array(
		'ivb_kode' => $this->input->post('ivb_kode',TRUE),
		'pib_penarikanke' => $this->input->post('pib_penarikanke',TRUE),
		'pib_jmlkeuntungan' => $this->input->post('pib_jmlkeuntungan',TRUE),
		'pib_jmlditerima' => $this->input->post('pib_jmlditerima',TRUE),
		'pib_flag' => 1,
	    );

            $this->Penarikaninvestasiberjangka_model->update($this->input->post('pib_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penarikaninvestasiberjangka_model->get_by_id($id);

        if ($row) {
            $data = array (
                'pib_flag' => 2,
            );
            $this->Penarikaninvestasiberjangka_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penarikaninvestasiberjangka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penarikaninvestasiberjangka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ivb_kode', 'ivb kode', 'trim|required');
	$this->form_validation->set_rules('pib_penarikanke', 'pib penarikanke', 'trim|required');
	$this->form_validation->set_rules('pib_jmlkeuntungan', 'pib jmlkeuntungan', 'trim|required');
	$this->form_validation->set_rules('pib_jmlditerima', 'pib jmlditerima', 'trim|required');
	$this->form_validation->set_rules('pib_id', 'pib_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penarikaninvestasiberjangka.php */
/* Location: ./application/controllers/Penarikaninvestasiberjangka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:55 */
/* http://harviacode.com */