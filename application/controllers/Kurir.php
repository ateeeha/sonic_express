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
		$data['active_home'] = 'active';
		$data['header'] = 'Home';

		$this->template->kurir('kurir/home', $data);
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

		$provinsi = array('provinsi' => $this->session->userdata('provinsi_kurir') );

		$data['agen'] = $this->kurir_model->get_where('t_agen',$provinsi);

		$data['active_diterima'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/paket_diterima', $data);
	}

	public function multi_kirim_paket_ke_agen()
	{
		$this->cek_login();
		
		$resi 		= $this->input->post('no_resi');
		$agen_asal	= $this->input->post('agen_asal');

		if (isset($_POST['submit']))
		{

			foreach ($resi as $res)
			{ 

				$transaksi = array(
					'agen_asal' => $agen_asal,
				);

				$this->kurir_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);              
    		}

	    }
		redirect('kurir/paket_diterima/');
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

		$tracking = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Kurir'
		);

		$transaksi = array(
			'status_transaksi' => 'Diterima', 
			'agen_asal' => $this->session->userdata('agen_kurir')
		);


		$this->kurir_model->insert('t_tracking', $tracking);
		$this->kurir_model->update('t_transaksi', $transaksi, ['no_resi' => $this->uri->segment(3)]);

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

	function cek_login()
	{
		if (!$this->session->userdata('login_kurir')) 
		{
			redirect('login/login_kurir/');
		} 
	}
}
