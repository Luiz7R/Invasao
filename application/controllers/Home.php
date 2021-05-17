<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	 function __construct()
	 {
	 		parent::__construct();
	 		$this->load->model("publicacoes_model", 'pb');
	 }

	 public function index ()
	 {
	 	$this->load->view('templates/header');
	 	$this->load->view('templates/invs');
	 	$this->load->view('home');
	 	$this->load->view('templates/footer');
	 }

	 public function addPub() 
	 {
	 	$pub = $this->pb->addPub();
	 	$msg['success'] = false;
	 	$msg['type'] = 'add';

	 	if ( $pub )
	 	{
	 		 $msg['success'] = true;
	 	}
	 	echo json_encode($msg);
	 }
}