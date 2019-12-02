<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aplikasi_model extends CI_Model
{

    public $table = 'aplikasi';
    public $id = 'apl_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all(){
        $this->db->where('apl_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	function save_batch($data){
		$this->db->insert_batch($this->table, $data);
	}
}