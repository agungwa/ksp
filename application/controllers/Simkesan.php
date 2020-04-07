<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simkesan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengkodean');
        $this->load->model('Simkesan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Plansimkesan_model');
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Jenispenarikansimkesan_model');
        $this->load->model('Jenisklaim_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->model('Ahliwarissimkesan_model');
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
                $this->listjatuhtempo();
                break;
            case  4:
                $this->listsetoran();
                break;
            case  5:
                $this->simkesanlist();
                break;
            case  6:
                $this->tagihan();
                break;
                    
            default:
                $this->pendaftaran();
                break;
        }
    } 

    public function pendaftaran(){
		$setoransimkesan = $this->Setoransimkesan_model->get_group_bysikkode($start = 0, $q = NULL);
		
		// foreach($setoransimkesan as $k) {
			
		// 	$kode		= $k->sik_kode;
		// 	$tanggal 	= new DateTime($k->tanggal); 
		// 	$sekarang 	= new DateTime();
		// 	$perbedaan 	= $tanggal->diff($sekarang);
			
		// 	$satu=1;
		// 	$tiga=3;
			
		// 	$tgl_jt			=date("Y-m-d", strtotime($k->ssk_tglsetoran));
		// 	$tgl_3bln		=date("Y-m-d", strtotime($k->ssk_tglsetoran.' + '.$tiga.'month'.' + '.$satu.'days'));
		// 	$sekarang		=date("Y-m-d");
			
		// 	$data = array('sik_status'=>3);
			
		// 	if($perbedaan->m > 2){
		// 		if($sekarang > $tgl_3bln)
		// 			$this->Simkesan_model->update($kode, $data);
		// 		//echo $perbedaan->m.'<br>';
		// 	}
		// }
		
        $nowYear = date('d');
        $data = array(
            'kode' => $this->Pengkodean->simkesan($nowYear),
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'pendaftaran/pendaftaran.php',
            'active' => 1,
        );

        $this->load->view(layout(), $data);
    }

    public function pendaftaran_action() 
    {
            $dataSimkesan = array(
            'ang_no' => $this->input->post('ang_no',TRUE),
            'sik_kode'=> $this->input->post('sik_kode',TRUE),
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'psk_id' => $this->input->post('psk_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'sik_tglpendaftaran' => $this->input->post('sik_tglpendaftaran',TRUE),
    		'sik_tglberakhir' => $this->input->post('sik_tglberakhir',TRUE),
    		'sik_status' => 0,
    		'sik_tgl' => $this->tgl,
    		'sik_flag' => 0,
    		'sik_info' => "",
    	    );
            $this->Simkesan_model->insert($dataSimkesan);
            
            $dataAhliwaris = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'aws_noid' => $this->input->post('aws_noid',TRUE),
    		'aws_jenisid' => $this->input->post('aws_jenisid',TRUE),
    		'aws_nama' => $this->input->post('aws_nama',TRUE),
    		'aws_alamat' => $this->input->post('aws_alamat',TRUE),
    		'aws_hubungan' => $this->input->post('aws_hubungan',TRUE),
    		'aws_lampiran' => $this->input->post('aws_lampiran',TRUE),
    		'aws_tgl' => $this->tgl,
    		'aws_flag' => 0,
    		'aws_info' => "",
            );
            $this->Ahliwarissimkesan_model->insert($dataAhliwaris);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simkesan'));
        }

        public function jaminan($id) 
        {
            $row = $this->Simkesan_model->get_by_id($id);
            if ($row) {
                $data = array(
                'sik_jam' => $this->input->post('sik_jam', TRUE),
            );
            $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Agunan');
            redirect(site_url('simkesan/?p=5'));
            }
        }

        public function aktifkan($id) 
        {
            $row = $this->Simkesan_model->get_by_id($id);
            if ($row) {
                $data = array(
                'sik_status' => 0,
            );
            $this->Simkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Agunan');
            redirect(site_url('simkesan/?p=5'));
            }
        }

     //Setoran simkesan
     public function setoransimkesan($id) 
     {
         $row = $this->Simkesan_model->get_by_id($id);
         $setoran = $this->Setoransimkesan_model->get_data_setor($id);
         $titipan = $this->Titipansimkesan_model->get_sikkode($id);
         //var_dump($titipan);
         $tahun = 5;
         $tahun10 = 10;
         if ($row) {
             $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
             $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
             $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
             $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
             $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
             $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years')); 
             $data = array(
                'setoran_data' => $setoran,
                'titipan_data' => $titipan,
         'sik_kode' => $row->sik_kode,
         'ang_no' => $row->ang_no,
         'nm_ang_no' => $ang_no->ang_nama,
         'kar_kode' => $kar_kode->kar_nama,
         'psk_id' => $psk_id->psk_plan,
         'setor_psk_id' => $psk_id->psk_setoran,
         'wil_kode' => $wil_kode->wil_nama,
         'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
         'sik_tglberakhir' => $row->sik_tglberakhir,
         'estimasi_berakhir' => $tanggalDuedate,
         'estimasi_pengembangan' => $tahun10,
         'sik_status' => $row->sik_status,
         'sik_tgl' => $row->sik_tgl,
         'sik_flag' => $row->sik_flag,
         'sik_info' => $row->sik_info,'content' => 'backend/simkesan/setoransimkesan/setoransimkesan',
         );
             $this->load->view(
             layout(), $data);
         }
     }

     public function setoransimkesan_action()
         {
             //insert data setor simkesan
         $dataSetor = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'ssk_tglsetoran' => $this->input->post('ssk_tglsetoran',TRUE),
    		'ssk_tglbayar' => $this->tgl,
    		'ssk_jmlsetor' => $this->input->post('ssk_jmlsetor',TRUE),
    		'ssk_tgl' => $this->tgl,
    		'ssk_flag' => 0,
    		'ssk_info' => "",
             );
                 $this->Setoransimkesan_model->insert($dataSetor);
        $dataSimkesan = array(
    		'sik_status' => $this->input->post('sik_status',TRUE),
        );
        
        $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $dataSimkesan);

                 redirect(site_url('simkesan/?p=5&s=&w=&plan=&f=1970-03-05&t='));
         }

    public function titipsimkesan_action()
         {
             //insert data setor simkesan
         $dataTitip = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
            'tts_tgltitip' => $this->tgl,
            'tts_jmltitip' => $this->input->post('tts_jmltitip',TRUE),
            'tts_jmlambil' => 0,
            'tts_status' => "",
            'tts_tgl' => $this->tgl,
            'tts_flag' => 0,
            'tts_info' => "",
             );
                 $this->Titipansimkesan_model->insert($dataTitip); 
                 redirect(site_url('simkesan/setoransimkesan/'.$this->input->post('sik_kode',TRUE)));
         }

         public function ambiltitipsimkesan_action()
         {
             //insert data setor simkesan
         $dataTitip = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
            'tts_tgltitip' => $this->tgl,
            'tts_jmltitip' => 0,
            'tts_jmlambil' => $this->input->post('tts_jmlambil',TRUE),
            'tts_status' => "",
            'tts_tgl' => $this->tgl,
            'tts_flag' => 0,
            'tts_info' => "",
             );
                 $this->Titipansimkesan_model->insert($dataTitip);
        $dataSetor = array(
            'sik_kode' => $this->input->post('sik_kode',TRUE),
            'ssk_tglsetoran' => $this->tgl,
            'ssk_tglbayar' => $this->tgl,
            'ssk_jmlsetor' => $this->input->post('tts_jmlambil',TRUE),
            'ssk_tgl' => $this->tgl,
            'ssk_flag' => 0,
            'ssk_info' => "",
                     );
            $this->Setoransimkesan_model->insert($dataSetor);  
                 redirect(site_url('simkesan/setoransimkesan/'.$this->input->post('sik_kode',TRUE)));
         }


    //Klaim simkesan
    public function klaim($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);
        $setoran = $this->Setoransimkesan_model->get_data_setor($id);
        $k =  $this->input->post('klaim',TRUE);
        $tahun = 5;
        $tahun10 = 10;
        if ($row) { 
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
            $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
            $klaim = $this->Jenisklaim_model->get_by_tahunke($k,$row->psk_id);
            $data = array(
                'klaim_data' => $klaim,
                'k' => $k,
                'setoran_data' => $setoran,
		'sik_kode' => $row->sik_kode,
        'ang_no' => $row->ang_no,
        'nm_ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'psk_id' => $psk_id->psk_plan,
		'setor_psk_id' => $psk_id->psk_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
        'sik_tglberakhir' => $row->sik_tglberakhir,
        'estimasi_berakhir' => $tanggalDuedate,
        'estimasi_pengembangan' => $tahun10,
		'sik_status' => $row->sik_status,
		'sik_tgl' => $row->sik_tgl,
		'sik_flag' => $row->sik_flag,
		'sik_info' => $row->sik_info,'content' => 'backend/simkesan/klaim/klaim',
	    );
            $this->load->view(
            layout(), $data);
        }
    }

    //Klaim simkesan
    public function klaimtahunduka($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);
        $setoran = $this->Setoransimkesan_model->get_data_setor($id);
        $tahun = 5;
        $tahun10 = 10;
        if ($row) { 
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
            $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
            $klaim = $this->Jenisklaim_model->get_by_tahunke(0,$row->psk_id);
            $data = array(
                'klaim_data' => $klaim,
                'setoran_data' => $setoran,
		'sik_kode' => $row->sik_kode,
        'ang_no' => $row->ang_no,
        'nm_ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'psk_id' => $psk_id->psk_plan,
		'setor_psk_id' => $psk_id->psk_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
        'sik_tglberakhir' => $row->sik_tglberakhir,
        'estimasi_berakhir' => $tanggalDuedate,
        'estimasi_pengembangan' => $tahun10,
		'sik_status' => $row->sik_status,
		'sik_tgl' => $row->sik_tgl,
		'sik_flag' => $row->sik_flag,
		'sik_info' => $row->sik_info,'content' => 'backend/simkesan/klaim/klaim',
	    );
            $this->load->view(
            layout(), $data);
        }
    }


    //klaim action
    public function klaim_action()
        {
            //insert data klaim
        $tanggal = $this->input->post('ksi_tglklaim',TRUE);
        
        if ($tanggal == NULL){
            $tanggal = $this->tgl;
        }
        $dataKlaim = array(
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'jkl_id' => $this->input->post('jkl_id',TRUE),
    		'ksi_tglklaim' => $tanggal,
            'ksi_totalsetor' => $this->input->post('ksi_totalsetor',TRUE),
            'ksi_jmlklaim' => $this->input->post('ksi_jmlklaim',TRUE),
    		'ksi_jmltunggakan' => $this->input->post('ksi_jmltunggakan',TRUE),
    		'ksi_administrasi' => $this->input->post('ksi_administrasi',TRUE),
    		'ksi_jmlditerima' => $this->input->post('ksi_jmlditerima',TRUE),
    		'ksi_status' => $this->input->post('ksi_status',TRUE),
    		'ksi_tgl' => $this->tgl,
    		'ksi_flag' => 0,
    		'ksi_info' => "",
            );
                $this->Klaimsimkesan_model->insert($dataKlaim);
        $dataSimkesan = array(
    		'sik_tglberakhir' => $this->tgl,
    		'sik_status' => 1,
            );

                $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $dataSimkesan);
                redirect(site_url('simkesan/?p=2'));
        }

        //Penarikan simkesan
        public function penarikansepuluh($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);
        $penarikan = $this->Jenispenarikansimkesan_model->get_by_id(1);
        $setoran = $this->Setoransimkesan_model->get_data_setor($id);
        $tahun = 5;
        $tahun10 = 10;
        if ($row) {
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
            $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
            $data = array(
                'penarikan_data' => $penarikan,
                'setoran_data' => $setoran,
		'sik_kode' => $row->sik_kode,
        'ang_no' => $row->ang_no,
        'nm_ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'psk_id' => $psk_id->psk_plan,
		'setor_psk_id' => $psk_id->psk_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
        'sik_tglberakhir' => $row->sik_tglberakhir,
        'estimasi_berakhir' => $tanggalDuedate,
        'estimasi_pengembangan' => $tahun10,
		'sik_status' => $row->sik_status,
		'sik_tgl' => $row->sik_tgl,
		'sik_flag' => $row->sik_flag,
		'sik_info' => $row->sik_info,'content' => 'backend/simkesan/penarikan/penarikan',
	    );
            $this->load->view(
            layout(), $data);
        }
    }

     //Penarikan simkesan
     public function penarikanlima($id) 
     {
         $row = $this->Simkesan_model->get_by_id($id);
         $penarikan = $this->Jenispenarikansimkesan_model->get_by_id(2);
         $setoran = $this->Setoransimkesan_model->get_data_setor($id);
         $tahun = 5;
         $tahun10 = 10;
         if ($row) {
             $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
             $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
             $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
             $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
             $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
             $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
             $data = array(
                 'penarikan_data' => $penarikan,
                 'setoran_data' => $setoran,
         'sik_kode' => $row->sik_kode,
         'ang_no' => $row->ang_no,
         'nm_ang_no' => $ang_no->ang_nama,
         'kar_kode' => $kar_kode->kar_nama,
         'psk_id' => $psk_id->psk_plan,
         'setor_psk_id' => $psk_id->psk_setoran,
         'wil_kode' => $wil_kode->wil_nama,
         'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
         'sik_tglberakhir' => $row->sik_tglberakhir,
         'estimasi_berakhir' => $tanggalDuedate,
         'estimasi_pengembangan' => $tahun10,
         'sik_status' => $row->sik_status,
         'sik_tgl' => $row->sik_tgl,
         'sik_flag' => $row->sik_flag,
         'sik_info' => $row->sik_info,'content' => 'backend/simkesan/penarikan/penarikan',
         );
             $this->load->view(
             layout(), $data);
         }
     }

    public function penarikan_action()
        {
            //insert data penarikan
        $dataPenarikan = array(
            'pns_id' => $this->input->post('pns_id',TRUE),
    		'sik_kode' => $this->input->post('sik_kode',TRUE),
    		'jps_id' => $this->input->post('jps_id',TRUE),
    		'pns_tglpenarikan' => $this->tgl,
    		'pns_jmlsimkesan' => $this->input->post('pns_jmlsimkesan',TRUE),
    		'pns_totalsetor' => $this->input->post('pns_totalsetor',TRUE),
    		'pns_administrasi' => $this->input->post('pns_administrasi',TRUE),
    		'pns_jmlpenarikan' => $this->input->post('pns_jmlpenarikan',TRUE),
    		'pns_catatan' => $this->input->post('pns_catatan',TRUE),
    		'pns_tgl' => $this->tgl,
    		'pns_flag' => 0,
    		'pns_info' => "",
            );
                $this->Penarikansimkesan_model->insert($dataPenarikan);
        $dataSimkesan = array(
    		'sik_tglberakhir' => $this->tgl,
    		'sik_status' => 2,
            );

                $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $dataSimkesan);
                redirect(site_url('simkesan/?p=2'));
        }

    public function listdata()
    {
        $p = urldecode($this->input->get('p', TRUE));
        $plan = urldecode($this->input->get('plan', TRUE)); //plan simkesan
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $s = urldecode($this->input->get('s', TRUE)); //status
        $f = urldecode($this->input->get('f', TRUE)); //tgl dari
        $t = urldecode($this->input->get('t', TRUE)); //tgl ke
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        $simkesan = $this->Simkesan_model->get_data_simkesan($plan,$w,$s,$f,$t,$start);
        $wilayah = $this->Wilayah_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();
        
        $data = array(
            'simkesan_data' => $simkesan,
            'wilayah_data' => $wilayah,
            'plansimkesan_data' => $plansimkesan,
            'w' => $w,
            'p' => $p,
            'plan' => $plan,
            's' => $s,
            'f' => $f,
            't' => $t,
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'simkesan_list.php',
            'active' => 2,
        );
        $this->load->view(layout(), $data);
    }

    public function tagihan()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $p = urldecode($this->input->get('p', TRUE)); //plan simkesan
        $f = urldecode($this->input->get('f', TRUE)); //plan simkesan
        $t = urldecode($this->input->get('t', TRUE)); //plan simkesan
        $start = intval($this->input->get('start'));
        $satu = 1;
        $simkesan = $this->Simkesan_model->get_limit_data($start, $q);
        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();

        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $dataangsuran = array();
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        $datasimkesan= array();
        foreach ($simkesan as $key=>$item) {
           
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $item->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();

            
            $date1 = new DateTime($item->sik_tglpendaftaran);
            $date2 = new DateTime();
            
            $diff = $date1->diff($date2);
            $selisih = (($diff->format('%y') * 12) + $diff->format('%m'))+1;
            $selisihjt = (($diff->format('%y') * 12) + $diff->format('%m'));

            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));
            $jt = date("Y-m-d", strtotime($item->sik_tglpendaftaran.' + '.$selisihjt.' Months'));
            if ( ( $jt >= $f && $jt <= $t && $p=='all' ) || ($jt >= $f && $jt <= $t && $item->psk_id == $p )) {

               $datasimkesan[$key] = array(
                'sik_kode' => $item->sik_kode,
                'ang_no' => $item->ang_no,
                'nm_ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'psk_id' => $psk_id->psk_plan,
                'setor_psk_id' => $psk_id->psk_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sik_tglpendaftaran' => $item->sik_tglpendaftaran,
                'sik_tglberakhir' => $item->sik_tglberakhir,
                'sik_status' => $this->statusSimkesan[$item->sik_status],
                'sik_tgl' => $item->sik_tgl,
                'sik_flag' => $item->sik_flag,
                'sik_info' => $item->sik_info,
                );
            }
        }
        
       // var_dump($datasimkesan);
        $data = array(
            'simkesan_data' => $simkesan,
            'datasimkesan' => $datasimkesan,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'plansimkesan_data' => $plansimkesan,
            'q' => $q,
            'p' => $p,
            'f' => $f,
            't' => $t,
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'tagihan.php',
            'active' => 6,
        );
        $this->load->view(layout(), $data);
    }

    public function simkesanlist()
    {
        $p = urldecode($this->input->get('p', TRUE));
        $plan = urldecode($this->input->get('plan', TRUE)); //plan simkesan
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $s = urldecode($this->input->get('s', TRUE)); //status
        $f = urldecode($this->input->get('f', TRUE)); //tgl dari
        $t = urldecode($this->input->get('t', TRUE)); //tgl ke
        $start = intval($this->input->get('start'));
        if ($f != NULL){
            $simkesan = $this->Simkesan_model->get_data_simkesan($plan,$w,$s,$f,$t,$start);
        } else {
            $simkesan = array();
        }
        $wilayah = $this->Wilayah_model->get_all();
        $plansimkesan = $this->Plansimkesan_model->get_all();
        $data = array(
            'simkesan_data' => $simkesan,
            'wilayah_data' => $wilayah,
            'plansimkesan_data' => $plansimkesan,
            'w' => $w,
            'p' => $p,
            'plan' => $plan,
            's' => $s,
            'f' => $f,
            't' => $t,
            'start' => $start,
            'content' => 'backend/simkesan/simkesan',
            'item' => 'simkesanlist.php',
            'active' => 5,
        );
        $this->load->view(layout(), $data);
    }
    
    public function listjatuhtempo()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

        $setoransimkesan = $this->Setoransimkesan_model->get_group_bysikkode($start, $q, $f, $t);

        $wilayah = $this->Wilayah_model->get_all();
        $datajatuh = array();
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        foreach ($setoransimkesan as $key=>$item) {
            $sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $sik_kode->ang_no))->row();

            //$wil_kode = $sim_kode->wil_kode;
            $tanggalDuedate = $item->ssk_tglsetoran;
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all' ) || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $sik_kode->wil_kode == $w )) {
                $datajatuh[$key] = array(
                'ssk_id' => $item->ssk_id,
                'sik_kode' => $item->sik_kode,
                'nama_anggota' => $ang_no->ang_nama,
                'wil_kode' => $sik_kode->wil_kode,
                'tanggal' => $item->tanggal,
                'ssk_tglsetoran' => $item->ssk_tglsetoran,
                'ssk_jmlsetor' => $item->ssk_jmlsetor,
                'ssk_tgl' => $item->ssk_tgl,
                'ssk_flag' => $item->ssk_flag,
                'ssk_info' => $item->ssk_info,
                );
            }
        }
        $data = array(
            'setoransimkesan_data' => $setoransimkesan,
            'datajatuh' => $datajatuh,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,  
            'active' => 3,          
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'jatuhtempo/simkesan_jatuhtempo.php',
        );
        $this->load->view(layout(), $data);
    }

    public function listsetoran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $plan = urldecode($this->input->get('plan', TRUE)); //plan
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
        $setoransimkesan = $this->Setoransimkesan_model->get_list_simkesan(NULL,$f,$t,$w,5,$plan);
        $plansimkesan = $this->Plansimkesan_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();
        $data = array(
            'plansimkesan_data' => $plansimkesan,
            'setoransimkesan_data' => $setoransimkesan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'plan' => $plan,
            'start' => $start,  
            'active' => 4,          
            'content' => 'backend/simkesan/simkesan',
            'item'=> 'listsetoran/setoransimkesan_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q) .'&idhtml='.$idhtml;
            $config['first_url'] = base_url() . 'simkesan/index.html?q=' . urlencode($q).'&idhtml='.$idhtml;
        } else {
            $config['base_url'] = base_url() . 'simkesan/index.html';
            $config['first_url'] = base_url() . 'simkesan/index.html';
        }

        $config['per_page'] = 500;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Simkesan_model->total_rows($q);
        
        $simkesan = $this->Simkesan_model->get_limit_datajoin($config['per_page'], $start, $q);


        $data = array(
            'simkesan_data' => $simkesan,
            'pagination' => $this->pagination->create_links(),
            'idhtml' => $idhtml,
            'total_rows' => $config['total_rows'],
            'q' => $q,
            'content' => 'backend/simkesan/simkesan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);
        $setoran = $this->Setoransimkesan_model->get_data_setor($id);
        $tahun = 5;
        $tahun10 = 10;
        if ($row) {
            $psk_id = $this->db->get_where('plansimkesan', array('psk_id' => $row->psk_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $tanggalDuedate = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun.' Years'));
            $tahun10 = date("Y-m-d", strtotime($row->sik_tglpendaftaran.' + '.$tahun10.' Years'));
            $data = array(
                'setoran_data' => $setoran,
		'sik_kode' => $row->sik_kode,
        'ang_no' => $row->ang_no,
        'nm_ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'psk_id' => $psk_id->psk_plan,
		'setor_psk_id' => $psk_id->psk_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sik_tglpendaftaran' => $row->sik_tglpendaftaran,
        'sik_tglberakhir' => $row->sik_tglberakhir,
        'estimasi_berakhir' => $tanggalDuedate,
        'estimasi_pengembangan' => $tahun10,
		'sik_status' => $row->sik_status,
		'sik_tgl' => $row->sik_tgl,
		'sik_flag' => $row->sik_flag,
		'sik_info' => $row->sik_info,'content' => 'backend/simkesan/simkesan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('simkesan/create_action'),
    	    'sik_kode' => set_value('sik_kode'),
    	    'ang_no' => set_value('ang_no'),
            'nm_ang_no' => set_value('nm_ang_no'),
    	    'kar_kode' => set_value('kar_kode'),
            'nm_kar_kode' => set_value('nm_kar_kode'),
    	    'psk_id' => set_value('psk_id'),
            'nm_psk_id' => set_value('nm_psk_id'),
    	    'wil_kode' => set_value('wil_kode'),
            'nm_wil_kode' => set_value('nm_wil_kode'),
    	    'sik_tglpendaftaran' => set_value('sik_tglpendaftaran'),
    	    'sik_tglberakhir' => set_value('sik_tglberakhir'),
    	    'sik_status' => set_value('sik_status'),
    	    'content' => 'backend/simkesan/simkesan_form',
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
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'psk_id' => $this->input->post('psk_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'sik_tglpendaftaran' => $this->input->post('sik_tglpendaftaran',TRUE),
    		'sik_tglberakhir' => $this->input->post('sik_tglberakhir',TRUE),
    		'sik_status' => $this->input->post('sik_status',TRUE),
    		'sik_tgl' => $this->tgl,
    		'sik_flag' => 0,
    		'sik_info' => "",
    	    );

            $this->Simkesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simkesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('simkesan/update_action'),
        		'sik_kode' => set_value('sik_kode', $row->sik_kode),
        		'ang_no' => set_value('ang_no', $row->ang_no),
                'nm_ang_no' => set_value('ang_no', $row->ang_no),
        		'kar_kode' => set_value('kar_kode', $row->kar_kode),
                'nm_kar_kode' => set_value('kar_kode', $row->kar_kode),
        		'psk_id' => set_value('psk_id', $row->psk_id),
                'nm_psk_id' => set_value('psk_id', $row->psk_id),
        		'wil_kode' => set_value('wil_kode', $row->wil_kode),
                'nm_wil_kode' => set_value('wil_kode', $row->wil_kode),
        		'sik_tglpendaftaran' => set_value('sik_tglpendaftaran', $row->sik_tglpendaftaran),
        		'sik_tglberakhir' => set_value('sik_tglberakhir', $row->sik_tglberakhir),
        		'sik_status' => set_value('sik_status', $row->sik_status),
        	    'content' => 'backend/simkesan/simkesan_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sik_kode', TRUE));
        } else {
            $data = array(
    		'ang_no' => $this->input->post('ang_no',TRUE),
    		'kar_kode' => $this->input->post('kar_kode',TRUE),
    		'psk_id' => $this->input->post('psk_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'sik_tglpendaftaran' => $this->input->post('sik_tglpendaftaran',TRUE),
    		'sik_tglberakhir' => $this->input->post('sik_tglberakhir',TRUE),
    		'sik_status' => $this->input->post('sik_status',TRUE),
    		'sik_flag' => 1,
    	    );

            $this->Simkesan_model->update($this->input->post('sik_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simkesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simkesan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'sik_flag' => 2,
            );

            $this->Simkesan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simkesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simkesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('psk_id', 'psk id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('sik_tglpendaftaran', 'sik tglpendaftaran', 'trim|required');
	$this->form_validation->set_rules('sik_status', 'sik status', 'trim|required');
	$this->form_validation->set_rules('sik_kode', 'sik_kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simkesan.php */
/* Location: ./application/controllers/Simkesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:29 */
/* http://harviacode.com */