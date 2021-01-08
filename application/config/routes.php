<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// route home
$route['about']       = 'home/about';
$route['contact']     = 'home/contact';
$route['maps']        = 'home/maps';
$route['maps_detail'] = 'home/maps_detail';