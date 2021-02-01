<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('User_model');
		$users=$this->User_model->getall();
		// echo "<pre>";
		// print_r($users);
		// echo "</pre>";
		$data=array();
		$data['users']=$users;
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function insertuser(){
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('phone','Phone Number','required');
		if($this->form_validation->run()==false){
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		}else{
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['phone']=$this->input->post('phone');
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success','User added successfully');
			redirect(base_url('User/index'));
		}
	}
	public function edit($userId){
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$user=$this->User_model->fetchUser($userId);
		$data=array();
		$data['user']=$user;
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('phone','Phone Number','required');
		if($this->form_validation->run()==false){
			$this->load->view('header');
			$this->load->view('edit',$data);
			$this->load->view('footer');
		}else{
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['phone']=$this->input->post('phone');
			$this->User_model->updateUser($userId,$formArray);
			$this->session->set_flashdata('success','User updated successfully');
			redirect(base_url('User/index'));
		}
	}
	public function delete($userId){
		$this->load->model('User_model');
		$user=$this->User_model->fetchUser($userId);
		if(empty($user)){
			$this->session->set_flashdata('failure','User not found');			
			redirect(base_url('User/index'));
		}
		$this->User_model->deleteUser($userId);
		$this->session->set_flashdata('success','User deleted Successfully');			
		redirect(base_url('User/index'));
	}
}
