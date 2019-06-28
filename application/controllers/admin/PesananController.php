<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PesananController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->model('Pesanan');
        $this->load->model('Pengiriman');
		$this->load->model('Paketan');
		$this->load->model('Promo');
		$this->load->model('Bahan');
		$this->load->model('Pengguna');
	}

	public function index()
	{
		$data['content'] = "masterpesanan";
		$data['title'] = "Pesanan";

		$data['pesanan'] = $this->Pesanan->SelectAll2();
		$this->load->view('admin/pages/masterpesanan',$data);
	}

	public function add()
	{
		$data['content'] = "addpesanan";
		$data['title'] = "Add Pesanan";
		
		$data['pengiriman'] = $this->Pengiriman->SelectAll();
		$data['paketan'] = $this->Paketan->SelectAll();
		$data['promo'] = $this->Promo->SelectByStatus();
		$data['bahan'] = $this->Bahan->SelectByStatus();
		$data['pengguna'] = $this->Pengguna->SelectAll2();

		$this->load->view('admin/pages/addpesanan',$data);
	}
	public function addproses()
	{
		$max = $this->Pesanan->SelectAll();
		foreach($max->result() as $key)
		{
			$id_max = $key->id_pesanan;
		}
		$nourut = (int) substr($id_max, 7, 13);
		$nourut++;
		$kode_pesanan = "HLBOOK-" .sprintf('%06s', $nourut);
		
		$data = array(
					  'id_pesanan' => $kode_pesanan,
	                  'nama_pemesan' => $this->input->post('nama_pemesan'),
	                  'alamat_pemesan' => $this->input->post('alamat_pemesan'),
	                  'telepon_pemesan' => $this->input->post('telepon_pemesan'),
	                  'email_pemesan' => $this->input->post('email_pemesan'),
					  'status_pesanan' => 0,
					  'tipe_pesanan' => $this->input->post('tipe_pesanan'),
	                  'id_paketan' => empty($this->input->post('id_paketan')) ? null : $this->input->post('id_paketan'),
	                  'id_pengiriman' => empty($this->input->post('id_pengiriman')) ? null : $this->input->post('id_pengiriman'),
	                  'id_pengguna' => empty($this->input->post('id_pengguna')) ? null : $this->input->post('id_pengguna'),
	                  'id_promo' => empty($this->input->post('id_promo')) ? null : $this->input->post('id_promo')
			);
			
		$this->db->set('waktu_pesanan', 'NOW()', FALSE);
		$insert_pesanan = $this->Pesanan->insert($data);
		$id_bahan = $this->input->post('idbahan');
		$jumlah_bahan = $this->input->post('jumlah');
		$i = 0;
		$harga_bahan = 0;
		$last_harga_bahan = 0;
		$harga_pengiriman = 0;

		if(!empty($this->input->post('id_pengiriman')))
			$harga_pengiriman = $this->Pengiriman->SelectIdPengiriman($this->input->post('id_pengiriman'))->row()->harga_pengiriman;

		foreach($id_bahan as $key => $value)
		{

			$bahan = $this->Bahan->SelectIdBahan($id_bahan[$key])->row();
			if(empty($this->input->post('id_paketan')))
			{
				if($this->input->post('tipe_pesanan') == 0)
					$harga_bahan = $bahan->harga_kiloan * $jumlah_bahan[$key];
				else $harga_bahan = $bahan->harga_satuan * $jumlah_bahan[$key];

				$data_total_harga = array('total_harga' =>  $last_harga_bahan + $harga_bahan);

				$this->Pesanan->update($data_total_harga, $kode_pesanan);
			}

			else
			{
				if($this->input->post('tipe_pesanan') == 0)
					$harga_bahan = $bahan->harga_kiloan * $jumlah_bahan[$key];
				else $harga_bahan = $bahan->harga_satuan * $jumlah_bahan[$key];

				$paketan = $this->Paketan->SelectIdPaketan($this->input->post('id_paketan'))->row();
				$data_total_harga = array('total_harga' => $paketan->total_harga_paketan);

				$this->Pesanan->update($data_total_harga, $kode_pesanan);
			}


			$pesanan_detail = array(
					'id_pesanan' => $kode_pesanan,
					'id_bahan' => $id_bahan[$key],
					'jumlah' => $jumlah_bahan[$key],
					'harga' => $harga_bahan
			);
			$this->Pesanan->insertDetail($pesanan_detail);
			$last_harga_bahan = $harga_bahan;
		}

		
		$data_total_harga = array('total_harga' =>  $last_harga_bahan + $harga_pengiriman);
		if(!empty($this->input->post('id_promo')))
		{
			$promo = $this->Promo->SelectIdPromo($this->input->post('id_promo'))->row();

			$tipe_potongan_promo = $promo->tipe_potongan_promo;
			$potongan_promo = $promo->potongan_promo;

			if($tipe_potongan_promo == 0)
				$data_total_harga = $data_total_harga - $potongan_promo;
			else $data_total_harga = $data_total_harga * $potongan_promo / 100;
		}

		$this->Pesanan->update($data_total_harga, $kode_pesanan);
		$this->Pesanan->update_estimation_laundry_time($kode_pesanan);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Anda berhasil memesan! Berikut kode booking anda <b>' . $kode_pesanan.'</b></div>');
		redirect('admin/pesanan');
	}
	
	public function update($idpesanan)
	{
		$data['content'] = "updatepesanan";
		$data['title'] = "Update Pesanan";
		$data['idpesanan'] = $idpesanan;
		$data['row'] = $this->Pesanan->SelectIdPaketan($idpesanan)->row();
		$this->load->view('admin/adminapp',$data);
		
	}
	public function updateproses($idpesanan)
	{
        $datapesanan = array(
            'status_pesanan'   => $this->input->post('status_pesanan')
        );
        $this->Pesanan->update($datapesanan,$idpesanan);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Berhasil! Data berhasil diubah.</p> 
                                                    <div class="clearfix"></div>
                                                </div>'
								);
		
		$email_pemesan = $this->Pesanan->SelectIdPesanan($idpesanan)->row()->email_pemesan;

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'ilhamkuncung28@gmail.com', //isi dengan gmailmu!
			'smtp_pass' => 'MakanGmail03', //isi dengan password gmailmu!
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);

		
		$this->email->from('ilhamkuncung28@gmail.com', 'PT Home Laundry');
		$this->email->set_newline("\r\n");
		$this->email->to($email_pemesan); //email tujuan. Isikan dengan emailmu!
		$this->email->subject('Status Pesanan Home Laundry');

		if($this->input->post('status_pesanan') == 1)
		{
			$this->email->message("Pesanan anda sudah masuk ke tahap proses pencucian");
		}
		else if($this->input->post('status_pesanan') == 2)
		{
			$this->email->message("Pesanan anda sudah masuk ke tahap proses setrika");
		}
		else if($this->input->post('status_pesanan') == 3)
		{
			$this->email->message("Pesanan anda sudah selesai, akan segera kami antar");
		}

		$this->email->send();

        redirect('admin/pesanan');
		
	}
}