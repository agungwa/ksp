<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjaman_model extends CI_Model
{

    public $table = 'pinjaman';
    public $id = 'pin_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('pin_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    //get all pengajuan
    function get_all_pengajuan()
    {
        $this->db->where('pin_flag<',2);
        $this->db->where('pin_statuspinjaman=',0);
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
	    $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND pin_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get total rows pengajuan
    function total_rows_pengajuan($q = NULL) {
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND pin_statuspinjaman = 0 AND pin_flag < 2";
        $this->db->where($where); 
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
	    $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND pin_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // save pengajuan
    function savePengajuan($data)
    {
        $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
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

/* End of file Pinjaman_model.php */
/* Location: ./application/models/Pinjaman_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:00:42 */
/* http://harviacode.com */