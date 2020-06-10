<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('stripe/my_stripe');
        $this->load->view('templates/scripts');

    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost($id)
    {
        require_once('application/libraries/stripe-php/init.php');

      $data['transaction'] = $this->medication_model->viewRequestedPrescription($id);

    //   var_dump($data['transaction']['price']);
    //   die();
    
      $stripe = \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
      $charge = \Stripe\Charge::create ([
                "amount" => $data['transaction']['price'] * 100,
                "currency" => "aud",
                "source" => $this->input->post('stripeToken'),
                "description" => $data['transaction']['name']
        ]);

        // var_dump($charge);
        // var_dump($stripe);
        // die();

        if($charge['status'] == 'succeeded'){
            $this->medication_model->paymentSuccess($id);
            $this->session->set_flashdata('success-payment', 'Payment made successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong.');
        }
             
        redirect('patient', 'refresh');
    }

    public function payment($id){
        $data['transaction'] = $this->medication_model->viewRequestedPrescription($id);

        $this->load->view('templates/header');
        $this->load->view('stripe/my_stripe', $data);
        $this->load->view('templates/scripts');
    }
}