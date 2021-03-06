<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_task extends CI_Controller
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
		$data['judul'] = "Tugasku";
		$data['judulTabel'] = "Tugasku";
		$data['page'] = "tables/task";
		$data['nama'] = $this->session->user['nama'];
		$data['nik'] = $this->session->user['nik'];
		$data['divisi'] = $this->session->user['divisi'];
		$this->load->view('dashboard', $data);
	}
}
