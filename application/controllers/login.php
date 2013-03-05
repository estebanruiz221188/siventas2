<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index() {return 0;}

	function login_usuario()
	{
		$this->load->model('login_model');
		$data=$this->login_model->login_usuario($_POST["usuario"],$_POST["password"]);
		echo json_encode($data);
	}

	function unlog()
	{
		$this->load->library('session');
		$this->session->destroy();
		$data["js"][]="window.location.href=CI_ROOT";
		echo json_encode($data);
	}

}