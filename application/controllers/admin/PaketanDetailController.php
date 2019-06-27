<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaketanDetailController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('PaketanDetail');
		$this->load->model('Paketan');
		$this->load->model('Bahan');
	}

	public function index()
	{
		$data['content'] = "masterpaketandetail";
		$data['title'] = "Paketan Detail";

		$data['paketandetail'] = $this->PaketanDetail->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpaketandetail";
		$data['title'] = "Add Paketan Detail";

		$data['paketan'] = $this->Paketan->SelectAll();
		$data['bahan'] = $this->Bahan->SelectAll();

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$idbahan = $this->input->post('id_bahan');
			$row_bahan = $this->Bahan->SelectIdBahan($idbahan)->row();

			$datapaketandetail = array(
                'id_paketan'   => $this->input->post('id_paketan'),
                'id_bahan' => $this->input->post('id_bahan'),
                'minimal_berat' => $this->input->post('minimal_berat'),
                'harga_paketan' => $row_bahan->harga_kiloan * $this->input->post('minimal_berat')
            );
			$this->PaketanDetail->insert($datapaketandetail);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/paketan_detail');
		}
		else
		{
			$this->load->view('admin/paketan_detail');
		}
		
	}
	public function update($idpaketandetail)
	{
		$data['content'] = "updatepaketandetail";
		$data['title'] = "Update Paketan Detail";
		$data['idpaketandetail'] = $idpaketandetail;
		$data['paketan'] = $this->Paketan->SelectAll();
		$data['bahan'] = $this->Bahan->SelectAll();
		$data['row'] = $this->PaketanDetail->SelectIdPaketanDetail($idpaketandetail)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpaketandetail)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$idbahan = $this->input->post('id_bahan');
			$row_bahan = $this->Bahan->SelectIdBahan($idbahan)->row();

			$datapaketandetail = array(
                'id_paketan'   => $this->input->post('id_paketan'),
                'id_bahan' => $this->input->post('id_bahan'),
                'minimal_berat' => $this->input->post('minimal_berat'),
                'harga_paketan' => $row_bahan->harga_kiloan * $this->input->post('minimal_berat')
            );
			$this->PaketanDetail->update($datapaketandetail,$idpaketandetail);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/paketan_detail');
		}
		else
		{
			$this->load->view('admin/paketan_detail');
		}
		
	}
	public function delete($idpaketandetail)
	{
		$this->PaketanDetail->delete($idpaketandetail);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/paketan_detail');
	}
}