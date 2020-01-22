<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function nilai(){
		$this->load->view('cari/nilai');
	}

	public function email($id="email"){
		$data['nama'] = $this->input->get('nama');
		$data['catetan'] = $this->input->get('catetan');
        $data['username'] = $this->input->get('username');
        $data['password'] = $this->input->get('password');
        $data['email'] = $this->input->get('email');
        $data['kode'] = $this->input->get('kode');
        $data['reporter'] = $this->input->get('reporter');
        $data['detail'] = $this->input->get('detail');
        $data['tanggalRequest'] = $this->input->get('detail');
		$this->load->view('email/'.$id,$data);
	}


}
