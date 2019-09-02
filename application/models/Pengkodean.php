<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengkodean extends CI_Model
{

    function __construct()
    {
        
        $this->load->model('Kantorksp_model');
        parent::__construct();
    }

    // input kode Anggota

        public function kode(){
            $kantorksp = $this->Kantorksp_model->get_by_id(1);  
            $this->db->select('RIGHT(anggota.ang_no,2) as ang_no', FALSE);
            $this->db->order_by('ang_no','DESC');    
            $this->db->limit(1);  
            $query = $this->db->get('anggota');  //cek dulu apakah ada sudah ada kode di tabel.    
            if($query->num_rows() <> 0){      
                //cek kode jika telah tersedia    
                $data = $query->row();      
                $kode = intval($data->ang_no) + 1; 
            }
            else{      
                $kode = 1;  //cek jika kode belum terdapat pada table
            }
                $tgl=date('dmy'); 
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                $kodetampil = "$kantorksp->kks_kode".$tgl.$batas;  //format kode
                return $kodetampil;  
        }

    // input kode Simpanan Berjangka 9 Bulan
        public function simpananana($nowYear){
            $kantorksp = $this->Kantorksp_model->get_by_id(1);  
            $this->db->select('RIGHT(simpanan.sim_kode,2) as sim_kode', FALSE);
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%d') = ", $nowYear); 
            $this->db->limit(1);
            $this->db->order_by('sim_kode','DESC');       
            $query = $this->db->get('simpanan');  
            if($query->num_rows() <> 0){          
                $data = $query->row();      
                $kode = intval($data->sim_kode) + 1; 
            }
            else{      
                $kode = 1;
            }
                $tgl=date('dmy'); 
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                $kodetampil = "$kantorksp->kks_kode"."A".$tgl.$batas;
                return $kodetampil;  
        }
    // input kode simpanan berjangka 12 bulan
       public function simpanananb($nowYear){
        $kantorksp = $this->Kantorksp_model->get_by_id(1); 
            $this->db->select('RIGHT(simpanan.sim_kode,2) as sim_kode', FALSE);
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%d') = ", $nowYear);
            $this->db->limit(1);
            $this->db->order_by('sim_kode','DESC');    
            $query = $this->db->get('simpanan');  
            if($query->num_rows() <> 0){          
                $data = $query->row();      
                $kode = intval($data->sim_kode) + 1; 
            }
            else{      
                $kode = 1;
            }
                $tgl=date('dmy'); 
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                $kodetampil = "$kantorksp->kks_kode"."B".$tgl.$batas;
                return $kodetampil;  
        }

    // input kode investasi berjangka
       public function investasiberjangka($nowYear){
        $kantorksp = $this->Kantorksp_model->get_by_id(1); 
        $this->db->select('RIGHT(investasiberjangka.ivb_kode,2) as ivb_kode', FALSE);
        $this->db->where("DATE_FORMAT(ivb_tglpendaftaran, '%d') = ", $nowYear);
        $this->db->limit(1);
        $this->db->order_by('ivb_kode','DESC');    
        $query = $this->db->get('investasiberjangka');  
        if($query->num_rows() <> 0){          
            $data = $query->row();      
            $kode = intval($data->ivb_kode) + 1; 
        }
        else{      
            $kode = 1;
        }
            $tgl=date('dmy'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "$kantorksp->kks_kode"."D".$tgl.$batas;
            return $kodetampil;  
    }

    // input kode pinjaman
    public function pinjaman($nowYear){
        $kantorksp = $this->Kantorksp_model->get_by_id(1); 
        $this->db->select('RIGHT(pinjaman.pin_id,2) as pin_id', FALSE);
        $this->db->where("DATE_FORMAT(pin_tglpengajuan, '%d') = ", $nowYear);
        $this->db->limit(1);
        $this->db->order_by('pin_id','DESC');    
        $query = $this->db->get('pinjaman');  
        if($query->num_rows() <> 0){          
            $data = $query->row();      
            $kode = intval($data->pin_id) + 1; 
        }
        else{      
            $kode = 1;
        }
            $tgl=date('dmy'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "$kantorksp->kks_kode"."E".$tgl.$batas;
            return $kodetampil;  
    }

    // input kode simkesan
    public function simkesan($nowYear){
        $kantorksp = $this->Kantorksp_model->get_by_id(1); 
        $this->db->select('RIGHT(simkesan.sik_kode,2) as sik_kode', FALSE);
        $this->db->where("DATE_FORMAT(sik_tglpendaftaran, '%d') = ", $nowYear);
        $this->db->limit(1);
        $this->db->order_by('sik_kode','DESC');    
        $query = $this->db->get('simkesan');  
        if($query->num_rows() <> 0){          
            $data = $query->row();      
            $kode = intval($data->sik_kode) + 1; 
        }
        else{      
            $kode = 1;
        }
            $tgl=date('dmy'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "$kantorksp->kks_kode"."C".$tgl.$batas;
            return $kodetampil;  
    }

    // input kode phu sistem
    public function psis($nowYear){
        $this->db->select('RIGHT(phu_sistem.psis_id,2) as psis_id', FALSE);
        $this->db->where("DATE_FORMAT(psis_tgl, '%d') = ", $nowYear);
        $this->db->limit(1);
        $this->db->order_by('psis_id','DESC');    
        $query = $this->db->get('phu_sistem');  
        if($query->num_rows() <> 0){          
            $data = $query->row();      
            $kode = intval($data->psis_id) + 1; 
        }
        else{      
            $kode = 1;
        }
            $tgl=date('dmy'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "phu".$tgl.$batas;
            return $kodetampil;  
    }

    
    // input kode Karyawan
    public function karyawan(){
        $this->db->select('RIGHT(karyawan.kar_kode,2) as kar_kode', FALSE);
        $this->db->limit(1);
        $this->db->order_by('kar_kode','DESC');    
        $query = $this->db->get('karyawan');  
        if($query->num_rows() <> 0){          
            $data = $query->row();      
            $kode = intval($data->kar_kode) + 1; 
        }
        else{      
            $kode = 1;
        }
            $tgl=date('dm'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = $tgl.$batas;
            return $kodetampil;  
    }


}

/* End of file Ahliwarissimkesan_model.php */
/* Location: ./application/models/Ahliwarissimkesan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:39:31 */
/* http://harviacode.com */