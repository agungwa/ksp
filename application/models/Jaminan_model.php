<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jaminan_model extends CI_Model
{

    public $table = 'jaminan';
    public $id = 'jam_id';
    public $pin_id = 'pin_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('jam_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

// get all by pin_id
function get_jam_pin($pin_id){
	$this->db->where("pin_id = '$pin_id' AND jam_flag < 2");
	return $this->db->get($this->table)->result();
}

    // get data by rekening
    function get_by_rek($pin_id)
    {
        $this->db->where('pin_id', $pin_id);
        return $this->db->get($this->table)->row();
    }

    // get data by pin_kode
    function get_by_pin($pin_id)
    {
        $this->db->where('pin_id', $pin_id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR jam_nomor LIKE '%$q%' ESCAPE '!') AND jam_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR jam_nomor LIKE '%$q%' ESCAPE '!') AND jam_flag < 2";
        $this->db->where($where);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data jaminan
    function updaterek($pin_id, $data)
    {
        $this->db->where('pin_id', $pin_id);
        $this->db->update($this->table, $data);
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

/* End of file Jaminan_model.php */
/* Location: ./application/models/Jaminan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:56:19 */
/* http://harviacode.com */