<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poll extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect(base_url('Auth'));
		}
	}

	public function create()
	{
		$this->load->view('head');
		$this->load->view('Poll/create');
		$this->load->view('foot');	
	}

	public function addPollOptions()
	{
		$data['options']=$_POST['options'];
		unset($_POST['options']);
		$data['id']=$this->Model->insertData($_POST ,'contest');
		$this->load->view('head');
		$this->load->view('Poll/addOptions',$data);
		$this->load->view('foot');
	}

	public function saveOptions()
	{
		// echo $_POST['options'];
		for ($i=1; $i <= $_POST['options']; $i++) { 
			$this->Model->insertData(array('options' => $_POST['option'.$i] , 'contest_id'=>$_POST['contest_id']) ,'options');
			
		}                           
		redirect('Poll/prev_poll');
	}

	public function prev_poll()
	{
		$query1="SELECT * from contest where admin=".$_SESSION['id'];
		$query="SELECT COUNT(reg_vote.option_id) as votes,options.options,contest.statement,contest.id from reg_vote,options,contest WHERE contest.id=options.contest_id AND options.id=reg_vote.option_id GROUP by reg_vote.option_id";
		$data['poll']=$this->Model->customQuery($query);
		$data['contest']=$this->Model->customQuery($query1);
		$this->load->view('head');
		$this->load->view('Poll/prev_poll',$data);
		$this->load->view('foot');
		// print_r($data);
	}

	public function status($status,$id)
	{
		$this->Model->updateData('contest', array('id'=>$id), array('active' => $status ));
		// echo $this->db->last_query();echo "<br>";
		$query="SELECT options.options,COUNT(reg_vote.option_id) as c from reg_vote,options WHERE options.id=reg_vote.option_id AND reg_vote.contest_id=".$id." group by reg_vote.option_id order by c desc limit 1";
		$data=$this->Model->customQuery($query);
		// echo $this->db->last_query();echo "<br>";
		$this->Model->updateData('contest', array('id'=>$id), array('winner' => $data[0]->options ));
		// echo $this->db->last_query();echo "<br>";
		// exit();
		redirect(base_url('Poll/prev_poll'));
	}

	public function cast()
	{
		$data['cast']=$this->Model->selectData('*','contest',array('active' => 1 ));
		$query="select * from reg_vote WHERE reg_vote.user_id=".$_SESSION['id'];
		$data['votes']=$this->Model->customQuery($query);
		$this->load->view('head');
		$this->load->view('Poll/cast',$data);
		$this->load->view('foot');
	}

	public function vote($id,$cc)
	{
		$data['cc']=$cc;
		$data['question']=$this->Model->selectData('*','contest',array('id' => $id ));
		$data['options']=$this->Model->selectData('*','options',array('contest_id' => $id ));
		$this->load->view('head');
		$this->load->view('Poll/vote',$data);
		$this->load->view('foot');
		// echo "<pre>";
		// print_r($data);
	}

	public function castMyVote()
	{
		foreach ($_POST['options'] as $o) {
			print_r($o);
			$this->Model->insertData( array('user_id' => $_POST['user_id'], 'contest_id'=>$_POST['contest_id'],'option_id'=>$o) ,'reg_vote');
		}
		redirect('Poll/cast');
	}

	public function myPoll()
	{
		$query="select * FROM reg_vote,contest WHERE reg_vote.contest_id=contest.id and reg_vote.user_id=".$_SESSION['id']." GROUP by reg_vote.contest_id";
		$query1="SELECT reg_vote.contest_id,options.options from reg_vote,options where reg_vote.option_id=options.id and reg_vote.user_id=".$_SESSION['id'];
		$data['contest']=$this->Model->customQuery($query);
		$data['poll']=$this->Model->customQuery($query1);
		$this->load->view('head');
		$this->load->view('Poll/myPoll',$data);
		$this->load->view('foot');
	}
}