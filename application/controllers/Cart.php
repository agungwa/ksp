<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Base {
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
		$this->load->model('Karyawansimpanan_model');
		
		//pinjaman
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Angsuranbayar_model');
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
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
		$t = urldecode($this->input->get('t', TRUE)); //smpai tgl

		$satu = 1;
		$dua = 2;
		$tiga = 3;
		$empat = 4;
		$lima = 5;
		$datetoday = date("Y-m-d", strtotime($this->tgl));

		$tanggalDuedate0 = date("Y-m", strtotime($this->tgl));
		$tanggalDuedate1 = date("Y-m", strtotime($datetoday.' - '.$satu.' Months'));
		$tanggalDuedate2 = date("Y-m", strtotime($datetoday.' - '.$dua.' Months'));
		$tanggalDuedate3= date("Y-m", strtotime($datetoday.' - '.$tiga.' Months'));
		$tanggalDuedate4 = date("Y-m", strtotime($datetoday.' - '.$empat.' Months'));
		$tanggalDuedate5 = date("Y-m", strtotime($datetoday.' - '.$lima.' Months'));

		//next months
		$bulanberikut1 = date("Y-m", strtotime($datetoday.' + '.$satu.' Months'));
		$bulanberikut2 = date("Y-m", strtotime($datetoday.' + '.$satu.' Months'));
		$bulanberikut3 = date("Y-m", strtotime($datetoday.' + '.$satu.' Months'));
		$bulanberikut4 = date("Y-m", strtotime($datetoday.' + '.$satu.' Months'));
		$bulanberikut5 = date("Y-m", strtotime($datetoday.' + '.$satu.' Months'));

		//Data Pinjaman Angsuran
		$dataAngsuran0 = $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate0,NULL);
		$dataAngsuran1= $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate1,NULL);
		$dataAngsuran2 = $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate2,NULL);
		$dataAngsuran3= $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate3,NULL);
		$dataAngsuran4= $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate4,NULL);
		$dataAngsuran5= $this->Angsuranbayar_model->get_angsuran_tgl(NULL,0,$tanggalDuedate5,NULL);
			//Pokok
		$angsuranPokok0 = $dataAngsuran0->{'agb_pokok'};
		$angsuranPokok1 = $dataAngsuran1->{'agb_pokok'};
		$angsuranPokok2 = $dataAngsuran2->{'agb_pokok'};
		$angsuranPokok3 = $dataAngsuran3->{'agb_pokok'};
		$angsuranPokok4 = $dataAngsuran4->{'agb_pokok'};
		$angsuranPokok5 = $dataAngsuran5->{'agb_pokok'};
			//Bunga
		$angsuranBunga0 = $dataAngsuran0->{'agb_bunga'};
		$angsuranBunga1 = $dataAngsuran1->{'agb_bunga'};
		$angsuranBunga2 = $dataAngsuran2->{'agb_bunga'};
		$angsuranBunga3 = $dataAngsuran3->{'agb_bunga'};
		$angsuranBunga4 = $dataAngsuran4->{'agb_bunga'};
		$angsuranBunga5 = $dataAngsuran5->{'agb_bunga'};
			//Denda
		$angsuranDenda0 = $dataAngsuran0->{'agb_denda'};
		$angsuranDenda1 = $dataAngsuran1->{'agb_denda'};
		$angsuranDenda2 = $dataAngsuran2->{'agb_denda'};
		$angsuranDenda3 = $dataAngsuran3->{'agb_denda'};
		$angsuranDenda4 = $dataAngsuran4->{'agb_denda'};
		$angsuranDenda5 = $dataAngsuran5->{'agb_denda'};

		//Data Pinjaman Pelunasan
		$dataPelunasan0 = $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate0,NULL);
		$dataPelunasan1= $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate1,NULL);
		$dataPelunasan2 = $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate2,NULL);
		$dataPelunasan3= $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate3,NULL);
		$dataPelunasan4= $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate4,NULL);
		$dataPelunasan5= $this->Pelunasan_model->get_sirkulasi(3,$tanggalDuedate5,NULL);
			//pokok
		$pelunasanPokok0 = $dataPelunasan0[0]->pel_totalkekuranganpokok;
		$pelunasanPokok1 = $dataPelunasan1[0]->pel_totalkekuranganpokok;
		$pelunasanPokok2 = $dataPelunasan2[0]->pel_totalkekuranganpokok;
		$pelunasanPokok3 = $dataPelunasan3[0]->pel_totalkekuranganpokok;
		$pelunasanPokok4 = $dataPelunasan4[0]->pel_totalkekuranganpokok;
		$pelunasanPokok5 = $dataPelunasan5[0]->pel_totalkekuranganpokok;
			//Bunga
		$pelunasanBunga0 = $dataPelunasan0[0]->pel_totalbungapokok;
		$pelunasanBunga1 = $dataPelunasan1[0]->pel_totalbungapokok;
		$pelunasanBunga2 = $dataPelunasan2[0]->pel_totalbungapokok;
		$pelunasanBunga3 = $dataPelunasan3[0]->pel_totalbungapokok;
		$pelunasanBunga4 = $dataPelunasan4[0]->pel_totalbungapokok;
		$pelunasanBunga5 = $dataPelunasan5[0]->pel_totalbungapokok;
			//Denda
		$pelunasanDenda0 = $dataPelunasan0[0]->pel_totaldenda;
		$pelunasanDenda1 = $dataPelunasan1[0]->pel_totaldenda;
		$pelunasanDenda2 = $dataPelunasan2[0]->pel_totaldenda;
		$pelunasanDenda3 = $dataPelunasan3[0]->pel_totaldenda;
		$pelunasanDenda4 = $dataPelunasan4[0]->pel_totaldenda;
		$pelunasanDenda5 = $dataPelunasan5[0]->pel_totaldenda;

		//total pokok , bunga, denda pinjaman masuk
		$t_pokok_0 = $pelunasanPokok0 + $angsuranPokok0;
		$t_pokok_1 = $pelunasanPokok1 + $angsuranPokok1;
		$t_pokok_2 = $pelunasanPokok2 + $angsuranPokok2;
		$t_pokok_3 = $pelunasanPokok3 + $angsuranPokok3;
		$t_pokok_4 = $pelunasanPokok4 + $angsuranPokok4;
		$t_pokok_5 = $pelunasanPokok5 + $angsuranPokok5;
		$t_bunga_0 = $angsuranBunga0 + $pelunasanBunga0;
		$t_bunga_1 = $angsuranBunga1 + $pelunasanBunga1;
		$t_bunga_2 = $angsuranBunga2 + $pelunasanBunga2;
		$t_bunga_3 = $angsuranBunga3 + $pelunasanBunga3;
		$t_bunga_4 = $angsuranBunga4 + $pelunasanBunga4;
		$t_bunga_5 = $angsuranBunga5 + $pelunasanBunga5;
		$t_denda_0 = $angsuranDenda0 + $pelunasanDenda0;
		$t_denda_1 = $angsuranDenda1 + $pelunasanDenda1;
		$t_denda_2 = $angsuranDenda2 + $pelunasanDenda2;
		$t_denda_3 = $angsuranDenda3 + $pelunasanDenda3;
		$t_denda_4 = $angsuranDenda4 + $pelunasanDenda4;
		$t_denda_5 = $angsuranDenda5 + $pelunasanDenda5;
		//Data Pinjaman Pencairan
		$dataPencairan0 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate0,NULL);
		$dataPencairan1 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate1,NULL);
		$dataPencairan2 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate2,NULL);
		$dataPencairan3 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate3,NULL);
		$dataPencairan4 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate4,NULL);
		$dataPencairan5 = $this->Pinjaman_model->get_data_pihutang(1,$tanggalDuedate5,NULL);
		$pencairanPokok0 = $dataPencairan0[0]->pin_pinjaman;
		$pencairanPokok1 = $dataPencairan1[0]->pin_pinjaman;
		$pencairanPokok2 = $dataPencairan2[0]->pin_pinjaman;
		$pencairanPokok3 = $dataPencairan3[0]->pin_pinjaman;
		$pencairanPokok4 = $dataPencairan4[0]->pin_pinjaman;
		$pencairanPokok5 = $dataPencairan5[0]->pin_pinjaman;

		//Data Investasi
		$dataInvestasi0 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate0,NULL);
		$dataInvestasi1 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate1,NULL);
		$dataInvestasi2 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate2,NULL);
		$dataInvestasi3 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate3,NULL);
		$dataInvestasi4 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate4,NULL);
		$dataInvestasi5 = $this->Investasiberjangka_model->get_investasi_chart(0,$tanggalDuedate5,NULL);
		
		$investasi0 = $dataInvestasi0[0]->ivb_jumlah;
		$investasi1 = $dataInvestasi1[0]->ivb_jumlah;
		$investasi2 = $dataInvestasi2[0]->ivb_jumlah;
		$investasi3 = $dataInvestasi3[0]->ivb_jumlah;
		$investasi4 = $dataInvestasi4[0]->ivb_jumlah;
		$investasi5 = $dataInvestasi5[0]->ivb_jumlah;

		//Data Investasi keluar
			//investasi tutup
		$dataInvestasitutup0 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate0);
		$dataInvestasitutup1 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate1);
		$dataInvestasitutup2 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate2);
		$dataInvestasitutup3 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate3);
		$dataInvestasitutup4 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate4);
		$dataInvestasitutup5 = $this->Investasiberjangka_model->get_investasi_chart(1,NULL,$tanggalDuedate5);
		$investasiTutup0 = $dataInvestasitutup0[0]->ivb_jumlah;
		$investasiTutup1 = $dataInvestasitutup1[0]->ivb_jumlah;
		$investasiTutup2 = $dataInvestasitutup2[0]->ivb_jumlah;
		$investasiTutup3 = $dataInvestasitutup3[0]->ivb_jumlah;
		$investasiTutup4 = $dataInvestasitutup4[0]->ivb_jumlah;
		$investasiTutup5 = $dataInvestasitutup5[0]->ivb_jumlah;

			//jasa keluar
		$datajasaInvestasi0 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate0,1);
		$datajasaInvestasi1 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate1,1);
		$datajasaInvestasi2 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate2,1);
		$datajasaInvestasi3 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate3,1);
		$datajasaInvestasi4 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate4,1);
		$datajasaInvestasi5 = $this->Penarikaninvestasiberjangka_model->get_chart(NULL,NULL,$tanggalDuedate5,1);
		$jasaInvestasi0 = $datajasaInvestasi0[0]->pib_jmlditerima;
		$jasaInvestasi1 = $datajasaInvestasi1[0]->pib_jmlditerima;
		$jasaInvestasi2 = $datajasaInvestasi2[0]->pib_jmlditerima;
		$jasaInvestasi3 = $datajasaInvestasi3[0]->pib_jmlditerima;
		$jasaInvestasi4 = $datajasaInvestasi4[0]->pib_jmlditerima;
		$jasaInvestasi5 = $datajasaInvestasi5[0]->pib_jmlditerima;
		
		//Data simpanan aktif
		$setoran0 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate0,2);
		$setoran1 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate1,2);
		$setoran2 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate2,2);
		$setoran3 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate3,2);
		$setoran4 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate4,2);
		$setoran5 = $this->Setoransimpanan_model->get_sirkulasi(NULL,NULL,$tanggalDuedate5,2);
		$saldoSimpanan0 = $setoran0[0]->ssi_jmlsetor;
		$saldoSimpanan1 = $setoran1[0]->ssi_jmlsetor;
		$saldoSimpanan2 = $setoran2[0]->ssi_jmlsetor;
		$saldoSimpanan3 = $setoran3[0]->ssi_jmlsetor;
		$saldoSimpanan4 = $setoran4[0]->ssi_jmlsetor;
		$saldoSimpanan5 = $setoran5[0]->ssi_jmlsetor;
		
		//Data simpanan ditarik
		$penarikan0 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate0,NULL,1);
		$penarikan1 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate1,NULL,1);
		$penarikan2 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate2,NULL,1);
		$penarikan3 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate3,NULL,1);
		$penarikan4 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate4,NULL,1);
		$penarikan5 = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,NULL,$tanggalDuedate5,NULL,1);
			//Pokok
		$pokokPenarikan0 = $penarikan0[0]->pes_saldopokok;
		$pokokPenarikan1 = $penarikan1[0]->pes_saldopokok;
		$pokokPenarikan2 = $penarikan2[0]->pes_saldopokok;
		$pokokPenarikan3 = $penarikan3[0]->pes_saldopokok;
		$pokokPenarikan4 = $penarikan4[0]->pes_saldopokok;
		$pokokPenarikan5 = $penarikan5[0]->pes_saldopokok;
			//Bunga
		$bungaPenarikan0 = $penarikan0[0]->pes_bunga;
		$bungaPenarikan1 = $penarikan1[0]->pes_bunga;
		$bungaPenarikan2 = $penarikan2[0]->pes_bunga;
		$bungaPenarikan3 = $penarikan3[0]->pes_bunga;
		$bungaPenarikan4 = $penarikan4[0]->pes_bunga;
		$bungaPenarikan5 = $penarikan5[0]->pes_bunga;
			//Phbuku
		$phPenarikan0 = $penarikan0[0]->pes_phbuku;
		$phPenarikan1 = $penarikan1[0]->pes_phbuku;
		$phPenarikan2 = $penarikan2[0]->pes_phbuku;
		$phPenarikan3 = $penarikan3[0]->pes_phbuku;
		$phPenarikan4 = $penarikan4[0]->pes_phbuku;
		$phPenarikan5 = $penarikan5[0]->pes_phbuku;
			//Administrasi
		$adminPenarikan0 = round($penarikan0[0]->pes_administrasi);
		$adminPenarikan1 = round($penarikan1[0]->pes_administrasi);
		$adminPenarikan2 = round($penarikan2[0]->pes_administrasi);
		$adminPenarikan3 = round($penarikan3[0]->pes_administrasi);
		$adminPenarikan4 = round($penarikan4[0]->pes_administrasi);
		$adminPenarikan5 = round($penarikan5[0]->pes_administrasi);

		//total
		//masuk
		$masuk0 = $saldoSimpanan0 + $phPenarikan0 + $adminPenarikan0 + $angsuranPokok0 + $angsuranBunga0 + $pelunasanPokok0 + $pelunasanBunga0 + $pelunasanDenda0 + $angsuranDenda0 + $investasi0;
		$masuk1 = $saldoSimpanan1 + $phPenarikan1 + $adminPenarikan1 + $angsuranPokok1 + $angsuranBunga1 + $pelunasanPokok1 + $pelunasanBunga1 + $pelunasanDenda1 + $angsuranDenda1 + $investasi1;
		$masuk2 = $saldoSimpanan2 + $phPenarikan2 + $adminPenarikan2 + $angsuranPokok2 + $angsuranBunga2 + $pelunasanPokok2 + $pelunasanBunga2 + $pelunasanDenda2 + $angsuranDenda2 + $investasi2;
		$masuk3 = $saldoSimpanan3 + $phPenarikan3 + $adminPenarikan3 + $angsuranPokok3 + $angsuranBunga3 + $pelunasanPokok3 + $pelunasanBunga3 + $pelunasanDenda3 + $angsuranDenda3 + $investasi3;
		$masuk4 = $saldoSimpanan4 + $phPenarikan4 + $adminPenarikan4 + $angsuranPokok4 + $angsuranBunga4 + $pelunasanPokok4 + $pelunasanBunga4 + $pelunasanDenda4 + $angsuranDenda4 + $investasi4;
		$masuk5 = $saldoSimpanan5 + $phPenarikan5 + $adminPenarikan5 + $angsuranPokok5 + $angsuranBunga5 + $pelunasanPokok5 + $pelunasanBunga5 + $pelunasanDenda5 + $angsuranDenda5 + $investasi5;
		//keluar
		$keluar0 = $pokokPenarikan0 + $bungaPenarikan0 + $pelunasanPokok0 + $pencairanPokok0 + $jasaInvestasi0 + $investasiTutup0;
		$keluar1 = $pokokPenarikan1 + $bungaPenarikan1 + $pelunasanPokok1 + $pencairanPokok1 + $jasaInvestasi1 + $investasiTutup1;
		$keluar2 = $pokokPenarikan2 + $bungaPenarikan2 + $pelunasanPokok2 + $pencairanPokok2 + $jasaInvestasi2 + $investasiTutup2;
		$keluar3 = $pokokPenarikan3 + $bungaPenarikan3 + $pelunasanPokok3 + $pencairanPokok3 + $jasaInvestasi3 + $investasiTutup3;
		$keluar4 = $pokokPenarikan4 + $bungaPenarikan4 + $pelunasanPokok4 + $pencairanPokok4 + $jasaInvestasi4 + $investasiTutup4;
		$keluar5 = $pokokPenarikan5 + $bungaPenarikan5 + $pelunasanPokok5 + $pencairanPokok5 + $jasaInvestasi5 + $investasiTutup5;

		//total simpanan masuk
		$t_simpanan_m0 = $saldoSimpanan0 + $phPenarikan0 + $adminPenarikan0;
		$t_simpanan_m1 = $saldoSimpanan1 + $phPenarikan1 + $adminPenarikan1;
		$t_simpanan_m2 = $saldoSimpanan2 + $phPenarikan2 + $adminPenarikan2;
		$t_simpanan_m3 = $saldoSimpanan3 + $phPenarikan3 + $adminPenarikan3;
		$t_simpanan_m4 = $saldoSimpanan4 + $phPenarikan4 + $adminPenarikan4;
		$t_simpanan_m5 = $saldoSimpanan5 + $phPenarikan5 + $adminPenarikan5;
		//total simpanan keluar
		$t_simpanan_k0 = $bungaPenarikan0 + $pokokPenarikan0;
		$t_simpanan_k1 = $bungaPenarikan1 + $pokokPenarikan1;
		$t_simpanan_k2 = $bungaPenarikan2 + $pokokPenarikan2;
		$t_simpanan_k3 = $bungaPenarikan3 + $pokokPenarikan3;
		$t_simpanan_k4 = $bungaPenarikan4 + $pokokPenarikan4;
		$t_simpanan_k5 = $bungaPenarikan5 + $pokokPenarikan5;

		//total pinjaman masuk
		$t_pinjaman_m0 = $t_pokok_0 + $t_bunga_0 + $t_denda_0;
		$t_pinjaman_m1 = $t_pokok_1 + $t_bunga_1 + $t_denda_1;
		$t_pinjaman_m2 = $t_pokok_2 + $t_bunga_2 + $t_denda_2;
		$t_pinjaman_m3 = $t_pokok_3 + $t_bunga_3 + $t_denda_3;
		$t_pinjaman_m4 = $t_pokok_4 + $t_bunga_4 + $t_denda_4;
		$t_pinjaman_m5 = $t_pokok_5 + $t_bunga_5 + $t_denda_5;
		
		//total investasi keluar
		$t_investasi_k0 = $investasiTutup0 + $jasaInvestasi0;
		$t_investasi_k1 = $investasiTutup1 + $jasaInvestasi1;
		$t_investasi_k2 = $investasiTutup2 + $jasaInvestasi2;
		$t_investasi_k3 = $investasiTutup3 + $jasaInvestasi3;
		$t_investasi_k4 = $investasiTutup4 + $jasaInvestasi4;
		$t_investasi_k5 = $investasiTutup5 + $jasaInvestasi5;

		//Prediksi Beban

		//Prediksi Masuk
		$data = array(

			//simpanan
				//setoran masuk
				'saldosimpananneraca0' => $saldoSimpanan0,
				'saldosimpananneraca1' => $saldoSimpanan1,
				'saldosimpananneraca2' => $saldoSimpanan2,
				'saldosimpananneraca3' => $saldoSimpanan3,
				'saldosimpananneraca4' => $saldoSimpanan4,
				'saldosimpananneraca5' => $saldoSimpanan5,
				//phbuku
				"phPenarikan0" => $phPenarikan0,
				"phPenarikan1" => $phPenarikan1,
				"phPenarikan2" => $phPenarikan2,
				"phPenarikan3" => $phPenarikan3,
				"phPenarikan4" => $phPenarikan4,
				"phPenarikan5" => $phPenarikan5,
				//admin
				"adminPenarikan0" => $adminPenarikan0,
				"adminPenarikan1" => $adminPenarikan1,
				"adminPenarikan2" => $adminPenarikan2,
				"adminPenarikan3" => $adminPenarikan3,
				"adminPenarikan4" => $adminPenarikan4,
				"adminPenarikan5" => $adminPenarikan5,
			//simpanan keluar
				//pokok keluar
				"pokokPenarikan0" => $pokokPenarikan0,
				"pokokPenarikan1" => $pokokPenarikan1,
				"pokokPenarikan2" => $pokokPenarikan2,
				"pokokPenarikan3" => $pokokPenarikan3,
				"pokokPenarikan4" => $pokokPenarikan4,
				"pokokPenarikan5" => $pokokPenarikan5,
				//bunga keluar
				"bungaPenarikan0" => $bungaPenarikan0,
				"bungaPenarikan1" => $bungaPenarikan1,
				"bungaPenarikan2" => $bungaPenarikan2,
				"bungaPenarikan3" => $bungaPenarikan3,
				"bungaPenarikan4" => $bungaPenarikan4,
				"bungaPenarikan5" => $bungaPenarikan5,
			
			//pinjaman
				//angsuran pokok
				'angsuranPokok0' => $angsuranPokok0,
				'angsuranPokok1' => $angsuranPokok1,
				'angsuranPokok2' => $angsuranPokok2,
				'angsuranPokok3' => $angsuranPokok3,
				'angsuranPokok4' => $angsuranPokok4,
				'angsuranPokok5' => $angsuranPokok5,
				//angsuran bunga
				'angsuranBunga0' => $angsuranBunga0,
				'angsuranBunga1' => $angsuranBunga1,
				'angsuranBunga2' => $angsuranBunga2,
				'angsuranBunga3' => $angsuranBunga3,
				'angsuranBunga4' => $angsuranBunga4,
				'angsuranBunga5' => $angsuranBunga5,
				//angsuran denda
				'angsuranDenda0' => $angsuranDenda0,
				'angsuranDenda1' => $angsuranDenda1,
				'angsuranDenda2' => $angsuranDenda2,
				'angsuranDenda3' => $angsuranDenda3,
				'angsuranDenda4' => $angsuranDenda4,
				'angsuranDenda5' => $angsuranDenda5,
			//pelunasan pinjaman
				//pelunasan pokok
				'pelunasanPokok0' => $pelunasanPokok0,
				'pelunasanPokok1' => $pelunasanPokok1,
				'pelunasanPokok2' => $pelunasanPokok2,
				'pelunasanPokok3' => $pelunasanPokok3,
				'pelunasanPokok4' => $pelunasanPokok4,
				'pelunasanPokok5' => $pelunasanPokok5,
				//pelunasan bunga
				'pelunasanBunga0' => $pelunasanBunga0,
				'pelunasanBunga1' => $pelunasanBunga1,
				'pelunasanBunga2' => $pelunasanBunga2,
				'pelunasanBunga3' => $pelunasanBunga3,
				'pelunasanBunga4' => $pelunasanBunga4,
				'pelunasanBunga5' => $pelunasanBunga5,
				//pelunasan denda
				'pelunasanDenda0' => $pelunasanDenda0,
				'pelunasanDenda1' => $pelunasanDenda1,
				'pelunasanDenda2' => $pelunasanDenda2,
				'pelunasanDenda3' => $pelunasanDenda3,
				'pelunasanDenda4' => $pelunasanDenda4,
				'pelunasanDenda5' => $pelunasanDenda5,

				//total pokok masuk
				"t_pokok_0" => $t_pokok_0,
				"t_pokok_1" => $t_pokok_1,
				"t_pokok_2" => $t_pokok_2,
				"t_pokok_3" => $t_pokok_3,
				"t_pokok_4" => $t_pokok_4,
				"t_pokok_5" => $t_pokok_5,
				
			//pencairan pinjaman
				'pencairanPokok0' => $pencairanPokok0,
				'pencairanPokok1' => $pencairanPokok1,
				'pencairanPokok2' => $pencairanPokok2,
				'pencairanPokok3' => $pencairanPokok3,
				'pencairanPokok4' => $pencairanPokok4,
				'pencairanPokok5' => $pencairanPokok5,

			//investasi
				//masuk
				'investasi0' => $investasi0,
				'investasi1' => $investasi1,
				'investasi2' => $investasi2,
				'investasi3' => $investasi3,
				'investasi4' => $investasi4,
				'investasi5' => $investasi5,
				//keluar
				//jasa
				'jasaInvestasi0' => $jasaInvestasi0,
				'jasaInvestasi1' => $jasaInvestasi1,
				'jasaInvestasi2' => $jasaInvestasi2,
				'jasaInvestasi3' => $jasaInvestasi3,
				'jasaInvestasi4' => $jasaInvestasi4,
				'jasaInvestasi5' => $jasaInvestasi5,
				//tutup
				'investasiTutup0' => $investasiTutup0,
				'investasiTutup1' => $investasiTutup1,
				'investasiTutup2' => $investasiTutup2,
				'investasiTutup3' => $investasiTutup3,
				'investasiTutup4' => $investasiTutup4,
				'investasiTutup5' => $investasiTutup5,

			//total kas
				//masuk
				'masuk0' => $masuk0,
				'masuk1' => $masuk1,
				'masuk2' => $masuk2,
				'masuk3' => $masuk3,
				'masuk4' => $masuk4,
				'masuk5' => $masuk5,
				//keluar
				'keluar0' => $keluar0,
				'keluar1' => $keluar1,
				'keluar2' => $keluar2,
				'keluar3' => $keluar3,
				'keluar4' => $keluar4,
				'keluar5' => $keluar5,
			
			//total simpanan masuk
			't_simpanan_m0' => $t_simpanan_m0,
			't_simpanan_m1' => $t_simpanan_m1,
			't_simpanan_m2' => $t_simpanan_m2,
			't_simpanan_m3' => $t_simpanan_m3,
			't_simpanan_m4' => $t_simpanan_m4,
			't_simpanan_m5' => $t_simpanan_m5,
			//total simpanan keluar
			't_simpanan_k0' => $t_simpanan_k0,
			't_simpanan_k1' => $t_simpanan_k1,
			't_simpanan_k2' => $t_simpanan_k2,
			't_simpanan_k3' => $t_simpanan_k3,
			't_simpanan_k4' => $t_simpanan_k4,
			't_simpanan_k5' => $t_simpanan_k5,
			//total pinjaman masuk
			't_pinjaman_m0' => $t_pinjaman_m0,
			't_pinjaman_m1' => $t_pinjaman_m1,
			't_pinjaman_m2' => $t_pinjaman_m2,
			't_pinjaman_m3' => $t_pinjaman_m3,
			't_pinjaman_m4' => $t_pinjaman_m4,
			't_pinjaman_m5' => $t_pinjaman_m5,
			//total investasi keluar
			't_investasi_k0' => $t_investasi_k0,
			't_investasi_k1' => $t_investasi_k1,
			't_investasi_k2' => $t_investasi_k2,
			't_investasi_k3' => $t_investasi_k3,
			't_investasi_k4' => $t_investasi_k4,
			't_investasi_k5' => $t_investasi_k5,

			//data setoran

			//data klaim

			//data penarikan

			//data titipan simkesan	
			'content'=>'backend/cart',

		);
		//$this->hitungBungaSetoran();
		$this->load->view('layout_backend.php',$data);
	}

}
