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
		$data['header'] = 'Beranda';
		$this->template->agen('agen/home', $data);
	}

	function transaksi()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_all('t_provinsi');

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Transaksi';
		$this->template->agen('agen/form_transaksi', $data);
	}

	function simpan_transaksi()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('id_user','Id User','required|numeric');
			$this->form_validation->set_rules('berat','Berat','required|numeric');
			$this->form_validation->set_rules('panjang','Panjang','numeric');
			$this->form_validation->set_rules('lebar','Lebar','numeric');
			$this->form_validation->set_rules('tinggi','Tinggi','numeric');
			$this->form_validation->set_rules('provinsi_tujuan','Provinsi','required');
			$this->form_validation->set_rules('kabupaten_tujuan','Kabupaten','required');
			$this->form_validation->set_rules('kecamatan_tujuan','Kecamatan','required');
			$this->form_validation->set_rules('jenis_layanan','Jenis Layanan','required');
			$this->form_validation->set_rules('total_biaya','Total Harga','required');
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|numeric');

			if ($this->form_validation->run() == TRUE)
			{

				$data = array(
					'agen_asal' => $this->session->userdata('id_agen'),
					
					'id_user' => $this->input->post('id_user'),
					'tgl_pengiriman' => date("Y-m-d H:i:s"), 
					'no_resi' => 'RES'.date("dmYgis").$this->input->post('id_user'), 

					'berat' => $this->input->post('berat'),
					'panjang' => $this->input->post('panjang'),
					'lebar' => $this->input->post('lebar'),
					'tinggi' => $this->input->post('tinggi'),
					'provinsi_tujuan' => $this->input->post('provinsi_tujuan'), 
					'kabupaten_tujuan' => $this->input->post('kabupaten_tujuan'), 
					'kecamatan_tujuan' => $this->input->post('kecamatan_tujuan'), 
					'jenis_layanan' => $this->input->post('jenis_layanan'),
					'total_biaya' => $this->input->post('total_biaya'),

					'nama' => $this->input->post('nama'), 
					'alamat' => $this->input->post('alamat'), 
					'kode_pos' => $this->input->post('kode_pos'), 
					'no_tlp' => $this->input->post('no_tlp'), 
					
					'status_transaksi' => 'Diterima',
					'status_kurir' => 'Selesai',
					'status_dp' => 'Baru'
				);

				$this->agen_model->insert('t_transaksi', $data);
				$this->session->set_flashdata('success','Transaksi berhasil diproses !');
			
			}else{

				$this->session->set_flashdata('alert','Transaksi gagal diproses !');
			} 
		}
		redirect('agen/transaksi/');
	}

	public function user()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_all('t_user');

		$data['active_user'] = 'active';
		$data['header'] = 'Manajemen User';
		$this->template->agen('agen/manage_user', $data);
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

				$this->agen_model->insert('t_user', $data);
				
				redirect('agen/');
			} 
		}
		$data['data'] = $this->agen_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Tambah User';	
		$this->template->agen('agen/add_user', $data);
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
				
				$this->agen_model->update('t_user', $data, array('id_user' => $id_user));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');
				
			}
		}

		$user = $this->agen_model->get_where('t_user', array('id_user' => $id_user));

		foreach ($user->result() as $key) {
			
			$data['id_user'] = $key->id_user;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_user'] = $key->status_user;

		}
		$data['data'] = $this->agen_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->agen('agen/edit_user', $data);
	}

	public function kurir()
	{
		$this->cek_login();

		$id_agen['id_agen'] = $this->session->userdata('id_agen');
		$data['data'] = $this->agen_model->get_where('t_kurir', $id_agen);

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manajemen Kurir';
		$this->template->agen('agen/manage_kurir', $data);
	}

	public function add_kurir()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('id_agen','Id Agen','required');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('pass1','Password','required');
			$this->form_validation->set_rules('pass2','Ketik Ulang Password','required|matches[pass1]');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'id_agen' => $this->input->post('id_agen', TRUE), 
				'username' => $this->input->post('username', TRUE), 
				'email' => $this->input->post('email', TRUE), 
				'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
				'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'status_kurir' => 1
				);

				$this->agen_model->insert('t_kurir', $data);
				
				redirect('agen/kurir/');
			} 
		}
		$data['provinsi'] = $this->agen_model->get_all('t_provinsi');
		$data['id_agen'] = $this->session->userdata('id_agen');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Tambah Kurir';	
		$this->template->agen('agen/add_kurir', $data);
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
			$this->form_validation->set_rules('status_kurir', 'Status Kurir', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_kurir' => $this->input->post('status_kurir', TRUE)
				);
				
				$this->agen_model->update('t_kurir', $data, array('id_kurir' => $id_kurir));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				redirect('agen/kurir');
				
			}
		}

		$kurir = $this->agen_model->get_where('t_kurir', array('id_kurir' => $id_kurir));

		foreach ($kurir->result() as $key) {
			
			$data['id_kurir'] = $key->id_kurir;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_kurir'] = $key->status_kurir;

		}
		$data['data'] = $this->agen_model->get_all('t_provinsi');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';

		$this->template->agen('agen/edit_kurir', $data);
	}

	public function paket_kurir() 
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				'status_transaksi' => 'diterima',
				'agen_asal' => $this->session->userdata('id_agen'),
				'status_kurir' => 'Proses'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_kurir'] = 'active';
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
			'tanggal' => date("Y-m-d H:i:s"), 
			'status_tracking' => 'Diterima Agen Kota Asal'
		);

		$this->agen_model->insert('t_tracking', $data);
		$this->agen_model->update(
			't_transaksi', 
			['status_kurir' => 'Selesai'],
			['no_resi' => $this->uri->segment(3)]
			);

		redirect('agen/paket_kurir/');
	}

	public function multi_terima_paket_kurir()
	{
		$this->cek_login();

		$resi = $this->input->post('no_resi');

		if ($this->input->post('submit') == 'Konfirmasi') 
		{

			foreach ($resi as $res)
			{ 
		        $transaksi = array(
					'status_kurir' => 'Selesai' 
				);

				$this->agen_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);

				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Diterima Agen Kota Asal'
				);
				$this->agen_model->insert('t_tracking', $tracking);

    		}

	    }
			
		redirect('agen/paket_kurir/');
	}

	public function riwayat_paket_kurir()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				'status_transaksi' => 'diterima',
				'agen_asal' => $this->session->userdata('id_agen'),
				'status_kurir' => 'Selesai'
				));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_kurir'] = 'active';
		$data['active_list_paket_kurir'] = 'active';
		$data['header'] = 'Riwayat Paket Kurir';
		$this->template->agen('agen/riwayat_paket_kurir', $data);
	}

	public function multi_terima_paket_dp()
	{
		$this->cek_login();
		
		$resi 				= $this->input->post('no_resi');
		$id_dp_agen = $this->input->post('id_dp_agen');

		if (isset($_POST['submit']))
		{
			$dp_agen = array(
				'tgl_sampai' =>  date("Y-m-d H:i:s"),
				'status_dp_agen' => 'Selesai'
			);
			$this->agen_model->update('t_dp_agen', $dp_agen, ['id_dp_agen' => $id_dp_agen]);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d H:i:s"), 
					'status_tracking' => 'Diterima Agen Kota Tujuan'
				);

				// $transaksi = array(
				// 	'agen_tujuan' => $agen_tujuan,
				// );

				$this->agen_model->insert('t_tracking', $tracking);
				// $this->agen_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);              
				

    		}

	    }
		redirect('agen/paket_dp/');
	}

	public function list_paket_kurir()
	{
		$this->cek_login();
		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->agen_model->get_where($join, 
			array(
				'dp_jemput' => 'belum',
				'agen_asal' => $this->session->userdata('id_agen'),
				'status_kurir' => 'Selesai'
				));

		$data['active_menu_kurir'] = 'active';
		$data['active_list_paket_kurir'] = 'active';
		$data['header'] = 'Manage Paket Diterima';
		$this->template->agen('agen/list_paket_kurir', $data);
	}

	public function minta_jemput_paket()
	{
		$this->cek_login();
		
		$resi 	= $this->input->post('no_resi');
		$id_dp	= $this->input->post('id_dp');

		if ($this->input->post('submit') == 'Jemput') 
		{
			$this->form_validation->set_rules('id_dp', 'Droppoint', "required");
			// $this->form_validation->set_rules('no_resi', 'Paket', "required");

			if ($this->form_validation->run() == TRUE)
			{
				$agen_dp = array(
					'id_dp' => $id_dp,
					'id_agen' => $this->session->userdata('id_agen'),
					'tgl_kirim' => date("Y-m-d H:i:s"), 
					'status_agen_dp' => 'baru'
				);
				$id_agen_dp = $this->agen_model->insert_id('t_agen_dp', $agen_dp);

				foreach ($resi as $res)
				{ 		        
					$tracking = array(
						'no_resi' => $res, 
						'tanggal' => date("Y-m-d H:i:s"), 
						'status_tracking' => 'Diproses Agen Kota Asal'
					);

					$transaksi = array(
						'dp_jemput' => 'proses' 
					);

					$this->agen_model->update('t_transaksi', $transaksi, ['no_resi' => $res]);

					$this->agen_model->insert('t_tracking', $tracking);				

					$agen_dp_detail = array(
						'no_resi' => $res, 
						'id_agen_dp' => $id_agen_dp 
					);

					$this->agen_model->insert('t_agen_dp_detail', $agen_dp_detail);
	    		}
				$this->session->set_flashdata('success','Permintaan Penjemputan Berhasil !');
    		}else{
				$this->session->set_flashdata('alert','Permintaan Penjemputan Gagal !');
    		}

	    }
		redirect('agen/list_paket_kurir/');
	}

	public function list_jemput_paket()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_where('t_agen_dp', array('id_agen' => $this->session->userdata('id_agen')));

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_kurir'] = 'active';
		$data['active_list_paket_kurir'] = 'active';
		$data['header'] = 'Manage List Jemput Paket';
		$this->template->agen('agen/list_jemput_paket', $data);
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

		$data['data'] = $this->agen_model->get_where($tabel, $id_agen_dp);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');
		$data['active_menu_kurir'] = 'active';
		$data['active_list_paket_kurir'] = 'active';
		$data['header'] = 'Detail List Penjemputan';
		$this->template->agen('agen/detail_penjemputan', $data);
	}

	public function paket_dp() //fitur dari kurir
	{
		$this->cek_login();
		// $tabel = 't_transaksi t JOIN t_user u 
		// 			ON (t.id_user = u.id_user) 
		// 		JOIN t_transaksidpagendetail tdad 
		// 			ON (t.no_resi = tdad.no_resi)
		// 		JOIN t_transaksidpagen tda 
		// 			ON (tdad.id_transaksidpagen = tda.id_transaksidpagen)';

		$where = array(
				'status_dp_agen' => 'Proses',
				'tujuan' => $this->session->userdata('id_agen')
				);

		$data['data'] = $this->agen_model->get_where('t_dp_agen', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/paket_dp', $data);
	}

	public function riwayat_dp_agen()
	{
		$this->cek_login();

		$where = array(
				'tujuan' => $this->session->userdata('id_agen')
				);

		$data['data'] = $this->agen_model->get_where('t_dp_agen', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Riwayat Transaksi Agen DP';
		$this->template->agen('droppoint/riwayat_dp_agen', $data);
	}

	public function list_paket_dp()
	{
		$this->cek_login();
		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_dp_agen_detail tdad 
					ON (t.no_resi = tdad.no_resi)
				JOIN t_dp_agen tda 
					ON (tdad.id_dp_agen = tda.id_dp_agen)';

		$where = array(
				'status_dp_agen' => 'Selesai',
				'tujuan' => $this->session->userdata('id_agen')
				);

		$data['data'] = $this->agen_model->get_where($tabel,$where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_list_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/list_paket_dp', $data);
	}

	public function detail_paket_dp() //fitur dari kurir
	{
		$this->cek_login();
		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_dp_agen_detail tdad 
					ON (t.no_resi = tdad.no_resi)
				JOIN t_dp_agen tda 
					ON (tdad.id_dp_agen = tda.id_dp_agen)';

		$id_dp_agen['tda.id_dp_agen'] = $this->uri->segment(3);

		$data['data'] = $this->agen_model->get_where($tabel,$id_dp_agen);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Detail Paket Dp';
		$this->template->agen('agen/detail_paket_dp', $data);
	}

	public function getkota()
	{
		$pro = $this->input->get('sts');
		$getprovinsiid = $this->agen_model->get_where('t_provinsi',array('nama_provinsi'=> $pro))->row();
		$getcity = $this->agen_model->get_where('t_kota',array('id_provinsi'=> $getprovinsiid->id_provinsi))->result();

		echo "<option value=''>-- Pilih Kabupaten --</option>";
		foreach($getcity as $gc){
			echo "<option value='$gc->nama_kota'>$gc->nama_kota</option>";
		}
	}

	public function getkecamatan()
	{
		$kota = $this->input->get('sts');
		$getkotaid = $this->agen_model->get_where('t_kota',array('nama_kota'=> $kota))->row();
		$getkecamatan = $this->agen_model->get_where('t_kecamatan',array('id_kota'=> $getkotaid->id_kota))->result();

		echo "<option value=''>-- Pilih Kecamatan --</option>";
		foreach($getkecamatan as $gk){
			echo "<option value='$gk->nama_kecamatan'>$gk->nama_kecamatan</option>";
		}
	}

	public function getorigin()
	{
		$email = $this->input->get('email');
		
		$getorigin = $this->agen_model->get_where('t_user',array('email'=> $email));
		
		if ($getorigin->num_rows() > 0){

			$user = $getorigin->row();
			echo $user->username.'|'.$user->alamat.'|'.$user->kabupaten.'|'.$user->id_user;
		}else{
			echo "tidak ada";
		}
		
	}

	public function gettarif()
	{
		$this->cek_login();

		
		$berat = $this->input->get('berat');

		if ($berat > 0) {
			$b = $berat / 1000;
		}elseif($berat == '' or $berat <= 0){
			$b = 0;
		}

		$p = $this->input->get('panjang');
		$l = $this->input->get('lebar');
		$t = $this->input->get('tinggi');

		if ($p == '' or $p <= 0 || $l == '' or $l <= 0 || $t == '' or $t <= 0) {
			$p = 0;
			$l = 0;
			$t = 0;
		}

		$origin = $this->input->get('origin');		
		$kab = $this->input->get('kab');		
		$kec = $this->input->get('kec');		
		


		$ongkir = array(
				'origin' => $origin,
				'kota' => $kab,
				'kecamatan' => $kec
				);

		$getongkir = $this->agen_model->get_where('t_ongkir', $ongkir);
		if ($berat == 0 or '') {

			echo "<td colspan='4' style='text-align:center'>Masukkan Berat !</td>";

		}else{

			if ($kec == '' or 0) {
			
				echo "<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i></td>";

			}else{

				if ($getongkir->num_rows() > 0){

					foreach($getongkir->result() as $go){

						$ongkir = $go->harga;

						if ($b < 1) {

							$total_biaya = $ongkir;

						}else{

							if (($p * $l * $t) < 18000) {

								$x = $b * $ongkir;

		                        $ratusan = substr($x, -3);
		                        if($ratusan<500){
		                          $total_biaya = $x - $ratusan;
		                        }
		                        else{
		                          $total_biaya = $x + (1000-$ratusan);
		                        }

							}else if (($p * $l * $t) >= 18000) {

								$b = $p * $l * $t / 6000;

								$total_biaya = $b * $ongkir;
							}

						}

						echo "<tr>";
						echo "<td style='text-align:center'>
								<input required onclick='get_totalbiaya($total_biaya)' value='$go->jenis_layanan' name='jenis_layanan' class='ongkir' type='radio'>
								</td>";
						echo "<td style='text-align:center'>$go->jenis_layanan</td>";
						echo "<td style='text-align:center'>$go->harga</td>";
						echo "<td style='text-align:center'>$go->estimasi</td>";
						echo "</tr>";

					}
				}else{

					echo "<td colspan='4' style='text-align:center'>Data Belum Tersedia!</td>";
				}
			}
		}
		
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_agen'))
		{
			redirect('login/login_agen/');
		} 
	}

}