<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Printneraca extends MY_Base
{
	function __construct()
    {
		parent::__construct();
		
		$this->load->model('Pengkodean');

		//simkesan
        $this->load->model('Simkesan_model');
        $this->load->model('Setoransimkesan_model');
        $this->load->model('Titipansimkesan_model');
        $this->load->model('Penarikansimkesan_model');
        $this->load->model('Klaimsimkesan_model');
        $this->load->model('Phusimkesan_model');
        $this->load->model('Phusimkesanpendapatan_model');
        $this->load->model('Shusimkesan_model');
        $this->load->model('Neracakasbanksimkesan_model');
		
		//neraca
        $this->load->model('Phu_model');
        $this->load->model('Phu_sistem_model');
        $this->load->model('Shu_model');
        $this->load->model('Neracakasbank_model');
        $this->load->model('Neracaaktivatetap_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Neracakewajibanjangkapanjang_model');
        $this->load->model('Neracaekuitas_model');

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

	public function Neraca(){
		
        $nowYear = date('d');
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
		$t = urldecode($this->input->get('t', TRUE)); //smpai tgl
		
		//model

		//neraca
        $phu = $this->Phu_model->get_all();		
        $phuSistem = $this->Phu_sistem_model->get_all();		
        $Shu = $this->Shu_model->get_all();		
        $kasBank = $this->Neracakasbank_model->get_all();		
        $aktivaTetap = $this->Neracaaktivatetap_model->get_all();		
        $simpananKaryawan = $this->Karyawan_model->get_all();		
        $kewJangkapanjang= $this->Neracakewajibanjangkapanjang_model->get_all();		
        $ekuitas= $this->Neracaekuitas_model->get_all();		
		
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
    	$pinjamanUmumaktif = $this->Pinjaman_model->get_pinjaman_umum();
    	$pinjamanKaryawanaktif = $this->Pinjaman_model->get_pinjaman_karyawan();
    	$pinjamanKhususaktif = $this->Pinjaman_model->get_pinjaman_khusus();
    	$pinjamanNonaktif = $this->Pinjaman_model->get_pinjaman_nonaktif();
    	$angsuranBayar = $this->Angsuran_model->get_angsuran_bayar();
    	$angsuranTotal = $this->Angsuran_model->get_angsuran_total();
    	$pelunasanPinjaman = $this->Pelunasan_model->get_all(); 
        $wilayah = $this->Wilayah_model->get_all();
        $provisi = $this->Potonganprovisi_model->get_by_id(1);		

		//variable

		//neraca
		$dataphu = array();
		$shuData = 0;
		$kasBankdata = 0;
		$aktivaTetaptanah = 0;
		$aktivaTetapbangunan = 0;
		$aktivaTetapelektronik = 0;
		$aktivaTetapkendaraan= 0;
		$aktivaTetapperalatan = 0;
		$aktivaTetappenyusutan = 0;
		$simpananKaryawandata = 0;
		$rekeningKoran = 0;
		$modalPenyertaan = 0;
		$simpananCdr = 0;
		$donasi = 0;
		
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
		$saldoPinjamanumum = 0;
		$saldoPinjamankaryawan = 0;
		$saldoPinjamankhusus = 0;
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
		$pokokAngsuranbelum  = 0;		
		$saldoPinjamankhususbelum = 0;
		$saldoPinjamankaryawanbelum = 0;
		$saldoPinjamanumumbelum = 0;
		
		$satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
		$tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));

    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}
		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}

    	//hitung saldo simpanan aktif
    	foreach ($simpananAktif as $key => $value) {
    		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
    		foreach ($setoran as $k => $item) {
				$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
    				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sim_kode->wil_kode == $w) {
						$saldoSimpanan += $item->ssi_jmlsetor;
    				}
    			} else {
    				$saldoSimpanan += $item->ssi_jmlsetor;
				}
				
				
			}
			
		}

    	//hitung saldo pinjaman umum
    	foreach ($pinjamanUmumaktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sim_kode->wil_kode == $w)  {
    				$saldoPinjamanumum += $value->pin_pinjaman ;
    			}
			} else {
				$saldoPinjamanumum += $value->pin_pinjaman;
		}
	}

		//hitung saldo pinjaman karyawan
		foreach ($pinjamanKaryawanaktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sim_kode->wil_kode == $w)  {
					$saldoPinjamankaryawan += $value->pin_pinjaman;
				}
			} else {
				$saldoPinjamankaryawan += $value->pin_pinjaman;
		}
	}

		//hitung saldo pinjaman khusus
		foreach ($pinjamanKhususaktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sim_kode->wil_kode == $w)  {
					$saldoPinjamankhusus += $value->pin_pinjaman ;
				}
			} else {
				$saldoPinjamankhusus += $value->pin_pinjaman;
		}
	}

		//hitung saldo angsuran pokok dari angsuran status bayar
    	foreach ($angsuranBayar as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgl));
			//var_dump($value->ags_id);
    			if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
    				$pokokAngsuran += $value->ags_jmlpokok ;
    			}
			} else {
				$pokokAngsuran += $value->ags_jmlpokok;
		}
	}

	//angsuran pinjaman anggota/umum belum dibayar
	foreach ($pinjamanUmumaktif as $key => $value) {
    	$angsuranBelumbayar = $this->Angsuran_model->get_angsuran_belum($value->pin_id);
		foreach ($angsuranBelumbayar as $k => $item) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
			
			if ($f<>'' && $w<>'') {	
				$tgl = date("Y-m-d", strtotime($item->ags_tgl));
				//var_dump($value->ags_id);
					if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
						$saldoPinjamanumumbelum += $item->ags_jmlpokok ;
					}
				} else {
					$saldoPinjamanumumbelum += $item->ags_jmlpokok;
			
			
		}
		
	}
}
	//angsuran pinjaman karyawan belum dibayar
	foreach ($pinjamanKaryawanaktif as $key => $value) {
    	$angsuranBelumbayar = $this->Angsuran_model->get_angsuran_belum($value->pin_id);
		foreach ($angsuranBelumbayar as $k => $item) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
			
			if ($f<>'' && $w<>'') {	
				$tgl = date("Y-m-d", strtotime($item->ags_tgl));
				//var_dump($value->ags_id);
					if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
						$saldoPinjamankaryawanbelum += $item->ags_jmlpokok ;
					}
				} else {
					$saldoPinjamankaryawanbelum += $item->ags_jmlpokok;
			
			
		}
		
	}
}

//angsuran pinjaman khusus belum dibayar
foreach ($pinjamanKhususaktif as $key => $value) {
	$angsuranBelumbayar = $this->Angsuran_model->get_angsuran_belum($value->pin_id);
	foreach ($angsuranBelumbayar as $k => $item) {
		$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
		
		if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($item->ags_tgl));
			//var_dump($value->ags_id);
				if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
					$saldoPinjamankhususbelum += $item->ags_jmlpokok ;
				}
			} else {
				$saldoPinjamankhususbelum += $item->ags_jmlpokok;
		
		
	}
	
}
}

//angsuran pinjaman belum dibayar
	foreach ($pinjamanAktif as $key => $value) {
    	$angsuranBelumbayar = $this->Angsuran_model->get_angsuran_belum($value->pin_id);
		foreach ($angsuranBelumbayar as $k => $item) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $item->pin_id))->row();
			
			if ($f<>'' && $w<>'') {	
				$tgl = date("Y-m-d", strtotime($item->ags_tgl));
				//var_dump($value->ags_id);
					if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
						$pokokAngsuranbelum += $item->ags_jmlpokok ;
					}
				} else {
					$pokokAngsuranbelum += $item->ags_jmlpokok;
			
			
		}
		
	}
}

    	//hitung saldo angsuran pokok dari pelunasan
    	foreach ($pelunasanPinjaman as $key => $value) {
			$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $value->pin_id))->row();
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pel_tglpelunasan));
			//var_dump($value->ags_id);
    			if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $pin_id->wil_kode==$w))  {
    				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok ;
    			}
			} else {
				$pokokAngsuranpelunasan += $value->pel_totalkekuranganpokok;
		}
	}

	
    	//hitung saldo investasi aktif
    	foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $value->wil_kode==$w))  {
    				$saldoInvestasi += $value->ivb_jumlah ;
    			}
			} else {
				$saldoInvestasi += $value->ivb_jumlah;
		}
	}

	//hitung SHU
    	foreach ($Shu as $key => $value) {
			if ($f<>'') {	
			$tgl = date("Y-m-d", strtotime($value->shu_tanggal));
			//var_dump($value->ags_id);
    			if ($tgl <= $f)  {
    				$shuData += $value->shu_jumlah;
    			}
			} else {
				$shuData += $value->shu_jumlah;
		}
	}

	//hitung Neraca Kas Bank
    	foreach ($kasBank as $key => $value) {
			if ($f<>'') {	
			$tgl = date("Y-m-d", strtotime($value->nkb_tanggal));
			//var_dump($value->ags_id);
    			if ($tgl <= $f)  {
    				$kasBankdata += $value->nkb_jumlah;
    			}
			} else {
				$kasBankdata += $value->nkb_jumlah;
		}
	}

	//hitung kewajiban jangkapanjang
    	foreach ($kewJangkapanjang as $key => $value) {
			if ($f<>'') {	
			$tgl = date("Y-m-d", strtotime($value->njp_tanggal));
			//var_dump($value->ags_id);
    			if ($tgl <= $f)  {
    				$rekeningKoran += $value->njp_rekeningkoran;
    				$modalPenyertaan += $value->njp_modalpenyertaan;
    			}
			} else {
				$rekeningKoran += $value->njp_rekeningkoran;
				$modalPenyertaan += $value->njp_modalpenyertaan;
		}
	}

	//hitung ekuitas
    	foreach ($ekuitas as $key => $value) {
			if ($f<>'') {	
			$tgl = date("Y-m-d", strtotime($value->nek_tanggal));
			//var_dump($value->ags_id);
    			if ($tgl <= $f)  {
    				$simpananCdr += $value->nek_simpanancdr;
    				$donasi += $value->nek_donasi;
    			}
			} else {
				$simpananCdr += $value->nek_simpanancdr;
				$donasi += $value->nek_donasi;
		}
	}


	//hitung Neraca Aktiva Tetap
    	foreach ($aktivaTetap as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->nat_tanggal));
			//var_dump($value->ags_id);
    			if ($tgl <= $f)  {
					$aktivaTetaptanah += $value->nat_tanah;
					$aktivaTetapbangunan += $value->nat_bangunan;
					$aktivaTetapelektronik += $value->nat_elektronik;
					$aktivaTetapkendaraan += $value->nat_kendaraan;
					$aktivaTetapperalatan += $value->nat_peralatan;
					$aktivaTetappenyusutan += $value->nat_akumulasipenyusutan;
    			}
			} else {
				$aktivaTetaptanah += $value->nat_tanah;
				$aktivaTetapbangunan += $value->nat_bangunan;
				$aktivaTetapelektronik += $value->nat_elektronik;
				$aktivaTetapkendaraan += $value->nat_kendaraan;
				$aktivaTetapperalatan += $value->nat_peralatan;
				$aktivaTetappenyusutan += $value->nat_akumulasipenyusutan;
		}
	}

	//hitung bunga simpanan aktif
	foreach ($simpananAktif as $key => $value) {
		$bungaSetoran = $this->Bungasetoransimpanan_model->get_data_bungasetoran($value->sim_kode);
		foreach ($bungaSetoran as $k => $item) {
			if ($f<>'' && $t<>'') {	
				$tgl = date("Y-m-d", strtotime($item->bss_tglbunga));
				if ($tgl <= $f) {
					$bungaSimpanan += $item->bss_bungabulanini;
				}
			} else {
				$bungaSimpanan += $item->bss_bungabulanini;
			}
		}
	}

	//hitung saldo simpanan aktif masuk
	foreach ($simpananAktif as $key => $value) {
		$setoran = $this->Setoransimpanan_model->get_data_setor($value->sim_kode);
		foreach ($setoran as $k => $item) {
			$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
			
			if ($f<>'' && $t<>'' && $w<>'') {	
				$tgl = date("Y-m-d", strtotime($item->ssi_tglsetor));
				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sim_kode->wil_kode == $w) {
					$saldoSimpanan += $item->ssi_jmlsetor;
				}
			} else {
				$saldoSimpanan += 0;
			}
			//var_dump($item->ssi_jmlsetor);
			
			
		}
		
	}

		//hitung saldo investasi aktif
		foreach ($investasiAktif as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ivb_tglpendaftaran));
			//var_dump($value->ags_id);
				if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $value->wil_kode==$w))  {
					$saldoInvestasi += $value->ivb_jumlah ;
				}
			} else {
				$saldoInvestasi += 0;
		}
	}

	//hitung simpanan karyawan
	foreach ($simpananKaryawan as $key => $value) {
		if ($f<>'' && $t<>'' && $w<>'') {	
		$tgl = date("Y-m-d", strtotime($value->kar_tgl));
		//var_dump($value->ags_id);
			if (($tgl <= $f && 'all'==$w) || ($tgl <= $f && $value->wil_kode==$w))  {
				$simpananKaryawandata += $value->kar_simpanan ;
			}
		} else {
			$simpananKaryawandata += $value->kar_simpanan;
	}
}

    	//simpanan wajib
    	foreach ($setoransimpananwajib as $key => $value) {
    		if ($f<>'' && $t<>'') {	
    			$tgl = date("Y-m-d", strtotime($value->ssw_tglsetor));
    			if ($tgl <= $f) {
    				$saldoSimpananwajib += $value->ssw_jmlsetor;
    			}
    		} else {
    			$saldoSimpananwajib += $value->ssw_jmlsetor;
    		}
    	}

    	//simpanan pokok
    	foreach ($simpananPokok as $key => $value) {
    		if ($f<>'' && $t<>'') {	
    			$tgl = date("Y-m-d", strtotime($value->sip_tglbayar));
    			if ($tgl <= $f) {
    				$saldoSimpananpokok += $value->sip_setoran;
    			}
    		} else {
				$saldoSimpananpokok += $value->sip_setoran;
    		}
		}	
		

		$data = array(

			'kode' => $this->Pengkodean->psis($nowYear),

			//neraca
			'dataphu' => $dataphu,
			'shudata' => $shuData,
			'kasbankdata' => $kasBankdata,
			'aktivatetaptanah' => $aktivaTetaptanah,
			'aktivatetapbangunan' => $aktivaTetapbangunan,
			'aktivatetapelektronik' => $aktivaTetapelektronik,
			'aktivatetapkendaraan' => $aktivaTetapkendaraan,
			'aktivatetapperalatan' => $aktivaTetapperalatan,
			'aktivatetappenyusutan' => $aktivaTetappenyusutan,
			'simpanankaryawandata' => $simpananKaryawandata,
			'rekeningkoran' => $rekeningKoran,
			'modalpenyertaan' => $modalPenyertaan,
			'simpanancdr' => $simpananCdr,
			'donasi' => $donasi,

			//investasi
			'jasainvestasiditarik' => $jasaInvestasiditarik,
			'saldoinvestasiditarik' => $saldoInvestasiditarik,
			'saldoinvestasilalu' => $saldoInvestasilalu,
			'saldoinvestasi' => $saldoInvestasi,
			
			//simpanan
			'saldosimpananlalu' => $saldoSimpananlalu,
            'wilayah_data' => $wilayah,
			'saldosimpananneraca' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'bungasimpanan' => $bungaSimpanan,
			'saldosimpananwajib' => $saldoSimpananwajib,
			'saldosimpananwajibditarik' => $saldoSimpananwajibDitarik,
			'saldosimpananpokok' => $saldoSimpananpokok,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			
			//pinjaman
			'saldopinjamankhusus' => $saldoPinjamankhusus,
			'saldopinjamankaryawan' => $saldoPinjamankaryawan,
			'saldopinjamanumum' => $saldoPinjamanumum,
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
			'pokokangsuranbelum' => $pokokAngsuranbelum,
			'saldopinjamankhususbelum' => $saldoPinjamankhususbelum,
			'saldopinjamankaryawanbelum' => $saldoPinjamankaryawanbelum,
			'saldopinjamanumumbelum' => $saldoPinjamanumumbelum,
			'f' => $f,
			't' => $t,
			'w' => $w,
		);
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
        $html = $this->load->view('backend/neraca/printneraca/neraca.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('printneraca.pdf','D'); // it downloads the file into the user system, with give name
    
    }
	
	public function neracasimkesan(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$simkesanAktif = $this->Simkesan_model->get_simkesan_aktif();
    	$simkesanNonaktif = $this->Simkesan_model->get_simkesan_nonaktif();
    	$simkesanKlaim = $this->Klaimsimkesan_model->get_all();    	
    	$simkesanDitarik = $this->Penarikansimkesan_model->get_all();
    	$shuSimkesan = $this->Shusimkesan_model->get_all();
    	$rekeningplanA = $this->Simkesan_model->get_simkesan_plan(1);
    	$rekeningplanB = $this->Simkesan_model->get_simkesan_plan(2);
    	$rekeningplanC = $this->Simkesan_model->get_simkesan_plan(3);
    	$kasBank = $this->Neracakasbanksimkesan_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		

		//rekening simkesan
		$totalRekening = 0;
		$totalRekeninglalu = 0;
		$totalRekeningkeluar = 0;

		//setoran simkesan
		$saldoSimkesanlalu = 0;
    	$saldoSimkesan = 0;
		$saldoSimkesanditarik = 0;

		//klaim simkesan
		$saldoSetorklaim = 0 ;
		$saldoTunggakanklaim = 0 ;
		$saldoJumlahklaim = 0 ;
		$administrasiKlaim = 0 ;

		//penarikan simkesan
		$saldoSetortarik = 0;
		$saldoTunggakantarik = 0;
		$saldoJumlahtarik = 0;
		$administrasiTarik = 0;

		//titipan simkesan
		$saldoTitipan = 0;
		$saldoAmbiltitipan = 0;

		//shu simkesan
		$shuSimkesandata = 0;

		//kas bank
		$kasBankdata = 0;

		//data rekening plan
		$totalRekeningA = 0;
		$totalRekeningB = 0;
		$totalRekeningC = 0;

		//data setoran plan
		$saldoSimkesanA = 0;
		$saldoSimkesanB = 0;
		$saldoSimkesanC = 0;

        $satu = 1;
		$datetoday = date("Y-m-d", strtotime($this->tgl));
        $tanggalDuedate = date("Y-m-d", strtotime($datetoday.' + '.$satu.' Months'));


    	if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

		if ($f == null && $t == null ) { $f=$datetoday; $t=$tanggalDuedate;}
    	//hitung saldo simkesan aktif masuk kini
    	foreach ($simkesanAktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesan += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesan += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}
		
    	//hitung saldo simkesan aktif plan a
    	foreach ($rekeningplanA as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanA += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanA += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

    	//hitung saldo simkesan aktif plan b
    	foreach ($rekeningplanB as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanB += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanB += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

    	//hitung saldo simkesan aktif plan c
    	foreach ($rekeningplanC as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f &&'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoSimkesanC += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesanC += $item->ssk_jmlsetor;
				}
				
				
			}
			
		}

		//rekening simkesan plan A
		foreach ($rekeningplanA as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningA++ ;
    			}
			} else {
					$totalRekeningA++ ;
		}
		}

		//rekening simkesan plan B
		foreach ($rekeningplanB as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningB++ ;
    			}
			} else {
					$totalRekeningB++ ;
		}
		}

		//rekening simkesan plan C
		foreach ($rekeningplanC as $key => $value) {
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->sik_tglpendaftaran));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
					$totalRekeningC++ ;
    			}
			} else {
					$totalRekeningC++ ;
		}
		}
		
		//shu
    	foreach ($shuSimkesan as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->phus_tgl));
			//var_dump($value->ags_id);
    			if (($tgl <= $f) )  {
					$shuSimkesandata += $value->shus_jumlah;
    			}
			} else {
				$shuSimkesandata += $value->shus_jumlah;
		}
	}
				
		//kas bank
		foreach ($kasBank as $key => $value) {
			if ($f<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->nkbs_tanggal));
			//var_dump($value->ags_id);
				if (($tgl <= $f) )  {
					$kasBankdata += $value->nkbs_jumlah;
				}
			} else {
				$kasBankdata += $value->nkbs_jumlah;
		}
	}


		//hitung saldo titipan simkesan
    	foreach ($simkesanAktif as $key => $value) {
    		$titipan = $this->Titipansimkesan_model->get_sikkode($value->sik_kode);
    		foreach ($titipan as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->tts_tgl));
    				if ($tgl <= $f && 'all' == $w || $tgl <= $f && $sik_kode->wil_kode == $w) {
						$saldoTitipan += $item->tts_jmltitip;
						$saldoAmbiltitipan += $item->tts_jmlambil;
    				}
    			} else {
					$saldoTitipan += $item->tts_jmltitip;
					$saldoAmbiltitipan += $item->tts_jmlambil;
				}
				
				
			}
			
		
		}

		$data = array(

			//data rekening
			'totalrekening' => $totalRekening,
			'totalrekeninglalu' => $totalRekeninglalu,
			'totalrekeningkeluar' => $totalRekeningkeluar,

			//data setoran
			'saldosimkesanlalu' => $saldoSimkesanlalu,
			'saldosimkesan' => $saldoSimkesan,
			'saldosimkesanditarik' => $saldoSimkesanditarik,

			//data klaim
			'saldosetorklaim' => $saldoSetorklaim,
			'saldotunggakanklaim' => $saldoTunggakanklaim,
			'saldojumlahklaim' => $saldoJumlahklaim,
			'administrasiklaim' => $administrasiKlaim,

			//data penarikan
			'saldosetortarik' => $saldoSetortarik,
			'saldotunggakantarik' => $saldoTunggakantarik,
			'saldojumlahtarik' => $saldoJumlahtarik,
			'administrasitarik' => $administrasiTarik,

			//data titipan simkesan	
			'saldotitipan' => $saldoTitipan,
			'saldoambiltitipan' => $saldoAmbiltitipan,

			//data shu
			'shusimkesandata' => $shuSimkesandata,

			//data kas bank
			'kasbankdata' => $kasBankdata,

			//data rekening
			'totalRekeninga' => $totalRekeningA,
			'totalRekeningb' => $totalRekeningB,
			'totalRekeningc' => $totalRekeningC,

			//data setoran plan
			'saldoSimkesana' => $saldoSimkesanA,
			'saldoSimkesanb' => $saldoSimkesanB,
			'saldoSimkesanc' => $saldoSimkesanC,

            'wilayah_data' => $wilayah,
			'f' => $f,
			't' => $t,
			'w' => $w,
		);
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Legal', [216, 356]]);
        $html = $this->load->view('backend/neraca/printneraca/neracasimkesan.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('printneracasimkesan.pdf','D'); // it downloads the file into the user system, with give name
    
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

		//phu
		$phuGaji = 0;
		$phuOprasional = 0;
		$phuLps = 0;
		$phuKomunikasi = 0;
		$phuPerlengkapan = 0;
		$phuPenyusutan = 0;
		$phuAsuransi = 0;
		$phuIsentif = 0;
		$phuPajakkendaraan = 0;
		$phuRapat = 0;
		$phuAtk = 0;
		$phuKeamanan = 0;
		$phuPhpinjaman = 0;
		$phuSosial = 0;
		$phuTasyakuran = 0;
		$phuKoran = 0;
		$phuPajakkoprasi = 0;
		$phuServicekendaraan = 0;
		$phuKonsumsi = 0;
		$phuRat = 0;
		$phuThr = 0;
		$phuNonoprasional = 0;
		$phuPerawatankantor = 0;

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
			
			$pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $value->pop_id))->row();
			if ($f<>'' && $t<>'' && $w<>'') {	
			$tgl = date("Y-m-d", strtotime($value->pin_tglpencairan));
			//var_dump($value->ags_id);
    			if (($tgl >= $f && $tgl <= $t && 'all'==$w) || ($tgl >= $f && $tgl <= $t && $value->wil_kode==$w))  {
    				$provisiPinjaman += $value->pin_pinjaman*$pop_id->pop_potongan/100 ;
    			}
			} else {
				$provisiPinjaman += $value->pin_pinjaman*$pop_id->pop_potongan/100;
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
    	foreach ($simpananNonaktif as $key => $value) {
    		$penarikan = $this->Penarikansimpanan_model->get_data_penarikan($value->sim_kode);
    		foreach ($penarikan as $k => $item) {
    			if ($f<>'' && $t<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->pes_tglpenarikan));
    				if ( $tgl >= $f && $tgl <= $t|| $tgl >= $f && $tgl <= $t) {
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
		$sim_kode = $this->db->get_where('simpanan', array('sim_kode' => $item->sim_kode))->row();
			if ($f<>'' && $t<>'') {	
				$tgl = date("Y-m-d", strtotime($item->bss_tglbunga));
				if ($tgl >= $f && $tgl <= $t && $w == 'all' || $tgl >= $f && $tgl <= $t && $sim_kode->wil_kode == $w) {
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
		
		//hitung PHU
		foreach ($phu as $key => $value) {
			if ($f<>'' && $t<>'') {	
			$tgl = date("Y-m-d", strtotime($value->phu_tanggal));
				if ($tgl >= $f && $tgl <= $t)  {
					$
					$phuGaji += $value->phu_gaji;
					$phuOprasional += $value->phu_operasional;
					$phuLps += $value->phu_lps;
					$phuKomunikasi += $value->phu_komunikasi;
					$phuPerlengkapan += $value->phu_perlengkapan;
					$phuPenyusutan += $value->phu_penyusutan;
					$phuAsuransi += $value->phu_asuransi;
					$phuIsentif += $value->phu_insentif;
					$phuPajakkendaraan += $value->phu_pajakkendaraan;
					$phuRapat += $value->phu_rapat;
					$phuAtk += $value->phu_atk;
					$phuKeamanan += $value->phu_keamanan;
					$phuPhpinjaman += $value->phu_phpinjaman;
					$phuSosial += $value->phu_sosial;
					$phuTasyakuran += $value->phu_tayakuran;
					$phuKoran += $value->phu_koran;
					$phuPajakkoprasi += $value->phu_pajakkoprasi;
					$phuServicekendaraan += $value->phu_servicekendaraan;
					$phuKonsumsi += $value->phu_rapat;
					$phuRat += $value->phu_rat;
					$phuThr += $value->phu_thr;
					$phuNonoprasional += $value->phu_nonoprasional;
					$phuPerawatankantor += $value->phu_perawatankantor;
				}
			} else {
				$phuGaji = 0;
				$phuOprasional = 0;
				$phuLps = 0;
				$phuKomunikasi = 0;
				$phuPerlengkapan = 0;
				$phuPenyusutan = 0;
				$phuAsuransi = 0;
				$phuIsentif = 0;
				$phuPajakkendaraan = 0;
				$phuRapat = 0;
				$phuAtk = 0;
				$phuKeamanan = 0;
				$phuPhpinjaman = 0;
				$phuSosial = 0;
				$phuTasyakuran = 0;
				$phuKoran = 0;
				$phuPajakkoprasi = 0;
				$phuServicekendaraan = 0;
				$phuKonsumsi = 0;
				$phuRat = 0;
				$phuThr = 0;
				$phuNonoprasional = 0;
				$phuPerawatankantor = 0;
		}
	}
		

		$data = array(

			'kode' => $this->Pengkodean->psis($nowYear),

			//phu		
			'phugaji' => $phuGaji,
			'phuoprasional' =>$phuOprasional,
			'phulps' => $phuLps,
			'phukomunikasi' => $phuKomunikasi,
			'phuperlengkapan' => $phuPerlengkapan,
			'phupenyusutan' => $phuPenyusutan,
			'phuasuransi' => $phuAsuransi,
			'phuisentif' => $phuIsentif,
			'phupajakkendaraan' => $phuPajakkendaraan,
			'phurapat' => $phuRapat,
			'phuatk' => $phuAtk,
			'phukeamanan' => $phuKeamanan,
			'phuphpinjaman' => $phuPhpinjaman,
			'phusosial' => $phuSosial,
			'phutasyakuran' => $phuTasyakuran,
			'phukoran' => $phuKoran,
			'phupajakkoprasi' => $phuPajakkoprasi,
			'phuservicekendaraan' => $phuServicekendaraan,
			'phukonsumsi' => $phuKonsumsi,
			'phurat' => $phuRat,
			'phuthr' => $phuThr,
			'phunonoprasional' => $phuNonoprasional,
			'phuperawatankantor' => $phuPerawatankantor,

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
		 
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4']);
        $html = $this->load->view('backend/neraca/printneraca/shu.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('shu.pdf','D'); // it downloads the file into the user system, with give name
    
    }


   
    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

	}
	

	
	
}