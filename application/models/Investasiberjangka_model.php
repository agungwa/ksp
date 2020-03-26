<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Investasiberjangka_model extends CI_Model
{

    public $table = 'investasiberjangka';
    public $ang_no = 'ang_no';
    public $id = 'ivb_kode';
    public $order = 'DESC';
    public $asc = 'ASC';
    public $date = 'ivb_tglpendaftaran';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('ivb_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get data by anggota no
    function get_data_byang($ang_no)
    {
        $this->db->where('ang_no =',$ang_no);
        return $this->db->get($this->table)->result();
    }

    // get investasi aktif
    function get_investasi_aktif()
    {
        $where = "ivb_status = 0 AND ivb_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get investasi aktif dashboard
    function get_investasi_chart($status,$tgl,$tgltutup)
    {
        $where = "ivb_status = $status AND ivb_flag < 2";
        $this->db->where($where);
        if ($tgl != NULL) {
            $this->db->where("DATE_FORMAT(ivb_tglpendaftaran, '%Y-%m') = '$tgl'");
        }
        if ($tgltutup != NULL) {
            $this->db->where("DATE_FORMAT(ivb_tglditutup, '%Y-%m') = '$tgltutup'");
        }
        $this->db->select_sum('ivb_jumlah');
        return $this->db->get($this->table)->result();
    }
    
    // get investasi aktif dashboard
    function get_investasi_sirkulasi()
    {
        $where = "ivb_status = 0 AND ivb_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        $this->db->select_sum('ivb_jumlah');
        return $this->db->get($this->table)->result();
    }

    // get investasi nonaktif
    function get_investasi_nonaktif()
    {
        $where = "ivb_status = 1 AND ivb_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get data investasi tarik di depan
    function get_investasi_didepan($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_status = 0 AND jiv_id = 1 AND ivb_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
        
    }
    
    //get data investasi tarik per bulan
    function get_investasi_perbulan($start = 0, $q = NULL) {
        
        $date = "DATE_FORMAT(`investasiberjangka`.`ivb_tglpendaftaran`,'%d-%m')";
        $this->db->order_by($date);
        $where = "ivb_status = 0 AND jiv_id = 2 AND ivb_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
        print_r($this->db->where($where));
    }
  
    //get data investasi tarik di belakang
    function get_investasi_dibelakang( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_status = 0 AND jiv_id = 3 AND ivb_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    //get data investasi tarik di belakang
    function get_investasi_ditarik($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(ivb_kode LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND ivb_status = 0 AND ivb_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    function get_jatuh_tempo($start = 0, $q = NULL, $date1=NULL, $date2=NULL) {
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_flag < 2";
        $this->db->where($where);
       // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_jasa($start = 0, $q = NULL, $date1=NULL, $date2=NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_status = 0 AND jiv_id = 2 AND ivb_flag < 2";
        $this->db->where($where);
       // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ivb_kode', $q);
    $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_flag < 2";
    $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND ivb_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

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

/* End of file Investasiberjangka_model.php */
/* Location: ./application/models/Investasiberjangka_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:55:37 */
/* http://harviacode.com */