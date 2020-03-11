<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpanan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananpokok_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->simpanana();
                break;
            case  2:
                $this->simpananb();
                break;
            case  3:
                $this->listdata();
                break;
            case  4:
                $this->tariksimpanan();
                break;
            case  5:
                $this->setor();
                break;
            case  6:
                $this->listsetoran();
                break;
            case  7:
                $this->carisimpanan();
                break;
            case  8:
                $this->setupsimpanan();
                break;
			case  9:
                $this->listpenarikan();
                break;
			case  10:
                $this->listsimpananpokok();
                break;
                    
            default:
                $this->setupsimpanan();
                break;
        }
    } 

	public function listsimpananpokok(){
        $f = urldecode($this->input->get('f', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
		
        $SATU = 1;
		
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $dateyesterday = date("Y-m-d", strtotime($datetoday.' - '.$SATU.' Months'));
		if ($f == null && $t == null ){$f=$dateyesterday; $t=$datetoday;}
		
        $datasimpananpokok = array();
		$simpananpokok = $this->Simpananpokok_model->get_all();
        
		foreach($simpananpokok as $key=>$item){
			$ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
			$set_sp = $this->db->get_where('settingsimpanan', array('ses_id' => $item->ses_id))->row();
			
			$tgl_bayar = date("Y-m-d", strtotime($item->sip_tglbayar));
			
			if($tgl_bayar >= $f && $tgl_bayar <= $t){
				$datasimpananpokok[$key] = array(
					'ang_no'=>$ang_no->ang_no,
					'ang_nama'=>$ang_no->ang_nama,
					'ses_nama'=>$set_sp->ses_nama,
					'sip_id'=>$item->sip_id,
					'sip_setoran'=>$item->sip_setoran,
					'sip_tglbayar'=>date("d-m-Y", strtotime($item->sip_tglbayar)),
				);
			}
		}
		//echo $datetoday."<br>";
		//echo $dateyesterday;
		//print_r($datasimpananpokok);
		$data = array(
			'datasimpananpokok'=>$datasimpananpokok,
			'content' => 'backend/simpanan/simpanan',
			'item'=> 'simpananpokok/simpananpokok_list.php',
			'active' => 10,
			'f'=>$f,
			't'=>$t
		);
		$this->load->view(layout(), $data);
	}
	
	public function simpananpokok_read($id){
		$simpananpokok = $this->Simpananpokok_model->get_by_id($id);
        
		$ang_no = $this->db->get_where('anggota', array('ang_no' => $simpananpokok->ang_no))->row();
		$set_sp = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananpokok->ses_id))->row();
		
		$data = array(
			'ang_no'=>$ang_no->ang_no,
			'ang_nama'=>$ang_no->ang_nama,
			'ses_nama'=>$set_sp->ses_nama,
			'sip_id'=>$simpananpokok->sip_id,
			'sip_setoran'=>$simpananpokok->sip_setoran,
			'sip_tglbayar'=>date("d-m-Y", strtotime($simpananpokok->sip_tglbayar)),
			'active'=>10,
			'content' => 'backend/simpanan/simpanan',
			'item'=> 'simpananpokok/simpananpokok_read.php',
		);
		//print_r($datasimpananpokok);
		$this->load->view(layout(), $data);
	}
	
	public function simpananpokok_update($id){
		$simpananpokok = $this->Simpananpokok_model->get_by_id($id);
        
		$ang_no = $this->db->get_where('anggota', array('ang_no' => $simpananpokok->ang_no))->row();
		$set_sp = $this->db->get_where('settingsimpanan', array('ses_id' => $simpananpokok->ses_id))->row();
		
		$data = array(
			'ang_no'=>$ang_no->ang_no,
			'ang_nama'=>$ang_no->ang_nama,
			'ses_nama'=>$set_sp->ses_nama,
			'sip_id'=>$simpananpokok->sip_id,
			'sip_setoran'=>$simpananpokok->sip_setoran,
			'sip_tglbayar'=>date("d-m-Y", strtotime($simpananpokok->sip_tglbayar)),
			'active'=>10,
			'button'=>'Update',
			'action'=>'simpanan/simpananpokok_updateaction',
			'content' => 'backend/simpanan/simpanan',
			'item'=> 'simpananpokok/simpananpokok_form.php',
		);
		//print_r($datasimpananpokok);
		$this->load->view(layout(), $data);
	}
	
	public function simpananpokok_updateaction(){
		$sip_id=$this->input->post('sip_id');
		
		$data=array(
			'sip_setoran'=>$this->input->post('sip_setoran'),
			'sip_tglbayar'=>date("Y-m-d", strtotime($this->input->post('sip_tglbayar'))),
			'sip_flag'=>'1'
		);
		$this->Simpananpokok_model->update($sip_id, $data);
		redirect('simpanan/listsimpananpokok');
	}
	
	public function simpananpokok_delete($id){
		$this->Simpananpokok_model->delete($id);
		redirect('simpanan/listsimpananpokok');
	}
   
   public function setupsimpanan(){
        $data = array(
        'content' => 'backend/simpanan/simpanan',
        'item'=> 'setupsimpanan.php',
        'active' => 8,
        );
        $this->load->view(layout(), $data);
    } 

    public function simpanana(){
        $nowYear = date('d');
        $data = array(
        'kode' => $this->Pengkodean->simpananana($nowYear),
        'content' => 'backend/simpanan/simpanan',
        'item'=> 'pendaftaran/simpanana.php',
        'active' => 1,
        );
        $this->load->view(layout(), $data);
    }

    public function simpananb(){
        $nowYear = date('d');
        $data = array(
        'kode' => $this->Pengkodean->simpanananb($nowYear),
        'content' => 'backend/simpanan/simpanan',
        'item'=> 'pendaftaran/simpananb.php',
        'active' => 2,
        );

        $this->load->view(layout(), $data);
    }

//setoranan Simpanan
    public function setor(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $setor = null;
        
        //data simpanan
        if ($q<>''){
            $sim_status = $this->statusSimpanan;
            $row = $this->Simpanan_model->get_by_id_penarikan($q);
            $setoran = $this->Setoransimpanan_model->get_data_setor($q);
            if ($row) {    
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $setor = array(
                'setoran_data' => $setoran,
                'sim_kode' => $row->sim_kode,
                'ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'bus_id' => $bus_id->bus_bunga,
                'jsi_id' => $jsi_id->jsi_simpanan,
                'jse_id' => $jse_id->jse_setoran,
                'min_jse_id' => $jse_id->jse_min,
                'wil_kode' => $wil_kode->wil_nama,
                'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
                'sim_status' => $sim_status[$row->sim_status],
	    );
            }
        }

        $data = array(
            'content' => 'backend/simpanan/simpanan',
            'item'=> 'setoran/setoran.php',
            'q' => $q,
            'active' => 5,
            'setor' => $setor,
        );
        
    $this->load->view(layout(), $data);
    }

    public function setoran_action() 
    {
        //insert data setoran simpanan
        
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tglsetor = date("Y-m-d", strtotime($datetoday.' - '.$this->input->post('mundur',TRUE).' Days'));
        $dataSetoran = array(
            'sim_kode' => $this->input->post('sim_kode',TRUE),
            'ssi_tglsetor' => $tglsetor,
            'ssi_jmlsetor' => $this->input->post('ssi_jmlsetor',TRUE),
            'ssi_tgl' => $this->tgl,
            'ssi_flag' => 0,
            'ssi_info' => "",
            );
            //echo $tglsetor;
                $this->Setoransimpanan_model->insert($dataSetoran);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('simpanan/?p=5'));
        
    }

//Tarik Simpanan
    public function tariksimpanan(){
        
        $q = urldecode($this->input->get('q', TRUE));
        $penarikan = null;
        
        //data simpanan
        if ($q<>''){
            $sim_status = $this->statusSimpanan;
            $row = $this->Simpanan_model->get_by_id_penarikan($q);
            if ($row != NULL){
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
        }
        
        $tanggalDuedate = date("Y-m-d", strtotime($row->sim_tglpendaftaran.' + '.$jsi_id->jsi_simpanan.' Months'));
            $setoran = $this->Setoransimpanan_model->get_data_setor($q);
            $bungasetoran = $this->Bungasetoransimpanan_model->get_data_bungasetoran($q);
            if ($row) {
                $penarikan = array(  
                'bungasetoran' => $bungasetoran,
                'setoran_data' => $setoran,
                'sim_kode' => $row->sim_kode,
                'ang_no' => $ang_no->ang_nama,
                'kar_kode' => $kar_kode->kar_nama,
                'bus_id' => $bus_id->bus_bunga,
                'jsi_id' => $jsi_id->jsi_simpanan,
                'jse_id' => $jse_id->jse_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
                'sim_jatuhtempo' => $tanggalDuedate,
                'sim_status' => $sim_status[$row->sim_status],
	    );
            }
        }

        $data = array(
            
            'content' => 'backend/simpanan/simpanan',
            'item'=> 'penarikan/penarikan.php',
            'q' => $q,
            'active' => 4,
            'penarikan' => $penarikan,
        );
        
    $this->load->view(layout(), $data);
    }

    public function tariksimpanan_action() 
    {
        //update data simpanan
        $dataSimpanan = array(
            'sim_status' => 1,
            'sim_flag' => 1,
            );
        $this->Simpanan_model->update($this->input->post('sim_kode', TRUE), $dataSimpanan);
        //insert data tarik simpanan
        $dataPenarikan = array(
            'sim_kode' => $this->input->post('sim_kode',TRUE),
            'pes_tglpenarikan' => $this->input->post('pes_tglpenarikan',TRUE),
            'pes_saldopokok' => $this->input->post('pes_saldopokok',TRUE),
            'pes_bunga' => $this->input->post('pes_bunga',TRUE),
            'pes_jumlah' => $this->input->post('pes_jumlah',TRUE),
            'pes_phbuku' => $this->input->post('pes_phbuku',TRUE),
            'pes_administrasi' => $this->input->post('pes_administrasi',TRUE),
            'pes_jmltarik' => $this->input->post('pes_jmltarik',TRUE),
            'pes_tgl' => $this->tgl,
            'pes_flag' => 0,
            'pes_info' => "",
            );
                $this->Penarikansimpanan_model->insert($dataPenarikan);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('simpanan/?p=3'));
        
    }

    public function listdata()
    {
        $j = urldecode($this->input->get('j', TRUE));
        $q = urldecode($this->input->get('q', TRUE));
        $f = urldecode($this->input->get('f', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $s = urldecode($this->input->get('s', TRUE)); //status
        $u = urldecode($this->input->get('u', TRUE)); //no rekening
        $start = intval($this->input->get('start'));
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $rangetgl = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $z = date("Y-m-d", strtotime($f));
        $datasimpanan = array();
        $wilayah = $this->Wilayah_model->get_all();
        $simpanan = $this->Simpanan_model->get_limit_data($start, $q);
        
		if ($f == null && $t == null ) { $f=$z; $t=$rangetgl;}
        foreach ($simpanan as $key=>$item) {
            
            $tgl = date("Y-m-d", strtotime($item->sim_tglpendaftaran));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));
            if (
                ( $u=='all' && $s=='all' && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s=='all' && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s == $item->sim_status && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s=='all' && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s == $item->sim_status && $w=='all' && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s=='all' && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u == $item->sim_kode && $s == $item->sim_status && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t ) || 
                ( $u=='all' && $s == $item->sim_status && $w == $item->wil_kode && $tgl >= $f && $tgl <= $t )) {
                    $sim_status = $this->statusSimpanan;
                    $sim_jam = $this->statusJaminan;
                    $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $item->jsi_id))->row();
                    $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $item->jse_id))->row();
                    $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $item->bus_id))->row();
                    $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
                    $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
                    $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
                    $datasimpanan[$key] = array(
                'sim_kode' => $item->sim_kode,
                'ang_no' => $item->ang_no,
                'nm_ang_no' => $ang_no->ang_nama,
                'alamat_ang_no' => $ang_no->ang_alamat,
                'kar_kode' => $kar_kode->kar_nama,
                'bus_id' => $bus_id->bus_bunga,
                'jsi_id' => $jsi_id->jsi_simpanan,
                'jse_id' => $jse_id->jse_setoran,
                'wil_kode' => $wil_kode->wil_nama,
                'sim_tglpendaftaran' => $item->sim_tglpendaftaran,
                'sim_status' => $sim_status[$item->sim_status],
                'sim_statusid' => $item->sim_status,
                'sim_jam' => $sim_jam[$item->sim_jam],
                'sim_jamid' => $item->sim_jam,
                'sim_tgl' => $item->sim_tgl,
                'sim_flag' => $item->sim_flag,
                'sim_info' => $item->sim_info,
                    );
                }
            }
            
        $data = array(
            'datasimpanan' => $datasimpanan,
            'simpanan_data' => $simpanan,
            'wilayah_data' => $wilayah,
            'j' => $j,
            'q' => $q,
            'f' => $f,
            't' => $t,
            'w' => $w,
            's' => $s,
            'u' => $u,
            'start' => $start,
            'active' => 3,
            'content' => 'backend/simpanan/simpanan',
            'item' => 'simpanan_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function listsetoran()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	
        $setoransimpanan = $this->Setoransimpanan_model->get_listsetoran($f,$t,$w,2);
    
        $data = array(
            'setoransimpanan' => $setoransimpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'active' => 6,
            'content' => 'backend/simpanan/simpanan',
            'item' => 'setoransimpanan_list.php',
        );
        $this->load->view(layout(), $data);
    }
	
	public function listpenarikan(){
		$q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
		
		$satu=1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
		
		$tarik = array();
		
		$penarikan = $this->Penarikansimpanan_model->get_all();
		$wilayah = $this->Wilayah_model->get_all();
		
		foreach($penarikan as $key=>$row){
			$tgl = date("Y-m-d", strtotime($row->pes_tglpenarikan));
			$f = date("Y-m-d", strtotime($f));
			$t = date("Y-m-d", strtotime($t));
			
			$simpanan = $this->db->get_where('simpanan', array('sim_kode' => $row->sim_kode))->row();
			$anggota = $this->db->get_where('anggota', array('ang_no' => $simpanan->ang_no))->row();
			
			if($tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $simpanan->wil_kode == $w){
				$tarik[$key] = array(
					'pes_id'=>$row->pes_id,
					'sim_kode'=>$row->sim_kode,
					'ang_nama'=>$anggota->ang_nama,
					'ang_alamat'=>$anggota->ang_alamat,
					'tgl_tarik'=>$row->pes_tglpenarikan,
					'saldo'=>$row->pes_saldopokok,
					'bunga'=>$row->pes_bunga,
					'jumlah'=>$row->pes_jumlah,
					'phbuku'=>$row->pes_phbuku,
					'administrasi'=>$row->pes_administrasi,
					'jml_tarik'=>$row->pes_jmltarik
				);
			}
		}
		//print_r($tarik);
		$data = array(
			'tarik' => $tarik,
			'wilayah' => $wilayah,
			'q' => $q,
			'w' => $w,
			'f' => $f,
			't' => $t,
			'active' => 9,
			'content' => 'backend/simpanan/simpanan',
			'item' => 'penarikan_list.php'
		);
		$this->load->view(layout(), $data);
    }
    
    public function jaminan($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
            'sim_jam' => $this->input->post('sim_jam', TRUE),
        );
        $this->Simpanan_model->update($this->input->post('sim_kode', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Agunan');
        redirect(site_url('simpanan/?p=3'));
        }
    }
	
	public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        $simpanan = $this->Simpanan_model->get_limit_data( $start, $q);


        $data = array(
            'simpanan_data' => $simpanan,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/simpanan/simpanan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }
    
    public function carisimpanan()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $simpanan = $this->Simpanan_model->get_simpanan_aktiflist($q);
        $data = array(
            'simpanan_data' => $simpanan,
            'q' => $q,
            'content' => 'backend/simpanan/simpanan',
            'item' => 'carisimpanan.php',
            'active' => 7,
        );
        $this->load->view(layout(), $data);
    }

    public function read($id) 
    {
        
        $row = $this->Simpanan_model->get_by_id($id);
        $setoran = $this->Setoransimpanan_model->get_data_setor($id);
        $bungasetoran = $this->Bungasetoransimpanan_model->get_data_bungasetoran($id);
        if ($row) {
            $sim_status = $this->statusSimpanan;
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $data = array(
                'bungasetoran' => $bungasetoran,
        'setoran_data' => $setoran,
		'sim_kode' => $row->sim_kode,
		'ang_no' => $ang_no->ang_nama,
		'kar_kode' => $kar_kode->kar_nama,
		'bus_id' => $bus_id->bus_bunga,
		'jsi_id' => $jsi_id->jsi_simpanan,
		'jse_id' => $jse_id->jse_setoran,
		'wil_kode' => $wil_kode->wil_nama,
		'sim_tglpendaftaran' => $row->sim_tglpendaftaran,
        'sim_status' => $sim_status[$row->sim_status],
		'sim_tgl' => $row->sim_tgl,
		'sim_flag' => $row->sim_flag,
		'sim_info' => $row->sim_info,'content' => 'backend/simpanan/simpanan_read',
        );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('simpanan/create_action'),
	    'sim_kode' => set_value('sim_kode'),
        'ang_no' => set_value('ang_no'),
        'nm_ang_no' => set_value ('nm_ang_no'),
        'kar_kode' => set_value('kar_kode'),
        'nm_kar_kode' => set_value('nm_kar_kode'),
	    'bus_id' => set_value('bus_id'),
	    'nm_bus_id' => set_value('nm_bus_id'),
	    'jsi_id' => set_value('jsi_id'),
	    'nm_jsi_id' => set_value('nm_jsi_id'),
	    'jse_id' => set_value('jse_id'),
	    'nm_jse_id' => set_value('nm_jse_id'),
	    'wil_kode' => set_value('wil_kode'),
	    'nm_wil_kode' => set_value('nm_wil_kode'),
	    'sim_tglpendaftaran' => set_value('sim_tglpendaftaran'),
	    'sim_status' => set_value('sim_status'),
	    'content' => 'backend/simpanan/simpanan_form',
	);
        $this->load->view(layout(), $data);
    }
    
    public function simpanana_action() 
    {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => 4,
		'jsi_id' => 1,
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => 0,
		'sim_tgl' => $this->tgl,
		'sim_flag' => 0,
		'sim_info' => "",
	    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        
    }

    public function simpananb_action() 
    {
            $data = array(
		'sim_kode' => $this->input->post('sim_kode',TRUE),
		'ang_no' => $this->input->post('ang_no',TRUE),
		'kar_kode' => $this->input->post('kar_kode',TRUE),
		'bus_id' => 4,
		'jsi_id' => 2,
		'jse_id' => $this->input->post('jse_id',TRUE),
		'wil_kode' => $this->input->post('wil_kode',TRUE),
		'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),
		'sim_status' => 0,
		'sim_tgl' => $this->tgl,
		'sim_flag' => 0,
		'sim_info' => "",
	    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);
        if ($row) {
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $row->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $row->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $row->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $row->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $data = array(
                'button' => 'Update',
                'action' => site_url('simpanan/update_action'),
		'sim_kode' => set_value('sim_kode', $row->sim_kode),
		'ang_no' => set_value('ang_no', $row->ang_no),
		'nm_ang_no' => set_value('nm_ang_no', $ang_no->ang_nama),
		'kar_kode' => set_value('kar_kode', $row->kar_kode),
		'nm_kar_kode' => set_value('kar_kode', $kar_kode->kar_nama),
		'bus_id' => set_value('bus_id', $row->bus_id),
		'nm_bus_id' => set_value('bus_id', $bus_id->bus_bunga),
		'jsi_id' => set_value('jsi_id', $row->jsi_id),
		'nm_jsi_id' => set_value('jsi_id', $jsi_id->jsi_simpanan),
		'jse_id' => set_value('jse_id', $row->jse_id),
		'nm_jse_id' => set_value('jse_id', $jse_id->jse_setoran),
		'wil_kode' => set_value('wil_kode', $row->wil_kode),
		'nm_wil_kode' => set_value('wil_kode', $wil_kode->wil_nama),
	    'content' => 'backend/simpanan/simpanan_form.php',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }
    
    public function update_action() 
    {

            $data = array(	
            'sim_kode' => $this->input->post('sim_kode',TRUE),
            'ang_no' => $this->input->post('ang_no',TRUE),
            'kar_kode' => $this->input->post('kar_kode',TRUE),
            'bus_id' => $this->input->post('bus_id',TRUE),
            'jsi_id' => $this->input->post('jsi_id',TRUE),
            'jse_id' => $this->input->post('jse_id',TRUE),
            'wil_kode' => $this->input->post('wil_kode',TRUE),
            'sim_tglpendaftaran' => $this->input->post('sim_tglpendaftaran',TRUE),

	    );
            $this->Simpanan_model->update($this->input->post('sim_kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpanan'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);

        if ($row) {
            $data = array (
                'sim_flag' => 2,
            );
            $this->Simpanan_model->update($id,$data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }

    public function jatuhTempo(){
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
        $f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl
        $start = intval($this->input->get('start'));
        $satu =1;
        $simpanan = $this->Simpanan_model->get_jatuh_tempo($start, $q, $f, $t);

        $datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedatenow = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));
        $wilayah = $this->Wilayah_model->get_all();
        $datasimpanan = array();
        if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedatenow;}
        foreach ($simpanan as $key=>$item) {
            $sim_status = $this->statusSimpanan;
            $jsi_id = $this->db->get_where('jenissimpanan', array('jsi_id' => $item->jsi_id))->row();
            $jse_id = $this->db->get_where('jenissetoran', array('jse_id' => $item->jse_id))->row();
            $bus_id = $this->db->get_where('bungasimpanan', array('bus_id' => $item->bus_id))->row();
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
            $kar_kode = $this->db->get_where('karyawan', array('kar_kode' => $item->kar_kode))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
            
            $tanggalDuedate = date("Y-m-d", strtotime($item->sim_tglpendaftaran.' + '.$jsi_id->jsi_simpanan.' Months'));
            $f = date("Y-m-d", strtotime($f));
            $t = date("Y-m-d", strtotime($t));

            if (($tanggalDuedate >= $f && $tanggalDuedate <= $t && $w=='all') || ($tanggalDuedate >= $f && $tanggalDuedate <= $t && $item->wil_kode == $w)) {
                $datasimpanan[$key] = array(
					'sim_kode' => $item->sim_kode,
					'ang_no' => $item->ang_no,
					'ang_nama' => $ang_no->ang_nama,
					'ang_alamat' => $ang_no->ang_alamat,
					'kar_nama' => $kar_kode->kar_nama ,
					'bus_bunga' => $bus_id->bus_bunga,
					'jsi_simpanan' => $jsi_id->jsi_simpanan,
					'jse_setoran' => $jse_id->jse_setoran ,
					'wil_nama' => $wil_kode->wil_nama,
					'wil_nama' => $wil_kode->wil_nama,
					'sim_tglpendaftaran' => $item->sim_tglpendaftaran ,
					'tanggalDuedate' => $tanggalDuedate,
					'statusSimpanan' => $this->statusSimpanan[$item->sim_status],
				);
            }
        }

        $data = array(
            'datasimpanan' => $datasimpanan,
            'simpanan_data' => $simpanan,
            'wilayah_data' => $wilayah,
            'q' => $q,
            'w' => $w,
            'f' => $f,
            't' => $t,
            'start' => $start,
            'content' => 'backend/simpanan/jatuhtempo/simpanan_jatuhtempo.php',
        );
        $this->load->view(layout(), $data);
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sim_kode', 'sim kode', 'trim|required');
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('kar_kode', 'kar kode', 'trim|required');
	$this->form_validation->set_rules('bus_id', 'bus id', 'trim|required');
	$this->form_validation->set_rules('jsi_id', 'jsi id', 'trim|required');
	$this->form_validation->set_rules('jse_id', 'jse id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('sim_tglpendaftaran', 'sim tglpendaftaran', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */