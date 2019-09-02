<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simkesan_model extends CI_Model
{

    public $table = 'simkesan';
    public $ang_no = 'ang_no';
    public $id = 'sik_kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('sik_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get data by anggota no
    function get_data_byang($ang_no)
    {
        $this->db->where('ang_no =',$ang_no);
        return $this->db->get($this->table)->result();
    }
    // get simkesan lunas
    function get_simkesan_lunas()
    {
        $where = "sik_status = 4 AND sik_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get simkesan hangus
    function get_simkesan_hangus()
    {
        $where = "sik_status = 3 AND sik_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get simkesan aktif
    function get_simkesan_aktif()
    {
        $where = "sik_status = 0 AND sik_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get simkesan aktif plan
    function get_simkesan_plan($psk_id)
    {
        $where = "sik_status = 0 AND psk_id = '$psk_id' AND sik_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get simkesan nonaktif
    function get_simkesan_nonaktif()
    {
        $where = "sik_status > 0 AND sik_flag < 2";
        $this->db->where($where);
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
        $where = "(sik_kode LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND sik_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "(sik_kode LIKE '%$q%' ESCAPE '!' OR ang_no LIKE '%$q%' ESCAPE '!') AND sik_flag < 2";
        $this->db->where($where);
	   // $this->db->limit($limit, $start);
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

/* End of file Simkesan_model.php */
/* Location: ./application/models/Simkesan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:29 */
/* http://harviacode.com */