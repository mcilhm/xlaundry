<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pengguna');
		$this->load->model('Pemesan');
	}

	public function index()
	{
		$this->load->view('register');
	}
	public function add()
	{
        $datapengguna = array(
            'id_pengguna'   => $this->input->post('idpengguna'),
            'kata_sandi' => $this->input->post('password'),
            'tipe_pengguna' => 1,
            'status_pengguna' => 1
        );

        $this->db->set('waktu_pembuatan', 'NOW()', FALSE);
        $this->Pengguna->insert($datapengguna);

        
        $datapemesan = array(
	                  'nama_pemesan' => $this->input->post('namapemesan'),
	                  'alamat_pemesan' => $this->input->post('alamatpemesan'),
	                  'telepon_pemesan' => $this->input->post('teleponpemesan'),
                      'email_pemesan' => $this->input->post('emailpemesan'),
                      'id_pengguna'   => $this->input->post('idpengguna'));
        $this->Pemesan->insert($datapemesan);
                      
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Anda Berhasil Mendaftar</p> 
                                                    <div class="clearfix"></div>
                                                </div>'
                                );
        redirect('');
		
	}
}