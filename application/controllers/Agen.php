<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('agen_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['active_home'] = 'active';
		$data['header'] = 'Dashboard';
		$this->template->agen('agen/home', $data);
	}

	public function paket_kurir() //fitur dari dp
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				
				'status_transaksi' => 'diterima'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketkurir'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/paket_kurir', $data);
	}

	public function terima_paketkurir()//fitur dari dp
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Agen Kota Asal'
		);

		$this->agen_model->insert('t_tracking', $data);
		$this->agen_model->update(
			't_transaksi', 
			['agen_asal' => $this->session->userdata('id_agen')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('agen/paket_kurir/');
	}

	public function diterima_darikurir()//fitur dari dp
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(

				'agen_asal' => $this->session->userdata('id_agen'),
				));
		
		$data['droppoint'] = $this->agen_model->get_all('t_dp');


		$data['active_terimakurir'] = 'active';
		$data['header'] = 'Manage Paket Diterima';
		$this->template->agen('agen/diterima_darikurir', $data);
	}

	public function jemput_paket()//belum fix
	{
		$this->cek_login();
		
		$resi 		= $this->input->post('no_resi');
		$dp_tujuan	= $this->input->post('dp_tujuan');

		if (isset($_POST['submit']))
		{
			$transaksiagen = array(
				'id_dp' => $dp_tujuan,
				'status_tagen' => 'baru'
			);
			$id_transaksiagen = $this->agen_model->insert_id('t_transaksiagen', $transaksiagen);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Diproses Agen Kota Asal'
				);

			
				$this->agen_model->insert('t_tracking', $tracking);				

				$transaksiagendetail = array(
					'no_resi' => $res, 
					'id_transaksiagen' => $id_transaksiagen 
				);

				$this->agen_model->insert('t_transaksiagendetail', $transaksiagendetail);
    		}

	    }
		redirect('agen/diterima_darikurir/');
	}

	public function paket_dp() //fitur dari kurir
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				'agen_tujuan' => $this->session->userdata('id_agen'),
				'status_transaksi' => 'diterima'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketdp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/paket_dp', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_agen'))
		{
			redirect('login/login_agen/');
		} 
	}

}