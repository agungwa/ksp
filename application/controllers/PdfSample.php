<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfSample extends MY_Base {

	public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('backend/pdf/pdf_sample',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }
}