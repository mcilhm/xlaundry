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

	public function SelectByIdPesanan($id_pesanan)
	{
		$this->db->select('pesanan.*, pesanan_detail.*, bahan.nama_bahan');
		$this->db->from('pesanan');
		$this->db->join('pesanan_detail', 'pesanan.id_pesanan = pesanan_detail.id_pesanan', 'INNER');
		$this->db->join('bahan', 'pesanan_detail.id_bahan = bahan.id_bahan', 'left');
		$this->db->where('pesanan.id_pesanan', $id_pesanan);

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
		$this->db->select('pesanan.*, pengiriman.*, pembayaran.id_pembayaran, pembayaran.status_pembayaran');
		$this->db->from('pesanan');
		$this->db->join('pengiriman', 'pesanan.id_pengiriman = pengiriman.id_pengiriman', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
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
