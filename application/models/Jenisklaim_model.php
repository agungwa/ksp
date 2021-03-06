<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisklaim_model extends CI_Model
{

    public $table = 'jenisklaim';
    public $id = 'jkl_id';
    public $jkl_tahunke = 'jkl_tahunke';
    public $jkl_plan = 'jkl_plan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('jkl_flag<',2);
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
    function get_by_tahunke($jkl_tahunke,$jkl_plan)
    {
        $this->db->where('jkl_tahunke=', $jkl_tahunke);
        $this->db->where('jkl_plan=',$jkl_plan );
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(jkl_keuntungan LIKE '%$q%' ESCAPE '!' OR jkl_plan LIKE '%$q%' ESCAPE '!') AND jkl_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(jkl_keuntungan LIKE '%$q%' ESCAPE '!' OR jkl_plan LIKE '%$q%' ESCAPE '!') AND jkl_flag < 2";
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

/* End of file Jenisklaim_model.php */
/* Location: ./application/models/Jenisklaim_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:44 */
/* http://harviacode.com */