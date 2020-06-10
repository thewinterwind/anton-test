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
      redirect('patient', 'refresh');

    }

    public function invoicePage(){
        $this->load->view('templates/header');
        $this->load->view('pages/invoice');
    }


}