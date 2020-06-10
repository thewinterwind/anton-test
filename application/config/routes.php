<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['my-stripe'] = "StripeController";
$route['stripePost/(:any)']['post'] = "StripeController/stripePost/$1";

$route['patient'] = "PagesController/patientPage";
$route['doctor'] = "PagesController/doctorPage";
$route['reset'] = "PagesController/resetPage";
$route['invoice'] = "PagesController/invoicePage";

$route['request-for-prescription/(:any)'] = "MedicationController/requestForPrescription/$1";
$route['view-requested-prescription/(:any)'] = "MedicationController/viewRequestedPrescription/$1";

$route['approve-perscription/(:any)'] = "MedicationController/approvePrescription/$1";

$route['payment/(:any)'] = "StripeController/payment/$1";

$route['default_controller'] = 'PagesController/patientPage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
