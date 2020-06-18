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

    public function tokenRequest(){
        $this->load->view('api/token');
    }

    public function testFormRequest(){
        $this->load->view('templates/header');
        $this->load->view('api/test-form');
        $this->load->view('templates/footer');
    }

    public function verifyRequest(){
        $input = $this->input->post();

        $auth_token = $this->getAuthToken();

        $bday = date('Y-m-d', strtotime($input['birthday']));

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
        CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:".$input['verify']."\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"".$bday."\",\r\n    \"medicare\": {\r\n      \"number\": \"".$input['irn']."\",\r\n      \"ref\": ".$input['ref']."\r\n    },\r\n    \"gender\": \"".$input['gender']."\",\r\n    \"name\": {\r\n      \"first\": \"".$input['first_name']."\",\r\n      \"family\": \"".$input['last_name']."\"\r\n    }\r\n  }\r\n}",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Bearer ". $auth_token
        ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);

        if (strpos($response, 'Patient details verified') !== false) {
          $this->session->set_flashdata('success', 'Verified');
        } else {
          $this->session->set_flashdata('error', 'Please check the details and try again.');
        }

        // redirect('test-form-api', 'dash', TRUE);
        redirect('test-form-api')->withInput();

    }

    public function getAuthToken(){
      
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.claiming.com.au/dev/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\r\n\t\"client_id\": \"K6KNRWORSAUY45WK23U2\",\r\n\t\"client_secret\": \"ysd4xKK9MxFmtbAwxQomow3kiqHdlujmgcUFJUI3P9hgUpBKwcP6fp5uy7Dj\",\r\n\t\"grant_type\": \"client_credentials\"\r\n}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $test = json_decode($response, true);
    curl_close($curl);
    $tmp = explode(',',$response,2);
    $tmp2 = substr($tmp[0], 17);
    return $auth_token = substr_replace($tmp2, "", -1);

    }

}