<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunai extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Simpanan_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Simpananwajib_model');
        $this->load->model('Setoransimpananwajib_model');
        $this->load->model('Penarikansimpananwajib_model');
        $this->load->model('Simpananpokok_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Lainlain_model');
        $this->load->model('Kasbon_model');
    }
    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->listdata();
                break;
            case  2:
                $this->simpanan($active);
                break;
            case  3:
                $this->simpanan($active);
                break;
            case  4:
                $this->rekap($active);
                break;
            case  5:
                $this->rekap($active);
                break;
            default:
                $this->listdata();
                break;
        }
    } 

    public function simpanan($active){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

        $wilayah = $this->Wilayah_model->get_all();		

		$saldoSimpanan = 0;
		$phBuku = 0;
		$saldoSimpananDitarik = 0;
		$administrasi = 0;
		$bungaDitarik = 0;
		$lsk = 0;
		$lsm = 0;

		$datetoday = date("Y-m-d", strtotime($this->tgl));

    	if ($f<>'') {	
        	$f = date("Y-m-d", strtotime($f));
    	}

		if ($f == null) { $f=$datetoday;}

			//Lain Lain simpanan
				//masuk
			$lainsm = $this->Lainlain_model->get_rekap(0,0,$f,$w);
			$lsm = $lainsm[0]->lln_jumlah;
				//keluar
			$lainsk = $this->Lainlain_model->get_rekap(0,1,$f,$w);
            $lsk = $lainsk[0]->lln_jumlah;
            
            //Kasbon simpanan
            $kasbonsimpanan = $this->Kasbon_model->get_tunai(0,$w,$f);
            $ksbs = $kasbonsimpanan[0]->ksb_masuk;
		
			//hitung saldo simpanan aktif kini
			$setoran = $this->Setoransimpanan_model->get_sirkulasi_simpanan($f,NULL,NULL,$w,2);
			$saldoSimpanan += $setoran[0]->ssi_jmlsetor;
			
			//hitung penarikan
			$simpananNon = $this->Penarikansimpanan_model->get_sirkulasi_penarikansimpanan(NULL,NULL,$f,NULL,$w,1);
			$saldoSimpananDitarik = $simpananNon[0]->pes_saldopokok;
			$phBuku = $simpananNon[0]->pes_phbuku;
			$administrasi = $simpananNon[0]->pes_administrasi;
			$bungaDitarik = $simpananNon[0]->pes_bunga;

			//Total
			$totalmasuk = $administrasi+$phBuku+$saldoSimpanan+$lsm+$ksbs;
			$totalkeluar = $bungaDitarik+$saldoSimpananDitarik+$lsk;
			$totalrekapsimpanan = $totalmasuk - $totalkeluar;

		$data = array(
			'lsk' => $lsk,
            'lsm' => $lsm,
            'ksbs' => $ksbs,
			'totalmasuk' => $totalmasuk,
			'totalkeluar' => $totalkeluar,
			'totalrekapsimpanan' => $totalrekapsimpanan,
			'bungaditarik' => $bungaDitarik,
            'wilayah_data' => $wilayah,
			'saldosimpanan' => $saldoSimpanan,
			'saldosimpananditarik' => $saldoSimpananDitarik,
			'phbuku' => $phBuku,
			'administrasi' => $administrasi,
			'active' => $active,
			'f' => $f,
			't' => $t,
			'w' => $w,
		    'content' => 'backend/simpanan/rekap/rekap',
		);
	if($active == 2) {
        $this->load->view(layout(), $data);
	} else if ($active == 3){
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/simpanan/printsimpanan/rekap.php',$data,true);
        //echo $html;
        $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
        $mpdf->Output('rekapsimpanan.pdf','D'); // it downloads the file into the user system, with give name
	}

    }

    public function dataAll(){
    	return $data;
    }

    public function dataRentang($f, $t){

    }
}