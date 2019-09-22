<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintAnggota extends MY_Base{
	
	function __construct(){
		parent:: __construct();
		$this->load->model('Anggota_model');
	$this->load->library('form_validation');
	}
	public function index(){
		$data['anggota'] = $this->Anggota_model->get_all();
		$this->load->view('printAnggota_v', $data);
    }
	
	public function printAnggota(){
		$anggota = $this->Anggota_model->get_by_id(K020819001);
		
		
		$dt = array(
			'nama'=>$anggota->ang_nama,
			'alamat'=>$anggota->ang_alamat,
			'ktp'=>$anggota->ang_noktp,
			'kk'=>$anggota->ang_nokk
		);
		
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('hasilPrint', $dt, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}
}