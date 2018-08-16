<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation', 'session'));
		$this->load->model('user_model','admin_model','dp_model','kurir_model');
	}

	public function index()
	{
		
	}

	public function login_admin()
	{
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'Submit')
		{
			$email = $this->input->post('email', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->admin_model->get_where('t_admin', array('email' => $email));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'id_admin' => $data->id_admin,
						'username_admin' => $data->username, 
						'email_admin' => $data->email, 
						'level' => $data->level,
						'login_admin' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('index.php/admin');

				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah !");
				}	

			} else {
				$this->session->set_flashdata('alert', "Username Ditolak !");
			}
		}
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			redirect('index.php/admin');
		}
		$this->load->view('admin/login_admin');
	}

	public function login_dp()
	{
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'Submit')
		{
			$email = $this->input->post('email', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->dp_model->get_where('t_dp', array('email' => $email));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'id_dp' => $data->id_dp,
						'username_dp' => $data->username, 
						'email_dp' => $data->email, 
						'login_dp' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('index.php/droppoint/');

				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah !");
				}	

			} else {
				$this->session->set_flashdata('alert', "Username Ditolak !");
			}
		}
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			redirect('index.php/droppoint');
		}
		$this->load->view('droppoint/login_dp');
	}

	public function login_kurir()
	{
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'Submit')
		{
			$email = $this->input->post('email', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->kurir_model->get_where('t_kurir', array('email' => $email));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'id_kurir' => $data->id_kurir,
						'username_kurir' => $data->username, 
						'email_kurir' => $data->email, 
						'kabupaten_kurir' => $data->kabupaten, 
						'login_kurir' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('index.php/kurir');

				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah !");
				}	

			} else {
				$this->session->set_flashdata('alert', "Username Ditolak !");
			}
		}
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			redirect('index.php/kurir');
		}
		$this->load->view('kurir/login_kurir');
	}

	public function login_user()
	{
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'Submit')
		{
			$email = $this->input->post('email', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->user_model->get_where('t_user', array('email' => $email));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'id_user' => $data->id_user,
						'username_user' => $data->username, 
						'email_user' => $data->email, 
						'login_user' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('index.php/user');

				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah !");
				}	

			} else {
				$this->session->set_flashdata('alert', "Username Ditolak !");
			}
		}
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			redirect('index.php/user');
		}
		$this->load->view('user/login_user');
	}

	public function logout_admin()
	{
		$this->session->sess_destroy();

		redirect('index.php/login/login_admin');
	}

	public function logout_dp()
	{
		$this->session->sess_destroy();

		redirect('index.php/login/login_dp');
	}

	public function logout_kurir()
	{
		$this->session->sess_destroy();

		redirect('index.php/login/login_kurir');
	}

	public function logout_user()
	{
		$this->session->sess_destroy();

		redirect('index.php/login/login_user');
	}

}
