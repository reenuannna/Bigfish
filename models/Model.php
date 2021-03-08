<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	public function select($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$data=$this->db->get();
		return $data->result();
	}
		public function selectById($table,$id,$pid)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($pid,$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}
	public function count($table)
	{
		return $this->db->count_all($table);
	}
	public function pageSelect($table,$per_page,$start)
	{
		$this->db->limit($per_page,$start);
		$this->db->select('*');
		$this->db->from($table);
		$data=$this->db->get();
		if($data->num_rows()>0)
		{
			return $data->result();
		}
		else
		{
			return false;
		}
	}
	public function userlogin($table,$email,$pass)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
		if($data=$this->db->get())
		{
			return $data->row_array();
		}
		else
		{
			return false;
		}
	}
	public function joinSelect($table1,$table2,$cond1)
	{
		$this->db->select("*");
		$this->db->from($table1);
		$this->db->join($table2,$cond1);
		$data=$this->db->get();
		return $data->result();
	}
public function joinCondSelect($table1,$table2,$table3,$cond1,$cond2,$cond3)
{
	$this->db->select("*");
		$this->db->from($table1);
		$this->db->join($table2,$cond1);
		$this->db->join($table3,$cond3);
		$this->db->where($cond2);
		$data=$this->db->get();
		return $data->result();
}
public function cartCount($table,$id)
{
	$this->db->select('c_id');
	$this->db->from($table);
	$this->db->where('status',0);
	$this->db->where('user_id',$id);
	$data=$this->db->get();
	return $data->num_rows();
}
// SELECT COUNT(c_id) from cart where status=0 AND user_id=1
public function update($table,$data,$id)
{
	$this->db->where($id);
	$this->db->set($data);
	$this->db->update($table);
}
}
?>