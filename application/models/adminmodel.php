<?php

/**
* Admin Model
*/	
class Adminmodel extends CI_Model
{
	public function insert_article(array $data){
		return $this->db->insert("article", $data);
	}

	public function list_article($limit, $offset){
		$user_id = $this->session->userdata("sid");
		$query = $this->db->select("*")
							->where("user_id", $user_id)
							->limit($limit, $offset)
							->order_by("created_at", "DESC")
							->get("article");
		if($query->num_rows()){
	   		return $query->result();
	   	}else{
	   		return false;
	   	}
	}

	public function all_article_list($limit, $offset){
		$query = $this->db->select("id, title, created_at")
							->limit($limit, $offset)
							->order_by("created_at", "DESC")
							->get("article");
		if($query->num_rows()){
	   		return $query->result();
	   	}else{
	   		return false;
	   	}	
	}

	public function article_count(){
		$user_id = $this->session->userdata("sid");
		$query = $this->db->select("*")->where("user_id", $user_id)->get("article");
   		return $query->num_rows();
	}

	public function all_article_count(){
		$query = $this->db->select("*")->get("article");
   		return $query->num_rows();
	}

	public function get_article($article_id, $user_id){
		$query = $this->db->select("id, title, body, image_path")
							->where(["id" => $article_id, "user_id" => $user_id])
							->get("article");
		if($query->num_rows()){
	   		return $query->row();
	   	}else{
	   		return false;
	   	}	
	}

	public function update_articles(array $data, $article_id, $user_id){
		return $this->db->where(["id" => $article_id, "user_id" => $user_id])
					->update("article", $data);
	}

	public function delete_articles($article_id, $user_id){
		return $this->db->where(["id" => $article_id, "user_id" => $user_id])
							->delete("article");
	}

	public function search_article($searchText, $limit, $offset){
		$query = $this->db->select("title, created_at")
							->like("title", $searchText)
							->limit($limit, $offset)
							->order_by("created_at", "DESC")
							->get("article");
		if($query->num_rows()){
	   		return $query->result();
	   	}else{
	   		return false;
	   	}	
	}

	public function search_article_count($searchText){
		$query = $this->db->select("title")
							->like("title", $searchText)
							->get("article");
		return $query->num_rows();
	}

	public function find_article( $id ){
		$q = $this->db->select("*")
					->where(["id" => $id])
					->get("article");

		if($q->num_rows()){
			return $q->row();
		}else{
			return false;
		}			

	}

	public function getArticalImage($data){
		$q = $this->db->select("image_path")
						->where($data)
						->get("article");
		return $q->row();
	}

}

?>