<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


//setApi
/*
$routes->get('api/users', 'Backend\UsersController::index'); // แสดงหน้ารายการทั้งหมด index()
$routes->post('api/users', 'Backend\UsersController::create'); // create()
$routes->get('api/users/(:segment)',      'Backend\UsersController::show/$1');  // แสดงหน้ารายละเอียด show()
$routes->get('api/users/(:segment)/edit', 'Backend\UsersController::edit/$1');  // แสดงหน้าแก้ไข show()
$routes->put('api/users/edit/(:segment)',      'Backend\UsersController::update/$1'); // update()
$routes->patch('api/users/(:segment)',    'Backend\UsersController::update/$1'); // update()
$routes->delete('api/users/(:segment)',   'Backend\UsersController::delete/$1');  // delete()
*/
// เปรียบเสมือน เขียนข้างบนทั้งหมด
$routes->resource('api/users',['controller' => 'Backend\UsersController','filter' => 'authApi']);

// Fontend
// Api Bannerslideimg
$routes->resource('api/bannerslideimg',['controller' => 'Fontend\BannerslideController','filter' => 'authApi']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
