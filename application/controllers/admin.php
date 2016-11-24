<?php

/**
* Admin
*/
class Admin extends MY_Controller
{
	
	public function index(){
		$this->dashboard();
	}

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("sid")):
			redirect("login");
			exit();
		endif;
		$this->load->model("adminmodel", "admin");
	}

	public function dashboard(){
		$this->load->helper("form");
		$this->load->library('pagination');
		$config = array(
					"base_url" 			=> base_url("admin/dashboard"),
					"per_page" 			=> 2,
					"total_rows" 		=> $this->admin->article_count(),
					"full_tag_open"		=>	"<ul class='pagination'>",
					"full_tag_close" 	=> "</ul>",
					"next_tag_open"  	=>	"<li>",
					"next_tag_close" 	=>	"</li>",
					"prev_tag_open"  	=>	"<li>",
					"prev_tag_close" 	=>	"</li>",
					"num_tag_open"  	=>	"<li>",
					"num_tag_close" 	=>	"</li>",
					"cur_tag_open"  	=>	"<li class='active'><a href='javascript:void(0)'>",
					"cur_tag_close" 	=>	"</a></li>",
					"first_tag_open"  	=>	"<li>",
					"first_tag_close" 	=>	"</li>",
					"last_tag_open"  	=>	"<li>",
					"last_tag_close" 	=>	"</li>",
					"first_link"		=>	"F",
					"last_link"			=>	"L",		
 					);
		$this->pagination->initialize($config);
		$result = $this->admin->list_article($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/dashboard', array('data' => $result));
	}

	public function article_form(){
		$this->load->helper("form");
		$this->load->view('admin/article_form');
	}

	public function store_article(){
		$this->load->library("form_validation");
		$config = $this->__ImageConfiguration();
		$this->load->library('upload', $config);
		if($this->form_validation->run("articleform") == TRUE && $this->upload->do_upload("image")){
			$data = $this->security->xss_clean($this->input->post());	
			$data['user_id'] = $this->session->userdata("sid");
			$imageDetails = $this->upload->data();
			$data['image_path'] = "/uploads/orignal/" . $imageDetails['raw_name'] . $imageDetails['file_ext'];
			$this->__FeedbackAndRedirect($this->admin->insert_article($data), "The article is successfully Added", "The article is Fails to Added");
		}else{
			$upload_error = $this->upload->display_errors("<p class='text-danger'>", "</p>");
			$this->load->view("admin/article_form", compact("upload_error"));
		}
	}

	public function edit_article($article_id){
		$user_id = $this->session->userdata("sid");
		if($data = $this->admin->get_article($article_id, $user_id)):
			$this->load->helper("form");
			$this->load->view('admin/edit_article_form', ["article" => $data]);
		else:
			redirect("admin/dashboard");
			exit;
		endif;
	}

	public function update_article($article_id){
		$this->load->library("form_validation");
		$config = $this->__ImageConfiguration();
		$this->load->library('upload', $config);
		if($this->form_validation->run("articleform") == TRUE){
			$data = $data = $this->security->xss_clean($this->input->post());
			unset($data["old_image"]);	
			$user_id = $this->session->userdata("sid");
			if($this->upload->do_upload("image")){
				$imageDetails = $this->upload->data();
				$data['image_path'] = "uploads/orignal/" . $imageDetails['raw_name'] . $imageDetails['file_ext'];
				@unlink($this->input->post("old_image"));				
			}else{
				$upload_error = $this->upload->display_errors("<p class='text-danger'>", "</p>");
				$this->load->view("admin/edit_article_form", compact("upload_error"));
			}
			$this->__FeedbackAndRedirect($this->admin->update_articles($data, $article_id, $user_id), "The article is successfully Updated", "The article is Fails to Updated");
		}else{
			$this->edit_article($article_id);
		}
	}

	public function delete_article(){
		$article_id = $this->input->post("id");
		$user_id = $this->session->userdata("sid");
		$image = $this->admin->getArticalImage(array("id" => $article_id, "user_id" => $user_id));
		@unlink($image->image_path);
		$this->__FeedbackAndRedirect($this->admin->delete_articles($article_id, $user_id), "The article is successfully Deleted", "The article is Fails to Deleted");
	}

	private function __FeedbackAndRedirect($opration, $successmsg, $failuremsg){
		if($opration){
			$this->session->set_flashdata("feedback", $successmsg);
			$this->session->set_flashdata("class", "alert alert-dismissible alert-success");
		}else{
			$this->session->set_flashdata("feedback", $failuremsg);
			$this->session->set_flashdata("class", "alert alert-dismissible alert-danger");
		}
		redirect("admin/dashboard");
	}

	private function __ImageConfiguration(){
		return array(
					"upload_path" => './uploads/orignal/',
					"allowed_types"	=> "jpg|gif|png|jpeg"
				);
	}
}


/*

	when create construct in ci controller is necessary to call parent construct line : 14

*/

?>