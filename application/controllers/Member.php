<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('member_model');
	}

	public function index()
	{
		$this->cek_login();
		$this->template->member('member/home');
	}

	public function pendaftaran()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('fullname','Fullname','required');
			$this->form_validation->set_rules('pass1','Password','required');
			$this->form_validation->set_rules('pass2','Ketik Ulang Password','required|matches[pass1]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('level','Level','required|numeric');

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
				'username' => $this->input->post('username', TRUE), 
				'fullname' => $this->input->post('fullname', TRUE),
				'email' => $this->input->post('email', TRUE), 
				'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'level' => $this->input->post('level', TRUE),
				'status' => 0
				);

				$this->member_model->insert('t_member', $data);
				
				redirect('index.php/member/login/');
			} 
		}
		$this->template->pendaftaran('member/pendaftaran');
	}

	public function login()
	{
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'Submit')
		{
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->member_model->get_where('t_member', "username = '$user' && status = 1");
			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'member' => $data->id_member,
						'username' => $data->username, 
						'level' => $data->level,
						'logged_in' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('index.php/member');

				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah !");
				}	

			} else {
				$this->session->set_flashdata('alert', "Username Ditolak !");
			}
		}
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			redirect('index.php/member');
		}
		$this->load->view('member/login_member');
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('index.php/member');
	}

	function cek_login()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect('index.php/member/login/');
		} 
	}
}
