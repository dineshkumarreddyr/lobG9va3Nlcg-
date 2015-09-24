<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'home/page_404'; //my404 is class name. 

$route['product/(:num)'] = "products/view/$1";
$route['product/(:num)/(:any)'] = "products/view/$1";

$route['look/(:num)'] = "looks/view/$1";
$route['look/(:num)/(:any)'] = "looks/view/$1";

$route['designers'] = "user/get_designers";
$route['designer/(:num)'] = "user/index/$1";
$route['designer/(:num)/(:any)'] = "user/index/$1";
$route['designer/edit/(:num)'] = "user/edit/$1";

$route['login'] = "user/login";
$route['logout'] = "user/logout";
$route['register'] = "user/register";
$route['myaccount'] = "user/myaccount";
$route['forgot-password'] = "user/forgotpassword";
$route['reset-password'] = "user/resetpassword";
$route['followings'] = "user/myfollowings";
$route['favourites'] = "user/myfavourites";

$route['blog'] = "blog/index";
$route['blog/add'] = "blog/index/add";
$route['blog/edit/(:num)'] = "blog/index/edit/$1";
$route['blog/(:num)/(:any)'] = "blog/index/view/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */