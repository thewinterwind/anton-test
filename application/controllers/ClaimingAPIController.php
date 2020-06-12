<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClaimingAPIController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
     }

    public function testRequest(){
        $this->load->view('api/test');
    }

    public function authRequest(){
        $this->load->view('api/auth');
    }

    public function listPaymentRequest(){
        $this->load->view('api/list-payment');
    }

    public function claimRequest(){
        $this->load->view('api/claim');
    }

    public function testFormRequest(){
        $this->load->view('templates/header');
        $this->load->view('api/test-form');
        $this->load->view('templates/footer');
    }

    public function verifyRequest(){
        $input = $this->input->post();

        $bday = date('Y-m-d', strtotime($input['birthday']));

        // print_r($bday);
        // die();

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.claiming.com.au/dev/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:".$input['verify']."\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \".$bday.'\",\r\n    \"medicare\": {\r\n      \"number\": \"'.$input['irn'].'\",\r\n      \"ref\":".$input['ref']."\r\n    },\r\n    \"gender\":\"'.$input['gender']'.\",\r\n    \"name\": {\r\n      \"first\": \"'.$input['first_name'].'\",\r\n      \"family\": \"'.$input['last_name'].'\"\r\n    }\r\n  }\r\n}",
        CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:".$input['verify']."\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"".$bday."\",\r\n    \"medicare\": {\r\n      \"number\": \"".$input['irn']."\",\r\n      \"ref\": ".$input['ref']."\r\n    },\r\n    \"gender\": \"".$input['gender']."\",\r\n    \"name\": {\r\n      \"first\": \"".$input['first_name']."\",\r\n      \"family\": \"".$input['last_name']."\"\r\n    }\r\n  }\r\n}",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Bearer o-CQEMmav8KGrERPmwti9Y5UcO9t4ZGf"
        ),
        ));

        // curl_exec($curl);

        $response = curl_exec($curl);

        // $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // var_dump($response);

        // var myJSON = JSON.stringify(obj);
        // die();

        if (strpos($response, 'Patient details verified') !== false) {
            $this->session->set_flashdata('success', 'Verified');
        } else {
            $this->session->set_flashdata('error', 'Please check the details and try again.');
        }


        // if($response === 200){
        //     $this->session->set_flashdata('success', 'Verified');
        // } else {
        //     $this->session->set_flashdata('error', 'Please check the details and try again.');
        // }

        redirect('test-form-api', 'dash', TRUE);
        // redirect($this->session->flashdata('test-form-api'));

    }

}