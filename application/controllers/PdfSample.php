<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfSample extends MY_Base {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Bungasetoransimpanan_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Setoransimpanan_model');
        $this->load->model('Penarikansimpanan_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }
    
	public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/pinjaman/dataprint/suratsomasii.html',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }
}