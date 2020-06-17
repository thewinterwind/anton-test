<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
	    $this->load->database();
    }

    public function getAllPatient(){
        $query = $this->db->get('patients');
        return $query->result_array();
    }

    public function getPatientDetails($postData=array()){
        $response = array();
 
        if(isset($postData['id']) ){
     
          // Select record
          $this->db->select('*');
          $this->db->where('id', $postData['id']);
          $records = $this->db->get('patients');
          $response = $records->result_array();
     
        }
     
        return $response;
    }
}