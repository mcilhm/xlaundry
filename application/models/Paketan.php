<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paketan extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('paketan');

		return $this->db->get();

	}
	public function insert($data)
	{
		return $this->db->insert('paketan',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_paketan',$id);
		return $this->db->update('paketan',$data);
	}
	public function SelectIdPaketan($id)
	{
		$this->db->select('*');
		$this->db->from('paketan');
		$this->db->where('id_paketan',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_paketan',$id);
		return $this->db->delete('paketan');
	}

}
