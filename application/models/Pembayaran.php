<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('pembayaran');

		return $this->db->get();

	}
	public function insertPembayaran($data)
	{
		return $this->db->insert("pembayaran",$data);
	}
	public function update($data,$id)
	{
		$this->db->where( 'id_pembayaran',$id);
		return $this->db->update('pembayaran',$data);
    }
	public function SelectIdpembayaran($id)
	{
		$this->db->select('*');
		$this->db->from( 'pembayaran');
		$this->db->where( 'id_pembayaran',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where( 'id_pembayaran',$id);
		return $this->db->delete( 'pembayaran');
	}
}
