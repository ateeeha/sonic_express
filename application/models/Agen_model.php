<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function insert($table = '', $data = '')
	{
		$this->db->insert($table,$data);
	}

	function insert_id($table = '', $data = '')
	{
		$this->db->insert($table, $data);
   		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}
		
	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function select_all($select, $table)
	{
		
		$this->db->select($select);
		$this->db->from($table);
		$this->db->order_by('id_order','DESC');

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);		
	}

	function update_multiple($table = null, $data = null, $where = null)
	{

    	foreach ($where as $key){ 
	        $this->db->where('id_user', $key);
	        $this->db->update($table, $data);               
    	}		
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);	
		$this->db->delete($table);			
	}
}