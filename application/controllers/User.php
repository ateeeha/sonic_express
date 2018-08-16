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

		$this->template->user('user/form_cekongkir');
	}

	public function cek_ongkir()
	{
		$this->cek_login();
		
		$data['active_cekongkir'] = 'active';
		$data['header'] = 'Cek Ongkir';
		$this->template->user('user/form_cekongkir', $data);
	}

	public function cek_resi()
	{
		$this->cek_login();
		
		if ($this->input->post('submit') == 'Submit')
		{
			$no_resi = $this->input->post('no_resi', TRUE);

			$cek = $this->user_model->get_where('t_tracking', array('no_resi' => $no_resi));
			$data['cek'] = $cek;
			// if ($cek->num_rows() > 0) 
			// {				
			// 	// foreach ($cek->result() as $key) {
					
			// 	// 	$data['id_tracking'] = $key->id_tracking;
			// 	// 	$data['no_resi'] = $key->no_resi;
			// 	// 	$data['tanggal'] = $key->tanggal;
			// 	// 	$data['status'] = $key->status;
			// 	// }

			// } else {
			// 	$this->session->set_flashdata('alert', "Kode Resi Tidak Ada !");
			// }
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

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|numeric');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'nama' => $this->input->post('nama', TRUE), 
				'alamat' => $this->input->post('alamat', TRUE), 
				'kode_pos' => $this->input->post('kode_pos', TRUE), 
				'no_tlp' => $this->input->post('no_tlp', TRUE), 
				'tgl_pengiriman' => date("Y-m-d"), 
				'id_user' => $this->session->userdata('id_user'), 
				'no_resi' => 'RES'.date("dmYgis").$this->session->userdata('id_user'), 
				);

				$this->user_model->insert('t_transaksi', $data);
				$this->session->set_flashdata('success','Data berhasil disimpan !');
			
			} 
		}

		$data['active_transaksi'] = 'active';
		$data['header'] = 'Transaksi';
		$this->template->user('user/form_transaksi', $data);
	}

	function cek_login()
	{ 
		if (!$this->session->userdata('login_user'))
		{
			redirect('index.php/login/login_user/');
		} 
	}

}
