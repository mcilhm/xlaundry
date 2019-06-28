<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pengguna');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$temp_account = $this->Pengguna->check_user_account($username, $password, 1);

		if ($temp_account->num_rows() == 1) {
			foreach ($temp_account->result() as $key) {
				$array_items = array(
					'username_user' => $key->id_pengguna,
					'password_user' => $key->kata_sandi,
					'logged_in_user' => true
				);
				$this->session->sess_expiration = '1800';
				$this->session->set_userdata($array_items);
			}
			redirect('');
		} else {
			$this->session->set_flashdata(
				'notifikasi',
				'<div class="alert alert-danger alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Login Gagal.</p> 
														<div class="clearfix"></div>
													</div>'
			);
			redirect('login/');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
