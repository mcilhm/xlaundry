<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaketanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Paketan');
	}

	public function index()
	{
		$data['content'] = "masterpaketan";
		$data['title'] = "Paketan";

		$data['paketan'] = $this->Paketan->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpaketan";
		$data['title'] = "Add Paketan";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapaketan = array(
                'nama_paketan'   => $this->input->post('nama_paketan'),
                'total_harga_paketan' => $this->input->post('total_harga_paketan'),
                'tipe_potongan_paketan' => $this->input->post('tipe_potongan_paketan'),
                'potongan_harga_paketan' => $this->input->post('potongan_harga_paketan')
            );
            $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
			$this->Paketan->insert($datapaketan);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/paketan');
		}
		else
		{
			$this->load->view('admin/paketan');
		}
		
	}
	public function update($idpaketan)
	{
		$data['content'] = "updatepaketan";
		$data['title'] = "Update Paketan";
		$data['idpaketan'] = $idpaketan;
		$data['row'] = $this->Paketan->SelectIdPaketan($idpaketan)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpaketan)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapaketan = array(
                'nama_paketan'   => $this->input->post('nama_paketan'),
                'total_harga_paketan' => $this->input->post('total_harga_paketan'),
                'tipe_potongan_paketan' => $this->input->post('tipe_potongan_paketan'),
                'potongan_harga_paketan' => $this->input->post('potongan_harga_paketan')
            );
			$this->Paketan->update($datapaketan,$idpaketan);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/paketan');
		}
		else
		{
			$this->load->view('admin/paketan');
		}
		
	}
	public function delete($idpaketan)
	{
		$this->Paketan->delete($idpaketan);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/paketan');
	}
}