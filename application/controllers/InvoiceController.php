<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class InvoiceController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model("invoice_model");
     }

    public function createInvoice(){
        // print_r($this->input->post());
        $data['invoice'] = $this->invoice_model->createInvoice();
        print_r($this->input->post());
    }

    public function viewInvoice($id){
        $data['trans'] = $this->invoice_model->viewInvoice($id);
        $this->load->view('templates/header');
        $this->load->view('pages/view-invoice', $data);
        $this->load->view('templates/footer');
    }

}
    