<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelunasan extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelunasan_model');
        $this->load->model('Pinjaman_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Angsuranbayar_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Settingdenda_model');
        $this->load->model('Jenispelunasan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->dipercepat();
                break;
            case  2:
                $this->biasa();
                break;
            case  3:
                $this->macet();
                break;
            case  4:
                $this->listdata();
                break;

            default:
                $this->dipercepat();
                break;
        }
    } 

    public function dipercepat(){
        $q = urldecode($this->input->get('q', TRUE));
        $pinjaman = null;
        
        $datenow = date('n'); //var_dump($datenow);
        $datatglsekarang = $this->Angsuran_model->get_by_tgl($q,$datenow);
        $angsuranbelum = $this->Angsuran_model->get_angsuran_belum($q);
        $angsuransudah = $this->Angsuran_model->get_angsuran_bayarpin($q);
        $pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktifcari($q);
        $historiAngsuran = array();
        foreach ($pinjamanAktif as $key => $value) {
        $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($value->pin_id);
        };

        $jenispelunasan = $this->Jenispelunasan_model->get_by_id(2);
        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        if ($q<>''){
            $row = $this->Pinjaman_model->get_by_pelunasan($q);
            $hitungtotalangsuran = $this->Angsuran_model->get_angsuran_totalagb($q);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
                $pinjaman = array(
                    'pin_id' => $row->pin_id,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'sea_id' => $sea_id->sea_tenor,
                    'bup_id' => $bup_id->bup_bunga,
                    'pop_id' => $pop_id->pop_potongan,
                    'wil_kode' => $wil_kode->wil_nama,
                    'skp_id' => $skp_id->skp_kategori,
                    'pin_pengajuan' => $row->pin_pengajuan,
                    'pin_pinjaman' => $row->pin_pinjaman,
                    'pin_tglpengajuan' => $row->pin_tglpengajuan,
                    'pin_tglpencairan' => $row->pin_tglpencairan,
                    'pin_marketing' => $marketing->kar_nama,
                    'pin_surveyor' => $surveyor->kar_nama,
                    'pin_survey' => $row->pin_survey,
                    'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
                );
            } 
        }
        $data = array(
            'hitungtotalangsuran' => $hitungtotalangsuran,
            'pinjamanaktif' => $pinjamanAktif,
            'angsuranbelum' => $angsuranbelum,
            'angsuransudah' => $angsuransudah,
            'datatglsekarang' => $datatglsekarang,
            'jenispelunasan' => $jenispelunasan,
            'settingdenda_data' => $settingdenda,
            'histori' => $historiAngsuran,
            'q' => $q,
            'pinjaman' => $pinjaman,
            'content' => 'backend/pelunasan/index',
            'item'=> 'dipercepat.php',
            'active' => 1
        );

        $this->load->view(layout(), $data);
    }

    public function pelunasan_action(){
        $dataPeluanasan = array(
        'pin_id' => $this->input->post('pin_id',TRUE),
		'pel_jenis' => $this->input->post('pel_jenis',TRUE),
		'pel_tenor' => $this->input->post('pel_tenor',TRUE),
		'pel_angsuran' => $this->input->post('pel_angsuran',TRUE),
		'pel_bungaangsuran' => $this->input->post('pel_bungaangsuran',TRUE),
		'pel_pokoksudahbayar' => $this->input->post('pel_pokoksudahbayar',TRUE),
		'pel_totalkekuranganpokok' => $this->input->post('pel_totalkekuranganpokok',TRUE),
		'pel_totalbungapokok' => $this->input->post('pel_totalbungapokok',TRUE),
		'pel_bungatambahan' => $this->input->post('pel_bungatambahan',TRUE),
		'pel_biayapenarikan' => $this->input->post('pel_biayapenarikan',TRUE),
		'pel_totaldenda' => $this->input->post('pel_totaldenda',TRUE),
		'pel_tglpelunasan' => $this->tgl,
		'pel_tgl' => $this->tgl,
		'pel_flag' => 0,
		'pel_info' => "",
            );
            $this->Pelunasan_model->insert($dataPeluanasan);
        $dataPinjaman = array(
            'pin_statuspinjaman' => 3,
            'pin_tglpelunasan' => $this->tgl,
        );
        $this->Pinjaman_model->update($this->input->post('pin_id', TRUE), $dataPinjaman);
            redirect(site_url('pelunasan/?p=4'));
    }

    public function biasa(){
        $q = urldecode($this->input->get('q', TRUE));
        $pinjaman = null;
        $datenow = date('n'); 
        $datatglsekarang = $this->Angsuran_model->get_by_tgl($q,$datenow);
        $pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktifcari($q);
        $historiAngsuran = array();
        $hitungtotalangsuran = array();
        foreach ($pinjamanAktif as $key => $value) {
        $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($value->pin_id);
        };
        $jenispelunasan = $this->Jenispelunasan_model->get_by_id(1);
        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        if ($q<>''){
            $row = $this->Pinjaman_model->get_by_pelunasan($q);
            $hitungtotalangsuran = $this->Angsuran_model->get_angsuran_totalagb($q);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
                $pinjaman = array(
                    'pin_id' => $row->pin_id,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'sea_id' => $sea_id->sea_tenor,
                    'bup_id' => $bup_id->bup_bunga,
                    'pop_id' => $pop_id->pop_potongan,
                    'wil_kode' => $wil_kode->wil_nama,
                    'skp_id' => $skp_id->skp_kategori,
                    'pin_pengajuan' => $row->pin_pengajuan,
                    'pin_pinjaman' => $row->pin_pinjaman,
                    'pin_tglpengajuan' => $row->pin_tglpengajuan,
                    'pin_tglpencairan' => $row->pin_tglpencairan,
                    'pin_marketing' => $marketing->kar_nama,
                    'pin_surveyor' => $surveyor->kar_nama,
                    'pin_survey' => $row->pin_survey,
                    'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
                );
            } 
        }
        $data = array(
            'hitungtotalangsuran' => $hitungtotalangsuran,
            'pinjamanaktif' => $pinjamanAktif,
            'datatglsekarang' => $datatglsekarang,
            'jenispelunasan' => $jenispelunasan,
            'settingdenda_data' => $settingdenda,
            'histori' => $historiAngsuran,
            'q' => $q,
            'pinjaman' => $pinjaman,
            'content' => 'backend/pelunasan/index',
            'item'=> 'biasa.php',
            'active' => 2
        );

        $this->load->view(layout(), $data);
    }

    public function macet(){
        $q = urldecode($this->input->get('q', TRUE));
        $pinjaman = null;
        $datenow = date('n'); //var_dump($datenow);
        $datatglsekarang = $this->Angsuran_model->get_by_tgl($q,$datenow);
        $jenispelunasan = $this->Jenispelunasan_model->get_by_id(3);
        $pinjamanAktif = $this->Pinjaman_model->get_pinjaman_aktifcari($q);
        $historiAngsuran = array();
        foreach ($pinjamanAktif as $key => $value) {
        $historiAngsuran = $this->Angsuran_model->get_histori_angsuran($value->pin_id);
        };
        $settingdenda = $this->Settingdenda_model->get_by_id(1);
        if ($q<>''){
            $row = $this->Pinjaman_model->get_by_pelunasan($q);
            $hitungtotalangsuran = $this->Angsuran_model->get_angsuran_totalagb($q);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
                $pinjaman = array(
                    'pin_id' => $row->pin_id,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'sea_id' => $sea_id->sea_tenor,
                    'bup_id' => $bup_id->bup_bunga,
                    'pop_id' => $pop_id->pop_potongan,
                    'wil_kode' => $wil_kode->wil_nama,
                    'skp_id' => $skp_id->skp_kategori,
                    'pin_pengajuan' => $row->pin_pengajuan,
                    'pin_pinjaman' => $row->pin_pinjaman,
                    'pin_tglpengajuan' => $row->pin_tglpengajuan,
                    'pin_tglpencairan' => $row->pin_tglpencairan,
                    'pin_marketing' => $marketing->kar_nama,
                    'pin_surveyor' => $surveyor->kar_nama,
                    'pin_survey' => $row->pin_survey,
                    'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman],
                );
            } 
        }
        $data = array(
            'hitungtotalangsuran' => $hitungtotalangsuran,
            'pinjamanaktif' => $pinjamanAktif,
            'datatglsekarang' => $datatglsekarang,
            'jenispelunasan' => $jenispelunasan,
            'settingdenda_data' => $settingdenda,
            'histori' => $historiAngsuran,
            'q' => $q,
            'pinjaman' => $pinjaman,
            'content' => 'backend/pelunasan/index',
            'item'=> 'macet.php',
            'active' => 3
        );

        $this->load->view(layout(), $data);
    }

    public function listData()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        

        $pelunasan = $this->Pelunasan_model->get_limit_data($start, $q);


        $data = array(
            'pelunasan_data' => $pelunasan,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/pelunasan/index',
            'item'=> 'pelunasan_list.php',
            'active' => 4
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelunasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelunasan/index.html';
            $config['first_url'] = base_url() . 'pelunasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelunasan_model->total_rows($q);
        $pelunasan = $this->Pelunasan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'pelunasan_data' => $pelunasan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/pelunasan/pelunasan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pel_id' => $row->pel_id,
		'pin_id' => $row->pin_id,
		'pel_jenis' => $row->pel_jenis,
		'pel_tenor' => $row->pel_tenor,
		'pel_angsuran' => $row->pel_angsuran,
		'pel_bungaangsuran' => $row->pel_bungaangsuran,
		'pel_totalkekuranganpokok' => $row->pel_totalkekuranganpokok,
		'pel_totalbungapokok' => $row->pel_totalbungapokok,
		'pel_bungatambahan' => $row->pel_bungatambahan,
		'pel_totaldenda' => $row->pel_totaldenda,
		'pel_tglpelunasan' => $row->pel_tglpelunasan,
		'pel_tgl' => $row->pel_tgl,
		'pel_flag' => $row->pel_flag,
		'pel_info' => $row->pel_info,'content' => 'backend/pelunasan/pelunasan_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelunasan/create_action'),
	    'pel_id' => set_value('pel_id'),
	    'pin_id' => set_value('pin_id'),
	    'pel_jenis' => set_value('pel_jenis'),
	    'pel_tenor' => set_value('pel_tenor'),
	    'pel_angsuran' => set_value('pel_angsuran'),
	    'pel_bungaangsuran' => set_value('pel_bungaangsuran'),
	    'pel_totalkekuranganpokok' => set_value('pel_totalkekuranganpokok'),
	    'pel_totalbungapokok' => set_value('pel_totalbungapokok'),
	    'pel_bungatambahan' => set_value('pel_bungatambahan'),
	    'pel_totaldenda' => set_value('pel_totaldenda'),
	    'pel_tglpelunasan' => set_value('pel_tglpelunasan'),
	    'pel_tgl' => set_value('pel_tgl'),
	    'pel_flag' => set_value('pel_flag'),
	    'pel_info' => set_value('pel_info'),
	    'content' => 'backend/pelunasan/pelunasan_form',
	);
        $this->load->view(layout(), $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pin_id' => $this->input->post('pin_id',TRUE),
		'pel_jenis' => $this->input->post('pel_jenis',TRUE),
		'pel_tenor' => $this->input->post('pel_tenor',TRUE),
		'pel_angsuran' => $this->input->post('pel_angsuran',TRUE),
		'pel_bungaangsuran' => $this->input->post('pel_bungaangsuran',TRUE),
		'pel_totalkekuranganpokok' => $this->input->post('pel_totalkekuranganpokok',TRUE),
		'pel_totalbungapokok' => $this->input->post('pel_totalbungapokok',TRUE),
		'pel_bungatambahan' => $this->input->post('pel_bungatambahan',TRUE),
		'pel_totaldenda' => $this->input->post('pel_totaldenda',TRUE),
		'pel_tglpelunasan' => $this->input->post('pel_tglpelunasan',TRUE),
		'pel_tgl' => $this->input->post('pel_tgl',TRUE),
		'pel_flag' => $this->input->post('pel_flag',TRUE),
		'pel_info' => $this->input->post('pel_info',TRUE),
	    );

            $this->Pelunasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelunasan/update_action'),
		'pel_id' => set_value('pel_id', $row->pel_id),
		'pin_id' => set_value('pin_id', $row->pin_id),
		'pel_jenis' => set_value('pel_jenis', $row->pel_jenis),
		'pel_tenor' => set_value('pel_tenor', $row->pel_tenor),
		'pel_angsuran' => set_value('pel_angsuran', $row->pel_angsuran),
		'pel_bungaangsuran' => set_value('pel_bungaangsuran', $row->pel_bungaangsuran),
		'pel_totalkekuranganpokok' => set_value('pel_totalkekuranganpokok', $row->pel_totalkekuranganpokok),
		'pel_totalbungapokok' => set_value('pel_totalbungapokok', $row->pel_totalbungapokok),
		'pel_bungatambahan' => set_value('pel_bungatambahan', $row->pel_bungatambahan),
		'pel_totaldenda' => set_value('pel_totaldenda', $row->pel_totaldenda),
		'pel_tglpelunasan' => set_value('pel_tglpelunasan', $row->pel_tglpelunasan),
		'pel_tgl' => set_value('pel_tgl', $row->pel_tgl),
		'pel_flag' => set_value('pel_flag', $row->pel_flag),
		'pel_info' => set_value('pel_info', $row->pel_info),
	    'content' => 'backend/pelunasan/pelunasan_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pel_id', TRUE));
        } else {
            $data = array(
		'pin_id' => $this->input->post('pin_id',TRUE),
		'pel_jenis' => $this->input->post('pel_jenis',TRUE),
		'pel_tenor' => $this->input->post('pel_tenor',TRUE),
		'pel_angsuran' => $this->input->post('pel_angsuran',TRUE),
		'pel_bungaangsuran' => $this->input->post('pel_bungaangsuran',TRUE),
		'pel_totalkekuranganpokok' => $this->input->post('pel_totalkekuranganpokok',TRUE),
		'pel_totalbungapokok' => $this->input->post('pel_totalbungapokok',TRUE),
		'pel_bungatambahan' => $this->input->post('pel_bungatambahan',TRUE),
		'pel_totaldenda' => $this->input->post('pel_totaldenda',TRUE),
		'pel_tglpelunasan' => $this->input->post('pel_tglpelunasan',TRUE),
		'pel_tgl' => $this->input->post('pel_tgl',TRUE),
		'pel_flag' => $this->input->post('pel_flag',TRUE),
		'pel_info' => $this->input->post('pel_info',TRUE),
	    );

            $this->Pelunasan_model->update($this->input->post('pel_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelunasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelunasan_model->get_by_id($id);

        if ($row) {
            $this->Pelunasan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelunasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelunasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pin_id', 'pin id', 'trim|required');
	$this->form_validation->set_rules('pel_jenis', 'pel jenis', 'trim|required');
	$this->form_validation->set_rules('pel_tenor', 'pel tenor', 'trim|required');
	$this->form_validation->set_rules('pel_angsuran', 'pel angsuran', 'trim|required');
	$this->form_validation->set_rules('pel_bungaangsuran', 'pel bungaangsuran', 'trim|required');
	$this->form_validation->set_rules('pel_totalkekuranganpokok', 'pel totalkekuranganpokok', 'trim|required');
	$this->form_validation->set_rules('pel_totalbungapokok', 'pel totalbungapokok', 'trim|required');
	$this->form_validation->set_rules('pel_bungatambahan', 'pel bungatambahan', 'trim|required');
	$this->form_validation->set_rules('pel_totaldenda', 'pel totaldenda', 'trim|required');
	$this->form_validation->set_rules('pel_tglpelunasan', 'pel tglpelunasan', 'trim|required');
	$this->form_validation->set_rules('pel_tgl', 'pel tgl', 'trim|required');
	$this->form_validation->set_rules('pel_flag', 'pel flag', 'trim|required');
	$this->form_validation->set_rules('pel_info', 'pel info', 'trim|required');

	$this->form_validation->set_rules('pel_id', 'pel_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pelunasan.php */
/* Location: ./application/controllers/Pelunasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-24 00:52:56 */
/* http://harviacode.com */