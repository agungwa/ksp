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
	
	// get_last_setor
	function get_last_setor($rekening){
		$this->db->select('*');
		$this->db->select_max('ssk_tglsetoran');
		$this->db->where('ssk_flag <',2);
		$this->db->where('sik_kode =', $rekening);
		return $this->db->get($this->table)->row();
    }	
    
    //list setoran
    function get_list_simkesan($today,$f,$t,$w,$s,$plan){
        $this->db->join('simkesan', 'simkesan.sik_kode = setoransimkesan.sik_kode', 'right');
        if ($w == 'all' OR $w == ''){
            $where = "sik_status < $s AND sik_flag < 2";
         } else {
            $where = "wil_kode = $w AND sik_status < $s AND sik_flag < 2";
        }
        $this->db->where($where);
        if ($plan !=NULL){
            $this->db->where("psk_id = $plan"); 
        }
        $this->db->where($where);
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssk_tglsetoran, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(ssk_tglsetoran, '%Y-%m-%d') <= '$t'");
        }
        if ($today != NULL) {
            $this->db->where("DATE_FORMAT(ssk_tglsetoran, '%Y-%m-%d') = '$today'");
        }
		$this->db->where('sik_flag < 2');
        //$this->db->select_sum('ssk_jmlsetor');
        return $this->db->get($this->table)->result();
    }
    
	// get by simkesan kode hitung
	function get_setoran_simkesan($status,$tgl){
        $this->db->join('simkesan', 'simkesan.sik_kode = setoransimkesan.sik_kode', 'right');
        $where = "sik_status = $status AND sik_flag < 2";
		$this->db->where($where);
        $this->db->where("DATE_FORMAT(ssk_tglsetoran, '%Y-%m-%d') <= '$tgl'");
        $this->db->where('ssk_flag < 2');
        $this->db->select_sum('ssk_jmlsetor');
        return $this->db->get($this->table)->result();
    }

    function get_totalsetoran($sik_kode){
        $this->db->select_sum('ssk_jmlsetor');
        $this->db->where('sik_kode =',$sik_kode);
		$this->db->where('ssk_flag <',2);
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
		$this->db->where('ssk_flag <',2);
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