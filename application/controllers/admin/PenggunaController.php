<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PenggunaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pengguna');
	}

	public function index()
	{
		$data['content'] = "masterpengguna";
		$data['title'] = "Pengguna";

		$data['pengguna'] = $this->Pengguna->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpengguna";
		$data['title'] = "Add Pengguna";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapengguna = array(
                'id_pengguna'   => $this->input->post('idpengguna'),
                'kata_sandi' => $this->input->post('password'),
                'tipe_pengguna' => $this->input->post('tipe_pengguna'),
                'status_pengguna' => $this->input->post('status_pengguna')
            );
            $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
			$this->Pengguna->insert($datapengguna);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/pengguna');
		}
		else
		{
			$this->load->view('admin/pengguna');
		}
		
	}
	public function update($idpengguna)
	{
		$data['content'] = "updatepengguna";
		$data['title'] = "Update Pengguna";
		$data['idpengguna'] = $idpengguna;
		$data['row'] = $this->Pengguna->SelectIdPengguna($idpengguna)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpengguna)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datapengguna = array(
                'id_pengguna'   => $this->input->post('idpengguna'),
                'kata_sandi' => $this->input->post('password'),
                'tipe_pengguna' => $this->input->post('tipe_pengguna'),
                'status_pengguna' => $this->input->post('status_pengguna')
            );
			$this->Pengguna->update($datapengguna,$idpengguna);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/pengguna');
		}
		else
		{
			$this->load->view('admin/pengguna');
		}
		
	}
	public function delete($idpengguna)
	{
		$this->Pengguna->delete($idpengguna);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/pengguna');
	}
}