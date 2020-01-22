<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_request');
		$this->load->model('M_task');
		$this->load->library('session');
	}

	public function index()
	{
		$nik = $this->session->user['nik'];
		$data['nik'] = $nik;
		$data['nama'] = $this->session->user['nama'];
		$data['divisi'] = $this->session->user['divisi'];
		$data['jabatan'] = $this->session->user['jabatan'];
		$data['nik'] = $nik;
		$data['request']['all'] = $this->M_request->all_request();
		$data['request']['your'] = $this->M_request->your_request($nik);
		$data['request']['new'] = $this->M_request->new_request();
		$data['request']['done'] = $this->M_request->done_request();
		$data['request']['reject'] = $this->M_request->reject_request();
		$data['request']['progress'] = $this->M_request->progress_request();
		$data['task']['your'] = $this->M_task->all_my_task($nik);
		$data['task']['divisi'] = $this->M_task->all_divisi_task($this->session->user['divisi']);
		$data["page"] = "dashboard/index";
		$data['judul'] = "Dashboard";
		$this->load->view('dashboard', $data);
	}
}
