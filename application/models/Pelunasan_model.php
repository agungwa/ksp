<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelunasan_model extends CI_Model
{

    public $table = 'pelunasan';
    public $id = 'pel_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('pel_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
	// get data pelunasan
	function get_sirkulasi($status, $month,$tgl){
        $this->db->join('pinjaman', 'pinjaman.pin_id = pelunasan.pin_id', 'right');
        $wherepin = "pin_statuspinjaman = $status AND pin_flag < 2";
        $this->db->where($wherepin);
        if ($tgl != NULL) {
            $this->db->where("DATE_FORMAT(pel_tglpelunasan, '%Y-%m-%d') <= '$tgl'");
        }
        if ($month != NULL) {
            $this->db->where("DATE_FORMAT(pel_tglpelunasan, '%Y-%m') = '$month'");
        }
        $this->db->where('pel_flag < 2');
        $this->db->select_sum('pel_totaldenda');
        $this->db->select_sum('pel_totalbungapokok');
        $this->db->select_sum('pel_totalkekuranganpokok');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR pel_id LIKE '%$q%' ESCAPE '!') AND pel_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR pel_id LIKE '%$q%' ESCAPE '!') AND pel_flag < 2";
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

/* End of file Pelunasan_model.php */
/* Location: ./application/models/Pelunasan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-24 00:52:56 */
/* http://harviacode.com */