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
$routes->post('getWebhook', 'Hook::index');

$routes->get('/', 'Home::index');

$routes->get('admin-login', 'Admin\Login::index');
$routes->post('admin-login', 'Admin\Login::authLogin');
$routes->get('logout', 'Admin\Login::logout');

$routes->group('', function ($routes) {
    $routes->get('', 'Home::index');

    $routes->group('blog', function ($routes) {
        $routes->get('/', 'BlogController::index');
        $routes->get('detail/:any', 'BlogController::detail');
    });
    $routes->group('listExam', function ($routes) {
        $routes->get('listtoeic', 'ListExamController::index');
        $routes->get('listlisten', 'ListExamController::listListen');
        $routes->get('listread', 'ListExamController::listRead');
        $routes->get('examrandom', 'ListExamController::ExamRandom');
    });
    $routes->group('Exam', function ($routes) {
        $routes->get('ExamToeic/:any', 'FullTestController::index');
        $routes->get('ExamListen', 'FullTestController::Testlisten');
        $routes->get('ExamRead', 'FullTestController::TestRead');
        $routes->get('ExamToeicRandom', 'ExamToeicRandom::index');
        $routes->post('InsertWrongAnswer', 'FullTestController::InsertWrongAnswer');
    });
    $routes->group('Practice', function ($routes) {
        $routes->get('PracticeVocabulary', 'PracticeController::PracticeVocabulary');
        $routes->get('PracticeGrammar', 'PracticeController::PracticeGrammar');
        $routes->get('PracticeListen', 'PracticeController::PracticeListen');
        $routes->get('PracticeRead', 'PracticeController::PracticeRead');
        $routes->get('Listen/:any', 'PracticeController::Listen');
        $routes->get('Read/:any', 'PracticeController::Read');
    });
    $routes->group('User', function ($routes) {
        $routes->get('Login', 'UserController::index');
        $routes->post('userlogin', 'UserController::userlogin');
        $routes->get('Infor','UserController::ShowInforUser');
        $routes->post('updateProfile', 'UserController::updateProfile');
        $routes->get('EditPassWord', 'UserController::EditPassWord');
        $routes->post('changePassword', 'UserController::changePassword');
        $routes->get('Result', 'UserController::Result');
        $routes->get('Register', 'UserController::Register');
        $routes->post('save', 'UserController::save');
        $routes->get('Logout', 'UserController::Logout');
    });
});

$routes->group('dashboard', ['filter' => 'admin'], function ($routes) {
    $routes->get('', 'Admin\Home::index');

    $routes->group('admin', function ($routes) {
        $routes->get('/', 'Admin\Admin::index');
        $routes->get('detail', 'Admin\Admin::detail');
    });

    $routes->group('user', function ($routes) {
        $routes->get('/', 'Admin\User::index');
        $routes->get('detail', 'Admin\User::detail');
    });

    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\Category::index');
        $routes->get('detail', 'Admin\Category::detail');
        $routes->post('save', 'Admin\Category::save');

        $routes->get('edit/:any', 'Admin\Category::edit');
        $routes->post('update/:any', 'Admin\Category::update');
        $routes->get('delete/:any', 'Admin\Category::delete');
    });

    $routes->group('question', function ($routes) {
        $routes->get('/', 'Admin\Question::index');
        $routes->get('detail', 'Admin\Question::detail');
        $routes->get('detail/:any', 'Admin\Question::detail');
        $routes->get('upload-excel', 'Admin\Question::uploadExcel');

        $routes->post('upload-excels', 'Admin\Question::uploadExcelSave');

        $routes->post('detail/:any', 'Admin\Question::detail');
        $routes->post('save', 'Admin\Question::save');
    });
    $routes->group('question-group', function ($routes) {
        $routes->get('/', 'Admin\QuestionGroup::index');
        $routes->get('detail', 'Admin\QuestionGroup::detail');
        $routes->get('detail/:any', 'Admin\QuestionGroup::detail');

        $routes->post('save', 'Admin\QuestionGroup::save');
        $routes->post('delete', 'Admin\QuestionGroup::delete');
    });
    $routes->group('exam', function ($routes) {
        $routes->get('/', 'Admin\Exam::index');
        $routes->get('detail', 'Admin\Exam::detail');
        $routes->post('save', 'Admin\Exam::save');
        $routes->post('update/:any', 'Admin\Exam::update');
        $routes->get('edit/:any', 'Admin\Exam::edit');
        $routes->get('delete/:any', 'Admin\Exam::delete');
        $routes->get('part-exam', 'Admin\PartExam::index');
        $routes->get('part-exam/detail', 'Admin\PartExam::detail');
    });
    $routes->group('exam-part', function ($routes) {
        $routes->get('/', 'Admin\PartExam::index');
        $routes->get('detail', 'Admin\PartExam::detail');
        $routes->post('save', 'Admin\PartExam::save');
        $routes->get('edit/:any', 'Admin\PartExam::edit');
        $routes->post('update/:any', 'Admin\PartExam::update');
        $routes->get('delete/:any', 'Admin\PartExam::delete');
    });
    $routes->group('posts', function ($routes) {
        $routes->get('/', 'Admin\Posts::index');
        $routes->get('detail', 'Admin\Posts::detail');
        $routes->post('save', 'Admin\Posts::save');

        $routes->get('edit/:any', 'Admin\Posts::edit');
        $routes->post('update/:any', 'Admin\Posts::update');
        $routes->get('delete/:any', 'Admin\Posts::delete');
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
