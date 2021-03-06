<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('promo');

		return $this->db->get();

	}
	public function SelectByStatus($tipe_promo)
	{  
		$date = date('Y-m-d h:m:s');

		$this->db->select('*');
		$this->db->from('promo');
		$this->db->where('waktu_mulai_promo <=', $date);
		$this->db->where( 'waktu_akhir_promo >=', $date);

		if($tipe_promo == 0)
			$this->db->where( 'tipe_promo ', $tipe_promo);

		return $this->db->get();
	}
	public function insert($data)
	{
		return $this->db->insert('promo',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_promo',$id);
		return $this->db->update('promo',$data);
	}
	public function SelectIdPromo($id)
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->where('id_promo',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_promo',$id);
		return $this->db->delete('promo');
	}

}
