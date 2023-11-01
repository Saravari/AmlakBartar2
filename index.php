<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/database.php';

session_start();

$app = new \Bramus\Router\Router();
$app->setNamespace('\App\Controllers\front');
$app->get('/', 'HomeController@home');

//routes of login
$app->post('/login', 'AuthController@login');
$app->post('/checkCode', 'AuthController@checkCode');
$app->get('/enterPassword', 'AuthController@enterPassword');
$app->post('/checkPassword', 'AuthController@checkPassword');
$app->get('/profile', 'AuthController@profile');
$app->post('/profileEdit', 'AuthController@profileEdit');
$app->get('/logOut', 'AuthController@logOut');


//routes of register
$app->get('/register', 'RegisterController@index');
$app->post('/store', 'RegisterController@store');

//routes of melk
$app->get('/melkRegister', 'MelkController@melkRegister');
$app->post('/search', 'MelkController@search');
$app->post('/districtSearch', 'MelkController@districtSearch');
$app->post('/statusSearch', 'MelkController@statusSearch');
$app->post('/melkInformation', 'MelkController@showInformation');
$app->get('/melkList', 'MelkController@melkList');
$app->post('/melkEdit', 'MelkController@edit');
$app->post('/melkStore', 'MelkController@store');
$app->post('/melkUpdate', 'MelkController@update');
$app->post('/melkdestroy', 'MelkController@destroy');


//routes of melk
$app->get('/comments', 'CommentController@index');
$app->post('/commentStore', 'CommentController@store');




$app->run();
