<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kasir extends MY_Base
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
         $active = urldecode($this->input->get('active', TRUE));
         $data = array(
         'active' => $active,
         'content' => 'backend/kasir/kasir.php',
         );
         $this->load->view(layout(), $data);
    } 


}
