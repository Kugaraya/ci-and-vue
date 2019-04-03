<?php

/**
 * @author Kim Testa @https://github.com/TK-Works
 * @copyright 2019
 * @license MIT Open-source
 */
class Vue_model extends CI_Model {

	public function __construct() {
		parent::__construct();
    }

    public function showAll(){
        $query = $this->db->get('users');
        return $query->num_rows()>0 ? $query->result() : false;
    }

    public function addUser($data){
        return $this->db->insert('users', $data);
    }

    public function updateUser($id,$field){
        $this->db->where('id', $id);
        $this->db->update('users', $field);
        return $this->db->affected_rows()>0 ? true : false;
    }

    public function deleteUser($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows()>0 ? true : false;
    }

    public function searchUser($match) {
        $field = array('firstname','lastname','gender','birthday','email','contact', 'address');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('users');
        return $query->num_rows()>0 ? $query->result() : false;
    }
}