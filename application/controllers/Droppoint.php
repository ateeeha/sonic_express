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
				'status' => 2
				);

				$this->dp_model->insert('t_kurir', $data);
				
				redirect('droppoint/kurir/');
			} 
		}
		$data['data'] = $this->dp_model->get_all('t_provinsi');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Add Kurir';	
		$this->template->dp('droppoint/add_kurir', $data);
	}

	public function edit_kurir()
	{
		$this->cek_login();

		$id_kurir = $this->uri->segment(3);

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
					'status_kurir' => $this->input->post('status', TRUE)
				);
				
				$this->dp_model->update('t_kurir', $data, array('id_kurir' => $id_kurir));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');
				
			}
		}

		$kurir = $this->dp_model->get_where('t_kurir', array('id_kurir' => $id_kurir));

		foreach ($kurir->result() as $key) {
			
			$data['id_kurir'] = $key->id_kurir;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_kurir'] = $key->status_kurir;

		}
		$data['data'] = $this->dp_model->get_all('t_provinsi');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';

		$this->template->dp('droppoint/edit_kurir', $data);
	}

	public function del_kurir()
	{
		$this->cek_login();

		$cond['id_kurir'] = $this->uri->segment(3);

		$this->dp_model->delete('t_kurir', $cond);

		redirect('droppoint/kurir/');
	}

	public function paket_kurir()//fitur dipindah ke agen
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
		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_transaksidpdetail tdpdetail 
					ON (t.no_resi = tdpdetail.no_resi)
				JOIN t_transaksidp tdp 
					ON (tdpdetail.id_transaksidp = tdp.id_transaksidp)';

		$where = array(
				// 'kabupaten_tujuan' => $this->session->userdata('kabupaten_dp'),
				// 'status_transaksi' => 'diterima',
				// 'dp_kirim' => 'Sudah Dikirim',
				'tujuan' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_transaksidp', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketdp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/paket_dp', $data);
	}

	public function detail_paketdp()
	{
		$this->cek_login();

		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_transaksidpdetail tdpdetail 
					ON (t.no_resi = tdpdetail.no_resi)
				JOIN t_transaksidp tdp 
					ON (tdpdetail.id_transaksidp = tdp.id_transaksidp)';

		$id_transaksidp['tdp.id_transaksidp'] = $this->uri->segment(3);

		$data['data'] = $this->dp_model->get_where($tabel, $id_transaksidp);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paketdp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/detail_paketdp', $data);
	}

	public function diterima_darikurir()//fitur pindah ke agen
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'kabupaten' => $this->session->userdata('kabupaten_dp'),
				'dp_asal' => $this->session->userdata('id_dp'),
				));
		$dp_tujuan = $this->session->userdata('id_dp');
		$data['droppoint'] = $this->dp_model->get_where('t_dp',['id_dp !='=> $dp_tujuan]);


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

	/**
	 * function kirim_paket belum fix
	 */
	public function kirim_paket()
	{
		$this->cek_login();

		$no_resi = $this->input->post('no_resi');
		$dp_tujuan = $this->input->post('dp_tujuan');
	
		if ($this->input->post('submit') == 'Submit')
		{
		//validasi
			$this->form_validation->set_rules('dp_tujuan','Dp Tujuan','required');

			if ($this->form_validation->run() == TRUE)
			{
				$transaksi = array(
					'dp_tujuan' => $dp_tujuan,
					'dp_kirim' => 'Sudah Dikirim' 
				);

				$tracking = array(
					'no_resi' => $no_resi, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Dikirim ke Drop Point Kota Tujuan'
				);

				$transaksidp = array(
					'dp_asal' => $this->session->userdata('id_dp'), 
					'dp_tujuan' => $dp_tujuan,
					'tgl_kirim' =>  date("Y-m-d"),
					'tgl_sampai' => ''
				);


				$this->dp_model->update('t_transaksi', $transaksi, ['no_resi'=>$no_resi]);

				$this->dp_model->insert('t_tracking', $tracking);

				$this->dp_model->insert('t_transaksidp', $transaksidp);

				

				redirect('droppoint/diterima_darikurir/');
			} 

		redirect('droppoint/kurir/');
		}
		redirect('droppoint/paket_dp/');

	}

	public function kirim_banyakdarikurir()
	{
		$this->cek_login();
		
		$resi 		= $this->input->post('no_resi');
		$dp_tujuan	= $this->input->post('dp_tujuan');

		if (isset($_POST['submit']))
		{
			$transaksidp = array(
				'dp_asal' => $this->session->userdata('id_dp'), 
				'dp_tujuan' => $dp_tujuan,
				'tgl_kirim' =>  date("Y-m-d"),
				'tgl_sampai' => '',
				'status_tdp' => 'proses'
			);
			$id_transaksidp = $this->dp_model->insert_id('t_transaksidp', $transaksidp);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Dikirim ke Drop Point Kota Tujuan'
				);

				$transaksi = array(
					'dp_tujuan' => $dp_tujuan,
					'dp_kirim' => 'Sudah Dikirim' 
				);

				$this->dp_model->insert('t_tracking', $tracking);
				$this->dp_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);              
				

				$transaksidpdetail = array(
					'no_resi' => $res, 
					'id_transaksidp' => $id_transaksidp 
				);

				$this->dp_model->insert('t_transaksidpdetail', $transaksidpdetail);
    		}

	    }
		redirect('droppoint/diterima_darikurir/');
	}

	public function terima_paketkurir()//fitur pindah ke agen
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d"), 
			'status_tracking' => 'Diterima Drop Point Kota Asal'
		);

		$this->dp_model->insert('t_tracking', $data);
		$this->dp_model->update(
			't_transaksi', 
			['dp_asal' => $this->session->userdata('id_dp')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('droppoint/paket_kurir/');
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

		$this->dp_model->insert('t_tracking', $data);
		$this->dp_model->update(
			't_transaksi', 
			['dp_tujuan' => $this->session->userdata('id_dp')],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('droppoint/paket_dp/');
	}

	public function terima_banyakdarikurir()
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

	public function terima_banyakdaridp()
	{
		$this->cek_login();

		$resi = $this->input->post('no_resi');
		$id_transaksidp = $this->input->post('id_transaksidp');

		if (isset($_POST['submit']))
		{

			$transaksidp = array(
					'tgl_sampai' => date("Y-m-d"),
					'status_tdp' => 'selesai'
			);
			$this->dp_model->update('t_transaksidp', $transaksidp, ['id_transaksidp' => $id_transaksidp]); 

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Diterima Drop Point Kota Tujuan'
				);

				$this->dp_model->insert('t_tracking', $tracking);
			
			}

	    }
			
		redirect('droppoint/paket_dp/');
	}

	public function manage_paket()
	{
		$this->cek_login();
		$no_resi = $this->uri->segment(3);

		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->dp_model->get_where($join, 
			array(
				'no_resi' => $no_resi
				));


		// $data['data'] = $this->dp_model->get_all('t_dp');

		$data['droppoint'] = $this->dp_model->get_all('t_dp');

		$data['active_terimakurir'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/manage_paket', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_dp')) 
		{
			redirect('login/login_dp/');
		} 
	}
}
