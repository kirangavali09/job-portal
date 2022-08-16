<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		
		$data['page_title'] = 'Login - Job Portal';
		$this->load->view('header/header', $data);
		$this->load->view("global/login");
		$this->load->view("footer/footer");
	}
}
?>
