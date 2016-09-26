<?php

/**
* 
*/
class Login extends MY_Controller
{
	
	public function index(){
		$this->admin_login();
	}

	function __construct(){
		parent::__construct();
		if($this->session->userdata("sid")):
			redirect("admin/dashboard");
			exit;
		endif;
	}

	public function admin_login(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("uname", "Username", "required|min_length[5]|max_length[15]|trim|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|alpha_numeric|trim");
		if($this->form_validation->run()){
			$Username = $this->input->post('uname');
			$Password = $this->input->post('password');
			$this->load->model("loginmodel");
			$login_id = $this->loginmodel->valid_user($Username, $Password);
			if( $login_id ){
				$this->load->library("session");
				$this->session->set_userdata("sid",$login_id);
				redirect('admin/dashboard');
			}else{
				echo "not Found";
			}
		}else{
			$this->load->view("public/login");
		}
	}
}

?>