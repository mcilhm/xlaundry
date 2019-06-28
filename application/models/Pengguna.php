<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('pengguna');

		return $this->db->get();

	}
	public function SelectAll2()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tipe_pengguna', 1);

		return $this->db->get();

	}

	public function insert($data)
	{
		return $this->db->insert('pengguna',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_pengguna',$id);
		return $this->db->update('pengguna',$data);
	}
	public function SelectIdPengguna($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('id_pengguna',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_pengguna',$id);
		return $this->db->delete('pengguna');
	}

	public function check_user_account($username,$password, $tipe_pengguna = 0)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('id_pengguna', $username);
		$this->db->where('kata_sandi', $password);
		$this->db->where('tipe_pengguna', $tipe_pengguna);
		$this->db->where('status_pengguna', '1');

		return $this->db->get();
	}

}
