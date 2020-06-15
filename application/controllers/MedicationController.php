<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class MedicationController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model("medication_model");
     }

    public function requestForPrescription($id){

        $data['medication'] = $this->medication_model->requestForPrescription($id);

        $this->session->set_flashdata('success', 'Subimitted the Requested Prescription Successfully.');

        redirect('patient');
    }

    public function viewRequestedPrescription($id){
        $data['medication'] = $this->medication_model->viewRequestedPrescription($id);

        $this->load->view('templates/header');
        $this->load->view('pages/medication', $data);
        $this->load->view('templates/footer');
    }

    public function approvePrescription($id){
        $this->form_validation->set_rules('doctors_comment', 'doctors_comment', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');	

        $this->medication_model->approvePrescription($id);
        $this->invoice_model->createInvoice($id);

        
        $this->session->set_flashdata('success', 'Approved - Awaiting Payment.');

		redirect('doctor', 'refresh');
    }

    public function createInvoice(){

    }

}
    