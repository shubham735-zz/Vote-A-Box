<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function check_cc()
	{
		$data=$this->Model->count('*' , 'user' , array('id'=>$_POST['cc']) );
		echo $data;
	}
}