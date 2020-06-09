<?php

class Medication_Model extends CI_Model {

    function __construct()
    {
	    $this->load->database();
    }
   
    public function getAllMedications(){
        $query = $this->db->get('medications');
        return $query->result_array();
    }

    public function requestForPrescription($id){
        $data = array (
            'status' => 1
        );
        $this->db->where('id', $id);
        return $this->db->update('medications', $data);
    }

    public function viewRequestedPrescription($id){
        $query = $this->db->get_where('medications', array('id' => $id));
		return $query->row_array();
    }

    public function approvePrescription($id){
        $data = array(
            'doctors_comment' => $this->input->post('doctors_comment'),
            'price' => $this->input->post('price'),
            'status' => 2
        );
        $this->db->where('id', $id);
        return $this->db->update('medications', $data);
    }

    public function getAllTransactions(){
        $status = array(2,3);
        $this->db->where_in('status', ['2','3']);
        $query = $this->db->get('medications');
        return $query->result_array();
    }
}