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
    
      $stripe = \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

      $total = $data['transaction']['price'] * 100;

      $oqea = $total * .95;
     
      $charge = \Stripe\Charge::create ([
                "amount" => $total,
                "currency" => "aud",
                "source" => $this->input->post('stripeToken'),
                "description" => $data['transaction']['name']
        ]);

        $this->bankAccount($oqea);
        
        if($charge['status'] == 'succeeded'){
            $this->medication_model->paymentSuccess($id);
            $this->invoice_model->paymentSuccess($id);
            $this->session->set_flashdata('success-payment', 'Payment made successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong.');
        }
             
        redirect('patient', 'refresh');
    }

    public function bankAccount($oqea){
        require_once('application/libraries/stripe-php/init.php');

     // Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
        //     \Stripe\Stripe::setApiKey('sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz');

        //    $transfer = \Stripe\Transfer::create([
        //     'amount' => 24784,
        //     'currency' => 'aud',
        //     'destination' => 'default_for_currency',
        //     'source_type' => 'bank_account'
        //     ]);

        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
        //   );
        //   $stripe->accounts->createExternalAccount(
        //     'acct_1GTedMEJyKsJ6aTm',
        //     [
        //       'external_account' => 'btok_1Gwkg3EJyKsJ6aTmV2huFaMY',
        //     ]
        //   );

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
          $stripe->transfers->create([
            'amount' => $oqea,
            'currency' => 'aud',
            'destination' => 'acct_1Gwkn9HmlGqgMhmb',
            'transfer_group' => 'ORDER_95',
          ]);
                    
        return true;

    }

    public function bankTransfer(){
        require_once('application/libraries/stripe-php/init.php');


        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
          $stripe->transfers->create([
            'amount' => 400,
            'currency' => 'aud',
            'destination' => 'acct_1GxM8SDqg7C50PxO',
            'transfer_group' => 'ORDER_95',
          ]);
    }

    public function payment($id){
        $data['transaction'] = $this->medication_model->viewRequestedPrescription($id);

        $this->load->view('templates/header');
        $this->load->view('stripe/my_stripe', $data);
        $this->load->view('templates/scripts');
    }

    public function buttonStripe(){
        $this->load->view('templates/header');
        $this->load->view('stripe/button');
        $this->load->view('templates/footer');

    }

    public function newStripe(){
        $this->load->view('templates/header');
        $this->load->view('stripe/stripe');
        $this->load->view('templates/footer');
    }

    public function addDoctors(){

        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );

        // Individual
        $drs = $stripe->accounts->create([
            'type' => 'custom',
            'country' => 'AU',
            'business_type' => 'individual',
            'individual' =>  [
                'first_name' => 'Test',
                'last_name' => 'Eight',
                'dob' => [
                    'day' => '10',
                    'month' => '10',
                    'year' => '2000'
                ],
                'phone' => '8888675309',
                'address' => [
                    'city' => 'Concepcion',
                    'country' => 'AU',
                    'line1' => 'line1',
                    'line2' => 'line2',
                    'postal_code' =>'3123',
                    'state' => 'Queensland'
                ],
                'email' => 'doctor.eight@example.com',
                // 'verification' => [
                //     'additional_document' => [
                //         'back' => 'identity_document_back',
                //         'front' => 'file_1GxMLaEJyKsJ6aTmlnT4ku5M'
                //     ],
                //     'document' => [
                //         'back' => 'file_1GxMRTEJyKsJ6aTmMStDnn9K',
                //         'front' => 'file_1GxMRhEJyKsJ6aTmVrOdgJ7n'
                //     ]
                // ]
            ],
            'business_profile' => [
                'mcc' => '8099',
                'url' => 'oqea.com.au'
            ],
            'default_currency' => 'AUD',
            'requested_capabilities' => [
              'card_payments',
              'transfers',
            ],
            'external_account' => [
                'object' => 'bank_account',
                'country' => 'AU',
                'currency' => 'AUD',
                'account_holder_name' => 'Testing',
                'account_holder_type' => 'Company',
                'routing_number' => '110000',
                'account_number' => '000123456'
            ],
            'settings' => [
                'payments' => [
                    'statement_descriptor' => 'OQEA PTY LTD'
                ],
                'payouts' => [
                    'debit_negative_balances' => true,
                ]
            ],
            'tos_acceptance' => [
                'date' => time(),
                'ip' => '8.8.8.8',
                'user_agent' => 'Test tos'
            ]
          ]);



        // Company
        // $drs = $stripe->accounts->create([
        //     'type' => 'custom',
        //     'country' => 'AU',
        //     'email' => 'doctor.eight@example.com',
        //     'business_type' => 'company',
        //     'company' =>  [
        //         'name' => 'Testing Two Company',
        //         'phone' => '8888675309',
        //         'address' => [
        //             'city' => 'Concepcion',
        //             'country' => 'AU',
        //             'line1' => 'line1',
        //             'line2' => 'line2',
        //             'postal_code' =>'3123',
        //             'state' => 'Queensland'
        //         ],
        //         'tax_id' => '000 111 222',
        //     ],
        //     // 'relationship' => [
        //     //     'representative' => [
        //     //         'first_name' => 'Company fn',
        //     //         'last_name' => 'Company ln',
        //     //         'dob' => [
        //     //             'day' => '10',
        //     //             'month' => '10',
        //     //             'year' => '2000'
        //     //         ],
        //     //         'address' => [
        //     //             'city' => 'Concepcion',
        //     //             'country' => 'AU',
        //     //             'line1' => 'line1',
        //     //             'line2' => 'line2',
        //     //             'postal_code' =>'3123',
        //     //             'state' => 'Queensland'
        //     //         ],
        //     //         'representative' => [
        //     //             'title' => 'Company Tile'
        //     //         ],
        //     //         'email' => 'company@email.com',
        //     //         'phone' => '8888675309'
        //     //     ],
        //     //     'director' => [
        //     //         'first_name' => 'Director fn',
        //     //         'last_name' => 'Director ln',
        //     //         'dob' => [
        //     //             'day' => '10',
        //     //             'month' => '10',
        //     //             'year' => '2000'
        //     //         ],
        //     //         'address' => [
        //     //             'city' => 'Concepcion',
        //     //             'country' => 'AU',
        //     //             'line1' => 'line1',
        //     //             'line2' => 'line2',
        //     //             'postal_code' =>'3123',
        //     //             'state' => 'Queensland'
        //     //         ],
        //     //         'director' => [
        //     //             'title' => 'Company Tile'
        //     //         ],
        //     //         'email' => 'company@email.com'
        //     //     ],
        //     //     'owner' => [
        //     //         'first_name' => 'Owner fn',
        //     //         'last_name' => 'Owner ln',
        //     //         'dob' => [
        //     //             'day' => '10',
        //     //             'month' => '10',
        //     //             'year' => '2000'
        //     //         ],
        //     //         'address' => [
        //     //             'city' => 'Concepcion',
        //     //             'country' => 'AU',
        //     //             'line1' => 'line1',
        //     //             'line2' => 'line2',
        //     //             'postal_code' =>'3123',
        //     //             'state' => 'Queensland'
        //     //         ],
        //     //         'email' => 'company@email.com'
        //     //     ]
        //     // ],
        //     'business_profile' => [
        //         'mcc' => '8099',
        //         'url' => 'oqea.com.au'
        //     ],
        //     'default_currency' => 'AUD',
        //     'requested_capabilities' => [
        //       'transfers',
        //     ],
        //     'external_account' => [
        //         'object' => 'bank_account',
        //         'country' => 'AU',
        //         'currency' => 'AUD',
        //         'account_holder_name' => 'Testing',
        //         'account_holder_type' => 'Company',
        //         'routing_number' => '110000',
        //         'account_number' => '000123456'
        //     ],
        //     'settings' => [
        //         'payments' => [
        //             'statement_descriptor' => 'OQEA PTY LTD'
        //         ],
        //         'payouts' => [
        //             'debit_negative_balances' => true,
        //         ]
        //     ],
        //     'tos_acceptance' => [
        //         'date' => time(),
        //         'ip' => '8.8.8.8',
        //         'user_agent' => 'Test tos'
        //     ]
        //   ]);

        



        // Viea all account
        //   $stripe->accounts->all();



        // Delete Account
        // $stripe->accounts->delete(
        //     'acct_1Gx8uABCcEw7H1Si',
        //     []
        //   );

        //   var_dump($drs['id']);
    }

    public function addDoctor(){
        $this->load->view('templates/header');
        $this->load->view('pages/add-doctor');
        $this->load->view('templates/footer');   
    }

    public function createFile(){
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey("sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz");

        $fp = fopen('/path/to/a/file.jpg', 'r');
        \Stripe\File::create([
        'purpose' => 'dispute_evidence',
        'file' => $fp
        ]);

        var_dump($fp);
    }

    public function retrieveAccount(){
        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
        $acct = $stripe->accounts->retrieve(
            'acct_1GxAVzABgX5sGoKn',
            []
          );

        var_dump($acct);
    }

    public function addDoctorsAccount(){
        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
          // Company

          if($this->input->post('type') == 1){
            $drs = $stripe->accounts->create([
                'type' => 'custom',
                'country' => 'AU',
                'email' => $this->input->post('company_email'),
                'business_type' => 'company',
                'company' =>  [
                    'name' => $this->input->post('company_name'),
                    'phone' => $this->input->post('company_phone_number'),
                    'address' => [
                        'city' => $this->input->post('company_city'),
                        'country' => $this->input->post('company_country'),
                        'line1' => $this->input->post('company_line_1'),
                        'line2' => $this->input->post('company_line_2'),
                        'postal_code' => $this->input->post('company_postal'),
                        'state' => $this->input->post('company_state')
                    ],
                    'tax_id' => $this->input->post('company_tax_id'),
                ],
                'business_profile' => [
                    'mcc' => '8099',
                    'url' => 'oqea.com.au'
                ],
                'default_currency' => 'AUD',
                'requested_capabilities' => [
                  'transfers',
                ],
                'external_account' => [
                    'object' => 'bank_account',
                    'country' => 'AU',
                    'currency' => 'AUD',
                    'account_holder_name' => $this->input->post('company_account_holder'),
                    'account_holder_type' => $this->input->post('company_account_type'),
                    'routing_number' => $this->input->post('company_routing_number'), //110000
                    'account_number' => $this->input->post('company_account_number') //000123456
                ],
                'settings' => [
                    'payments' => [
                        'statement_descriptor' => 'OQEA PTY LTD'
                    ],
                    'payouts' => [
                        'debit_negative_balances' => true,
                    ]
                ],
                'tos_acceptance' => [
                    'date' => time(),
                    'ip' => '8.8.8.8',
                    'user_agent' => 'Oqea TOS'
                ]
              ]);
          } else {

           $dob = date('Y-m-d', strtotime($this->input->post('individual_birthday')));

           $yyyy = date('Y', strtotime($dob));
           $mm = date('m', strtotime($dob));
           $dd = date('d', strtotime($dob));
        //    var_dump($mm . $dd);
        //    die();
            $drs = $stripe->accounts->create([
                'type' => 'custom',
                'country' => 'AU',
                'business_type' => 'individual',
                'individual' =>  [
                    'first_name' => $this->input->post('individual_first_name'),
                    'last_name' => $this->input->post('individual_last_name'),
                    'dob' => [
                        'day' => $dd,
                        'month' => $mm,
                        'year' => $yyyy
                    ],
                    'phone' => $this->input->post('individual_phone'),
                    'address' => [
                        'city' => $this->input->post('individual_city'),
                        'country' => $this->input->post('individual_country'),
                        'line1' => $this->input->post('individual_line_1'),
                        'line2' => $this->input->post('individual_line_2'),
                        'postal_code' => $this->input->post('individual_postal'),
                        'state' => $this->input->post('individual_state')
                    ],
                    'email' => $this->input->post('individual_email'),
                ],
                'business_profile' => [
                    'mcc' => '8099',
                    'url' => 'oqea.com.au'
                ],
                'default_currency' => 'AUD',
                'requested_capabilities' => [
                  'card_payments',
                  'transfers',
                ],
                'external_account' => [
                    'object' => 'bank_account',
                    'country' => 'AU',
                    'currency' => 'AUD',
                    'account_holder_name' => $this->input->post('individual_account_holder'),
                    'account_holder_type' => $this->input->post('individual_account_type'),
                    'routing_number' => $this->input->post('individual_routing_number'), //110000
                    'account_number' => $this->input->post('individual_account_number') //000123456
                ],
                'settings' => [
                    'payments' => [
                        'statement_descriptor' => 'OQEA PTY LTD'
                    ],
                    'payouts' => [
                        'debit_negative_balances' => true,
                    ]
                ],
                'tos_acceptance' => [
                    'date' => time(),
                    'ip' => '8.8.8.8',
                    'user_agent' => 'Test tos'
                ]
              ]);
          }
         
        //   var_dump($drs["id"]);
        //   die();

        if($drs != null){
           $type = $this->input->post('type');
           $acct = $drs["id"];
           $this->doctor_model->addDoctorsAccount($type, $acct);
           $this->session->set_flashdata('success', 'Added Doctors Account successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong.');
        }

        redirect('view-all-doctors', 'refresh');

    }

    public function viewAllDoctors(){

        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
       $accts = $stripe->accounts->all(['limit' => 100]);

        $data['accts'] = $accts;

    //    foreach($accts as $acct){
    //     if($acct['business_type'] != 'company'){
    //         var_dump($acct['individual']['first_name']);
    //     }
          
    //    }

    //    die();



       $this->load->view('templates/header');
       $this->load->view('pages/all-doctors', $data);
       $this->load->view('templates/footer');   
    }

    public function deleteDoctorsAccount(){
        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
          $stripe->accounts->delete(
            'acct_1Gwkn9HmlGqgMhmb',
            []
          );
    }

    public function testSplitPayment($acct_id){
        $data['acct_id'] = $acct_id;
        $this->load->view('templates/header');
        $this->load->view('stripe/test-split-payment', $data);
        $this->load->view('templates/footer');   
    }

    public function processSplitPayment($acct_id){
        require_once('application/libraries/stripe-php/init.php');
      
        $stripe = \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
  
        $total = 100 * 100;
  
        $amount = $total * .95;
       
        $charge = \Stripe\Charge::create ([
                  "amount" => $total,
                  "currency" => "aud",
                  "source" => $this->input->post('stripeToken'),
                  "description" => 'Testing Split Payment'
          ]);
  
         $transfer = $this->splitPayment($amount, $acct_id);

        //  var_dump($transfer);
        //  die();
          
          if($charge['status'] == 'succeeded'){
              $this->session->set_flashdata('success-payment', 'Split payment made successfully. You can check your Stripe Account. https://dashboard.stripe.com/test/balance/overview');
          } else {
              $this->session->set_flashdata('error-payment', 'Something went wrong on the Payment.');
          }
               
          redirect('view-all-doctors', 'refresh');
    }

    public function splitPayment($amount, $acct_id){
        require_once('application/libraries/stripe-php/init.php');

        $stripe = new \Stripe\StripeClient(
            'sk_test_vAZIjVouwp3KNomtAaddRWYa00dT4ncFiz'
          );
          $stripe->transfers->create([
            'amount' => $amount,
            'currency' => 'aud',
            'destination' => $acct_id,
            'transfer_group' => 'ORDER_95',
          ]);

        return true;
    }
}