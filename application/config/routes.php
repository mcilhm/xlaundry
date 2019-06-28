<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'BerandaController';


$route['login'] = 'LoginController';
$route['login/user'] = 'LoginController/login';
$route['login/logout'] = 'LoginController/logout';


$route['register'] = 'RegisterController';
$route['register/add'] = 'RegisterController/add';


$route['profil'] = 'ProfilController';
$route['profil/update'] = 'ProfilController/update';

$route['pesanan'] = 'PesananController';
$route['pesanan/add'] = "PesananController/add";
$route['pesanan/preview'] = 'PesananController/preview';
$route['pesanan/pesan'] = 'PesananController/pesan';
$route['histori'] = 'HistoriController';

$route['admin'] = 'admin/LoginController';

$route['admin/login'] = 'admin/LoginController';

$route['admin/bahan'] = "admin/BahanController";
$route['admin/bahan/add'] = "admin/BahanController/add";
$route['admin/bahan/update/(:num)'] = "admin/BahanController/update/$1";
$route['admin/bahan/delete/(:num)'] = "admin/BahanController/delete/$1";

$route['admin/pengiriman'] = "admin/PengirimanController";
$route['admin/pengiriman/add'] = "admin/PengirimanController/add";
$route['admin/pengiriman/update/(:num)'] = "admin/PengirimanController/update/$1";
$route['admin/pengiriman/delete/(:num)'] = "admin/PengirimanController/delete/$1";

$route['admin/mesincuci'] = "admin/MesincuciController";
$route['admin/mesincuci/add'] = "admin/MesincuciController/add";
$route['admin/mesincuci/update/(:num)'] = "admin/MesincuciController/update/$1";
$route['admin/mesincuci/delete/(:num)'] = "admin/MesincuciController/delete/$1";

$route['admin/pengguna'] = "admin/PenggunaController";
$route['admin/pengguna/add'] = "admin/PenggunaController/add";
$route['admin/pengguna/update/(:any)'] = "admin/PenggunaController/update/$1";
$route['admin/pengguna/delete/(:any)'] = "admin/PenggunaController/delete/$1";

$route['admin/promo'] = "admin/PromoController";
$route['admin/promo/add'] = "admin/PromoController/add";
$route['admin/promo/update/(:num)'] = "admin/PromoController/update/$1";
$route['admin/promo/delete/(:num)'] = "admin/PromoController/delete/$1";

$route['admin/paketan'] = "admin/PaketanController";
$route['admin/paketan/add'] = "admin/PaketanController/add";
$route['admin/paketan/update/(:num)'] = "admin/PaketanController/update/$1";
$route['admin/paketan/delete/(:num)'] = "admin/PaketanController/delete/$1";

$route['admin/paketan_detail'] = "admin/PaketanDetailController";
$route['admin/paketan_detail/add'] = "admin/PaketanDetailController/add";
$route['admin/paketan_detail/update/(:num)'] = "admin/PaketanDetailController/update/$1";
$route['admin/paketan_detail/delete/(:num)'] = "admin/PaketanDetailController/delete/$1";

$route['admin/pesanan'] = "admin/PesananController";
$route['admin/pesanan/add'] = "admin/PesananController/add";
$route['admin/pesanan/updateproses/(:any)'] = "admin/PesananController/updateproses/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
