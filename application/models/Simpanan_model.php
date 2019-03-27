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
        $this->db->like('', $q);
	$this->db->or_like('sim_kode', $q);
	$this->db->or_like('ang_no', $q);
	$this->db->or_like('kar_kode', $q);
	$this->db->or_like('bus_id', $q);
	$this->db->or_like('jsi_id', $q);
	$this->db->or_like('jse_id', $q);
	$this->db->or_like('wil_kode', $q);
	$this->db->or_like('sim_tglpendaftaran', $q);
	$this->db->or_like('sim_status', $q);
	$this->db->or_like('sim_tgl', $q);
	$this->db->or_like('sim_flag', $q);
	$this->db->or_like('sim_info', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('sim_kode', $q);
	$this->db->or_like('ang_no', $q);
	$this->db->or_like('kar_kode', $q);
	$this->db->or_like('bus_id', $q);
	$this->db->or_like('jsi_id', $q);
	$this->db->or_like('jse_id', $q);
	$this->db->or_like('wil_kode', $q);
	$this->db->or_like('sim_tglpendaftaran', $q);
	$this->db->or_like('sim_status', $q);
	$this->db->or_like('sim_tgl', $q);
	$this->db->or_like('sim_flag', $q);
	$this->db->or_like('sim_info', $q);
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

/* End of file Simpanan_model.php */
/* Location: ./application/models/Simpanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */