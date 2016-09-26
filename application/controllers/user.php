<?php

/**
* 	User Controller
*/
class User extends MY_Controller {
	
	function index()
	{
		$this->all_article_list();
	}

	public function all_article_list(){
		$this->load->helper("form");
		$this->load->library('pagination');
		$this->load->model("adminmodel", "admin");
		$config = $this->__PaginationConfig(base_url("user/all_article_list"), $this->admin->all_article_count(), 3);
		$articles = $this->admin->all_article_list($config['per_page'], $this->uri->segment(3));
		$this->load->view("public/all_article_list", compact("articles"));
	}

	public function search(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("searchtext", "article", "required");
		if($this->form_validation->run()){
			$searchtext = $this->input->post("searchtext");
			return redirect("user/search_article/{$searchtext}");
			exit;
		}else{
			return $this->index();
		}
	}

	public function search_article( $searchtext ){
		$this->load->helper("form");
		$this->load->library('pagination');
		$this->load->model("adminmodel", "admin");
		$config = $this->__PaginationConfig(base_url("user/search_article/$searchtext"), $this->admin->search_article_count($searchtext), 4);
		$search_articles = $this->admin->search_article($searchtext, $config['per_page'], $this->uri->segment(4));
		$this->load->view("public/search_result", compact("search_articles"));
	}

	private function __PaginationConfig($url, $total_rows, $uri_segment){
		$config = array(
				"base_url" 			=> $url,
				"per_page" 			=> 5,
				"total_rows" 		=> $total_rows,
				"uri_segment"		=> $uri_segment,
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
		return $config;
	}

	public function find( $id ){
		$this->load->model("adminmodel", "admin");
		$this->load->helper("form");
		$article = $this->admin->find_article( $id );
		$this->load->view("public/article_details", compact("article"));
	}
}

?>