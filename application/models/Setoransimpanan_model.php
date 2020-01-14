<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimpanan_model extends CI_Model
{

    public $table = 'setoransimpanan';
    public $id = 'ssi_id';
    public $sim_kode = 'sim_kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->where('ssi_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get all
    function get_all_setor()
    {
        $this->where('ssi_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	// get by sim kode
	function get_by_sim_kode($kode, $f, $t){
		$this->db->where('sim_kode', $kode);
		$this->db->where('ssi_flag < 2');
		$this->db->where("ssi_tglsetor BETWEEN '$f' AND '$t'");
        return $this->db->get($this->table)->result();
    }
    
	// get by sim kode hitung
	function get_sirkulasi(){
        $this->db->join('simpanan', 'simpanan.sim_kode = setoransimpanan.sim_kode', 'right');
        $where = "sim_status = 0 AND sim_flag < 2";
		$this->db->where($where);
        $this->db->where('ssi_flag < 2');
        $this->db->select_sum('ssi_jmlsetor');
        return $this->db->get($this->table)->result();
    }

	// get by sim kode hitung
	function get_sirkulasi_simpanan($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = setoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status < $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status < $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('ssi_flag < 2');
        $this->db->select_sum('ssi_jmlsetor');
        return $this->db->get($this->table)->result();
    }

	// get by sim kode hitung
	function get_neraca_simpanan($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = setoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') <= '$f'");
        }
		$this->db->where('ssi_flag < 2');
        $this->db->select_sum('ssi_jmlsetor');
        return $this->db->get($this->table)->result();
    }

	// get by list setoran
	function get_listsetoran($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = setoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status < $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status < $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('ssi_flag < 2');
        return $this->db->get($this->table)->result();
    }
    
	// get by sim kode hitung
	function get_sirkulasi_simpananall($f,$w){
        $this->db->join('simpanan', 'simpanan.sim_kode = setoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_flag < 2";
         } 
        else {
            $where = "wil_kode = $w AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssi_tglsetor, '%Y-%m-%d') < '$f'");
        } 
		$this->db->where('ssi_flag < 2');
        $this->db->select_sum('ssi_jmlsetor');
        return $this->db->get($this->table)->result();
    }
    
    
	// get by sim kode hitung
	function get_hitung($kode, $f){
		$this->db->where('sim_kode', $kode);
		$this->db->where('ssi_flag < 2');
        return $this->db->get($this->table)->result();
	}

    // get data by id
    function get_data_setor($sim_kode)
    {
        $where = "sim_kode = '$sim_kode' AND ssi_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    function get_totalsetoran($sim_kode){
        $this->db->select_sum('ssi_jmlsetor');
        $this->db->where('sim_kode =',$sim_kode);
        return $this->db->get($this->table)->result();
    }

    // get data by sim_kode & tgl
    function get_data_setorTgl($sim_kode, $tglStart, $tglEnd)
    {
        //SELECT sum(ssi_jmlsetor) as jum FROM `setoransimpanan` where sim_kode = 'KA080619001' AND ssi_tglsetor BETWEEN '2019-06-01' and '2019-07-01'
        $this->db->select("sum(ssi_jmlsetor) as jum_setor");
        $this->db->where('sim_kode =',$sim_kode);
        $this->db->where("ssi_tglsetor BETWEEN '$tglStart' AND '$tglEnd'");
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND ssi_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND ssi_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
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

/* End of file Setoransimpanan_model.php */
/* Location: ./application/models/Setoransimpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:19 */
/* http://harviacode.com */