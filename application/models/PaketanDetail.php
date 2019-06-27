<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaketanDetail extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	public function SelectAll()
	{
		$this->db->select('*');    
		$this->db->from('paketan_detail');
		$this->db->join('paketan', 'paketan_detail.id_paketan = paketan.id_paketan');
		$this->db->join('bahan', 'paketan_detail.id_bahan = bahan.id_bahan');
		return $this->db->get();

	}
	public function insert($data)
	{
		return $this->db->insert('paketan_detail',$data);
	}
	public function update($data,$id)
	{
		$this->db->where('id_paketan_detail',$id);
		return $this->db->update('paketan_detail',$data);
	}
	public function SelectIdPaketanDetail($id)
	{
		$this->db->select('*');
		$this->db->from('paketan_detail');
		$this->db->where('id_paketan_detail',$id);

		return $this->db->get();
	}
	public function delete($id)
	{  
		$this->db->where('id_paketan_detail',$id);
		return $this->db->delete('paketan_detail');
	}

}
