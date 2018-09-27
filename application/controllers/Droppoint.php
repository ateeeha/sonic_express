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

		$data['active_home'] = 'active';
		$data['header'] = 'Home';
		$this->template->dp('droppoint/home', $data);
	}

	public function agen()
	{
		$this->cek_login();

		$id_dp['id_dp'] = $this->session->userdata('id_dp'); 
		$data['data'] = $this->dp_model->get_where('t_agen', $id_dp);

		$data['active_agen'] = 'active';
		$data['header'] = 'Manage Agen';
		$this->template->dp('droppoint/manage_agen', $data);
	}

	public function paket_agen()
	{
		$this->cek_login();

		//$tabel = 't_agen_dp ta tabel t_agen_dp_detail tad ON (ta.id_agen_dp = tad.id_agen_dp)';

		$data['data'] = $this->dp_model->get_where('t_agen_dp', 
			array(
				'status_agen_dp' => 'baru',
				'id_dp' => $this->session->userdata('id_dp'),
				));
 
		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_agen'] = 'active';
		$data['active_paket_agen'] = 'active';
		$data['header'] = 'Paket agen';
		$this->template->dp('droppoint/paket_agen', $data);
	}

	public function list_penjemputan()
	{
		$this->cek_login();
		$data['data'] = $this->dp_model->get_where('t_agen_dp', 
			array(
				'id_dp' => $this->session->userdata('id_dp'),
				'status_agen_dp' => 'proses'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_agen'] = 'active';
		$data['active_list_penjemputan'] = 'active';
		$data['header'] = 'List Penjemputan';
		$this->template->dp('droppoint/list_penjemputan', $data);
	}

	public function proses_penjemputan()
	{
		$this->cek_login();

		$id_agen_dp = $this->uri->segment(3);

		//$tabel = 't_agen_dp tad JOIN t_agen_dp_detail tadd ON (tad.id_agen_dp = tadd.id_agen_dp)';

		$this->dp_model->update(
			't_agen_dp', 
			['status_agen_dp' => 'proses'],
			['no_resi' => $id_agen_dp]
			);

		redirect('droppoint/paket_agen/');
	}

	public function multi_proses_penjemputan()
	{
		$this->cek_login();

		$id_agen_dp = $this->input->post('id_agen_dp');

		//$tabel = 't_agen_dp tad JOIN t_agen_dp_detail tadd ON (tad.id_agen_dp = tadd.id_agen_dp)';

		if ($this->input->post('submit') == 'Proses') 
		{
			foreach ($id_agen_dp as $id)
			{ 
		        
		        $this->dp_model->update('t_agen_dp', 
					['status_agen_dp' => 'proses'],
					['id_agen_dp' => $id]
				);

			}
			$this->session->set_flashdata('success','Berhasil Diproses !');
	    }
		redirect('droppoint/paket_agen/');
	}

	public function konfirmasi_penjemputan()
	{
		$this->cek_login();

		$resi = $this->input->post('no_resi');
		$id_agen_dp['id_agen_dp'] = $this->input->post('id_agen_dp');

		if ($this->input->post('submit') == 'Konfirmasi')
		{
			
			$agen_dp = array(
				'tgl_sampai' => date("Y-m-d H:i:s"), 
				'status_agen_dp' => 'selesai'
			);

			$this->dp_model->update('t_agen_dp', $agen_dp, $id_agen_dp); 

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Diterima Drop Point Kota Asal'
				);

				$transaksi = array(
					'dp_asal' => $this->session->userdata('id_dp'),
					'dp_jemput' => 'selesai' 
				);

				$this->dp_model->insert('t_tracking', $tracking);
		        $this->dp_model->update('t_transaksi', $transaksi, ['no_resi' => $res]); 
    		}

	    }
			
		redirect('droppoint/list_penjemputan/');
	}

	public function detail_penjemputan()
	{
		$this->cek_login();

		$tabel = 't_agen_dp tad 
				JOIN t_agen_dp_detail tadd 
					ON (tad.id_agen_dp = tadd.id_agen_dp)
				JOIN t_transaksi t 
					ON (tadd.no_resi = t.no_resi)';

		$id_agen_dp['tad.id_agen_dp'] = $this->uri->segment(3);

		$data['data'] = $this->dp_model->get_where($tabel, $id_agen_dp);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');
		$data['active_menu_agen'] = 'active';
		$data['active_list_penjemputan'] = 'active';
		$data['header'] = 'Manage List Penjemputan';
		$this->template->dp('droppoint/detail_penjemputan', $data);
	}

	public function detail_paket_agen()
	{
		$this->cek_login();

		$tabel = 't_agen_dp tad 
				JOIN t_agen_dp_detail tadd 
					ON (tad.id_agen_dp = tadd.id_agen_dp)
				JOIN t_transaksi t 
					ON (tadd.no_resi = t.no_resi)';

		$id_agen_dp['tad.id_agen_dp'] = $this->uri->segment(3);

		$data['data'] = $this->dp_model->get_where($tabel, $id_agen_dp);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');
		$data['active_menu_agen'] = 'active';
		$data['active_paket_agen'] = 'active';
		$data['header'] = 'Detail Paket Agen';
		$this->template->dp('droppoint/detail_paket_agen', $data);
	}

	public function list_paket_agen()
	{
		$this->cek_login();

		$tabel = 't_transaksi t JOIN t_agen ta ON(t.agen_asal = ta.id_agen)';

		$data['data'] = $this->dp_model->get_where($tabel, 
			array(
				'dp_asal' => $this->session->userdata('id_dp'),
				'id_dp' => $this->session->userdata('id_dp'),
				'status_dp' => 'Baru'
				));

		$data['droppoint'] = $this->dp_model->get_where('t_dp',['id_dp !=' => $this->session->userdata('id_dp')]);

		$data['active_menu_agen'] = 'active';
		$data['active_list_paket_agen'] = 'active';
		$data['header'] = 'List Paket agen';
		$this->template->dp('droppoint/list_paket_agen', $data);
	}

	public function list_paket_dp()
	{
		$this->cek_login();
		// $tabel = 't_transaksi t JOIN t_user u 
		// 			ON (t.id_user = u.id_user) 
		// 		JOIN t_transaksidpdetail tdpdetail 
		// 			ON (t.no_resi = tdpdetail.no_resi)
		// 		JOIN t_transaksidp tdp 
		// 			ON (tdpdetail.id_transaksidp = tdp.id_transaksidp)';

		$where = array(
				// 'kabupaten_tujuan' => $this->session->userdata('kabupaten_dp'),
				// 'status_transaksi' => 'diterima',
				'dp_tujuan' => $this->session->userdata('id_dp'),
				'agen_tujuan' => 0

				);

		$data['data'] = $this->dp_model->get_where('t_transaksi', $where);

		$data['agen'] = $this->dp_model->get_where('t_agen',['id_dp'=>$this->session->userdata('id_dp')]);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_list_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/list_paket_dp', $data);
	}

	public function list_transaksi_dp_kirim()
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
				// 'status_dp' => 'Sudah Dikirim',
				'asal' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_dp_dp', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_agen'] = 'active';
		$data['active_list_paket_agen'] = 'active';
		$data['header'] = 'List Transaksi DP';
		$this->template->dp('droppoint/list_transaksi_dp_kirim', $data);
	}

	public function list_transaksi_dp_terima()
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
				// 'status_dp' => 'Sudah Dikirim',
				'tujuan' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_dp_dp', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'List Transaksi DP';
		$this->template->dp('droppoint/list_transaksi_dp_terima', $data);
	}

	public function riwayat_dp_agen()
	{
		$this->cek_login();

		$where = array(
				'asal' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_dp_agen', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_list_paket_dp'] = 'active';
		$data['header'] = 'Riwayat Transaksi Agen DP';
		$this->template->dp('droppoint/riwayat_dp_agen', $data);
	}

	public function list_transaksi_agen()
	{
		$this->cek_login();
		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_transaksidpagendetail tdad 
					ON (t.no_resi = tdad.no_resi)
				JOIN t_transaksidpagen tda 
					ON (tdad.id_transaksidpagen = tda.id_transaksidpagen)';

		$where = array(
				// 'kabupaten_tujuan' => $this->session->userdata('kabupaten_dp'),
				// 'status_transaksi' => 'diterima',
				// 'status_dp' => 'Sudah Dikirim',
				'id_dp' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_agen_dp', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_agen'] = 'active';
		$data['active_list_paket_agen'] = 'active';
		$data['header'] = 'Riwayat Transaksi Agen DP';
		$this->template->dp('droppoint/list_transaksi_agen', $data);
	}

	public function kirim_paket_agen()
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
					'status_dp' => 'Proses' 
				);

				$tracking = array(
					'no_resi' => $no_resi, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Dikirim ke Drop Point Kota Tujuan'
				);

				$transaksidp = array(
					'dp_asal' => $this->session->userdata('id_dp'), 
					'dp_tujuan' => $dp_tujuan,
					'tgl_kirim' =>  date("Y-m-d H:i:s"),
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

	public function multi_kirim_paket_agen()
	{
		$this->cek_login();
		
		$resi 		= $this->input->post('no_resi');
		$dp_tujuan	= $this->input->post('dp_tujuan');

		if ($this->input->post('submit') == 'Kirim')
		{
			$dp_dp = array(
				'asal' => $this->session->userdata('id_dp'), 
				'tujuan' => $dp_tujuan,
				'tgl_kirim' =>  date("Y-m-d H:i:s"),
				'tgl_sampai' => '',
				'status_dp_dp' => 'proses'
			);
			$id_dp_dp = $this->dp_model->insert_id('t_dp_dp', $dp_dp);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Dikirim ke Drop Point Kota Tujuan'
				);

				$transaksi = array(
					'dp_tujuan' => $dp_tujuan,
					'status_dp' => 'Proses' 
				);

				$this->dp_model->insert('t_tracking', $tracking);
				$this->dp_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);              
				

				$dp_dp_detail = array(
					'no_resi' => $res, 
					'id_dp_dp' => $id_dp_dp 
				);

				$this->dp_model->insert('t_dp_dp_detail', $dp_dp_detail);
    		}
    		$this->session->set_flashdata('success','Berhasil DiKirim !');

	    }
		redirect('droppoint/list_paket_agen/');
	}

	public function multi_kirim_paket_dp()
	{
		$this->cek_login();
		
		$resi 		= $this->input->post('no_resi');
		$agen_tujuan= $this->input->post('agen_tujuan');

		if (isset($_POST['submit']))
		{
			$dp_agen = array(
				'asal' => $this->session->userdata('id_dp'), 
				'tujuan' => $agen_tujuan,
				'tgl_kirim' =>  date("Y-m-d H:i:s"),
				'tgl_sampai' => '',
				'status_dp_agen' => 'Proses'
			);
			$id_dp_agen = $this->dp_model->insert_id('t_dp_agen', $dp_agen);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Dikirim ke Agen Kota Tujuan'
				);

				$transaksi = array(
					'agen_tujuan' => $agen_tujuan,
				);

				$this->dp_model->insert('t_tracking', $tracking);
				$this->dp_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);              
				

				$dp_agen_detail = array(
					'no_resi' => $res, 
					'id_dp_agen' => $id_dp_agen 
				);

				$this->dp_model->insert('t_dp_agen_detail', $dp_agen_detail);
    		}
    		$this->session->set_flashdata('success','Berhasil DiKirim !');

	    }
		redirect('droppoint/list_paket_dp/');
	}

	public function add_agen()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('id_dp','Id Droppoint','required');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('pass1','Password','required');
			$this->form_validation->set_rules('pass2','Ketik Ulang Password','required|matches[pass1]');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'id_dp' => $this->input->post('id_dp', TRUE), 
				'username' => $this->input->post('username', TRUE), 
				'email' => $this->input->post('email', TRUE), 
				'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
				'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'status_agen' => 1
				);

				$this->dp_model->insert('t_agen', $data);
				
				redirect('droppoint/agen/');
			} 
		}
		$data['provinsi'] = $this->dp_model->get_all('t_provinsi');
		$data['id_dp'] = $this->session->userdata('id_dp');

		$data['active_agen'] = 'active';
		$data['header'] = 'Add Agen';	
		$this->template->dp('droppoint/add_agen', $data);
	}

	public function edit_agen()
	{
		$this->cek_login();

		$id_agen = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('status_agen', 'Status Agen', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_agen' => $this->input->post('status_agen', TRUE)
				);
				
				$this->dp_model->update('t_agen', $data, array('id_agen' => $id_agen));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				redirect('droppoint/agen');
				
			}
		}

		$kurir = $this->dp_model->get_where('t_agen', array('id_agen' => $id_agen));

		foreach ($kurir->result() as $key) {
			
			$data['id_agenr'] = $key->id_agen;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_agen'] = $key->status_agen;

		}
		$data['data'] = $this->dp_model->get_all('t_provinsi');

		$data['active_agen'] = 'active';
		$data['header'] = 'Manage Agen';

		$this->template->dp('droppoint/edit_agen', $data);
	}

	public function del_kurir()
	{
		$this->cek_login();

		$cond['id_kurir'] = $this->uri->segment(3);

		$this->dp_model->delete('t_kurir', $cond);

		redirect('droppoint/kurir/');
	}	

	public function paket_dp()
	{
		$this->cek_login();
		// $tabel = 't_transaksi t JOIN t_user u 
		// 			ON (t.id_user = u.id_user) 
		// 		JOIN t_transaksidpdetail tdpdetail 
		// 			ON (t.no_resi = tdpdetail.no_resi)
		// 		JOIN t_transaksidp tdp 
		// 			ON (tdpdetail.id_transaksidp = tdp.id_transaksidp)';
		// $tabel = 't_transaksidp tdp JOIN t_transaksidpdetail tdpdetail
		// 			ON (tdp.id_transaksidp = tdpdetail.id_transaksidp)';

		$where = array(
				'status_dp_dp' => 'proses',
				'tujuan' => $this->session->userdata('id_dp')
				);

		$data['data'] = $this->dp_model->get_where('t_dp_dp', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->dp('droppoint/paket_dp', $data);
	}

	public function detail_paket_dp()
	{
		$this->cek_login();

		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_dp_dp_detail tddd 
					ON (t.no_resi = tddd.no_resi)
				JOIN t_dp_dp tdd 
					ON (tddd.id_dp_dp = tdd.id_dp_dp)';

		//$id_dp_dp['tdd.id_dp_dp'] = $this->uri->segment(3);

		$transaksi = array(
			'tdd.id_dp_dp' => $this->uri->segment(3), 
			'status_dp' => 'proses'
		);

		$data['data'] = $this->dp_model->get_where($tabel, $transaksi);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');
		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Detail Paket Dp';
		$this->template->dp('droppoint/detail_paket_dp', $data);
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

	public function terima_paketdp()
	{
		$this->cek_login();

		$no_resi = $this->uri->segment(3);

		$data = array(
			'no_resi' => $no_resi, 
			'tanggal' => date("Y-m-d H:i:s"), 
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

	public function multi_terima_paket_dp()
	{
		$this->cek_login();

		$resi = $this->input->post('no_resi');
		$id_dp_dp = $this->input->post('id_dp_dp');

		if ($this->input->post('submit') == 'Konfirmasi')
		{

			$dp_dp = array(
					'tgl_sampai' => date("Y-m-d H:i:s"),
					'status_dp_dp' => 'selesai'
			);
			$this->dp_model->update('t_dp_dp', $dp_dp, ['id_dp_dp' => $id_dp_dp]); 

			foreach ($resi as $res)
			{ 
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Diterima Drop Point Kota Tujuan'
				);

				$this->dp_model->insert('t_tracking', $tracking);
			
			}

	    }
		redirect('droppoint/paket_dp/');
	}

	public function detail_paket()
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
		
		$data['active_menu_agen'] = 'active';
		$data['active_list_paket_agen'] = 'active';
		$data['header'] = 'Detail Paket';
		$this->template->dp('droppoint/detail_paket', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_dp')) 
		{
			redirect('login/login_dp/');
		} 
	}
}
