<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('pengiriman');

		return $this->db->get();

	}
	public function insert($data)
	{
		return $this->db->insert( 'pengiriman',$data);
	}
	public function update($data,$id)
	{
		$this->db->where( 'id_pengiriman',$id);
		return $this->db->update( 'pengiriman',$data);
	}
	public function SelectIdpengiriman($id)
	{
		$this->db->select('*');
		$this->db->from( 'pengiriman');
		$this->db->where( 'id_pengiriman',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where( 'id_pengiriman',$id);
		return $this->db->delete( 'pengiriman');
	}
}
