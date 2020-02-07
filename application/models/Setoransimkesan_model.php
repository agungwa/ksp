<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimkesan_model extends CI_Model
{

    public $table = 'setoransimkesan';
    public $id = 'ssk_id';
    public $sik_kode = 'sik_kode';
    public $ssk_tglsetoran ='ssk_tglsetoran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('ssk_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_totalsetoran($sik_kode){
        $this->db->select_sum('ssk_jmlsetor');
        $this->db->where('sik_kode =',$sik_kode);
        return $this->db->get($this->table)->result();
    }

    
    // get group tgl terakhir
    function get_tglterakhir($sik_kode)
    {
        $this->db->select('* , max(ssk_tglsetoran) AS tanggal');
        $where = "sik_kode = '$sik_kode' AND ssk_flag < 2 ";
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }

    // get group by
    function get_group_bysikkode($start = 0, $q = NULL)
    {
        $this->db->select('* , max(ssk_tglsetoran) AS tanggal');
        $where = "ssk_flag < 2 ";
        $this->db->where($where);
        $this->db->group_by($this->sik_kode);
        
        //$this->db->select_max($this->id);
         //->from('setoransimkesan')
         //->group_by($this->sik_kode);
        //$this->db->select_max($this->id);
        //$query = $this->db->get('setoransimkesan' );
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by sik_kode
    function get_data_setor($sik_kode)
    {
        $this->db->where('sik_kode=', $sik_kode);        
        return $this->db->get($this->table)->result();

    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "sik_kode LIKE '%$q%' ESCAPE '!' AND ssk_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "sik_kode LIKE '%$q%' ESCAPE '!' AND ssk_flag < 2";
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

/* End of file Setoransimkesan_model.php */
/* Location: ./application/models/Setoransimkesan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:01:13 */
/* http://harviacode.com */