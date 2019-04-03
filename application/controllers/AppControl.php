<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Kim Testa @https://github.com/TK-Works
 * @copyright 2019
 * @license MIT Open-source
 *  
 * AppControl class controller
 */
class AppControl extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vue_model','vue');
	}

    public function showAll(){

		$query = $this->vue->showAll();
		if($query){
			$result['users'] = $this->vue->showAll();
		}
		echo json_encode($result);
	}
	
	public function addUser(){
		$config = array(
			array('field' => 'firstname',
				'label' => 'Firstname',
				'rules' => 'trim|required'
			),
			array('field' => 'lastname',
				'label' => 'Lastname',
				'rules' => 'trim|required'
			),
			array('field' => 'gender',
				'label' => 'Gender',
				'rules' => 'required'
			),
			array('field' => 'birthday',
				'label' => 'Birthday',
				'rules' => 'trim|required'
			),
			array('field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'address',
				'label' => 'Address',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'firstname'=>form_error('firstname'),
                'lastname'=>form_error('lastname'),
                'gender'=>form_error('gender'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'address'=>form_error('address')
            );    
        } else {
			$data = array(
				'firstname'=> $this->input->post('firstname'),
				'lastname'=> $this->input->post('lastname'),
				'gender'=> $this->input->post('gender'),
				'birthday'=> $this->input->post('birthday'),
				'email'=> $this->input->post('email'),
				'contact'=> $this->input->post('contact'),
				'address'=> $this->input->post('address')	
			);
			
            if($this->vue->addUser($data)){
               	$result['error'] = false;
            	$result['msg'] ='User added successfully';
            }
        }
        echo json_encode($result);
	}

	public function updateUser(){		
		$config = array(
			array('field' => 'firstname',
				'label' => 'Firstname',
				'rules' => 'trim|required'
			),
			array('field' => 'lastname',
				'label' => 'Lastname',
				'rules' => 'trim|required'
			),
			array('field' => 'gender',
				'label' => 'Gender',
				'rules' => 'required'
			),
			array('field' => 'birthday',
				'label' => 'Birthday',
				'rules' => 'trim|required'
			),
			array('field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'address',
				'label' => 'Address',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$result['error'] = true;
			$result['msg'] = array(
				'firstname'=>form_error('firstname'),
				'lastname'=>form_error('lastname'),
				'gender'=>form_error('gender'),
				'birthday'=>form_error('birthday'),
				'email'=>form_error('email'),
				'contact'=>form_error('contact'),
				'address'=>form_error('address')
			);
			
		} else {
			$id = $this->input->post('id');
			$data = array(
				'firstname'=> $this->input->post('firstname'),
				'lastname'=> $this->input->post('lastname'),
				'gender'=> $this->input->post('gender'),
				'birthday'=> $this->input->post('birthday'),
				'email'=> $this->input->post('email'),
				'contact'=> $this->input->post('contact'),
				'address'=> $this->input->post('address')
			);
			if($this->vue->updateUser($id,$data)){
				$result['error'] = false;
				$result['success'] = 'User updated successfully';
			}
		}
		echo json_encode($result);
	}
	
	public function deleteUser(){
		$id = $this->input->post('id');
	   	if($this->vue->deleteUser($id)){
			$msg['error'] = false;
			$msg['success'] = 'User deleted successfully';
	   	} else {
			$msg['error'] = true;
	   	}
	   	echo json_encode($msg);
	}
	
	public function searchUser(){
		$value = $this->input->post('text');
		$query =  $this->vue->searchUser($value);
		if($query){
			$result['users']= $query;
		}  
	   	echo json_encode($result);	
   	}
}