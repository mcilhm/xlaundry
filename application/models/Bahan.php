<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahan extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('bahan');

		return $this->db->get();

	}
	public function insert($data)
	{
		return $this->db->insert('bahan',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_bahan',$id);
		return $this->db->update('bahan',$data);
	}
	public function SelectIdBahan($id)
	{
		$this->db->select('*');
		$this->db->from('bahan');
		$this->db->where('id_bahan',$id);

		return $this->db->get();
	}
	public function SelectByStatus()
	{
		$this->db->select('*');
		$this->db->from('bahan');
		$this->db->where('status_bahan', 1);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_bahan',$id);
		return $this->db->delete('bahan');
	}

}
