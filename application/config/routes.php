<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'customer/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard_admin'] = 'admin/dashboard';
$route['admin'] = 'admin/admin';
$route['send_admin_message'] = 'admin/messages/send';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/register';
$route['policy'] = 'pages/policy';


$route['customer'] = 'customer/customer';
$route['profile'] = 'customer/profile';
$route['message'] = 'customer/message';
$route['send_message'] = 'customer/message/send';
$route['count_unread_messages'] = 'customer/message/count_unread';
$route['home'] = 'customer/home';
$route['shop'] = 'customer/shop';
$route['order_history'] = 'customer/orders';
$route['invoice'] = 'customer/invoice';
$route['order_view/(:num)'] = 'customer/orders/view/$1';
$route['category'] = 'customer/product/all_categories';
$route['category/(:num)/(:any)'] = 'customer/product/products_in_category/$1/$2';
$route['all_products'] = 'customer/product/all_products';
$route['promo'] = 'customer/product/promo';
$route['product/(:num)/(:any)'] = 'customer/product/product/$1/$2';
$route['cart'] = 'customer/shop/cart';
$route['cart_api'] = 'customer/shop/cart_api';
$route['checkout'] = 'customer/shop/checkout';
$route['checkout_submit'] = 'customer/shop/checkout/order';
