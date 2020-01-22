<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_request');
		$this->load->model('m_divisi');
		$this->load->model('m_kepentingan');
		$this->load->model('m_jabatan');
		$this->load->model('m_karyawan');
		$this->load->library('session');
	}

	public function index($nama = "")
	{
		echo "ini modal";
	}


	public function request($judul = "", $id = "")
	{
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();
		$data['all_kepentingan'] = $this->m_kepentingan->get_all_kepentingan();
		$data['all_request'] = $this->m_request->get_all_request();
		$data['request'] = $id;
		$data['detail_request'] = $this->m_request->get_request($id);
		$data['all_karyawan'] = $this->m_karyawan->get_all_karyawan();
		$data['nik'] = $this->session->user['nik'];

		switch ($judul) {
			case "t": {
					$judul_baru = "Tambah Request";
					$sbg = "tambah";
					$data['judul_modal'] = $judul_baru;
					$data['sebagai'] = $sbg;
					$this->load->view('modals/add_request', $data);
					break;
				}
			case "e": {
					$judul_baru = "Edit Request";
					$sbg = "edit";
					$data['judul_modal'] = $judul_baru;
					$data['sebagai'] = $sbg;
					$this->load->view('modals/request', $data);
					break;
				}
			case "v": {
					$judul_baru = "View Request";
					$sbg = "view";
					$data['judul_modal'] = $judul_baru;
					$data['sebagai'] = $sbg;
					$this->load->view('modals/request', $data);
					break;
				}

			default: {
					$judul_baru = "Process Request";
					$sbg = "proses";
					$data['judul_modal'] = $judul_baru;
					$data['sebagai'] = $sbg;
					$this->load->view('modals/request', $data);
					break;
				}
		}
	}

	public function task($judul = "", $id = "")
	{
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();
		$data['all_request'] = $this->m_request->get_all_request();
		$data['request'] = $id;
		$data['detail_request'] = $this->m_request->get_request($id);
		$data['all_karyawan'] = $this->m_karyawan->get_all_karyawan();
		$data['nik'] = $this->session->user['nik'];

		switch ($judul) {
			case "t": {
					$judul_baru = "Tambah Request";
					$sbg = "tambah";
					break;
				}
			case "e": {
					$judul_baru = "Edit Request";
					$sbg = "edit";
					break;
				}
			case "v": {
					$judul_baru = "View Request";
					$sbg = "view";
					break;
				}

			default: {
					$judul_baru = "Process Task";
					$sbg = "proses";
					break;
				}
		}
		$data['judul_modal'] = $judul_baru;
		$data['sebagai'] = $sbg;
		$this->load->view('modals/task', $data);
	}

	public function karyawan($judul = "", $id = "")
	{
		$nik = $this->session->user['nik'];
		$data['all_karyawan'] = $this->m_karyawan->get_all_karyawan();
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();
		$data['all_jabatan'] = $this->m_jabatan->get_all_jabatan();
		$data['karyawanNik'] = $this->m_karyawan->get_karyawan($id);
		switch ($judul) {
			case "t": {
					$judul_baru = "Tambah Data Karyawan";
					$sbg = "tambah";
					break;
				}
			case "e": {
					if($id==$nik){
						$judul_baru = "Edit Profil";
						$sbg = "editP";
						break;
					} else {
						$judul_baru = "Edit Data Karyawan";
						$sbg = "editD";
						break;
					}
				}
			case "v": {
					$judul_baru = "Data Karyawan";
					$sbg = "view";
					break;
				}
			default: {
					$judul_baru = "Edit Profil";
					$sbg = "editP";
					break;
				}
		}
		$data['judul_modal'] = $judul_baru;
		$data['sebagai'] = $sbg;
		$this->load->view('modals/karyawan', $data);
	}

	public function divisi($judul = "", $id = "")
	{
		$data['all_divisi'] = $this->m_divisi->get_all_divisi();
		$data['num_divisi'] = $this->m_divisi->all_divisi();
		$data['detail_divisi'] = $this->m_divisi->get_divisi_by($id);
		switch($judul){
			case "t": {
					$judul_baru = "Tambah Divisi";
					$sbg = "tambah";
					break;
				}
			case "v": {
					$judul_baru = "Data Divisi";
					$sbg = "view";
					break;
				}
			default: {
					$judul_baru = "Edit Divisi";
					$sbg = "edit";
					break;
				}
		}
		$data['judul_modal'] = $judul_baru;
		$data['sebagai'] = $sbg;
		$this->load->view('modals/divisi',$data);
	}

	public function kepentingan($judul = "", $id = "")
	{
		$data['all_kepentingan'] = $this->m_kepentingan->get_all_kepentingan();
		$data['num_kepentingan'] = $this->m_kepentingan->all_kepentingan();
		$data['detail_kepentingan'] = $this->m_kepentingan->get_kepentingan_by($id);
		switch($judul){
			case "t": {
					$judul_baru = "Tambah kepentingan";
					$sbg = "tambah";
					break;
				}
			case "v": {
					$judul_baru = "Data kepentingan";
					$sbg = "view";
					break;
				}
			default: {
					$judul_baru = "Edit kepentingan";
					$sbg = "edit";
					break;
				}
		}
		$data['judul_modal'] = $judul_baru;
		$data['sebagai'] = $sbg;
		$this->load->view('modals/kepentingan',$data);
	}
	
}
