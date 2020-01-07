<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoransimpananwajib_model extends CI_Model
{

    public $table = 'setoransimpananwajib';
    public $id = 'ssw_id';
    public $siw_id= 'siw_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('ssw_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

	// get by total simpanan wajib
	function get_sirkulasi_simpananwajib($f,$t){
        
        if ($f != NULL) {
            $this->db->where("DATE_FORMAT(ssw_tglsetor, '%Y-%m-%d') >= '$f'");
        }
        if ($t != NULL) {
            $this->db->where("DATE_FORMAT(ssw_tglsetor, '%Y-%m-%d') <= '$t'");
        }
		$this->db->where('ssw_flag < 2');
        $this->db->select_sum('ssw_jmlsetor');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by siw_id
    function get_data_ssw($siw_id)
    {
        $this->db->where('siw_id =',$siw_id);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(ssw_id LIKE '%$q%' ESCAPE '!' OR siw_id LIKE '%$q%' ESCAPE '!') AND ssw_flag < 2";
        $this->db->where($where);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order); 
        $where = "(ssw_id LIKE '%$q%' ESCAPE '!' OR siw_id LIKE '%$q%' ESCAPE '!') AND ssw_flag < 2";
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

/* End of file Setoransimpananwajib_model.php */
/* Location: ./application/models/Setoransimpananwajib_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-19 11:24:33 */
/* http://harviacode.com */