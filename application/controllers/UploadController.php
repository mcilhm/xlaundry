<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

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
		$this->load->model('Pembayaran');
	}

	public function index($id_pembayaran)
	{
        $data["id_pembayaran"] = $id_pembayaran;
		$this->load->view('upload_pembayaran', $data);
	}

	public function pembayaran($id_pembayaran)
	{
		$this->load->library('upload');
        $nmfile1 = $_FILES['bukti_pembayaran']['name'];
        $config1['upload_path'] = './assets/img/pembayaran/'; //Folder untuk menyimpan hasil upload
        $config1['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config1['max_size'] = '40000'; //maksimum besar file 4MB
        $config1['max_width']  = ''; 
        $config1['max_height']  = '';
        $config1['file_name'] = $nmfile1; //nama yang terupload nantinya
        $this->upload->initialize($config1);
        $this->upload->do_upload('bukti_pembayaran');
        $gbr1 = $this->upload->data();

        $data = array(
                    'nama_rekening' => $this->input->post('nama_rekening'),
                    'nomor_rekening' => $this->input->post('nomor_rekening'),
                    'bank' => $this->input->post('bank'),
                    'bukti_pembayaran' => $gbr1['file_name'],
                    'status_pembayara' => 1
            );

        if($this->Pembayaran->update($data, $id_pembayaran))
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Pembayaran anda akan kami cek</div>');
            redirect('histori/');
        }
        else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Terjadi kesalahan!</div>');
            redirect('histori/');
        }
	}
}
