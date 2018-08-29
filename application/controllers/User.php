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
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|numeric');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'nama' => $this->input->post('nama', TRUE), 
				'provinsi_tujuan' => $this->input->post('provinsi', TRUE), 
				'kabupaten_tujuan' => $this->input->post('kabupaten', TRUE), 
				'alamat' => $this->input->post('alamat', TRUE), 
				'kode_pos' => $this->input->post('kode_pos', TRUE), 
				'no_tlp' => $this->input->post('no_tlp', TRUE), 
				'tgl_pengiriman' => date("Y-m-d"), 
				'id_user' => $this->session->userdata('id_user'), 
				'no_resi' => 'RES'.date("dmYgis").$this->session->userdata('id_user'), 
				'status_transaksi' => 'Menunggu'
				);

				$this->user_model->insert('t_transaksi', $data);
				$this->session->set_flashdata('success','Data berhasil disimpan !');
			
			} 
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

		$getongkir = $this->user_model->get_where('t_ongkir', $ongkir)->result();
		foreach($getongkir as $go){
			echo "<td style='text-align:center'>$go->reg</td>";
			echo "<td style='text-align:center'>$go->estimasi_reg</td>";
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
