<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjaman extends MY_Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->model('Jaminan_model');
        $this->load->model('Penjamin_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Angsuran_model');
        $this->load->model('Pengkodean');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active) {
            case  1:
                $this->pengajuan();
                break;
            case  2:
                $this->survey();
                break;
            case  3:
                $this->persetujuan();
                break;
            case  4:
                $this->listdata();
                break;

            default:
                $this->pengajuan();
                break;
        }
    } 

    public function pengajuan(){
        $nowYear = date('d');
        $data = array(
            'kode' => $this->Pengkodean->pinjaman($nowYear),
            'content' => 'backend/pinjaman/pinjaman',
            'item'=> 'pengajuan/pengajuan.php',
            'active' => 1
        );

        $this->load->view(layout(), $data);
    }

    //survey pinjaman
    public function survey(){        
        $q = urldecode($this->input->get('q', TRUE));
        $survey = null;

        if ($q<>''){
            $row = $this->Pinjaman_model->get_by_id($q);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
                   
                $survey = array(
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
                    'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman]
                );
            } 
        }   

        $data = array(
            'content' => 'backend/pinjaman/pinjaman',
            'item'=> 'survey/survey.php',
            'q' => $q,
            'active' => 2,
            'survey' => $survey
        );

        $this->load->view(layout(), $data);
    }

    //survey setujui pinjaman action
    public function action_surveysetuju(){
                       
		//upload photo
		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $new_name = time().$_FILES["userfiles"]['name'];
        $config['file_name'] = $new_name;
        $config['upload_path']='./upload/survey';

		$this->load->library('upload',$config);

		//ambil data image
        $this->upload->do_upload('pin_survey');
        $file=$this->upload->data('file_name');
        //$data_image = array('upload_data' => $this->upload->data());
		$location=base_url().'upload/survey';
        //$pict=$location.$data_image;
        var_dump($file);
        $dataPinjaman = array(
            'pin_survey' => $file,
            'pin_statuspinjaman' => 1,
            );
            
        //var_dump($this->upload->do_upload('pin_survey'));
        $this->Pinjaman_model->update($this->input->post('pin_id', TRUE), $dataPinjaman);
        redirect(site_url('pinjaman/?p=2'));
    }

    //survey ditolak pinjaman action
    public function action_surveytolak(){
        $config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $new_name = time().$_FILES["userfiles"]['name'];
        $config['file_name'] = $new_name;
        $config['upload_path']='./upload/survey';
        $this->load->library('upload',$config);

		//ambil data image
        $this->upload->do_upload('pin_survey');
        $file=$this->upload->data('file_name');
        //$data_image = array('upload_data' => $this->upload->data());
		$location=base_url().'upload/survey';
        //$pict=$location.$data_image;
        //update data pinjaman
        $dataPinjaman = array(
            'pin_statuspinjaman' => 2,
            'pin_survey' => $file,
            );
        $this->Pinjaman_model->update($this->input->post('pin_id', TRUE), $dataPinjaman);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('pinjaman/?p=2'));
    }

    public function persetujuan(){
        $q = urldecode($this->input->get('q', TRUE));
        $persetujuan = null;

        if ($q<>''){
            $row = $this->Pinjaman_model->get_by_id($q);
            
       // var_dump($row);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
                $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
                $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
                $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
                $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
                $persetujuan = array(
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
                    'pin_statuspinjaman' => $this->statusPinjaman[$row->pin_statuspinjaman]
                );
            } 
        }   

        $data = array(
            'content' => 'backend/pinjaman/pinjaman',
            'item'=> 'persetujuan/persetujuan.php',
            'q' => $q,
            'active' => 3,
            'persetujuan' => $persetujuan
        );

        $this->load->view(layout(), $data);
    }

    
    //survey setujui pinjaman action
    public function action_persetujuan($id){
        
        //update data pinjaman
        $dataPinjaman = array(
            'pin_pinjaman' => $this->input->post('pin_pinjaman',TRUE),
            'pin_tglpencairan' => $this->tgl,
            'sea_id' => $this->input->post('sea_id',TRUE),
            );
        $this->Pinjaman_model->update($this->input->post('pin_id', TRUE), $dataPinjaman);
        $row = $this->Pinjaman_model->get_by_id($id);
       // var_dump($row);
             if ($row) {
                $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
                $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
                $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
                $persetujuan = array(
                    'pin_id' => $row->pin_id,
                    'ang_no' => $row->ang_no,
                    'nama_ang_no' => $ang_no->ang_nama,
                    'sea_id' => $sea_id->sea_tenor,
                    'pin_pinjaman' => $row->pin_pinjaman,
                    'bup_id' => $bup_id->bup_bunga,
                    'pin_tglpencairan' => $row->pin_tglpencairan,
                );
                $no=1;
                $jatuhtempo=$row->pin_tglpencairan;
                $jmlpokok=$row->pin_pinjaman/$sea_id->sea_tenor;
                $bunga=$row->pin_pinjaman*$bup_id->bup_bunga/100;
        for($num=1; $num<=$sea_id->sea_tenor; $num++){
            $tanggalDuedate = date("Y-m-d", strtotime($jatuhtempo.' + '.$no.' Months'));
            $dataAngsuran = array(
                'ang_angsuranke' => $no,
                'ags_tgljatuhtempo' => $tanggalDuedate,
                'pin_id' => $row->pin_id,
                'ags_jmlpokok' => $jmlpokok,
                'ags_jmlbunga' => $bunga,
                );
            $this->Angsuran_model->insert($dataAngsuran);
            $no++;
             }
            } 
        redirect(site_url('pinjaman/?p=4'));
    }


    public function pengajuan_action() 
    {
        //Butuh validasi input
            $dataPengajuan = array(
            'pin_id' => $this->input->post('pin_id',TRUE),
            'ang_no' => $this->input->post('ang_no',TRUE),
            'sea_id' => $this->input->post('sea_id',TRUE),
            'bup_id' => $this->input->post('bup_id',TRUE),
            'pop_id' => $this->input->post('pop_id',TRUE),
            'wil_kode' => $this->input->post('wil_kode',TRUE),
            'skp_id' => $this->input->post('skp_id',TRUE),
            'pin_pengajuan' => $this->input->post('pin_pengajuan',TRUE),
            'pin_pinjaman' => $this->input->post('pin_pinjaman',TRUE),
            'pin_tglpengajuan' => $this->input->post('pin_tglpengajuan',TRUE),
            'pin_marketing' => $this->input->post('mkar_kode',TRUE),
            'pin_surveyor' => $this->input->post('skar_kode',TRUE),
            'pin_statuspinjaman' => 0,
            'pin_tgl' => $this->tgl,
            'pin_flag' => 0,
            'pin_info' => "",
            );

            $this->Pinjaman_model->savePengajuan($dataPengajuan);
            //save jaminan
            $dataJaminan = array(
                'pin_id' => $this->input->post('pin_id',TRUE),
                'jej_id' => $this->input->post('jej_id',TRUE),
                'jam_nomor' => $this->input->post('jam_nomor',TRUE),
                'jam_keterangan' => $this->input->post('jam_keterangan',TRUE),
                'jam_file' => "",
                'jam_tgl' => $this->tgl,
                'jam_flag' => 0,
                'jam_info' => "",
            );
            $this->Jaminan_model->insert($dataJaminan);

            //save penjamin
            $dataPenjamin = array(
                'pin_id' => $this->input->post('pin_id',TRUE),
                'pen_noktp' => $this->input->post('pen_noktp',TRUE),
                'pen_nama' => $this->input->post('pen_nama',TRUE),
                'pen_alamat' => $this->input->post('pen_alamat',TRUE),
                'pen_nohp' => $this->input->post('pen_nohp',TRUE),
                'pen_tgl' => $this->tgl,
                'pen_flag' => 0,
                'pen_info' => "",
                );
            $this->Penjamin_model->insert($dataPenjamin);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pinjaman/?p=1'));
        
    }

    public function listdata()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $w = urldecode($this->input->get('w', TRUE));
        $s = urldecode($this->input->get('s', TRUE));
        $k = urldecode($this->input->get('k', TRUE));
        $u = urldecode($this->input->get('u', TRUE));
        $start = intval($this->input->get('start'));
        

        $pinjaman = $this->Pinjaman_model->get_limit_data( $start, $q);

        $wilayah = $this->Wilayah_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $datapinjaman=array();
        foreach ($pinjaman as $key=>$item) {
            if (
                ( $w=='all' && $s=='all' && $k=='all' && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k=='all' && $u=='all') || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k=='all' && $u=='all') || 
                ( $w=='all' && $s=='all' && $k==$item->pin_marketing && $u=='all') || 
                ( $w=='all' && $s=='all' && $k=='all' && $u==$item->pin_id) ||  
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k=='all' && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k==$item->pin_marketing && $u=='all') || 
                ( $w==$item->wil_kode && $s=='all' && $k=='all' && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u=='all') || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k=='all' && $u==$item->pin_id) || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u=='all') || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k=='all' && $u==$item->pin_id) || 
                ( $w=='all' && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w=='all' && $s=='all' && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s=='all' && $k==$item->pin_marketing && $u==$item->pin_id) || 
                ( $w==$item->wil_kode && $s==$item->pin_statuspinjaman && $k==$item->pin_marketing && $u==$item->pin_id))
                {
                    $ang_no = $this->db->get_where('anggota', array('ang_no' => $item->ang_no))->row();
                    $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $item->sea_id))->row();
                    $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $item->bup_id))->row();
                    $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $item->pop_id))->row();
                    $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $item->skp_id))->row();
                    $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $item->wil_kode))->row();
                    $marketing = $this->db->get_where('karyawan', array('kar_kode' => $item->pin_marketing))->row();
                    $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $item->pin_surveyor))->row();
                    
                    $location=base_url().'upload/survey/';
                    $pict=$location.$item->pin_survey;
                    $datapinjaman[$key] = array(
                        'pin_id' => $item->pin_id,
                        'ang_no' => $item->ang_no,
                        'nama_ang_no' => $ang_no->ang_nama,
                        'sea_id' => $sea_id->sea_tenor,
                        'bup_id' => $bup_id->bup_bunga,
                        'pop_id' => $pop_id->pop_potongan,
                        'wil_kode' => $wil_kode->wil_nama,
                        'skp_id' => $skp_id->skp_kategori,
                        'pin_pengajuan' => $item->pin_pengajuan,
                        'pin_pinjaman' => $item->pin_pinjaman,
                        'pin_tglpengajuan' => $item->pin_tglpengajuan,
                        'pin_tglpencairan' => $item->pin_tglpencairan,
                        'pin_marketing' => $marketing->kar_nama,
                        'pin_surveyor' => $surveyor->kar_nama,
                        'pin_survey' => $pict,
                        'pin_statuspinjaman' => $this->statusPinjaman[$item->pin_statuspinjaman],

                    );
            }
        }
        

        $data = array(
            'datapinjaman' => $datapinjaman,
            'pinjaman_data' => $pinjaman,
            'wilayah_data' => $wilayah,
            'karyawan_data' => $karyawan,
            'q' => $q,
            'start' => $start,
            'active' => 4,
            'content' => 'backend/pinjaman/pinjaman',
            'item'=> 'pinjaman_list.php',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        $pinjaman = $this->Pinjaman_model->get_limit_data($start, $q);


        $data = array(
            'pinjaman_data' => $pinjaman,
            'idhtml' => $idhtml,
            'q' => $q,
            'start' => $start,
            'content' => 'backend/pinjaman/pinjaman_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);
        if ($row) {
            $pin_statuspinjaman = $this->statusPinjaman;
            $ang_no = $this->db->get_where('anggota', array('ang_no' => $row->ang_no))->row();
            $sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $row->sea_id))->row();
            $bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $row->bup_id))->row();
            $pop_id = $this->db->get_where('potonganprovisi', array('pop_id' => $row->pop_id))->row();
            $skp_id = $this->db->get_where('settingkategoripeminjam', array('skp_id' => $row->skp_id))->row();
            $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $row->wil_kode))->row();
            $marketing = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_marketing))->row();
            $surveyor = $this->db->get_where('karyawan', array('kar_kode' => $row->pin_surveyor))->row();
               
            $data = array(
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
            'content' => 'backend/pinjaman/pinjaman_read',
    	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('pinjaman/create_action'),
    	    'pin_id' => set_value('pin_id'),
    	    'ang_no' => set_value('ang_no'),
            'nm_ang_no' => set_value('nm_ang_no'),
    	    'sea_id' => set_value('sea_id'),
            'nm_sea_id' => set_value('nm_sea_id'),
    	    'bup_id' => set_value('bup_id'),
            'nm_bup_id' => set_value('nm_bup_id'),
    	    'pop_id' => set_value('pop_id'),
            'nm_pop_id' => set_value('nm_pop_id'),
    	    'wil_kode' => set_value('wil_kode'),
            'nm_wil_kode' => set_value('nm_wil_kode'),
    	    'skp_id' => set_value('skp_id'),
            'nm_skp_id' => set_value('nm_skp_id'),
    	    'pin_pengajuan' => set_value('pin_pengajuan'),
    	    'pin_pinjaman' => set_value('pin_pinjaman'),
    	    'pin_tglpengajuan' => set_value('pin_tglpengajuan'),
    	    'pin_tglpencairan' => set_value('pin_tglpencairan'),
    	    'pin_marketing' => set_value('pin_marketing'),
    	    'pin_surveyor' => set_value('pin_surveyor'),
    	    'pin_survey' => set_value('pin_survey'),
    	    'pin_statuspinjaman' => set_value('pin_statuspinjaman'),
    	    'content' => 'backend/pinjaman/pinjaman_form',
    	);
        $this->load->view(layout(), $data);
    }
    
    public function update($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pinjaman/update_action'),
        		'pin_id' => set_value('pin_id', $row->pin_id),
        		'ang_no' => set_value('ang_no', $row->ang_no),
                'nm_ang_no' => set_value('ang_no', $row->ang_no),
        		'sea_id' => set_value('sea_id', $row->sea_id),
                'nm_sea_id' => set_value('sea_id', $row->sea_id),
        		'bup_id' => set_value('bup_id', $row->bup_id),
                'nm_bup_id' => set_value('bup_id', $row->bup_id),
        		'pop_id' => set_value('pop_id', $row->pop_id),
                'nm_pop_id' => set_value('pop_id', $row->pop_id),
        		'wil_kode' => set_value('wil_kode', $row->wil_kode),
                'nm_wil_kode' => set_value('wil_kode', $row->wil_kode),
        		'skp_id' => set_value('skp_id', $row->skp_id),
                'nm_skp_id' => set_value('skp_id', $row->skp_id),
        		'pin_pengajuan' => set_value('pin_pengajuan', $row->pin_pengajuan),
        		'pin_pinjaman' => set_value('pin_pinjaman', $row->pin_pinjaman),
        		'pin_tglpengajuan' => set_value('pin_tglpengajuan', $row->pin_tglpengajuan),
        		'pin_tglpencairan' => set_value('pin_tglpencairan', $row->pin_tglpencairan),
        		'pin_marketing' => set_value('pin_marketing', $row->pin_marketing),
        		'pin_surveyor' => set_value('pin_surveyor', $row->pin_surveyor),
        		'pin_survey' => set_value('pin_survey', $row->pin_survey),
        		'pin_statuspinjaman' => set_value('pin_statuspinjaman', $row->pin_statuspinjaman),
        	    'content' => 'backend/pinjaman/pinjaman_form',
        	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
    		'ang_no' => $this->input->post('ang_no',TRUE),
    		'sea_id' => $this->input->post('sea_id',TRUE),
    		'bup_id' => $this->input->post('bup_id',TRUE),
    		'pop_id' => $this->input->post('pop_id',TRUE),
    		'wil_kode' => $this->input->post('wil_kode',TRUE),
    		'skp_id' => $this->input->post('skp_id',TRUE),
    		'pin_pengajuan' => $this->input->post('pin_pengajuan',TRUE),
    		'pin_pinjaman' => $this->input->post('pin_pinjaman',TRUE),
    		'pin_tglpengajuan' => $this->input->post('pin_tglpengajuan',TRUE),
    		'pin_tglpencairan' => $this->input->post('pin_tglpencairan',TRUE),
    		'pin_marketing' => $this->input->post('pin_marketing',TRUE),
    		'pin_surveyor' => $this->input->post('pin_surveyor',TRUE),
    		'pin_survey' => $this->input->post('pin_survey',TRUE),
    		'pin_statuspinjaman' => $this->input->post('pin_statuspinjaman',TRUE),
    		'pin_flag' => 1,
    	    );

            $this->Pinjaman_model->update($this->input->post('pin_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pinjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pinjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
            'pin_flag' => 2,
            );

            $this->Pinjaman_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pinjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ang_no', 'ang no', 'trim|required');
	$this->form_validation->set_rules('sea_id', 'sea id', 'trim|required');
	$this->form_validation->set_rules('bup_id', 'bup id', 'trim|required');
	$this->form_validation->set_rules('pop_id', 'pop id', 'trim|required');
	$this->form_validation->set_rules('wil_kode', 'wil kode', 'trim|required');
	$this->form_validation->set_rules('skp_id', 'skp id', 'trim|required');
	$this->form_validation->set_rules('pin_pengajuan', 'pin pengajuan', 'trim|required');
	$this->form_validation->set_rules('pin_pinjaman', 'pin pinjaman', 'trim|required');
	$this->form_validation->set_rules('pin_tglpengajuan', 'pin tglpengajuan', 'trim|required');
	$this->form_validation->set_rules('pin_tglpencairan', 'pin tglpencairan', 'trim|required');
	$this->form_validation->set_rules('pin_marketing', 'pin marketing', 'trim|required');
	$this->form_validation->set_rules('pin_surveyor', 'pin surveyor', 'trim|required');
	$this->form_validation->set_rules('pin_survey', 'pin survey', 'trim|required');
	$this->form_validation->set_rules('pin_statuspinjaman', 'pin statuspinjaman', 'trim|required');

	$this->form_validation->set_rules('pin_id', 'pin id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pinjaman.php */
/* Location: ./application/controllers/Pinjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:42 */
/* http://harviacode.com */