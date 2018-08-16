<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('user_model');
	}

	public function index()
	{
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
				'status' => 1
				);

				$this->user_model->insert('t_user', $data);
				
				redirect('index.php/login/login_user/');
			} 
		}
		$data['data'] = $this->user_model->get_all('t_provinsi');

		$this->template->page('register/register', $data);
	}

}
