<?php

/**
* Logout controller	
*/
class Logout extends MY_Controller
{
	public function index(){
		$this->logout_user();
	}

	public function logout_user(){
		$this->load->library("session");
		$this->session->unset_userdata("sid");
		$this->session->sess_destroy();
		redirect("login/admin_login");
		exit;
	}


}

?>