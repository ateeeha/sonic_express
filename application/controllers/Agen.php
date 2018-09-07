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
				'status_transaksi' => 'diterima',
				'agen_asal' => ''
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paket_kurir'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/paket_kurir', $data);
	}

	public function terima_paket_kurir()
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

	public function multi_terima_paket_kurir()//blm fix
	{
		$this->cek_login();

		$resi = $this->input->post('no_resi');

		if (isset($_POST['submit']))
		{

			foreach ($resi as $res)
			{ 
		        
				$data = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Diterima Drop Point Kota Asal'
				);

				$this->dp_model->insert('t_tracking', $data);
				$this->dp_model->update(
					't_transaksi', 
					['dp_asal' => $this->session->userdata('id_dp')],
					['no_resi' => $res]
					);              
    		}

	    }
			
		redirect('droppoint/paket_kurir/');
	}

	public function list_paket_kurir()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				'dp_jemput' => 'belum',
				'agen_asal' => $this->session->userdata('id_agen')
				));

		$data['active_list_paket_kurir'] = 'active';
		$data['header'] = 'Manage Paket Diterima';
		$this->template->agen('agen/list_paket_kurir', $data);
	}

	public function minta_jemput_paket()//belum fix
	{
		$this->cek_login();
		
		$resi 	= $this->input->post('no_resi');
		$id_dp	= $this->input->post('id_dp');

		if (isset($_POST['submit']))
		{
			$transaksiagen = array(
				'id_dp' => $id_dp,
				'id_agen' => $this->session->userdata('id_agen'),
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

				$transaksi = array(
					'dp_jemput' => 'proses' 
				);

				$this->agen_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);

				$this->agen_model->insert('t_tracking', $tracking);				

				$transaksiagendetail = array(
					'no_resi' => $res, 
					'id_transaksiagen' => $id_transaksiagen 
				);

				$this->agen_model->insert('t_transaksiagendetail', $transaksiagendetail);
    		}

	    }
		redirect('agen/list_paket_kurir/');
	}

	public function list_jemput_paket()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_where('t_transaksiagen', array('id_agen' => $this->session->userdata('id_agen')));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_list_jemput_paket'] = 'active';
		$data['header'] = 'Manage List Jemput Paket';
		$this->template->agen('agen/list_jemput_paket', $data);
	}

	public function detail_penjemputan()
	{
		$this->cek_login();

		$tabel = 't_transaksiagen ta 
				JOIN t_transaksiagendetail tad 
					ON (ta.id_transaksiagen = tad.id_transaksiagen)
				JOIN t_transaksi t 
					ON (tad.no_resi = t.no_resi)';

		$id_transaksiagen['ta.id_transaksiagen'] = $this->uri->segment(3);

		$data['data'] = $this->agen_model->get_where($tabel, $id_transaksiagen);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_list_jemput_paket'] = 'active';
		$data['header'] = 'Detail List Penjemputan';
		$this->template->agen('agen/detail_penjemputan', $data);
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