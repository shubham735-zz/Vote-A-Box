<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('log');
	}

	public function verify()
	{
		$_POST['password']=md5($_POST['password']);
		$data['info']=$this->Model->rowData('users', $_POST, '*');
		$count=$this->Model->count('*' , 'users' , $_POST );
		if ($count==1) {
			$_SESSION['id']=$data['info'][0]->id;
			$_SESSION['type']=$data['info'][0]->type;
			$_SESSION['name']=$data['info'][0]->name;
			redirect(base_url('Welcome'));
		}
		else{
			redirect(base_url('Auth'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Auth'));
	}

	public function password($id)
	{
		$data['id']=$id;
		$this->load->view('head');
		$this->load->view('Users/change',$data);
		$this->load->view('foot');
	}

	public function change()
	{
		$this->Model->updateData('users', array('id'=>$_POST['id']), array('password' => md5($_POST['password']) ));
		echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
	}
}	