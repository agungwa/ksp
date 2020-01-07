<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikansimpanan_model extends CI_Model
{

    public $table = 'penarikansimpanan';
    public $id = 'pes_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('pes_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	// get by sim kode hitung
	function get_sirkulasi_penarikansimpanan($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = penarikansimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(pes_tglpenarikan, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(pes_tglpenarikan, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('pes_flag < 2');
        $this->db->select_sum('pes_saldopokok');
        $this->db->select_sum('pes_phbuku');
        $this->db->select_sum('pes_administrasi');
        $this->db->select_sum('pes_bunga');
        return $this->db->get($this->table)->result();
    }

    
	// get by rekening tarik
	function get_total_rekening($f,$t,$w,$s){
        $this->db->join('simpanan', 'simpanan.sim_kode = penarikansimpanan.sim_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sim_status = $s AND sim_flag < 2";
         } else {
            $where = "wil_kode = $w AND sim_status = $s AND sim_flag < 2";
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(pes_tglpenarikan, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(pes_tglpenarikan, '%Y-%m-%d') <= '$t'");
        }
        return $this->db->count_all_results($this->table);
    }

    
    // get total rows
    function total_rows($q = NULL) {
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND pes_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);  
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND pes_flag < 2";
        $this->db->where($where);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

        // get data by sim_kode
    function get_data_penarikan($sim_kode)
    {
        $this->db->where('sim_kode =',$sim_kode);
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

/* End of file Penarikansimpanan_model.php */
/* Location: ./application/models/Penarikansimpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:08 */
/* http://harviacode.com */