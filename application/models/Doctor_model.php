<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->database();
    }

    public function addDoctorsAccount($type, $acct){
        $data = array(
            'acct_id' => $acct,
            'type' => $type
        );
        return $this->db->insert('doctors', $data);

    }

}