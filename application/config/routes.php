<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//the routes read from top to bottom. How to explain the order?

// $route['resources/model/delete/(:any)'] = 'resources/items/delete/$1';

$route['resources/personincharges'] = 'resources/personincharges';

$route['resources/vendors/update'] = 'resources/vendors/update';
$route['resources/vendors/delete/(:any)'] = 'resources/vendors/delete/$1';


$route['resources/items/delete/(:any)'] = 'resources/items/delete/$1';
$route['resources/items/delete'] = 'resources/items/delete';
$route['resources/items/update'] = 'resources/items/update';
$route['resources/items/edit/(:any)'] = 'resources/items/edit/$1';
$route['resources/items'] = 'resources/items/index';
$route['resources'] = 'resources/resources/index';
$route['resources/view_position'] = 'resources/personincharges/view_position';
$route['resources/add_position'] = 'resources/personincharges/add_position';
$route['resources/edit_position/(:any)'] = 'resources/personincharges/edit_position/$1';
$route['resources/update_position'] = 'resources/personincharges/update_position/$1';
$route['resources/delete_position/(:any)'] = 'resources/personincharges/delete_position/$1';

$route['livesearch'] = 'livesearch/index';
$route['molds'] = 'molds/index';            
$route['racks'] = 'racks/index';

// $route['needs/edit_po/(:any)'] = 'needs/edit_po/$1';
$route['needs/list_sp/(:any)'] = 'needs/list_sp/$1';
$route['needs/valid_periode'] = 'needs/valid_periode';
$route['needs/view/(:any)'] = 'needs/view/$1';
$route['needs/create_card'] = 'needs/create_card';
$route['needs'] = 'needs/index';

$route['admin'] = 'admin/index';

$route['login'] = 'users/index';
$route['register'] = 'users/register';
$route['default_controller'] = 'pages/index';

$route['(:any)'] = 'pages/index/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
