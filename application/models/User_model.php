<?php

class User_model extends CI_model{
	public function create($formArray){
		$this->load->database();
		echo "<pre>";
		print_r($formArray);
		echo "</pre>";
		$this->db->insert("users",$formArray);
	}
	public function getall(){
		$this->load->database();
		$users=$this->db->get('users')->result_array();
		return $users;
	}
	public function fetchUser($userId){
		$this->load->database();
		$this->db->where('id',$userId);
		$user=$this->db->get('users')->result_array();
		return $user;
	}
	public function updateUser($userId,$formArray){
		$this->load->database();
		$this->db->where('id',$userId);
		$this->db->update('users',$formArray);
	}
	public function deleteUser($userId){
		$this->load->database();
		$this->db->where('id',$userId);
		$this->db->delete('users');
	}
}

?>