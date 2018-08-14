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
				'no_resi' => 'RES'.date("dmY").$this->session->userdata('id_user'), 
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
