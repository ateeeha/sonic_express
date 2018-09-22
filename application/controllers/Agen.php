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

	function transaksi()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_all('t_provinsi');

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Transaksi';
		$this->template->agen('agen/form_transaksi', $data);
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

	public function user()
	{
		$this->cek_login();

		$data['data'] = $this->agen_model->get_all('t_user');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
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
		$data['header'] = 'Add User';	
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
		$data['header'] = 'Manage Kurir';
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
		$data['header'] = 'Add Kurir';	
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
			'tanggal' => date("Y-m-d"), 
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

		if (isset($_POST['submit']))
		{

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
					'status_tracking' => 'Diterima Agen Kota Asal'
				);
				$this->agen_model->insert('t_tracking', $tracking);

				$this->agen_model->update(
					't_transaksi', 
					['status_kurir' => 'Selesai'], 
					['no_resi' => $res] );
    		}

	    }
			
		redirect('agen/paket_kurir/');
	}

	public function multi_terima_paket_dp()
	{
		$this->cek_login();
		
		$resi 				= $this->input->post('no_resi');
		$id_transaksidpagen = $this->input->post('id_transaksidpagen');

		if (isset($_POST['submit']))
		{
			$transaksidpagen = array(
				'tgl_sampai' =>  date("Y-m-d"),
				'status_tdpagen' => 'selesai'
			);
			$this->agen_model->update('t_transaksidpagen', $transaksidpagen, ['id_transaksidpagen' => $id_transaksidpagen]);

			foreach ($resi as $res)
			{ 
		        
				$tracking = array(
					'no_resi' => $res, 
					'tanggal' => date("Y-m-d"), 
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
					'tanggal' => date("Y-m-d H:i:s"), 
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

		$data['active_menu_kurir'] = 'active';
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
		// $tabel = 't_transaksi t JOIN t_user u 
		// 			ON (t.id_user = u.id_user) 
		// 		JOIN t_transaksidpagendetail tdad 
		// 			ON (t.no_resi = tdad.no_resi)
		// 		JOIN t_transaksidpagen tda 
		// 			ON (tdad.id_transaksidpagen = tda.id_transaksidpagen)';

		$where = array(
				'status_tdpagen' => 'proses',
				'tujuan' => $this->session->userdata('id_agen')
				);

		$data['data'] = $this->agen_model->get_where('t_transaksidpagen', $where);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_menu_dp'] = 'active';
		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
		$this->template->agen('agen/paket_dp', $data);
	}

	public function list_paket_dp() //fitur dari kurir
	{
		$this->cek_login();
		$tabel = 't_transaksi t JOIN t_user u 
					ON (t.id_user = u.id_user) 
				JOIN t_transaksidpagendetail tdad 
					ON (t.no_resi = tdad.no_resi)
				JOIN t_transaksidpagen tda 
					ON (tdad.id_transaksidpagen = tda.id_transaksidpagen)';

		$where = array(
				'status_tdpagen' => 'selesai',
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
				JOIN t_transaksidpagendetail tdad 
					ON (t.no_resi = tdad.no_resi)
				JOIN t_transaksidpagen tda 
					ON (tdad.id_transaksidpagen = tda.id_transaksidpagen)';

		$id_transaksidpagen['tda.id_transaksidpagen'] = $this->uri->segment(3);

		$data['data'] = $this->agen_model->get_where($tabel,$id_transaksidpagen);

		// $data['data'] = $this->kurir_model->get_all('t_transaksi');

		$data['active_paket_dp'] = 'active';
		$data['header'] = 'Manage Paket';
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
			echo $user->username.'|'.$user->alamat.'|'.$user->kabupaten;
		}else{
			echo "tidak ada";
		}
		
	}

	public function gettarif()
	{
		$this->cek_login();

		
		$berat = $this->input->get('berat');

		$b = ($berat / 1000);
		$p = $this->input->get('panjang');
		$l = $this->input->get('lebar');
		$t = $this->input->get('tinggi');

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