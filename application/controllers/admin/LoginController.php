<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pengguna');
	}

	public function index()
	{
		$this->load->view('admin/pages/login');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$temp_account = $this->Pengguna->check_user_account($username,$password);
		
		if ($temp_account->num_rows() == 1)
			{
				foreach($temp_account->result() as $key)
				{
					$array_items = array(
						'username' => $key->id_pengguna,
						'password' => $key->kata_sandi,
						'logged_in' => true
						);
					$this->session->sess_expiration = '1800';
					$this->session->set_userdata($array_items);
				}
					redirect('admin/bahan');
			}
			else
			{
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Login Gagal.</p> 
														<div class="clearfix"></div>
													</div>'
									);
				redirect('admin/');
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}