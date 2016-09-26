<?php

/**
* 
*/
class Loginmodel extends CI_Model
{
	public function valid_user($Username, $Password){

		$data = array('uname' => $Username, 'pass' => md5($Password));
		$this->db->where($data);
		$q = $this->db->get("user");
		if($q->num_rows()){
			return $q->row()->id;
		}else{
			return false;
		}
	}
}

?>