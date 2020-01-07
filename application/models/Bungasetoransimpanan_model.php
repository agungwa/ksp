<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bungasetoransimpanan_model extends CI_Model
{

    public $table = 'bungasetoransimpanan';
    public $id = 'bss_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('bss_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

	// get by sim kode bunga simpanan
	function get_sirkulasi_bungasimpanan($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = bungasetoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(bss_tglbunga, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(bss_tglbunga, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('bss_flag < 2');
        $this->db->select_sum('bss_bungabulanini');
        return $this->db->get($this->table)->result();
    }

	// get by sim kode bunga simpanan
	function get_neraca_bungasimpanan($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = bungasetoransimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(bss_tglbunga, '%Y-%m-%d') <= '$f'");
        }
		$this->db->where('bss_flag < 2');
        $this->db->select_sum('bss_bungabulanini');
        return $this->db->get($this->table)->result();
    }
    
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_data_bungasetoran($sim_kode){
        $this->db->where('sim_kode =',$sim_kode);
        return $this->db->get($this->table)->result();
    }

    function get_data_bungasetoranTgl($sim_kode, $tgl){
        $this->db->where('sim_kode =',$sim_kode);
        $this->db->where("bss_tglbunga = '$tgl'");
        $this->db->limit(1);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(bss_id LIKE '%$q%' ESCAPE '!' OR sim_kode LIKE '%$q%' ESCAPE '!') AND bss_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(bss_id LIKE '%$q%' ESCAPE '!' OR sim_kode LIKE '%$q%' ESCAPE '!') AND bss_flag < 2";
        $this->db->where($where);
	$this->db->limit($limit, $start);
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

/* End of file Bungasetoransimpanan_model.php */
/* Location: ./application/models/Bungasetoransimpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-26 13:52:27 */
/* http://harviacode.com */