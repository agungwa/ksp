<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{

    public $table = 'simpanan';
    public $ang_no = 'ang_no';
    public $id = 'sim_kode';
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

    // get data by id
    function get_by_id_penarikan($id)
    {
        
        $where = "sim_kode = '$id' AND sim_status = 0 AND sim_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }

	// get data by kar_kode
	function get_by_kar_kode($kode){
		$this->db->where('kar_kode', $kode);
		$this->db->where('sim_flag < 2');
        return $this->db->get($this->table)->result();
	}

    // get data by anggota no
    function get_data_byang($ang_no)
    {
        $this->db->where('ang_no =',$ang_no);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND sim_flag < 2";
    $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    

	// get by sim kode hitung
	function get_total_rekening($f,$t,$w,$s){
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('sim_flag < 2');
        return $this->db->count_all_results($this->table);
    }
    
	// get by sim kode hitung
	function get_total_rekeninglalu($f,$w,$s){
        if ($w == 'all' OR $w == ''){
            $where = "sim_status < $s AND sim_flag < 2";
         } 
        else {
            $where = "wil_kode = $w AND sim_status < $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%Y-%m-%d') < '$f'");
        } 
		$this->db->where('sim_flag < 2');
        return $this->db->count_all_results($this->table);
    }
    
	// get by sim kode hitung
	function get_total_rekeningkeluarlalu($f,$w,$s){
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } 
        else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(sim_tglpendaftaran, '%Y-%m-%d') < '$f'");
        } 
		$this->db->where('sim_flag < 2');
        return $this->db->count_all_results($this->table);
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND sim_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_jatuh_tempo($start = 0, $q = NULL, $date1=NULL, $date2=NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND sim_flag < 2";
        $this->db->where($where);
       // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_simpanan_aktif(){
        $this->db->order_by($this->id, $this->order);
        $where = "sim_status = 0 AND sim_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    function get_simpanan_aktiflist($q = NULL){
        $this->db->order_by($this->id, $this->order);
        $where = "(sim_kode LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND sim_status = 0 AND sim_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    
    function get_simpanan_all(){
        $this->db->order_by($this->id, $this->order);
        $where = "sim_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    function get_simpanan_nonaktif(){
        $this->db->order_by($this->id, $this->order);
        $where = "sim_status = 1 AND sim_flag < 2";
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

/* End of file Simpanan_model.php */
/* Location: ./application/models/Simpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */