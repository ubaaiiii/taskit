<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_divisi');
	}

	public function index()
	{
		//load session library
		$this->load->library('session');
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user')) {
			redirect('welcome');
			
		} else {
			//echo "gila";
			$data['judul'] = "Login";
			$this->load->view('sign/in', $data);
		}
	}

	public function login()
	{
		
		//load session library
		$this->load->library('session');

		$output = array('error' => false);

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->m_user->login($username, $password);

		if ($data) {
			$this->session->set_userdata('user', $data);
		} else {
			$output['error'] = true;
		}

		echo json_encode($output);
	}

	public function home()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if ($this->session->userdata('user')) {
			redirect('dashboard');
		} else {
			redirect('/');
		}
	}

	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect(base_url());
	}

	public function registration()
	{
		//load session library
		$this->load->library('session');
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user')) {
			redirect('welcome');
		} else {
			$data['judul'] = "Login";
			$this->load->view('sign/up', $data);
		}
	}
}
