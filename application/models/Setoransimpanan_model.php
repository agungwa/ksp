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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_data_setor($sim_kode)
    {
        $this->db->where('sim_kode =',$sim_kode);
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
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sim_kode LIKE '%$q%' ESCAPE '!' AND ssi_flag < 2";
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

/* End of file Setoransimpanan_model.php */
/* Location: ./application/models/Setoransimpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:19 */
/* http://harviacode.com */