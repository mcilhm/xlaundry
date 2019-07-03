<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PembayaranController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pembayaran');
	}

	public function index()
	{
		$data['content'] = "masterpembayaran";
		$data['title'] = "Pembayaran";

		$data['pembayaran'] = $this->Pembayaran->SelectAll();
		$this->load->view('admin/adminapp',$data);
	}
	public function add()
	{
		$data['content'] = "addpromo";
		$data['title'] = "Add Promo";

		$this->load->view('admin/adminapp',$data);
	}
    
    public function updateproses($idpembayaran)
	{
        $datapembayaran = array(
            'status_pembayaran'   => $this->input->post('status_pembayaran')
        );
        $this->Pembayaran->update($datapembayaran,$idpembayaran);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
                                                    <div class="clearfix"></div>
                                                </div>'
								);

        redirect('admin/pembayaran');
		
	}
}