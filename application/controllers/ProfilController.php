<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {

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
		$this->load->model('Pemesan');
	}

	public function index()
	{
        $data['pemesan'] = $this->Pemesan->SelectIdPengguna2($this->session->username_user)->row();
		$this->load->view('profil', $data);
    }
    
    public function update()
    {
        $id_pengguna = $this->input->post("idpengguna");
        

        $count = $this->Pemesan->SelectIdPengguna($id_pengguna)->num_rows();

        if($count == 0)
        {
            $data = array(
                "id_pengguna" => $id_pengguna,
                "nama_pemesan" => $this->input->post("namapemesan"),
                "alamat_pemesan" => $this->input->post("alamatpemesan"),
                "telepon_pemesan" => $this->input->post("teleponpemesan"),
                "email_pemesan" => $this->input->post("emailpemesan")
            );
            $this->Pemesan->insert($data);
        }
        else
        {
            
            $data = array(
                "nama_pemesan" => $this->input->post("namapemesan"),
                "alamat_pemesan" => $this->input->post("alamatpemesan"),
                "telepon_pemesan" => $this->input->post("teleponpemesan"),
                "email_pemesan" => $this->input->post("emailpemesan")
            );
            $this->Pemesan->update($data, $id_pengguna );
        }

        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
                                    <div class="clearfix"></div>
                                </div>'
                );
        redirect('profil/');
       
    }
}
