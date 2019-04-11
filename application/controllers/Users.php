<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect(base_url('Auth'));
		}
	}

	public function changestatus($status,$id)
	{
		$this->Model->updateData('users', array('id'=>$id), array('type' => $status ));
		redirect(base_url('Users/view'));
	}

	public function usersstatus($status,$id)
	{
		$this->Model->updateData('users', array('id'=>$id), array('active' => $status ));
		redirect(base_url('Users/view'));
	}
	public function add()
	{
		if ($_SESSION['type']==1) {
			$this->load->view('head');
			$this->load->view('Users/add');
			$this->load->view('foot');
		}
		else{
			$this->load->view('noaccess');
		}
	}

	public function addUser()
	{
		if ($_SESSION['type']==1) {
			$this->Model->insertData($_POST ,'users');
			redirect(base_url('Users/view'));
		}
		else{
			$this->load->view('noaccess');
		}
	}

	public function view()
	{
		if ($_SESSION['type']==1) {
			$data['users']=$this->Model->selectData('*', 'users' , array());
			$this->load->view('head');
			$this->load->view('Users/view',$data);
			$this->load->view('foot');
		}
		else{
			$this->load->view('noaccess');
		}
	}
}
