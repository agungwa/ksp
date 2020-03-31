<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lainlain_model extends CI_Model
{

    public $table = 'lainlain';
    public $id = 'lln_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('lln_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_rekap($j,$i,$now,$f,$t,$lalu,$month,$w)
    {
        if ($w == 'all' OR $w == ''){
            $where = "lln_jenis = $j AND lln_inout = $i AND lln_flag < 2";
        } else {
            $where = "wil_kode = $w AND lln_jenis = $j AND lln_inout = $i AND lln_flag < 2";
        }
        $this->db->where($where);
        if ($now != NULL){
            $this->db->where("DATE_FORMAT(lln_tanggal, '%Y-%m-%d') = '$now'");
        }
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(lln_tanggal, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(lln_tanggal, '%Y-%m-%d') <= '$t'");
        }
        if ($lalu != NULL) {
            $this->db->where("DATE_FORMAT(lln_tanggal, '%Y-%m-%d') < '$lalu'");
        }
        if ($month != NULL) {
            $this->db->where("DATE_FORMAT(lln_tanggal, '%Y-%m') = '$month'");
        }
        $this->db->select_sum('lln_jumlah');
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
        $where = "lln_id LIKE '%$q%' ESCAPE '!' AND lln_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "lln_id LIKE '%$q%' ESCAPE '!' AND lln_flag < 2";
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

/* End of file Lainlain_model.php */
/* Location: ./application/models/Lainlain_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-23 15:22:52 */
/* http://harviacode.com */