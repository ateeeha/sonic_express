<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {


	function __construct()
	{
		parent::__construct();
	}

	function insert($table = '', $data = '')
	{
		$this->db->insert($table,$data);
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

	function select_where($select, $table, $where)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);		
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);	
		$this->db->delete($table);			
	}

}
