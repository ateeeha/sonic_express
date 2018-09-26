<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['active_home'] = 'active';
		$data['header'] = 'Home';
		$this->template->user('user/home', $data);
	}

	public function ongkir()
	{
		$this->cek_login();

		if ($this->input->post('submit') == 'Submit')
		{
			$this->form_validation->set_rules('berat','Berat','required|numeric');
			$this->form_validation->set_rules('cek_provinsi_asal','Provinsi Asal','required');
			$this->form_validation->set_rules('cek_kabupaten_asal','Kabupaten Asal','required');
			$this->form_validation->set_rules('cek_provinsi_tujuan','Provinsi Tujuan','required');
			$this->form_validation->set_rules('cek_kabupaten_tujuan','Kabupaten Tujuan','required');
			$this->form_validation->set_rules('cek_kecamatan_tujuan','Kecamatan Tujuan','required');

				if ($this->form_validation->run() == TRUE)
				{
					$where = array(
						'origin' => $this->input->post('cek_kabupaten_asal', TRUE),
						'kota' => $this->input->post('cek_kabupaten_tujuan', TRUE),
						'kecamatan' => $this->input->post('cek_kecamatan_tujuan', TRUE)
					);

					$data['ongkir'] = $this->user_model->get_where('t_ongkir', $where);
					
				}
					
		}else{
			$data['ongkir'] = '';
		}
		$data['data'] = $this->user_model->get_all('t_provinsi');

		$data['berat'] = $this->input->post('berat', TRUE);
		$data['panjang'] = $this->input->post('panjang', TRUE);
		$data['lebar'] = $this->input->post('lebar', TRUE);
		$data['tinggi'] = $this->input->post('tinggi', TRUE);

		$data['prov_asal'] = $this->input->post('cek_provinsi_asal', TRUE);
		$data['kab_asal'] = $this->input->post('cek_kabupaten_asal', TRUE);

		$data['prov_tujuan'] = $this->input->post('cek_provinsi_tujuan', TRUE);
		$data['kab_tujuan'] = $this->input->post('cek_kabupaten_tujuan', TRUE);
		$data['kec_tujuan'] = $this->input->post('cek_kecamatan_tujuan', TRUE);

		$data['active_ongkir'] = 'active';
		$data['header'] = 'Cek Ongkir';
		
		$this->template->user('user/form_ongkir', $data);
	}

	public function cek_resi()
	{
		$this->cek_login();
		
		if ($this->input->post('submit') == 'Submit')
		{
			$no_resi = $this->input->post('no_resi', TRUE);

			$cek = $this->user_model->get_where_desc('t_tracking', ['no_resi' => $no_resi], 'id_tracking');
			if ($cek->num_rows() > 0) 
			{				
				$data['cek'] = $cek;
			} else {
				$data['cek'] = '';
				$this->session->set_flashdata('alert-resi', "Kode Resi Tidak Ada !");
			}
		}else {
			$data['cek'] = '';
		}

		$data['active_cekresi'] = 'active';
		$data['header'] = 'Cek Resi';
		$this->template->user('user/form_cekresi', $data);
	}

	function transaksi()
	{
		$this->cek_login();

		$data['data'] = $this->user_model->get_all('t_provinsi');

		$data['active_transaksi'] = 'active';
		// $data['header'] = 'Transaksi';
		$this->template->user('user/form_transaksi', $data);
	}

	function simpan_transaksi()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
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
					'id_user' => $this->session->userdata('id_user'), 
					'tgl_pengiriman' => date("Y-m-d"), 
					'no_resi' => 'RES'.date("dmYgis").$this->session->userdata('id_user'), 

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
					'status_transaksi' => 'Menunggu',
					'status_dp' => 'Baru'
				);

				$this->user_model->insert('t_transaksi', $data);
				$this->session->set_flashdata('success','Transaksi berhasil diproses !');
			
			}else{

				$this->session->set_flashdata('alert','Transaksi gagal diproses !');
			} 
		}
		redirect('user/transaksi/');
	}

	public function list_transaksi()
	{
		$this->cek_login();

		$join = 't_transaksi t JOIN t_user u ON (t.id_user = u.id_user)';
		$data['data'] = $this->user_model->get_where($join, 
			array(
				'email' => $this->session->userdata('email_user'),
				));

		$data['active_list'] = 'active';
		$data['header'] = 'Manage Transaksi';
		$this->template->user('user/list_transaksi', $data);
	}

	public function getkota()
	{
		$pro = $this->input->get('sts');
		$getprovinsiid = $this->user_model->get_where('t_provinsi',array('nama_provinsi'=> $pro))->row();
		$getcity = $this->user_model->get_where('t_kota',array('id_provinsi'=> $getprovinsiid->id_provinsi))->result();

		echo "<option value=''>-- Pilih Kabupaten --</option>";
		foreach($getcity as $gc){
			echo "<option value='$gc->nama_kota'>$gc->nama_kota</option>";
		}
	}

	public function getkecamatan()
	{
		$kota = $this->input->get('sts');
		$getkotaid = $this->user_model->get_where('t_kota',array('nama_kota'=> $kota))->row();
		$getkecamatan = $this->user_model->get_where('t_kecamatan',array('id_kota'=> $getkotaid->id_kota))->result();

		echo "<option value=''>-- Pilih Kecamatan --</option>";
		foreach($getkecamatan as $gk){
			echo "<option value='$gk->nama_kecamatan'>$gk->nama_kecamatan</option>";
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


		$kab = $this->input->get('kab');		
		$kec = $this->input->get('kec');		

		$ongkir = array(
				'origin' => $this->session->userdata('kabupaten_user'),
				'kota' => $kab,
				'kecamatan' => $kec
				);

		$getongkir = $this->user_model->get_where('t_ongkir', $ongkir);
		if ($berat == '' or 0) {

			echo "<td colspan='4' style='text-align:center'>Inputkan Berat!</td>";

		}else{

			if ($kec == '' or 0) {
			
				echo "<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i></td>";

			}else{

				if ($getongkir->num_rows() > 0){

					foreach($getongkir->result() as $go){

						$ongkir = $go->harga;

						if ($b <= 1) {

							$total_biaya = $ongkir;

						}elseif($b > 1) {

							if (($p * $l * $t) < 18000) {

								$x = $b * $ongkir;

		                        $ratusan = substr($x, -3);
		                        if($ratusan < 500){
		                          $total_biaya = $x - $ratusan;
		                        }
		                        else{
		                          $total_biaya = $x + (1000-$ratusan);
		                        }

							}else if (($p * $l * $t) >= 18000) {

								$volume = $p * $l * $t / 6000;

								if ($volume > $b) {
									$x = $volume * $ongkir;

									$ratusan = substr($x, -3);
                          
			                        if($ratusan<500){
			                          $total_biaya = $x - $ratusan;
			                        }
			                        else{
			                          $total_biaya = $x + (1000-$ratusan);
			                        }
								}else {
									$x = $b * $ongkir;

			                        $ratusan = substr($x, -3);
			                        
			                        if($ratusan < 500){
			                          $total_biaya = $x - $ratusan;
			                        }
			                        else{
			                          $total_biaya = $x + (1000-$ratusan);
			                        }
								}
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
		if (!$this->session->userdata('login_user'))
		{
			redirect('login/login_user/');
		} 
	}

}
