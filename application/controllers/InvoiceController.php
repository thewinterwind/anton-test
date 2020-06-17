<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class InvoiceController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model("invoice_model");
     }

    public function createInvoice(){
        $data['invoice'] = $this->invoice_model->createInvoice();
        print_r($this->input->post());
    }

    public function creatingInvoice(){
        print_r($this->input->post());
    }

    public function viewInvoice($id){
        $data['trans'] = $this->invoice_model->viewInvoice($id);
        $this->load->view('templates/header');
        $this->load->view('pages/view-invoice', $data);
        $this->load->view('templates/footer');
    }

    public function selectPatient(){
        $postData = $this->input->post();
        $data = $this->patient_model->getPatientDetails($postData);
        echo json_encode($data);
    }

    public function verifyInvoice(){
        $input = $this->input->post();

        $auth_token = $this->getAuthToken();

        $bday = date('Y-m-d', strtotime($input['birthday']));

        // var_dump($bday);
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
        CURLOPT_POSTFIELDS =>"{\r\n  \"type\": \"Verify:".$input['verify']."\",\r\n  \"patient\": {\r\n    \"dateOfBirth\": \"".$bday."\",\r\n    \"medicare\": {\r\n      \"number\": \"".$input['med_num']."\",\r\n      \"ref\": ".$input['irn']."\r\n    },\r\n    \"gender\": \"".$input['gender']."\",\r\n    \"name\": {\r\n      \"first\": \"".$input['first_name']."\",\r\n      \"family\": \"".$input['last_name']."\"\r\n    }\r\n  }\r\n}",
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
        redirect('invoice')->withInput();

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
    