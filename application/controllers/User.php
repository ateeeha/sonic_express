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
		$this->template->user('user/home');
	}

	function cek_login()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect('index.php/login/login_user/');
		} 
	}
}
