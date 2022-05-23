<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		if (!$this->session->has_userdata('auth')) {
			return redirect('auth/login');
		}
		return redirect('admin/dashboard');
	}
}
