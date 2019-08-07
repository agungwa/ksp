<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Neraca extends MY_Base
{
	function __construct()
    {
		parent::__construct();
		
		$this->load->model('Pengkodean');
		
		//neraca
        $this->load->model('Phu_model');
        $this->load->model('Phu_sistem_model');
        $this->load->model('Shu_model');

		//investasi
        $this->load->model('Penarikaninvestasiberjangka_model');
        $this->load->model('Tutupinvestasiberjangka_model');
        $this->load->model('Investasiberjangka_model');

		//simpanan
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
		$this->load->model('Simpananpokok_model');
		
		//pinjaman
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Pelunasan_model');
        $this->load->model('Potonganprovisi_model');
        $this->load->model('Wilayah_model');
    }

    public function Perhitungan(){
		
        $nowYear = date('d');
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
		$t = urldecode($this->input->get('t', TRUE)); //smpai tgl
		
		//model

		//neraca
        $phu = $this->Phu_model->get_all();		
        $phuSistem = $this->Phu_sistem_model->get_all();		
        $Shu = $this->Shu_model->get_all();		
		
		//investasi
    	$investasiAktif = $this->Investasiberjangka_model->get_investasi_aktif();
    	$investasiNonaktif = $this->Investasiberjangka_model->get_investasi_nonaktif();
    	$jasaDitarik = $this->Penarikaninvestasiberjangka_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		
    	
		//simpanan
    	$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
    	$simpananNonaktif = $this->Simpanan_model->get_simpanan_nonaktif();
    	$setoransimpananwajib = $this->Setoransimpananwajib_model->get_all();    	
    	$simpananwajibDitarik = $this->Penarikansimpananwajib_model->get_all();
		$simpananPokok = $this->Simpananpokok_model->get_all();

		//pinjaman
    	$pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktif();
    	$pinjamanNonaktif = $this->Pinjaman_model->get_pinjaman_nonaktif();
    	$angsuranBayar = $this->Angsuran_model->get_angsuran_bayar();
    	$angsuranTotal = $this->Angsuran_model->get_angsuran_total();
    	$pelunasanPinjaman = $this->Pelunasan_model->get_all(); 
        $wilayah = $this->Wilayah_model->get_all();
        $provisi = $this->Potonganprovisi_model->get_by_id(1);		

		//variable

		//neraca
		$dataphu = array();
		
		//investasi
		$saldoInvestasi = 0;
    	$saldoInvestasilalu = 0;
    	$saldoInvestasiditarik = 0;
    	$jasaInvestasiditarik = 0;

		//simpanan
		$saldoSimpananlalu = 0;
    	$saldoSimpanan = 0;
    	$saldoSimpananDitarik = 0;
    	$bungaSimpanan = 0;
    	$saldoSimpananwajib = 0;
    	$saldoSimpananwajibDitarik = 0;
    	$saldoSimpananpokok = 0;
    	$phBuku = 0;
		$administrasi = 0;
		
		//pinjaman
		$saldoDroppinjaman = 0;
    	$saldoLalupinjaman = 0;
    	$pokokAngsuran = 0;
    	$pokokAngsuranpelunasan = 0;
    	$bungaAngsuran = 0;
    	$dendaAngsuran = 0;
    	$provisiPinjaman = 0;
    	$bungaDendapelunasan = 0;
    	$totalAngsuran = 0;
		$totalAngsurantunggakan = 0;
		
		$satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

    	//hitung bunga angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $pin_id->wil_kode==$w))  {
    				$bungaAngsuran += $value->ags_jmlbunga ;
    			}
			} else {
				$bungaAngsuran += $value->ags_jmlbunga;
		}
	}
	
    	//hitung denda angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $pin_id->wil_kode==$w))  {
    				$dendaAngsuran += $value->ags_denda ;
    			}
			} else {
				$dendaAngsuran += $value->ags_denda;
		}
	}
	
	
    	//hitung saldo potongan provisi
    	foreach ($pinjamanAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$provisiPinjaman += $value->pin_pinjaman*$provisi->pop_potongan/100 ;
    			}
			} else {
				$provisiPinjaman += $value->pin_pinjaman*$provisi->pop_potongan/100;
		}
	}

		   	//hitung saldo bunga denda pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $pin_id->wil_kode==$w))  {
    				$bungaDendapelunasan += $value->pel_bungatambahan ;
    			}
			} else {
				$bungaDendapelunasan += $value->pel_bungatambahan;
		}
	}
	
		//hitung Total saldo angsuran pokok dari angsuran jumlah bayar
    	foreach ($angsuranTotal as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $pin_id->wil_kode==$w))  {
    				$totalAngsuran += $value->ags_jmlbayar ;
    			}
			} else {
				$totalAngsuran += $value->ags_jmlbayar;
		}
	}
			
	
		//hitung Total saldo angsuran pokok dari angsuran tunggakan
    	foreach ($angsuranTotal as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $pin_id->wil_kode==$w))  {
    				$totalAngsurantunggakan += $value->ags_bayartunggakan ;
    			}
			} else {
				$totalAngsurantunggakan += $value->ags_bayartunggakan;
		}
	}

	
    	//hitung saldo simpanan ditarik
    	foreach ($simpananAktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->pes_tglpenarikan));
    				if ( $tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $item->wil_kode == $w) {
	    				$phBuku += $item->pes_phbuku;
	    				$administrasi += $item->pes_administrasi;
    				}
    			} else {
	    			$phBuku += $item->pes_phbuku;
	    			$administrasi += $item->pes_administrasi;
    			}
    		}
    	}

	//hitung bunga simpanan aktif
	foreach ($simpananNonaktif as $key => $value) {
		$bungaSetoran = $this->Bungasetoransimpanan_model->get_data_bungasetoran($value->sim_kode);
		foreach ($bungaSetoran as $k => $item) {
			if ($f<>'' && $t<>'') {	
				$tgl = date("Y-m-d", strtotime($item->bss_tglbunga));
				if ($tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $item->wil_kode == $w) {
					$bungaSimpanan += $item->bss_bungabulanini;
				}
			} else {
				$bungaSimpanan += $item->bss_bungabulanini;
			}
		}
	}

    	//hitung saldo jasa ditarik
    	foreach ($jasaDitarik as $key => $value) {
			$ivb_kode = $this->db->get_where('investasiberjangka', array('ivb_kode' => $value->ivb_kode))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($value->pib_tgl));
    				if (($tgl >= $f && $tgl <= $t && $w == 'all') || ($tgl >= $f && $tgl <= $t && $ivb_kode->wil_kode == $w)) {
    					$jasaInvestasiditarik += $value->pib_jmlditerima;
    				}
    			} else {
    				$jasaInvestasiditarik += $value->pib_jmlditerima;
    			}
    		
		}
		
		
    	//hitung data phu
    	foreach ($phu as $key => $item) {
			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->phu_tanggal));
    				if ($tgl >= $f && $tgl <= $t) {
    					$dataphu[$key] = array(
							'phu_id' => $item->phu_id,
							'phu_gaji' => $item->phu_gaji,
							'phu_operasional' => $item->phu_operasional,
							'phu_lps' => $item->phu_lps,
							'phu_komunikasi' => $item->phu_komunikasi,
							'phu_perlengkapan' => $item->phu_perlengkapan,
							'phu_penyusutan' => $item->phu_penyusutan,
							'phu_asuransi' => $item->phu_asuransi,
							'phu_insentif' => $item->phu_insentif,
							'phu_pajakkendaraan' => $item->phu_pajakkendaraan,
							'phu_rapat' => $item->phu_rapat,
							'phu_atk' => $item->phu_atk,
							'phu_keamanan' => $item->phu_keamanan,
							'phu_phpinjaman' => $item->phu_phpinjaman,
							'phu_sosial' => $item->phu_sosial,
							'phu_tayakuran' => $item->phu_tayakuran,
							'phu_koran' => $item->phu_koran,
							'phu_pajakkoprasi' => $item->phu_pajakkoprasi,
							'phu_servicekendaraan' => $item->phu_servicekendaraan,
							'phu_konsumsi' => $item->phu_konsumsi,
							'phu_rat' => $item->phu_rat,
							'phu_thr' => $item->phu_thr,
							'phu_nonoprasional' => $item->phu_nonoprasional,
							'phu_perawatankantor' => $item->phu_perawatankantor,
							'phu_keterangan' => $item->phu_keterangan,

						);
    				}
			}
		
    		
		}

		$data = array(

			'kode' => $this->Pengkodean->psis($nowYear),

			//neraca
			'dataphu' => $dataphu,

			//investasi
			'jasainvestasiditarik' => $jasaInvestasiditarik,
			'saldoinvestasiditarik' => $saldoInvestasiditarik,
			'saldoinvestasilalu' => $saldoInvestasilalu,
			'saldoinvestasi' => $saldoInvestasi,
			
			//simpanan
			'saldosimpananlalu' => $saldoSimpananlalu,
            'wilayah_data' => $wilayah,
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldoSimpananwajib,
			'saldosimpananwajibditarik' => $saldoSimpananwajibDitarik,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			
			//pinjaman
            'wilayah_data' => $wilayah,
			'saldodroppinjaman' => $saldoDroppinjaman,
			'saldolalupinjaman' => $saldoLalupinjaman,
			'pokokangsuran' => $pokokAngsuran,
			'pokokangsuranpelunasan' => $pokokAngsuranpelunasan,
			'bungaangsuran' => $bungaAngsuran,
			'bungadendapelunasan' => $bungaDendapelunasan,
			'dendaangsuran' => $dendaAngsuran,
			'provisipinjaman' => $provisiPinjaman,
			'totalangsuran' => $totalAngsuran,
			'totalangsurantunggakan' => $totalAngsurantunggakan,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/neraca/shu',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

	}
	

    public function perhitungan_action(){

		$datashu = array(
			'shu_pendapatan' => $this->input->post('shu_pendapatan',TRUE)+$this->input->post('psis_lainlain',TRUE),
			'shu_pengeluaran' => $this->input->post('shu_pengeluaran',TRUE),
			'shu_jumlah' => $this->input->post('shu_jumlah',TRUE)+$this->input->post('psis_lainlain',TRUE),
			'shu_tanggal' => $this->input->post('shu_tanggal',TRUE),
			'phu_id' => $this->input->post('phu_id',TRUE),
			'psis_id' => $this->input->post('psis_id',TRUE),
			'shu_tgl' => $this->tgl,
			'shu_flag' => 0,
			'shu_info' => "",
		);
		$this->Shu_model->insert($datashu);

		$datapsis = array (
			'psis_id' => $this->input->post('psis_id',TRUE),
			'psis_pendapatan' => $this->input->post('shu_pendapatan',TRUE)+$this->input->post('psis_lainlain',TRUE),
			'psis_pengeluaran' => $this->input->post('psis_pengeluaran',TRUE),
			'psis_lainlain' => $this->input->post('psis_lainlain',TRUE),
			'psis_adminsim' => $this->input->post('psis_adminsim',TRUE),
			'psis_pinalti' => $this->input->post('psis_pinalti',TRUE),
			'psis_adminpin' => $this->input->post('psis_adminpin',TRUE),
			'psis_jasapinjaman' => $this->input->post('psis_jasapinjaman',TRUE),
			'psis_tgl' => $this->tgl,
			'psis_flag' => 0,
			'psis_info' => "",
		);
		$this->Phu_sistem_model->insert($datapsis);

		$this->session->set_flashdata('message', 'Update Record Success');
        
		redirect(site_url('backend'));
    }
}