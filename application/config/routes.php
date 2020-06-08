<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['my-stripe'] = "StripeController";
$route['stripePost']['post'] = "StripeController/stripePost";

$route['default_controller'] = 'StripeController';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
