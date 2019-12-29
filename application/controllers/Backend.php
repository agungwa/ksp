<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Base {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Historibungasimpanan_model');
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Bungasimpanan_model');
		$this->load->model('Bungasetoransimpanan_model');
		
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
		
		is_logged();
		
    }  
	
	public function index()
	{ 	
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
		
		//simkesan
    	$simkesanAktif = $this->Simkesan_model->get_simkesan_aktif();
    	$simkesanNonaktif = $this->Simkesan_model->get_simkesan_nonaktif();
    	$simkesanKlaim = $this->Klaimsimkesan_model->get_all();    	
    	$simkesanDitarik = $this->Penarikansimkesan_model->get_all();
        $wilayah = $this->Wilayah_model->get_all();		


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

		//simkesan
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

		//hitung saldo simkesan aktif masuk kini
    	foreach ($simkesanAktif as $key => $value) {
    		$setoran = $this->Setoransimkesan_model->get_data_setor($value->sik_kode);
    		foreach ($setoran as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->ssk_tglsetoran));
    				if ($tgl <= $f) {
						$saldoSimkesan += $item->ssk_jmlsetor;
    				}
    			} else {
    				$saldoSimkesan += $item->ssk_jmlsetor;
				}
				
				
			}
		}

		//hitung saldo titipan simkesan
    	foreach ($simkesanAktif as $key => $value) {
    		$titipan = $this->Titipansimkesan_model->get_sikkode($value->sik_kode);
    		foreach ($titipan as $k => $item) {
				$sik_kode = $this->db->get_where('simkesan', array('sik_kode' => $item->sik_kode))->row();
				
    			if ($f<>'' && $t<>'' && $w<>'') {	
    				$tgl = date("Y-m-d", strtotime($item->tts_tgl));
    				if ($tgl <= $f && $tgl <= $t && 'all' == $w || $tgl >= $f && $tgl <= $t && $sik_kode->wil_kode == $w) {
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

			//simkesan
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
			'f' => $f,
			't' => $t,
			'w' => $w,
			'content'=>'backend/dashboard',

		);
		//$this->hitungBungaSetoran();
		$this->load->view('layout_backend.php',$data);
	}

	/*public function hitungBungaSetoran(){
		$lastmonth = mktime(0, 0, 0, date("m")-1, 28, date("Y"));
		$lastTgl = date("Y-m-d",$lastmonth);
		//cek tgl terakhir perhitungan dr tabel histori bungasetoran
		$lastHistory = $this->Historibungasimpanan_model->get_data_terakhir();
		if (!empty($lastHistory)) {
			$lastTgl = date("Y-m-d", strtotime($lastHistory->hbs_tglterakhir));
		}

		$nowTgl = date("d");
		$now = date("Y-m-d");
		//jika sekarang tgl 28 jalankan perhitungan & tgl skrg lbh dr tgl trakhir di histori
		if ($nowTgl == "28" && $now > $lastTgl) {
			//ambil data simpanan aktif
			$simpananAktif = $this->Simpanan_model->get_simpanan_aktif();
			foreach ($simpananAktif as $key => $value) {
				$bungaSimpanan = $this->Bungasimpanan_model->get_by_id($value->bus_id);
				$persenBunga = $bungaSimpanan->bus_bunga / 100;
				$bungaSetoranLalu = $this->Bungasetoransimpanan_model->get_data_bungasetoranTgl($value->sim_kode, $lastTgl);
				$saldoSetoranLalu = 0;
				if (!empty($bungaSetoranLalu)) {
					$saldoSetoranLalu = $bungaSetoranLalu->bss_saldobulanini;
				}
				//ambil data bunga setoran dari bulan sebelumnya, ambil bss_saldobulanini
				//ambil data setoran simpanan mulai tgl 28 s/d 27
				//hitung total setoran setiap rekening simpanan
				$tgl27Now = mktime(0, 0, 0, date("m"), 27, date("Y"));
				$tgl27Now = date("Y-m-d", $tgl27Now);
				$jumSetor = $this->Setoransimpanan_model->get_data_setorTgl($value->sim_kode, $lastTgl,$tgl27Now);
				$jumSetorBaru = 0;
				foreach ($jumSetor as $k => $item) {
					if (!empty($item->jum_setor)) {
						$jumSetorBaru = $item->jum_setor;
					}
				}
				//hitung jum bunga setiap total setoran
				//=(saldo bulan lalu + jum setoran bulan ini) * persenBunga
				$bungaBaru = ($saldoSetoranLalu + $jumSetorBaru) * $persenBunga;

				//jumlah saldo setoran baru
				//=saldo bulan lalu + jum setoran bulan ini + jum bunga
				$saldoBaru = $saldoSetoranLalu + $jumSetorBaru + $bungaBaru;

				/*echo "</br>SIMPANAN : ".$value->sim_kode.'</br>'
					."Setoran baru = ".$jumSetorBaru.'</br>' 
					. "Setoran Lalu = ".$saldoSetoranLalu .'</br>'
					. "Bunga = " .$bungaBaru .'</br>'
					. "Saldo Baru = " .$saldoBaru . '</br>';*/

				//simpan data bunga setoran ke tabel bungasetoransimpanan
			/*	$dataBungaSetoran = array(
						'sim_kode' => $value->sim_kode,
						'bss_saldosimpanan' => $saldoSetoranLalu,
						'bss_jumlahsetoranbulanan' => $jumSetorBaru,
						'bss_bungabulanini' => $bungaBaru,
						'bss_saldobulanini' => $saldoBaru,
						'bss_tglbunga' => $now,
						'bss_tgl' => date("Y-m-d H:i:s"),
						'bss_flag' => 0,
						'bss_info' => ''
					);
				$this->Bungasetoransimpanan_model->insert($dataBungaSetoran);			
			}
			//simpan tgl terakhir perhitungan dijalankan di tabel histori bungasetoran	
			$dataHistori = array(
					'ang_no'=> $this->session->userdata('username'),
					'hbs_tglterakhir' => $now,
					'hbs_tgl' => $now,
					'hbs_flag' => 0,
					'hbs_info' => ''
			);
			$this->Historibungasimpanan_model->insert($dataHistori); 
		} 
	} */
}
