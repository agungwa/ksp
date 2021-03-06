<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Angsuran_model extends CI_Model
{

    public $table = 'angsuran';
    public $id = 'ags_id';
    public $pin_id = 'pin_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('ags_flag<',2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get all angsuran bayar
    function get_angsuran_bayar()
    {
        $where = "ags_status = 2 AND ags_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all angsuran kurang
    function get_angsuran_kurang()
    {
        $where = "ags_status = 1 AND ags_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all total angsuran
    function get_angsuran_total()
    {
        $where = "ags_status > 0 AND ags_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get angsuran belum bayar
    function get_angsuran_belum($pin_id)
    {
        $where = "ags_status = 0 AND pin_id = '$pin_id' AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    
    // get angsuran  bayar
    function get_angsuran_bayarpin($pin_id)
    {
        $where = "ags_status = 2 AND pin_id = '$pin_id' AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    // get all pokok
    function get_target()
    {
        $where = "ang_angsuranke > 3 AND ags_status = 0 AND ags_flag < 2";
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get all jumlahbayar
    function get_tertagih()
    {
        $where = "ang_angsuranke > 3 AND ags_status = 1 AND ags_flag < 2";
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

    // get data by id
    function get_by_tgl($p, $tgl)
    {
        $where = "pin_id = '$p' AND MONTH(ags_tgljatuhtempo) = $tgl AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }


    function get_by_pinjaman($q, $k)
    {   
        $where = "pin_id = '$q' AND ang_angsuranke = $k  AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }

    function get_histori_angsuran($q)
    {
        $this->db->order_by($this->id, $this->order);
         $where = "pin_id = '$q' AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ags_tgljatuhtempo LIKE '%$q%' ESCAPE '!') AND ags_flag < 2";
        $this->db->where($where);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
         $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ags_tgljatuhtempo LIKE '%$q%' ESCAPE '!') AND ags_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_angsuran_data( $start = 0, $q = NULL, $date = NULL) {
        $this->db->order_by($this->id, $this->order);
         $where = "(pin_id LIKE '%$q%' ESCAPE '!' OR ags_tgljatuhtempo LIKE '%$q%' ESCAPE '!') AND ags_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_angsuran_bayarlist( $start = 0, $q = NULL, $date = NULL) {
        $this->db->order_by($this->id, $this->order);
         $where = "ags_status > 0 AND ags_flag < 2";
        $this->db->where($where);
	    //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_penagihanawal_data( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
         $where = "ang_angsuranke < 4 AND ags_status < 2 AND ags_flag < 2";
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    function get_penagihanakhir_data( $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
         $where = "ang_angsuranke > 3 AND ags_status < 2 AND ags_flag < 2";
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

/* End of file Angsuran_model.php */
/* Location: ./application/models/Angsuran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 05:41:40 */
/* http://harviacode.com */