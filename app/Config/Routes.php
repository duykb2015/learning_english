<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('admin-login', 'Admin\Login::index');

$routes->group('dashboard', function ($routes) {
    $routes->get('', 'Admin\HomeController::index');

    $routes->group('admin', function ($routes) {
        $routes->get('/', 'Admin\AdminController::index');
        $routes->get('detail', 'Admin\AdminController::detail');
    });


    $routes->group('user', function ($routes) {
        $routes->get('/', 'Admin\AdminController::user');
        $routes->get('detail', 'Admin\AdminController::user_detail');
    });
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');
        $routes->get('detail', 'Admin\CategoryController::detail');
    });

    $routes->group('question', function ($routes) {
        $routes->get('/', 'Admin\QuestionController::index');
        $routes->get('detail', 'Admin\QuestionController::detail');
        $routes->get('upload-excel', 'Admin\QuestionController::upload_excel');
        $routes->get('group-question', 'Admin\QuestionController::group_question');
        $routes->get('group-question-detail', 'Admin\QuestionController::group_question_detail');
    });

    $routes->group('exam', function ($routes) {
        $routes->get('/', 'Admin\ExamController::index');
        $routes->get('detail', 'Admin\ExamController::detail');
        
    });

    $routes->group('posts', function ($routes) {
        $routes->get('/', 'Admin\PostsController::index');
        $routes->get('detail', 'Admin\PostsController::detail');
        
    });
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
