<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{

    public $table = 'simpanan';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('sim_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND sim_flag < 2";
    $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND sim_flag < 2";
        $this->db->where($where);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    // input kode
   public function simpananana($nowYear,$Nunit, $Nitem){
        $this->db->select('RIGHT(simpanan.sim_kode,2) as sim_kode', FALSE);
        $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%d') = ", $nowYear);
        $Nunit = 'K';
        $Nitem = 'A';  
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
            $kodetampil = "K"."A".$tgl.$batas;
            return $kodetampil;  
       }

       public function simpanananb($nowYear,$Nunit, $Nitem){
        $this->db->select('RIGHT(simpanan.sim_kode,2) as sim_kode', FALSE);
        $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%d') = ", $nowYear);
        $Nunit = 'K';
        $Nitem = 'B';  
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
            $kodetampil = $Nunit.$Nitem.$tgl.$batas;
            return $kodetampil;  
       }
    
      /*  Function simpananana($nowYear, $Nunit, $Nitem){
        $nowMonthYear = date('dmy');
        $Nunit = 'K';
        $Nitem = 'A';
        $this->db->select_max("sim_kode");      // select max (id_no)
        $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%y') = ", $nowYear);  // and month to year
        $query = $this->db->get('simpanan');
        
        if(!empty($query)){
         foreach ($query->result() as $value) {
          $kode = $value->sim_kode;                 // contoh : X01.Y02.Z03.MMYY.0001
                                             //no urut kode hanya diteruskan jika Nunit and Ndept and Nitem sudah pernah ada record sebelumnya
          $lastkode = substr($kode,12,4);    // urutan digit mulai ke 17 sepanjang 4 karakter
          $nextkode = $lastkode + 1; 
          $tempnextno = $Nunit.$Nitem.$nowMonthYear;
          $nextnoreg = $tempnextno.sprintf('%04s',$nextkode);    // %04s untuk penyesuaian 4 digit no urut
         }
        }else{
                                     // jika kondisi  Nunit and Ndept and Nitem tidak dipenuhi maka no urut reset dari 1
         $tempnextno = $Nunit.$Ndept.$Nitem.date('dym');
         $nextnoreg = $tempnextno.sprintf('%04s',$nextkode);
        }
        return $nextnoreg;
       }
       
       Function simpanananb($nowYear, $Nunit, $Nitem){
        $nowMonthYear = date('dmy');
        $Nunit = 'K';
        $Nitem = 'B';
        $this->db->select_max("sim_kode");      // select max (id_no)
        $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%y') = ", $nowYear);  // and month to year
        $query = $this->db->get('simpanan');
        
        if(!empty($query)){
         foreach ($query->result() as $value) {
          $kode = $value->sim_kode;                 // contoh : X01.Y02.Z03.MMYY.0001
                                             //no urut kode hanya diteruskan jika Nunit and Ndept and Nitem sudah pernah ada record sebelumnya
          $lastkode = substr($kode,12,4);    // urutan digit mulai ke 17 sepanjang 4 karakter
          $nextkode = $lastkode + 1; 
          $tempnextno = $Nunit.$Nitem.$nowMonthYear;
          $nextnoreg = $tempnextno.sprintf('%04s',$nextkode);    // %04s untuk penyesuaian 4 digit no urut
         }
        }else{
                                     // jika kondisi  Nunit and Ndept and Nitem tidak dipenuhi maka no urut reset dari 1
         $tempnextno = $Nunit.$Ndept.$Nitem.date('dym');
         $nextnoreg = $tempnextno.sprintf('%04s',$nextkode);
        }
        return $nextnoreg;
       }*/
     

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Simpanan_model.php */
/* Location: ./application/models/Simpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */