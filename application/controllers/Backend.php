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
        is_logged();
    }   
	
	public function index()
	{ 	
		
		$data = array(
			'content'=>'backend/dashboard',

		);
		$this->hitungBungaSetoran();
		$this->load->view('layout_backend.php',$data);
	}

	public function hitungBungaSetoran(){
		$lastmonth = mktime(0, 0, 0, date("m")-1, 27, date("Y"));
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
				$jumSetor = $this->Setoransimpanan_model->get_data_setorTgl($value->sim_kode, $lastTgl,$nowTgl); //$lastTgl,$nowTgl
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
				$dataBungaSetoran = array(
						'sim_kode' => $value->sim_kode,
						'bss_saldosimpanan' => $saldoSetoranLalu,
						'bss_jumlahsetoranbulanan' => $jumSetorBaru,
						'bss_bungabulanini' => $bungaBaru,
						'bss_saldobulanini' => $saldoBaru,
						'bss_tglbunga' => "2019-07-03",
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
	}
}
