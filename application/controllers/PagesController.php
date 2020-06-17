<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class PagesController extends CI_Controller {

    public function patientPage(){

        $data['medications'] = $this->medication_model->getAllMedications();
        $data['transactions'] = $this->medication_model->getAllTransactions();

        // var_dump($data);
        // die();

        $this->load->view('templates/header');
        $this->load->view('pages/patient', $data);
        $this->load->view('templates/footer');

    }

    public function doctorPage(){

        $data['medications'] = $this->medication_model->getAllMedications();
        $data['transactions'] = $this->medication_model->getAllTransactions();

        $this->load->view('templates/header');
        $this->load->view('pages/doctor', $data);
        $this->load->view('templates/footer');
    }

    public function resetPage(){

        $data['medications'] = $this->medication_model->resetStatus();
        $this->invoice_model->deleteAll();
      redirect('patient', 'refresh');

    }

    public function invoicePage(){
        $data['patients'] = $this->patient_model->getAllPatient();
        $this->load->view('templates/header');
        $this->load->view('pages/invoice', $data);
    }

    public function testInvoicePage(){

        $data['invoices'] = $this->invoice_model->getAllInvoices();

        $this->load->view('templates/header');
        $this->load->view('pages/test-invoice', $data);
        $this->load->view('templates/footer');
    }

}