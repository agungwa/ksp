<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikansimpananwajib_model extends CI_Model
{

    public $table = 'penarikansimpananwajib';
    public $id = 'psw_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('psw_flag<',2);
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
        $where = "siw_id LIKE '%$q%' ESCAPE '!' AND psw_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "siw_id LIKE '%$q%' ESCAPE '!' AND psw_flag < 2";
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

/* End of file Penarikansimpananwajib_model.php */
/* Location: ./application/models/Penarikansimpananwajib_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-26 02:42:27 */
/* http://harviacode.com */