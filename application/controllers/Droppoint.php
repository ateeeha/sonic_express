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

		$data['active_mkurir'] = 'active';
		$data['header'] = 'Manage Kurir';
		$this->template->dp('droppoint/manage_kurir', $data);
	}

	public function kurir()
	{
		$this->cek_login();

		$data['data'] = $this->dp_model->get_all('t_kurir');

		$data['active_mkurir'] = 'active';
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

		$data['active_mkurir'] = 'active';
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

	function cek_login()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect('index.php/login/login_dp/');
		} 
	}
}
