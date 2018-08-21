<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Droppoint extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('dp_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['data'] = $this->dp_model->get_all('t_kurir');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';
		$this->template->dp('droppoint/manage_kurir', $data);
	}

	public function kurir()
	{
		$this->cek_login();

		$data['data'] = $this->dp_model->get_all('t_kurir');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';
		$this->template->dp('droppoint/manage_kurir', $data);
	}

	public function add_kurir()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('pass1','Password','required');
			$this->form_validation->set_rules('pass2','Ketik Ulang Password','required|matches[pass1]');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'username' => $this->input->post('username', TRUE), 
				'email' => $this->input->post('email', TRUE), 
				'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'status' => 2
				);

				$this->dp_model->insert('t_kurir', $data);
				
				redirect('index.php/droppoint/kurir/');
			} 
		}

		$data['active_kurir'] = 'active';
		$data['header'] = 'Add Kurir';	
		$this->template->dp('droppoint/add_kurir', $data);
	}

	public function del_kurir()
	{
		$this->cek_login();

		$cond['id_kurir'] = $this->uri->segment(3);

		$this->dp_model->delete('t_kurir', $cond);

		redirect('index.php/droppoint/kurir/');
	}

	public function paket_kurir()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_dp'),
				'dp_asal' => '',
				'status_transaksi' => 'diterima'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketkurir'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/paket_kurir', $data);
	}

	public function paket_dp()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'kabupaten_tujuan' => $this->session->userdata('kabupaten_dp'),
				'status_transaksi' => 'diterima',
				'status_dp' => 'Sudah Dikirim',
				'dp_tujuan' => ''
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketdp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/paket_dp', $data);
	}

	public function diterima_darikurir()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_dp'),
				'dp_asal' => $this->session->userdata('id_dp'),
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_terimakurir'] = 'active';
		$data['header'] = 'Manage Paket Diterima';
		$this->template->dp('droppoint/diterima_darikurir', $data);
	}

	public function diterima_daridp()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'kabupaten_tujuan' => $this->session->userdata('kabupaten_dp'),
				'dp_tujuan' => $this->session->userdata('id_dp'),
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_terimadp'] = 'active';
		$data['header'] = 'Manage Paket Diterima';
		$this->template->dp('droppoint/diterima_daridp', $data);
	}

	public function terima_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Drop Point Kota Asal'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['dp_asal' => $this->session->userdata('id_dp')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('droppoint/paket_kurir/');
	}

	public function kirim_paket()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Dikirim ke Drop Point Kota Tujuan'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['status_dp' => 'Sudah Dikirim'],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('droppoint/diterima_darikurir/');
	}

	public function kirim_banyakdarikurir()
	{
		$this->cek_login();
		
		if (isset($_POST['submit']))
		{
	     // $where = implode(",", $this->input->post('id_user'));
	      	
	         $this->dp_model->update_multiple(
	         	't_transaksi', 
	         	['dp_kirim'=> 'Sudah Dikirim'], 
	         	$this->input->post('id_transaksi')
	         );

	      }
			
		redirect('droppoint/diterima_darikurir/');
	}

	public function kirim_banyakdaridp()
	{
		$this->cek_login();
		
		if (isset($_POST['submit']))
		{
	     // $where = implode(",", $this->input->post('id_user'));
	      	
	         $this->dp_model->update_multiple(
	         	't_transaksi', 
	         	['dp_kirim'=> 'Sudah Dikirim'], 
	         	$this->input->post('id_transaksi')
	         );

	      }
			
		redirect('droppoint/diterima_daridp/');
	}

	public function terima_paketdp()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Drop Point Kota Tujuan'
		);

		$this->kurir_model->insert('t_tracking', $data);
		$this->kurir_model->update(
			't_transaksi', 
			['dp_tujuan' => $this->session->userdata('id_dp')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('droppoint/paket_dp/');
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_dp')) 
		{
			redirect('index.php/login/login_dp/');
		} 
	}
}
