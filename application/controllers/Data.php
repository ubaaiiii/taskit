<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{ }

	public function request()
	{
		$this->load->view('data/request');
	}

	public function karyawan()
	{
		$this->load->view('data/karyawan');
	}

	public function divisi()
	{
		$this->load->view('data/divisi');
	}

	public function kepentingan()
	{
		$this->load->view('data/kepentingan');
	}

	public function myTask()
	{
		$this->load->view('data/divisi');
	}

	public function managerTask()
	{
		$this->load->view('data/divisi');
	}
}
