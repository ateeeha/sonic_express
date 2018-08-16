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

	public function transaksi()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->kurir_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_kurir'),
				'status_transaksi' => 'menunggu'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->kurir('kurir/transaksi_menunggu', $data);
	}

	public function transaksi_dijemput()
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
		$this->template->kurir('kurir/transaksi_dijemput', $data);
	}

	public function transaksi_diterima()
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
		$this->template->kurir('kurir/transaksi_diterima', $data);
	}

	public function ambil_transaksi()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);
		$status = 'dijemput';

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status' => 'kurir1'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['kurir_penjemput' => $this->session->userdata('id_kurir')],
			['no_resi' => $this->uri->segment(3)]
			);
		$this->kurir_model->update('t_transaksi', ['status_transaksi' => $status], ['no_resi' => $this->uri->segment(3)]);

		redirect('kurir/transaksi/');

	}

	function cek_login()
	{
		if (!$this->session->userdata('login_kurir')) 
		{
			redirect('index.php/login/login_kurir/');
		} 
	}
}
