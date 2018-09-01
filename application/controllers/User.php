<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->cek_login();

		if ($this->input->post('submit') == 'Submit')
		{
			$this->form_validation->set_rules('kabupaten_asal','kabupaten Asal','required');
			$this->form_validation->set_rules('kabupaten_tujuan','kabupaten Tujuan','required');

				if ($this->form_validation->run() == TRUE)
				{
					$ongkir = array(
						'origin' => $this->input->post('kabupaten_asal', TRUE),
						'kota' => $this->input->post('kabupaten_tujuan', TRUE),
					);

					$cek = $this->user_model->get_where('t_ongkir', $ongkir);
					
					$data['cek'] = $cek;
					// if ($cek->num_rows() > 0) 
					// {				
					// 	// foreach ($cek->result() as $key) {
							
					// 	// 	$data['id_tracking'] = $key->id_tracking;
					// 	// 	$data['no_resi'] = $key->no_resi;
					// 	// 	$data['tanggal'] = $key->tanggal;
					// 	// 	$data['status'] = $key->status;
					// 	// }

					// } else {
					// 	$this->session->set_flashdata('alert', "Kode Resi Tidak Ada !");
					// }
				}
		}else 
		{
			$data['cek'] = '';
		}

		$data['data'] = $this->user_model->get_all('t_provinsi');
		
		$data['active_cekongkir'] = 'active';
		$data['header'] = 'Cek Ongkir';
		$this->template->user('user/form_cekongkir', $data);

	}

	public function cek_ongkir()
	{
		$this->cek_login();

		if ($this->input->post('submit') == 'Submit')
		{
			$this->form_validation->set_rules('kabupaten_asal','kabupaten Asal','required');
			$this->form_validation->set_rules('kabupaten_tujuan','kabupaten Tujuan','required');

				if ($this->form_validation->run() == TRUE)
				{
					$ongkir = array(
						'origin' => $this->input->post('kabupaten_asal', TRUE),
						'kota' => $this->input->post('kabupaten_tujuan', TRUE),
					);

					$cek = $this->user_model->get_where('t_ongkir', $ongkir);
					
					$data['cek'] = $cek;
					// if ($cek->num_rows() > 0) 
					// {				
					// 	// foreach ($cek->result() as $key) {
							
					// 	// 	$data['id_tracking'] = $key->id_tracking;
					// 	// 	$data['no_resi'] = $key->no_resi;
					// 	// 	$data['tanggal'] = $key->tanggal;
					// 	// 	$data['status'] = $key->status;
					// 	// }

					// } else {
					// 	$this->session->set_flashdata('alert', "Kode Resi Tidak Ada !");
					// }
				}
		}else 
		{
			$data['cek'] = '';
		}

		$data['data'] = $this->user_model->get_all('t_provinsi');
		
		$data['active_cekongkir'] = 'active';
		$data['header'] = 'Cek Ongkir';
		$this->template->user('user/form_cekongkir', $data);
	}

	public function cek_resi()
	{
		$this->cek_login();
		
		if ($this->input->post('submit') == 'Submit')
		{
			$no_resi = $this->input->post('no_resi', TRUE);

			$cek = $this->user_model->get_where('t_tracking', array('no_resi' => $no_resi));
			$data['cek'] = $cek;
			// if ($cek->num_rows() > 0) 
			// {				
			// 	// foreach ($cek->result() as $key) {
					
			// 	// 	$data['id_tracking'] = $key->id_tracking;
			// 	// 	$data['no_resi'] = $key->no_resi;
			// 	// 	$data['tanggal'] = $key->tanggal;
			// 	// 	$data['status'] = $key->status;
			// 	// }

			// } else {
			// 	$this->session->set_flashdata('alert', "Kode Resi Tidak Ada !");
			// }
		}else {
			$data['cek'] = '';
		}

		$data['active_cekresi'] = 'active';
		$data['header'] = 'Cek Resi';
		$this->template->user('user/form_cekresi', $data);
	}

	function transaksi()
	{
		$this->cek_login();

		
		$data['data'] = $this->user_model->get_all('t_provinsi');

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Transaksi';
		$this->template->user('user/form_transaksi', $data);
	}

	function transaksi_simpan()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('berat','Berat','required|numeric');
			$this->form_validation->set_rules('provinsi_tujuan','Provinsi','required');
			$this->form_validation->set_rules('kabupaten_tujuan','Kabupaten','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|numeric');

			if ($this->form_validation->run() == TRUE)
			{
				$ongkir = $this->input->post('ongkir');
				$berat = $this->input->post('berat');
				$p = $this->input->post('panjang');
				$l= $this->input->post('lebar');
				$t = $this->input->post('tinggi');

				if (($p * $l * $t) < 18000) {

					$total_biaya = $berat * $ongkir;

				}else if (($p * $l * $t) >= 18000) {

					$berat = $p * $l * $t / 6000;

					$total_biaya = $berat * $ongkir;
				}

				$data = array(
				'id_user' => $this->session->userdata('id_user'), 
				'tgl_pengiriman' => date("Y-m-d"), 
				'no_resi' => 'RES'.date("dmYgis").$this->session->userdata('id_user'), 

				'berat' => $this->input->post('berat'),
				'panjang' => $this->input->post('panjang'),
				'lebar' => $this->input->post('lebar'),
				'tinggi' => $this->input->post('tinggi'),
				'ongkir' => $this->input->post('ongkir'),
				'total_biaya' => $total_biaya,

				'nama' => $this->input->post('nama'), 
				'provinsi_tujuan' => $this->input->post('provinsi_tujuan'), 
				'kabupaten_tujuan' => $this->input->post('kabupaten_tujuan'), 
				'alamat' => $this->input->post('alamat'), 
				'kode_pos' => $this->input->post('kode_pos'), 
				'no_tlp' => $this->input->post('no_tlp'), 
				'status_transaksi' => 'Menunggu',
				'dp_kirim' => 'Belum Dikirim'
				);

				$this->user_model->insert('t_transaksi', $data);
				$this->session->set_flashdata('success','Data berhasil Disimpan !');
			
			} 
			$this->session->set_flashdata('alert','Data Gagal disimpan !');
		}
		redirect('user/transaksi/');
	}

	public function list_transaksi()
	{
		$this->cek_login();

		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->user_model->get_where($join, 
			array(
				'email' => $this->session->userdata('email_user'),
				));

		$data['active_list'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->user('user/list_transaksi', $data);
	}

	public function getcity()
	{
		$pro = $this->input->get('sts');
		$getprovinsiid = $this->user_model->get_where('t_provinsi',array('nama_provinsi'=> $pro))->row();
		$getcity = $this->user_model->get_where('t_kota',array('id_provinsi'=> $getprovinsiid->id_provinsi))->result();

		echo "<option value=''>--Pilih Kabupaten--</option>";
		foreach($getcity as $gc){
			echo "<option value='$gc->nama_kota'>$gc->nama_kota</option>";
		}
	}

	public function getongkir()
	{
		$this->cek_login();

		$kab = $this->input->get('kab');		

		$ongkir = array(
				'origin' => $this->session->userdata('kabupaten_user'),
				'kota' => $kab
				);

		$getongkir = $this->user_model->get_where('t_ongkir', $ongkir);
		if ($getongkir->num_rows() > 0){

			foreach($getongkir->result() as $go){
			echo "<tr>";
			echo "<td style='text-align:center'><input value='$go->harga' name='ongkir' type='radio'></input></td>";
			echo "<td style='text-align:center'>$go->kecamatan</input></td>";
			echo "<td style='text-align:center'>$go->jenis_layanan</input></td>";
			echo "<td style='text-align:center'>$go->harga</input></td>";
			echo "<td style='text-align:center'>$go->estimasi</td>";
			echo "</tr>";
			}
		}else{

			echo "<td colspan='5' style='text-align:center'>Data Belum Tersedia!</td>";
		}
		
	}


	function cek_login()
	{ 
		if (!$this->session->userdata('login_user'))
		{
			redirect('login/login_user/');
		} 
	}

}
