<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_divisi');
		$this->load->model('m_request');
		$this->load->model('M_karyawan');
		$this->load->model('m_kepentingan');
		// $this->load->model('m_nilai');
		// $this->m_nilai->hitung();
	}

	public function simpan($table=""){
		switch ($table) {
			case 'karyawan':
				$data = $this->M_karyawan->proses_karyawan();
				echo json_encode($data);
				break;
			case 'request':
				$data = $this->m_request->proses_request();
				echo json_encode($data);
				break;
			case 'divisi':
				$data = $this->m_divisi->proses_divisi();
				echo json_encode($data);
				break;
			case 'kepentingan':
				$data = $this->m_kepentingan->proses_kepentingan();
				echo json_encode($data);
				break;
			default:
				$this->load->view();
				break;
		}
	}

	public function kirim_email($jenis=null)
	{
		$this->load->config('email');
        $this->load->library('email');

        // $kiriman = $this->input->post('nama');

        $from = $this->config->item('smtp_user');
        $to = $this->input->post('email');
        $data['nama'] = $this->input->post('nama');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['email'] = $to;

        $subject = "Razaki: Create Account Success";

        $this->email->set_newline("\r\n");
        $this->email->from('no-replyt@PFI_MEGALIFE.com','Task IT');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/email', $data, TRUE));
        $this->email->set_mailtype('html');
        if ($this->email->send()){
        	echo "Berhasil";
        } else {
        	echo "GAGAL";
        	var_dump($data);
        }
	}
}
