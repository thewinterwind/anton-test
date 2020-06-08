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
        $this->load->view('stripe/my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
    
      $stripe = \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
      $charge = \Stripe\Charge::create ([
                "amount" => 50 * 40,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payments."
        ]);

        var_dump($charge);
        // var_dump($stripe);
        die();
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        redirect('/my-stripe', 'refresh');
    }
}