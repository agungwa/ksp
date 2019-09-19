<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persentase extends MY_Base
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Angsuran_model');
        $this->load->model('Wilayah_model');
    }

    public function index(){
		
        $w = urldecode($this->input->get('w', TRUE)); //wilayah
    	$f = urldecode($this->input->get('f', TRUE)); //dari tgl
        $t = urldecode($this->input->get('t', TRUE)); //smpai tgl

    	$angsuranpokok = $this->Angsuran_model->get_target();
    	$jumlahbayar = $this->Angsuran_model->get_tertagih();

		$saldoPokok = 0;
		$jmlbayar = 0;
		$d = 2;
		if ($f<>'' && $t<>'') {	
        	$f = date("Y-m-d", strtotime($f));
        	$t = date("Y-m-d", strtotime($t));
    	}

    	//Pokok Angsuran
    	foreach ($angsuranpokok as $key => $value) {
			if ($f<>'' && $t<>'') {	
			$tgl = date("Y-m-d", strtotime($value->ags_tgljatuhtempo.' + '.$d.' days'));
			
			//var_dump($value->ags_id);
    			if ($tgl >= $f && $tgl <= $t) {
    				$saldoPokok += $value->ags_jmlpokok ;
    			}
			} else {
				$saldoPokok += $value->ags_jmlpokok;
		}
		
	}

	
    	//Pokok Angsuran
    	foreach ($jumlahbayar as $key => $value) {
			if ($f<>'' && $t<>'') {	
			$jt = date("Y-m-d", strtotime($value->ags_tgljatuhtempo.' + '.$d.' days'));
			//var_dump($value->ags_id);
    			if ($jt >= $f && $jt <= $t) {
    				$jmlBayar += $value->ags_jmlbayar;
    			}
			} else {
				$jmlBayar += $value->ags_jmlbayar;
		}
	}
		$data = array(
			'saldopokok' => $saldoPokok,
			'jmlbayar' => $jmlbayar,
			'w' => $w,
			't' => $t,
			'f' => $f,
		    'content' => 'backend/persentase/index',
		);
        $this->load->view(layout(), $data);
    }

    public function dataAll(){
    	return $data;
	}
	public function dataRentang($f, $t){

    }
}