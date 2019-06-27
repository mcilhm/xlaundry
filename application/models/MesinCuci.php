<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MesinCuci extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('mesin_cuci');

		return $this->db->get();

	}
	public function insert($data)
	{
		return $this->db->insert('mesin_cuci',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_mesin_cuci',$id);
		return $this->db->update('mesin_cuci',$data);
	}
	public function SelectIdMesinCuci($id)
	{
		$this->db->select('*');
		$this->db->from('mesin_cuci');
		$this->db->where('id_mesin_cuci',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_mesin_cuci',$id);
		return $this->db->delete('mesin_cuci');
	}
}
