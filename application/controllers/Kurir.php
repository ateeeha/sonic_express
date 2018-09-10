<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('kurir_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['data'] = $this->kurir_model->get_all('t_user');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->kurir('kurir/manage_user', $data);
	}
	
	function transaksi()
	{
		$this->cek_login();

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Transaksi';
		$this->template->kurir('kurir/form_transaksi', $data);
	}

	function transaksi_simpan() //belum fix
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
			$this->form_validation->set_rules('email','Email','required|valid_email');


			if ($this->form_validation->run() == TRUE)
			{
				$email = $this->input->post('email', TRUE);
				$cek = $this->kurir_model->get_where('t_user', array('email' => $email));

				if ($cek->num_rows() > 0)
				{
					$user = $cek->row();

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
					'tgl_pengiriman' => date("Y-m-d"), 
					'id_user' => $user->id_user, 
					'no_resi' => 'RES'.date("dmYgis").$user->id_user, 

					'berat' => $this->input->post('berat'),
					'panjang' => $this->input->post('panjang'),
					'lebar' => $this->input->post('lebar'),
					'tinggi' => $this->input->post('tinggi'),
					'ongkir' => $this->input->post('ongkir'),
					'total_biaya' => $total_biaya,

					'nama' => $this->input->post('nama', TRUE), 
					'alamat' => $this->input->post('alamat', TRUE), 
					'kode_pos' => $this->input->post('kode_pos', TRUE), 
					'no_tlp' => $this->input->post('no_tlp', TRUE), 
					'kurir_penjemput' => $this->session->userdata('id_kurir'),
					'status_transaksi' => 'Diterima'
					);

					$this->kurir_model->insert('t_transaksi', $data);
					$this->session->set_flashdata('success','Data berhasil disimpan !');
				}else{
					$this->session->set_flashdata('alert','email tidak terdaftar !');
				}
			
			} 
		}
		redirect('kurir/transaksi/');
	}

	public function paket_user()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'menunggu'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketuser'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->kurir('kurir/paket_menunggu', $data);
	}

	public function paket_agen()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten_tujuan' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'diterima',
				'kurir_pengantar' => ''
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paket_agen'] = 'active';
		$data['header'] = 'Manage Paket Agen';
		$this->template->kurir('kurir/paket_agen', $data);
	}

	public function paket_dijemput()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'dijemput',
				'kurir_penjemput' => $this->session->userdata('id_kurir')
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_dijemput'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/paket_dijemput', $data);
	}

	public function paket_diterima()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'diterima'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_diterima'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/paket_diterima', $data);
	}

	public function paket_diantar()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten_tujuan' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'diterima',
				'kurir_pengantar' => $this->session->userdata('id_kurir')
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_diantar'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/paket_diantar', $data);
	}

	public function paket_selesai()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten_tujuan' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'selesai',
				'kurir_pengantar' => $this->session->userdata('id_kurir')
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_selesai'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/paket_selesai', $data);
	}

	public function ambil_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);
		$status = 'Dijemput';

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Dijemput Kurir'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['kurir_penjemput' => $this->session->userdata('id_kurir')],
			['no_resi' => $this->uri->segment(3)]
			);
		$this->kurir_model->update('t_transaksi', ['status_transaksi' => $status], ['no_resi' => $this->uri->segment(3)]);

		redirect('kurir/paket_user/');

	}

	public function terima_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);
		$status = 'Diterima';

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Kurir'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update('t_transaksi', ['status_transaksi' => $status], ['no_resi' => $this->uri->segment(3)]);

		redirect('kurir/paket_dijemput/');

	}

	public function kirim_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diantar Kurir ke Alamat Tujuan'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['kurir_pengantar' => $this->session->userdata('id_kurir')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('kurir/paket_diantar/');

	}

	public function konfirmasi_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);
		$status = 'selesai';
		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Paket Diterima'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['status_transaksi' => $status],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('kurir/paket_diantar/');

	}

	public function tolak_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);
		$status = 'Ditolak';

		$this->kurir_model->update('t_transaksi', ['status_transaksi' => $status], ['no_resi' => $this->uri->segment(3)]);

		redirect('kurir/paket_dijemput/');

	}

	public function add_user()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('pass1','Password','required');
			$this->form_validation->set_rules('pass2','Ketik Ulang Password','required|matches[pass1]');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'username' => $this->input->post('username', TRUE), 
				'email' => $this->input->post('email', TRUE), 
				'provinsi' => $this->input->post('provinsi', TRUE), 
				'kabupaten' => $this->input->post('kabupaten', TRUE),
				'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'status_user' => 2
				);

				$this->kurir_model->insert('t_user', $data);
				
				redirect('kurir/');
			} 
		}
		$data['data'] = $this->kurir_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Add User';	
		$this->template->kurir('kurir/add_user', $data);
	}

	public function edit_user()
	{
		$this->cek_login();

		$id_user = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_user' => $this->input->post('status', TRUE)
				);
				
				$this->kurir_model->update('t_user', $data, array('id_user' => $id_user));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');
				
			}
		}

		$user = $this->kurir_model->get_where('t_user', array('id_user' => $id_user));

		foreach ($user->result() as $key) {
			
			$data['id_user'] = $key->id_user;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_user'] = $key->status_user;

		}
		$data['data'] = $this->kurir_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->kurir('kurir/edit_user', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_kurir')) 
		{
			redirect('login/login_kurir/');
		} 
	}
}
