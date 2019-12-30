<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    
    public function index($error = NULL) { 
        redirect(base_url(),'refresh');
    }

    public function login() {
        //CAPTCHA================================//
        $cpt = $this->input->post("cpt",TRUE);
        $rescpt = $this->input->post("rescpt",TRUE);
        if ($cpt!=$rescpt){
            $this->session->set_flashdata('msgcaptcha', '<i class="fa fa-warning"></i> Captcha belum tepat, silakan ulangi lagi');
            redirect(site_url(''));
        }

        //ENDOFCAPTCHA=========================//

        $vtbl = 'users';
        $login = $this->Auth_model->login_multitable($this->input->post('username'), md5($this->input->post('password')),$vtbl);
            if ($login == 1) {
//          ambil detail data
            $row = $this->Auth_model->data_login_multitable($this->input->post('username'), md5($this->input->post('password')),$vtbl);
            
//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'id_user' => $row->id_user,
                'username' => $row->username,
                'fullname' => $row->fullname,
                'telp' => $row->telp,
                'email' => $row->email,
                'foto' => $row->foto,
                'level' => $row->id_group
            );
            $this->session->set_userdata($data);

//            redirect ke halaman sukses
            if ($row->id_user == 5){
                redirect(site_url('Hitungbungasetoran'));
            } else if ($row->id_user == 6) {
                redirect(site_url('Investasiberjangka'));
            } else if ($row->id_user == 7) {
                redirect(site_url('pinjaman'));            
            } else if ($row->id_user == 8) {
                redirect(site_url('Simkesan'));
            } else if ($row->id_user == 9) {
                redirect(site_url('neraca/neraca'));
            } else {
                redirect(site_url('backend'));
            } 
            

        }
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('auth'));
    }

}
