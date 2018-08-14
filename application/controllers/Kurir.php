<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('kurir_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['data'] = $this->kurir_model->get_all('t_user');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->kurir('kurir/manage_user', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_kurir')) 
		{
			redirect('index.php/login/login_kurir/');
		} 
	}
}
