<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
	public function index()
	{
		$data['page_title'] = 'Register - Job Portal';
		$this->load->view('header/header', $data);
		$this->load->view('global/signup');
		$this->load->view('footer/footer');
	}
	
}
?>
