<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Stripe
$route['my-stripe'] = "StripeController";
$route['stripePost/(:any)']['post'] = "StripeController/stripePost/$1";
$route['stripe-button'] = "StripeController/buttonStripe";
$route['stripe'] = "StripeController/newStripe";
$route['banks'] = "StripeController/bankAccount";
$route['add-doctors'] = "StripeController/addDoctors";
$route['add-doctor'] = "StripeController/addDoctor";
$route['create-file'] = "StripeController/createFile";
$route['retrieve-account'] = "StripeController/retrieveAccount";
$route['bank-transfer'] = "StripeController/bankTransfer";
$route['add-doctors-account'] = "StripeController/addDoctorsAccount";
$route['view-all-doctors'] = "StripeController/viewAllDoctors";
$route['delete-doctors-account/(:any)'] = "StripeController/deleteDoctorsAccount/$1";
$route['test-split-payment/(:any)'] = "StripeController/testSplitPayment/$1";
$route['process-split-payment/(:any)'] = "StripeController/processSplitPayment/$1";
$route['view-doctor/(:any)'] = "StripeController/viewDoctor/$1";
$route['update-doctor/(:any)'] = "StripeController/updateDoctor/$1";





// Pages
$route['patient'] = "PagesController/patientPage";
$route['doctor'] = "PagesController/doctorPage";
$route['reset'] = "PagesController/resetPage";
$route['invoice'] = "PagesController/invoicePage";
$route['test-invoice'] = "PagesController/testInvoicePage";
$route['gauge-chart'] = "PagesController/graphPage";
$route['test-gauge'] = "PagesController/testGraph";



// Claiming API
$route['test'] = "ClaimingAPIController/testRequest";
$route['auth'] = "ClaimingAPIController/authRequest";
$route['token'] = "ClaimingAPIController/tokenRequest";
$route['list-payment'] = "ClaimingAPIController/listPaymentRequest";
$route['claim'] = "ClaimingAPIController/claimRequest";
$route['test-form-api'] = "ClaimingAPIController/testFormRequest";
$route['verifyRequest'] = "ClaimingAPIController/verifyRequest";
$route['testing-guzzle'] = "ClaimingAPIController/testingGuzzle";
$route['auth-group'] = "ClaimingAPIController/authGroup";





//Invoice
$route['createInvoice'] = "InvoiceController/createInvoice";
$route['viewInvoice/(:any)'] = "InvoiceController/viewInvoice/$1";
$route['creatingInvoice'] = "InvoiceController/creatingInvoice";
$route['verifyInvoice'] = "InvoiceController/verifyInvoice";
$route['selectPatient'] = "InvoiceController/selectPatient";



// Medication and Transaction
$route['request-for-prescription/(:any)'] = "MedicationController/requestForPrescription/$1";
$route['view-requested-prescription/(:any)'] = "MedicationController/viewRequestedPrescription/$1";
$route['approve-perscription/(:any)'] = "MedicationController/approvePrescription/$1";
$route['payment/(:any)'] = "StripeController/payment/$1";


// Default /
$route['default_controller'] = 'PagesController/patientPage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
