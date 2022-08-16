<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
        $data['page_title'] = 'Home - Job Portal';
		$this->load->view('header/header', $data);
        $this->load->view("home/home_view");
        $this->load->view("footer/footer.php");
	}
}
?>