<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Periode_model extends CI_Model
{

    public $table = 'periodegaji';
    public $id = 'per_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all(){
        $this->db->where('per_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	function insert($data){
        $this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return $id;
    }
}