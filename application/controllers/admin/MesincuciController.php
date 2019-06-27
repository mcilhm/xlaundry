<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MesincuciController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('session');
		$this->load->model('MesinCuci');
	}

	public function index()
	{
		$data['content'] = "mastermesincuci";
		$data['title'] = "Mesin Cuci";

		$data['mesincuci'] = $this->MesinCuci->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addmesincuci";
		$data['title'] = "Add Mesin Cuci";

		$this->load->view('admin/adminapp',$data);
	}
	public function addproses()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datamesincuci = array(
                'nama_mesin_cuci'   => $this->input->post('namamesincuci'),
                'maksimal_berat' => $this->input->post('maksimalberat'),
                'status_mesin_cuci' => $this->input->post('status')
            );
            $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
			$this->MesinCuci->insert($datamesincuci);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil ditambahkan.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/mesincuci');
		}
		else
		{
			$this->load->view('adm/mesincuci');
		}
		
	}
	public function update($idmesincuci)
	{
		$data['content'] = "updatemesincuci";
		$data['title'] = "Update Mesin Cuci";
		$data['idmesincuci'] = $idmesincuci;
		$data['row'] = $this->MesinCuci->SelectIdMesinCuci($idmesincuci)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idmesincuci)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$datamesincuci = array(
                'nama_mesin_cuci'   => $this->input->post('namamesincuci'),
                'maksimal_berat' => $this->input->post('maksimalberat'),
                'status_mesin_cuci' => $this->input->post('status')
            );
			$this->MesinCuci->update($datamesincuci,$idmesincuci);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
														<div class="clearfix"></div>
													</div>'
									);
			redirect('admin/mesincuci');
		}
		else
		{
			$this->load->view('admin/mesincuci');
		}
		
	}
	public function delete($idmesincuci)
	{
		$this->MesinCuci->delete($idmesincuci);
		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil dihapus.</p> 
														<div class="clearfix"></div>
													</div>'
									);
		redirect('admin/mesincuci');
	}
}