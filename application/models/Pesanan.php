<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('pesanan');

		return $this->db->get();

	}

	public function SelectAll2()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pengiriman', 'pesanan.id_pengiriman = pengiriman.id_pengiriman', 'LEFT');

		return $this->db->get();

	}

	function update_estimation_laundry_time($kode_pesanan)
	{
		# code...
		$sql = "CALL `sp_get_estimation_laundry_time`('".$kode_pesanan."')";

		$data = $this->db->query($sql);
		$this->db->close();

		return $data;
	}

	public function insert($data)
	{
		return $this->db->insert('pesanan',$data);
	}
	
	public function insertDetail($data)
	{
		return $this->db->insert('pesanan_detail',$data);
	}
	
	public function update($data,$id)
	{
		$this->db->where('id_pesanan',$id);
		return $this->db->update('pesanan',$data);
	}
	public function SelectIdPengguna($id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('id_pengguna', $id);

		return $this->db->get();
	}
	public function SelectIdPesanan($id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('id_pesanan',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_pesanan',$id);
		return $this->db->delete('pesanan');
	}

}
