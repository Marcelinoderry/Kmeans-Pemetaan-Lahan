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
$route['maps_get_komoditas']    = 'home/maps_get_komoditas';
$route['maps_get_komoditas_dt'] = 'home/maps_get_komoditas_dt';
$route['maps_detail/:any']      = 'home/maps_detail';
$route['komoditas']             = 'home/komoditas';
$route['komoditas_get_data_dt'] = 'home/komoditas_get_data_dt';
$route['production']            = 'home/production';
$route['produksi_get_data_dt']  = 'home/production_get_data_dt';
$route['uji']                   = 'home/uji';
$route['tahun']                 = 'home/tahun';