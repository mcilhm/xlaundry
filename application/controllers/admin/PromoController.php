<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PromoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Promo');
	}

	public function index()
	{
		$data['content'] = "masterpromo";
		$data['title'] = "Promo";

		$data['promo'] = $this->Promo->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpromo";
		$data['title'] = "Add Promo";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapromo = array(
                'nama_promo'   => $this->input->post('nama_promo'),
                'waktu_mulai_promo' => $this->input->post('waktu_mulai_promo'),
                'waktu_akhir_promo' => $this->input->post('waktu_akhir_promo'),
                'potongan_harga_promo' => $this->input->post('potongan_harga_promo'),
                'tipe_potongan_promo' => $this->input->post('tipe_potongan_promo'),
                'tipe_promo' => $this->input->post('tipe_promo')
            );
            $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
			$this->Promo->insert($datapromo);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/promo');
		}
		else
		{
			$this->load->view('admin/promo');
		}
		
	}
	public function update($idpromo)
	{
		$data['content'] = "updatepromo";
		$data['title'] = "Update Promo";
		$data['idpromo'] = $idpromo;
		$data['row'] = $this->Promo->SelectIdPromo($idpromo)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpromo)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapromo = array(
                'nama_promo'   => $this->input->post('nama_promo'),
                'waktu_mulai_promo' => $this->input->post('waktu_mulai_promo'),
                'waktu_akhir_promo' => $this->input->post('waktu_akhir_promo'),
                'potongan_harga_promo' => $this->input->post('potongan_harga_promo'),
                'tipe_potongan_promo' => $this->input->post('tipe_potongan_promo'),
                'tipe_promo' => $this->input->post('tipe_promo')
            );
			$this->Promo->update($datapromo,$idpromo);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/promo');
		}
		else
		{
			$this->load->view('admin/promo');
		}
		
	}
	public function delete($idpromo)
	{
		$this->Promo->delete($idpromo);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/promo');
	}
}