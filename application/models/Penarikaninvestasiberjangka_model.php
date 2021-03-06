<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penarikaninvestasiberjangka_model extends CI_Model
{

    public $table = 'penarikaninvestasiberjangka';
    public $id = 'pib_id';
    public $ivb_kode = 'ivb_kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('pib_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_totalpenarikan($ivb_kode){
        $this->db->select_sum('pib_jmlditerima');
        $this->db->where('ivb_kode =',$ivb_kode);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

     // get data by ivb_kode
     function get_data_ivb($ivb_kode)
     {
         $this->db->where('ivb_kode =', $ivb_kode);
         return $this->db->get($this->table)->result();
     }
    
    // get data by sim_kode & tgl
    function get_data_tarikTgl($ivb_kode, $tglStart, $tglEnd)
    {
        //SELECT sum(ssi_jmlsetor) as jum FROM `setoransimpanan` where sim_kode = 'KA080619001' AND ssi_tglsetor BETWEEN '2019-06-01' and '2019-07-01'
        $this->db->select("sum(ssi_jmlsetor) as jum_setor");
        $this->db->where('ivb_kode =',$ivb_kode);
        $this->db->where("pib_tgl BETWEEN '$tglStart' AND '$tglEnd'");
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $where = "pib_id LIKE '%$q%' ESCAPE '!' AND pib_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $where = "ivb_kode LIKE '%$q%' ESCAPE '!' AND pib_flag < 2";
        $this->db->where($where);
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

/* End of file Penarikaninvestasiberjangka_model.php */
/* Location: ./application/models/Penarikaninvestasiberjangka_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 13:59:55 */
/* http://harviacode.com */