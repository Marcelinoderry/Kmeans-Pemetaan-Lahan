<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// route home
$route['about']                 = 'home/about';
$route['contact']               = 'home/contact';
$route['maps']                  = 'home/maps';
$route['maps_get_peta']         = 'home/maps_get_peta';
$route['maps_get_peta_rincian'] = 'home/maps_get_peta_rincian';
$route['maps_get_komoditas']    = 'home/maps_get_komoditas';
$route['maps_get_komoditas_dt'] = 'home/maps_get_komoditas_dt';
$route['maps_detail/:any']      = 'home/maps_detail';