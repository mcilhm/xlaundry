<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengirimanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('session');
		$this->load->model('pengiriman');
	}

	public function index()
	{
		$data['content'] = "masterpengiriman";
		$data['title'] = "Pengiriman";

		$data['pengiriman'] = $this->pengiriman->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpengiriman";
		$data['title'] = "Add Mesin Cuci";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapengiriman = array(
                'nama_pengiriman'   => $this->input->post('namapengiriman'),
                'lama_pengiriman' => $this->input->post('lamapengiriman'),
                'harga_pengiriman' => $this->input->post('hargapengiriman')
            );
			$this->pengiriman->insert($datapengiriman);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/pengiriman');
		}
		else
		{
			$this->load->view('adm/pengiriman');
		}
		
	}
	public function update($idpengiriman)
	{
		$data['content'] = "updatepengiriman";
		$data['title'] = "Update Mesin Cuci";
		$data['idpengiriman'] = $idpengiriman;
		$data['row'] = $this->pengiriman->SelectIdpengiriman($idpengiriman)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpengiriman)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapengiriman = array(
                'nama_pengiriman'   => $this->input->post('namapengiriman'),
                'lama_pengiriman' => $this->input->post('lamapengiriman'),
                'harga_pengiriman' => $this->input->post('hargapengiriman')
            );
			$this->pengiriman->update($datapengiriman,$idpengiriman);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/pengiriman');
		}
		else
		{
			$this->load->view('admin/pengiriman');
		}
		
	}
	public function delete($idpengiriman)
	{
		$this->pengiriman->delete($idpengiriman);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/pengiriman');
	}
}