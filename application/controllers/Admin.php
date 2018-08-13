<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation', 'session'));
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->cek_login();

		$data['data'] = $this->admin_model->get_all('t_member');

		$this->template->admin('admin/home', $data);
	}

	public function admin()
	{
		$this->cek_login();

		$data['data'] = $this->admin_model->get_all('t_admin');

		$data['active_admin'] = 'active';
		$data['header'] = 'Manage Admin';
		$this->template->admin('admin/manage_admin', $data);
	}

	public function droppoint()
	{
		$this->cek_login();

		$data['data'] = $this->admin_model->get_all('t_dp');

		$data['active_dp'] = 'active';
		$data['header'] = 'Manage Drop Point';
		$this->template->admin('admin/manage_dp', $data);
	}

	public function kurir()
	{
		$this->cek_login();

		$data['data'] = $this->admin_model->get_all('t_kurir');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';
		$this->template->admin('admin/manage_kurir', $data);
	}

	public function user()
	{
		$this->cek_login();
		
		$data['data'] = $this->admin_model->get_all('t_user');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->admin('admin/manage_user', $data);
	}

	public function add_admin()
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
				'status' => 2,
				'level' => 'admin'
				);

				$this->admin_model->insert('t_admin', $data);
				
				redirect('index.php/admin/admin/');
			} 
		}

		$data['active_admin'] = 'active';
		$data['header'] = 'Add Admin';	
		$this->template->admin('admin/add_admin', $data);
	}

	public function add_dp()
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

				$this->admin_model->insert('t_dp', $data);
				
				redirect('index.php/admin/droppoint/');
			} 
		}

		$data['active_dp'] = 'active';
		$data['header'] = 'Add Drop Point';	
		$this->template->admin('admin/add_dp', $data);
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

				$this->admin_model->insert('t_kurir', $data);
				
				redirect('index.php/admin/kurir/');
			} 
		}

		$data['active_kurir'] = 'active';
		$data['header'] = 'Add Kurir';	
		$this->template->admin('admin/add_kurir', $data);
	}

	public function edit_admin()
	{
		$this->cek_login();

		$id_dp = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'status' => $this->input->post('status', TRUE)
				);			
				$this->admin_model->update('t_admin', $data, array('id_admin' => $id_dp));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');				
			}
		}

		$dp = $this->admin_model->get_where('t_admin', array('id_admin' => $id_dp));

		foreach ($dp->result() as $key) {
			
			$data['id_admin'] = $key->id_admin;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['status'] = $key->status;

		}
		$data['active_admin'] = 'active';
		$data['header'] = 'Manage Admin';

		$this->template->admin('admin/edit_admin', $data);
	}

	public function edit_dp()
	{
		$this->cek_login();

		$id_dp = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'status' => $this->input->post('status', TRUE)
				);			
				$this->admin_model->update('t_dp', $data, array('id_dp' => $id_dp));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');				
			}
		}

		$dp = $this->admin_model->get_where('t_dp', array('id_dp' => $id_dp));

		foreach ($dp->result() as $key) {
			
			$data['id_dp'] = $key->id_dp;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['status'] = $key->status;

		}
		$this->template->admin('admin/edit_dp', $data);
	}

	public function edit_kurir()
	{
		$this->cek_login();

		$id_kurir = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'status' => $this->input->post('status', TRUE)
				);
				
				$this->admin_model->update('t_kurir', $data, array('id_kurir' => $id_kurir));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');
				
			}
		}

		$kurir = $this->admin_model->get_where('t_kurir', array('id_kurir' => $id_kurir));

		foreach ($kurir->result() as $key) {
			
			$data['id_kurir'] = $key->id_kurir;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['status'] = $key->status;

		}
		$this->template->admin('admin/edit_kurir', $data);
	}

	public function del_dp()
	{
		$this->cek_login();

		$cond['id_dp'] = $this->uri->segment(3);

		$this->admin_model->delete('t_dp', $cond);

		redirect('index.php/admin/droppoint/');
	}

	public function del_kurir()
	{
		$this->cek_login();

		$cond['id_kurir'] = $this->uri->segment(3);

		$this->admin_model->delete('t_kurir', $cond);

		redirect('index.php/admin/kurir/');
	}

	public function status_user()
	{
		$this->cek_login();

		if (!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4))) 
		{
			redirect('index.php/admin/user/');
		}
		$this->admin_model->update('t_user', ['status' => $this->uri->segment(3)], ['id_user' => $this->uri->segment(4)]);
		
		redirect('index.php/admin/user/');
	}

	function cek_login()
	{
		if (!$this->session->userdata('logged_in'))
		{
			redirect('index.php/login/login_admin/');
		} 
	}

}
