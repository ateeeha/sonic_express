<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function admin($template, $data='')
	{
		//$this->ci->load->model('admin_model');

		//$data['transaksi_baru'] = $this->ci->admin_model->count_where('t_order', ['read' => 0]);
		//$data['belum'] = $this->ci->admin_model->count_where('t_order', ['status' => 'belum']);
		//$data['konfirmasi_baru'] = $this->ci->admin_model->count_where('t_konfirmasi', ['read' => 0]);

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('admin/nav', $data, TRUE);

		$this->ci->load->view('admin/dashboard', $data);
	}

	function user($template, $data='')
	{
		//$this->ci->load->model('admin_model');

		//$data['transaksi_baru'] = $this->ci->admin_model->count_where('t_order', ['read' => 0]);
		//$data['belum'] = $this->ci->admin_model->count_where('t_order', ['status' => 'belum']);
		//$data['konfirmasi_baru'] = $this->ci->admin_model->count_where('t_konfirmasi', ['read' => 0]);

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('user/nav', $data, TRUE);

		$this->ci->load->view('user/dashboard', $data);
	}

	function dp($template, $data='')
	{
		//$this->ci->load->model('admin_model');

		//$data['transaksi_baru'] = $this->ci->admin_model->count_where('t_order', ['read' => 0]);
		//$data['belum'] = $this->ci->admin_model->count_where('t_order', ['status' => 'belum']);
		//$data['konfirmasi_baru'] = $this->ci->admin_model->count_where('t_konfirmasi', ['read' => 0]);

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('droppoint/nav', $data, TRUE);

		$this->ci->load->view('droppoint/dashboard', $data);
	}

	function agen($template, $data='')
	{
		//$this->ci->load->model('admin_model');

		//$data['transaksi_baru'] = $this->ci->admin_model->count_where('t_order', ['read' => 0]);
		//$data['belum'] = $this->ci->admin_model->count_where('t_order', ['status' => 'belum']);
		//$data['konfirmasi_baru'] = $this->ci->admin_model->count_where('t_konfirmasi', ['read' => 0]);

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('agen/nav', $data, TRUE);

		$this->ci->load->view('agen/dashboard', $data);
	}
	
	function kurir($template, $data='')
	{
		//$this->ci->load->model('admin_model');

		//$data['transaksi_baru'] = $this->ci->admin_model->count_where('t_order', ['read' => 0]);
		//$data['belum'] = $this->ci->admin_model->count_where('t_order', ['status' => 'belum']);
		//$data['konfirmasi_baru'] = $this->ci->admin_model->count_where('t_konfirmasi', ['read' => 0]);

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('kurir/nav', $data, TRUE);

		$this->ci->load->view('kurir/dashboard', $data);
	}

	function page($template, $data='')
	{

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		//$data['nav'] = $this->ci->load->view('admin/nav', $data, TRUE);

		$this->ci->load->view('register/page', $data);
	}
}