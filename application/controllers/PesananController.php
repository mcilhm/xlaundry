<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesananController extends CI_Controller {

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
        $this->load->model('Pesanan');
        $this->load->model('Pengiriman');
		$this->load->model('Paketan');
		$this->load->model('Promo');
		$this->load->model('Bahan');
		$this->load->model('Pemesan');
		$this->load->model('Pembayaran');
    }

	public function index()
	{
        $id_pesanan = $this->input->post("id_pesanan");
        $data['id_pesanan'] = $id_pesanan;
        $data['pesanan'] = $this->Pesanan->SelectIdPesanan($id_pesanan)->row();
		$this->load->view('statusbooking',  $data);
	}

	public function pesan()
	{
		$data['pengiriman'] = $this->Pengiriman->SelectAll();
		$data['paketan'] = $this->Paketan->SelectAll();
		$data['bahan'] = $this->Bahan->SelectByStatus();
		$data['promo'] = $this->Promo->SelectByStatus(0);
		if($this->session->logged_in_user)
		{
			$data['promo'] = $this->Promo->SelectByStatus(1);
			$data['pemesan'] = $this->Pemesan->SelectIdPengguna($this->session->username_user)->row();
		}

		$this->load->view('pemesanan', $data);
	}

	public function preview()
	{
		$max = $this->Pesanan->SelectAll();
		foreach($max->result() as $key)
		{
			$id_max = $key->id_pesanan;
		}
		if(empty($id_max))
			$id_max = 000000;
		$nourut = (int) substr($id_max, 7, 13);
		$nourut++;
		$datas["id_pesanan"] = "HLBOOK-" .sprintf('%06s', $nourut);
		
		$datas["nama_pemesan"] = $this->input->post("namapemesan");
		$datas["alamat_pemesan"] = $this->input->post("alamatpemesan");
		$datas["telepon_pemesan"] = $this->input->post("teleponpemesan");
		$datas["email_pemesan"] = $this->input->post("emailpemesan");
		$datas["status_pesanan"] = 0;
		$datas["tipe_pesanan"] = $this->input->post("tipepesanan");
		$datas["id_paketan"] = empty($this->input->post("idpaketan")) ? null : $this->input->post("idpaketan");
		$datas["id_pengiriman"] = empty($this->input->post("idpengiriman")) ? null : $this->input->post("idpengiriman");
		$datas["id_pengguna"] = empty($this->input->post("idpengguna")) ? null : $this->input->post("idpengguna");
		$datas["id_promo"] = empty($this->input->post("idpromo")) ? null : $this->input->post("idpromo");
		
		$datas["jumlah_bahan"] = $this->input->post('jumlah');
		$i = 0;
		$harga_bahan = [];
		$last_harga_bahan = 0;
		$harga_pengiriman = 0;

		if(!empty($this->input->post('idpengiriman')))
			$datas["harga_pengiriman"] = $this->Pengiriman->SelectIdPengiriman($this->input->post('idpengiriman'))->row()->harga_pengiriman;

		foreach($this->input->post('idbahan') as $key => $value)
		{

			$bahans = explode('|', $value);
			$datas["id_bahan"][$key] = $bahans[0];
			$datas["nama_bahan"][$key] = $bahans[1];
			$bahan = $this->Bahan->SelectIdBahan($datas["id_bahan"][$key])->row();
			if(empty($this->input->post('idpaketan')))
			{
				if($this->input->post('tipepesanan') == 0)
					$harga_bahan[$i] = $bahan->harga_kiloan * $datas["jumlah_bahan"] [$key];
				else $harga_bahan[$i] = $bahan->harga_satuan * $datas["jumlah_bahan"] [$key];

				
				$datas["harga_bahan"][$key] = $harga_bahan[$i];
			}

			else
			{
				if($this->input->post('tipepesanan') == 0)
					$harga_bahan[$i] = $bahan->harga_kiloan * $datas["jumlah_bahan"] [$key];
				else $harga_bahan[$i] = $bahan->harga_satuan * $datas["jumlah_bahan"] [$key];

				$paketan = $this->Paketan->SelectIdPaketan($this->input->post('idpaketan'))->row();
				
				$datas["harga_bahan"][$key] = $harga_bahan[$i];
				$datas["paketan"] = $paketan->total_harga_paketan;

			}
			$last_harga_bahan += $harga_bahan[$i];
		}
		
		

		if(!empty($this->input->post('idpromo')))
		{
			$promo = $this->Promo->SelectIdPromo($this->input->post('idpromo'))->row();

			$tipe_potongan_promo = $promo->tipe_potongan_promo;
			$potongan_promo = $promo->potongan_harga_promo;

			if($tipe_potongan_promo == 0)
				$datas["promo"] = $potongan_promo;
			else $datas["promo"] = $potongan_promo / 100;
		}
		if(!empty($this->input->post('idpaketan')))
		{
			$datas["data_total_harga"] = $datas["paketan"] - $datas["promo"] + $datas["harga_pengiriman"];
		}

		else
		{
			$datas["data_total_harga"] = $last_harga_bahan + $datas["harga_pengiriman"] - - $datas["promo"];
		}
		$this->load->view('preview', $datas);
	}

	public function add()
	{
		$max = $this->Pesanan->SelectAll();
		foreach($max->result() as $key)
		{
			$id_max = $key->id_pesanan;
		}
		if(empty($id_max))
			$id_max = 000000;
		$nourut = (int) substr($id_max, 7, 13);
		$nourut++;
		$kode_pesanan = "HLBOOK-" .sprintf('%06s', $nourut);
		
		$data = array(
					  'id_pesanan' => $kode_pesanan,
	                  'nama_pemesan' => $this->input->post('namapemesan'),
	                  'alamat_pemesan' => $this->input->post('alamatpemesan'),
	                  'telepon_pemesan' => $this->input->post('teleponpemesan'),
	                  'email_pemesan' => $this->input->post('emailpemesan'),
					  'status_pesanan' => 0,
					  'tipe_pesanan' => $this->input->post('tipepesanan'),
					  'total_harga' => $this->input->post('data_total_harga'),
	                  'id_paketan' => empty($this->input->post('idpaketan')) ? null : $this->input->post('idpaketan'),
	                  'id_pengiriman' => empty($this->input->post('idpengiriman')) ? null : $this->input->post('idpengiriman'),
	                  'id_pengguna' => empty($this->session->username_user) ? null : $this->session->username_user,
	                  'id_promo' => empty($this->input->post('idpromo')) ? null : $this->input->post('idpromo')
			);
			
		$this->db->set('waktu_pesanan', 'NOW()', FALSE);
		$insert_pesanan = $this->Pesanan->insert($data);
		$id_bahan = $this->input->post('idbahan');
		$jumlah_bahan = $this->input->post('jumlah');
		$i = 0;
		$harga_bahan = 0;
		$last_harga_bahan = 0;
		$harga_pengiriman = 0;

		foreach($id_bahan as $key)
		{

			$bahan = $this->Bahan->SelectIdBahan($id_bahan[$i])->row();
			
			if($this->input->post('tipepesanan') == 0)
				$harga_bahan = $bahan->harga_kiloan * $jumlah_bahan[$i];
			else $harga_bahan = $bahan->harga_satuan * $jumlah_bahan[$i];


			$pesanan_detail = array(
					'id_pesanan' => $kode_pesanan,
					'id_bahan' => $id_bahan[$i],
					'jumlah' => $jumlah_bahan[$i],
					'harga' => $harga_bahan
			);
			$this->Pesanan->insertDetail($pesanan_detail);

			$i++;
		}
		
		$this->Pesanan->update_estimation_laundry_time($kode_pesanan);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Anda berhasil memesan! Berikut kode booking anda <b>' . $kode_pesanan.'</b></div>');
			redirect('');
	}
}
