<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimpanan_model extends CI_Model
{

    public $table = 'setoransimpanan';
    public $id = 'ssi_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
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
        $this->db->like('ssi_id', $q);
	$this->db->or_like('sim_kode', $q);
	$this->db->or_like('ssi_tglsetor', $q);
	$this->db->or_like('ssi_jmlsetor', $q);
	$this->db->or_like('ssi_jmlbunga', $q);
	$this->db->or_like('ssi_tgl', $q);
	$this->db->or_like('ssi_flag', $q);
	$this->db->or_like('ssi_info', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ssi_id', $q);
	$this->db->or_like('sim_kode', $q);
	$this->db->or_like('ssi_tglsetor', $q);
	$this->db->or_like('ssi_jmlsetor', $q);
	$this->db->or_like('ssi_jmlbunga', $q);
	$this->db->or_like('ssi_tgl', $q);
	$this->db->or_like('ssi_flag', $q);
	$this->db->or_like('ssi_info', $q);
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