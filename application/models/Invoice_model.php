<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
	    $this->load->database();
    }

    public function createInvoice($id){
        $query = $this->db->get_where('medications', array('id' => $id));
        $med = $query->row_array();
        // print_r($med);
        $data = array(
            'name' => $med['name'],
            'medication_id' => $id,
            'description' => $med['description'],
            'price' => $med['price'],
            'doctors_comment' => $med['doctors_comment'],
            'status' => $med['status'],
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        );
        
        return $this->db->insert('invoices', $data);
    }

    public function getAllInvoices(){
        $query = $this->db->get('invoices');
        return $query->result_array();
    }

    public function paymentSuccess($id){
        $data = array (
            'status' => 3,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('medication_id', $id);
        return $this->db->update('invoices', $data);
    }

    public function deleteAll(){
       return $this->db->empty_table('invoices');
    }

    public function viewInvoice($id){
        $query = $this->db->get_where('invoices', array('medication_id' => $id));
		return $query->row_array();
    }
}