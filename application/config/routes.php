<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Stripe
$route['my-stripe'] = "StripeController";
$route['stripePost/(:any)']['post'] = "StripeController/stripePost/$1";
$route['stripe-button'] = "StripeController/buttonStripe";


// Pages
$route['patient'] = "PagesController/patientPage";
$route['doctor'] = "PagesController/doctorPage";
$route['reset'] = "PagesController/resetPage";
$route['invoice'] = "PagesController/invoicePage";
$route['test-invoice'] = "PagesController/testInvoicePage";


// Claiming API
$route['test'] = "ClaimingAPIController/testRequest";
$route['auth'] = "ClaimingAPIController/authRequest";
$route['list-payment'] = "ClaimingAPIController/listPaymentRequest";
$route['claim'] = "ClaimingAPIController/claimRequest";
$route['test-form-api'] = "ClaimingAPIController/testFormRequest";
$route['verifyRequest'] = "ClaimingAPIController/verifyRequest";


//Invoice
$route['createInvoice'] = "InvoiceController/createInvoice";
$route['viewInvoice/(:any)'] = "InvoiceController/viewInvoice/$1";
$route['creatingInvoice'] = "InvoiceController/creatingInvoice";


// Medication and Transaction
$route['request-for-prescription/(:any)'] = "MedicationController/requestForPrescription/$1";
$route['view-requested-prescription/(:any)'] = "MedicationController/viewRequestedPrescription/$1";
$route['approve-perscription/(:any)'] = "MedicationController/approvePrescription/$1";
$route['payment/(:any)'] = "StripeController/payment/$1";


// Default /
$route['default_controller'] = 'PagesController/patientPage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
