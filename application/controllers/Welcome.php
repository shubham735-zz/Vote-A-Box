<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect(base_url('Auth'));
		}
	}

	public function index()
	{
		$this->load->view('head');
		$this->load->view('foot');
	}
}
