<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_request');
		$this->load->model('M_task');
	}

	public function index()
	{
		$nik = $this->session->user['nik'];
		$data['nik'] = $nik;
		$data['jabatan'] = $this->session->user['jabatan'];
		$data['request']['all'] = $this->M_request->all_request();
		$data['request']['your'] = $this->M_request->your_request($nik);
		$data['task']['your'] = $this->M_task->all_my_task($nik);
		$data['task']['divisi'] = $this->M_task->all_divisi_task($this->session->user['divisi']);
		$data['judul'] = "Divisi";
		$data['page'] = "tables/divisi";
		$data['nama'] = $this->session->user['nama'];
		$this->load->view('dashboard', $data);
	}
}
