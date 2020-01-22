<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_request');
		$this->load->model('M_task');
		$this->load->model('m_divisi');
		$this->load->model('m_jabatan');
	}

	public function index()
	{
		$nik = $this->session->user['nik'];
		$data['nik'] = $nik;
		$data['jabatan'] = $this->session->user['jabatan'];
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();
		$data['all_jabatan'] = $this->m_jabatan->get_all_jabatan();
		$data['request']['all'] = $this->M_request->all_request();
		$data['request']['your'] = $this->M_request->your_request($nik);
		$data['task']['your'] = $this->M_task->all_my_task($nik);
		$data['task']['divisi'] = $this->M_task->all_divisi_task($this->session->user['divisi']);
		$data['judul'] = "Karyawan";
		$data['page'] = "tables/karyawan";
		$data['nama'] = $this->session->user['nama'];
		$this->load->view('dashboard', $data);
	}
}
