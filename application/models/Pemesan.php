<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesan extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');
		$this->db->from('pemesan');

		return $this->db->get();

	}

	public function insert($data)
	{
		return $this->db->insert('pemesan',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_pemesan',$id);
		return $this->db->update('pemesan',$data);
	}
	public function SelectIdPengguna($id)
	{
		$this->db->select('*');
		$this->db->from('pemesan');
		$this->db->where('id_pengguna',$id);

		return $this->db->get();
    }
    
    public function SelectIdPengguna2($id)
	{
		$this->db->select('a.`id_pengguna`,
                            a.`kata_sandi`,
                            a.`tipe_pengguna`,
                            a.`status_pengguna`,
                            a.`waktu_pembuatan`,
                            b.`id_pemesan`,
                            b.`nama_pemesan`,
                            b.`alamat_pemesan`,
                            b.`telepon_pemesan`,
                            b.`email_pemesan`');
        $this->db->from('pengguna as a');
        $this->db->join('pemesan as b' , 'a.id_pengguna = b.id_pengguna', 'left');
		$this->db->where('a.id_pengguna',$id);

		return $this->db->get();
    }
    
	public function delete($id)
	{  
		$this->db->where('id_pemesan',$id);
		return $this->db->delete('pemesan');
	}
}
