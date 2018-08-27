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
		if ($this->session->userdata('level')=='admin')
		{
			redirect('admin/droppoint/');
		}

		$data['data'] = $this->admin_model->get_all('t_admin');

		$data['active_admin'] = 'active';
		$data['header'] = 'Manage Admin';
		$this->template->admin('admin/manage_admin', $data);
	}

	public function ongkir()
	{
		$this->cek_login();

		$data['data'] = $this->admin_model->get_all('t_ongkir');

		$data['active_ongkir'] = 'active';
		$data['header'] = 'Manage Ongkir';
		$this->template->admin('admin/manage_ongkir', $data);
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

		if ($this->session->userdata('level')=='admin')
		{
			redirect('admin/droppoint/');
		}

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
				'status_admin' => 2,
				'level' => 'admin'
				);

				$this->admin_model->insert('t_admin', $data);
				
				redirect('admin/admin/');
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
				'status_dp' => 2
				);

				$this->admin_model->insert('t_dp', $data);
				
				redirect('admin/droppoint/');
			} 
		}
		$data['data'] = $this->admin_model->get_all('t_provinsi');

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
				'status_kurir' => 2
				);

				$this->admin_model->insert('t_kurir', $data);
				
				redirect('admin/kurir/');
			} 
		}
		$data['data'] = $this->admin_model->get_all('t_provinsi');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Add Kurir';	
		$this->template->admin('admin/add_kurir', $data);
	}

	public function add_user()
	{
		$this->cek_login();

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
				'status_user' => 2
				);

				$this->admin_model->insert('t_user', $data);
				
				redirect('admin/user/');
			} 
		}
		$data['data'] = $this->admin_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Add User';	
		$this->template->admin('admin/add_user', $data);
	}

	public function edit_admin()
	{
		$this->cek_login();

		if ($this->session->userdata('level')=='admin')
		{
			redirect('admin/droppoint/');
		}

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
					'status_admin' => $this->input->post('status', TRUE)
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
			$data['status_admin'] = $key->status_admin;

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
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_dp' => $this->input->post('status', TRUE)
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
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_dp'] = $key->status_dp;

		}
		$data['data'] = $this->admin_model->get_all('t_provinsi'); 

		$data['active_dp'] = 'active';
		$data['header'] = 'Add Drop Point';
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
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_kurir' => $this->input->post('status', TRUE)
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
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_kurir'] = $key->status_kurir;

		}
		$data['data'] = $this->admin_model->get_all('t_provinsi');

		$data['active_kurir'] = 'active';
		$data['header'] = 'Manage Kurir';

		$this->template->admin('admin/edit_kurir', $data);
	}

	public function edit_user()
	{
		$this->cek_login();

		$id_user = $this->uri->segment(3);

		if ($this->input->post('submit') == 'Submit') 
		{
			$this->form_validation->set_rules('username', 'Username', "required");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('status', 'Status', "required|numeric");

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'provinsi' => $this->input->post('provinsi', TRUE), 
					'kabupaten' => $this->input->post('kabupaten', TRUE),
					'status_user' => $this->input->post('status', TRUE)
				);
				
				$this->admin_model->update('t_user', $data, array('id_user' => $id_user));
				$this->session->set_flashdata('success','Data berhasil disimpan !');

				//redirect('admin');
				
			}
		}

		$user = $this->admin_model->get_where('t_user', array('id_user' => $id_user));

		foreach ($user->result() as $key) {
			
			$data['id_user'] = $key->id_user;
			$data['username'] = $key->username;
			$data['email'] = $key->email;
			$data['provinsi'] = $key->provinsi;
			$data['kabupaten'] = $key->kabupaten;
			$data['status_user'] = $key->status_user;

		}
		$data['data'] = $this->admin_model->get_all('t_provinsi');

		$data['active_user'] = 'active';
		$data['header'] = 'Manage User';
		$this->template->admin('admin/edit_user', $data);
	}

	public function del_admin()
	{
		$this->cek_login();

		if ($this->session->userdata('level')=='admin')
		{
			redirect('admin/droppoint/');
		}

		$cond['id_admin'] = $this->uri->segment(3);

		$this->admin_model->delete('t_admin', $cond);

		redirect('admin/admin/');
	}

	public function del_dp()
	{
		$this->cek_login();

		$cond['id_dp'] = $this->uri->segment(3);

		$this->admin_model->delete('t_dp', $cond);

		redirect('admin/droppoint/');
	}

	public function del_kurir()
	{
		$this->cek_login();

		$cond['id_kurir'] = $this->uri->segment(3);

		$this->admin_model->delete('t_kurir', $cond);

		redirect('admin/kurir/');
	}

	public function del_user()
	{
		$this->cek_login();

		$cond['id_user'] = $this->uri->segment(3);

		$this->admin_model->delete('t_user', $cond);

		redirect('admin/user/');
	}

	public function getcity()
	{
		$pro = $this->input->get('sts');
		$getprovinsiid = $this->admin_model->get_where('t_provinsi',array('nama_provinsi'=> $pro))->row();
		$getcity = $this->admin_model->get_where('t_kota',array('id_provinsi'=> $getprovinsiid->id_provinsi))->result();

		echo "<option value=''>--Pilih Kabupaten--</option>";
		foreach($getcity as $gc){
			echo "<option value='$gc->nama_kota'>$gc->nama_kota</option>";
		}
	}

	public function status_user()
	{
		
		if (isset($_POST['submit']))
		{
	     // $where = implode(",", $this->input->post('id_user'));
	      	
	         $this->admin_model->update_multiple(
	         	't_user', 
	         	['status_user'=>1], 
	         	$this->input->post('id_user')
	         );

	      }
			
		redirect('admin/user/');
	}

	function cek_login()
	{
		if (!$this->session->userdata('login_admin'))
		{
			redirect('login/login_admin/');
		} 
	}

}
