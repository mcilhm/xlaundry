<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BahanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Bahan');
	}

	public function index()
	{
		$data['content'] = "masterbahan";
		$data['title'] = "Bahan";

		$data['bahan'] = $this->Bahan->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addbahan";
		$data['title'] = "Add Bahan";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$databahan = array(
                'nama_bahan'   => $this->input->post('namabahan'),
                'harga_kiloan' => $this->input->post('hargakiloan'),
                'harga_satuan' => $this->input->post('hargasatuan'),
                'status_bahan' => $this->input->post('status')
            );
            $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
			$this->Bahan->insert($databahan);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/bahan');
		}
		else
		{
			$this->load->view('admin/bahan');
		}
		
	}
	public function update($idbahan)
	{
		$data['content'] = "updatebahan";
		$data['title'] = "Update Bahan";
		$data['idbahan'] = $idbahan;
		$data['rowbahan'] = $this->Bahan->SelectIdBahan($idbahan)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idbahan)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$databahan = array(
                'nama_bahan'   => $this->input->post('namabahan'),
                'harga_kiloan' => $this->input->post('hargakiloan'),
                'harga_satuan' => $this->input->post('hargasatuan'),
                'status_bahan' => $this->input->post('status')
            );
			$this->Bahan->update($databahan,$idbahan);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/bahan');
		}
		else
		{
			$this->load->view('admin/bahan');
		}
		
	}
	public function delete($idbahan)
	{
		$this->Bahan->delete($idbahan);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/bahan');
	}
}