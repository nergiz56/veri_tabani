<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Admin işlemleri;
$routes->get('admin/users', 'Users::index');
$routes->get('admin/categories', 'AdminCategory::index');

$routes->group('admin/posts', function ($routes) {
    $routes->get('/', 'AdminPost::index');
    $routes->get('add', 'AdminPost::add');
    $routes->post('save', 'AdminPost::save');
    $routes->get('delete/(:num)', 'AdminPost::delete/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('posts', 'AdminPost::index'); // Post yönetim sayfası
    $routes->get('comments', 'AdminComment::index'); // Yorum yönetim sayfası
    $routes->get('comments/delete/(:num)', 'AdminComment::delete/$1'); // Yorum silme
});
//home kontrolleri
$routes->get('/users', 'Users::index'); // Kullanıcı listesini görüntüler
$routes->get('/users/delete/(:num)', 'Users::delete/$1'); // Kullanıcıyı siler
$routes->get('/users/add', 'Users::add'); // Yeni kullanıcı ekler
$routes->get('test-password', 'TestController::index');


$routes->get('logout', 'Logout::index');

$routes->get('/', 'Index::index'); // Login sayfası için

$routes->get('blog', 'Blog::index');
$routes->get('blog/view/(:num)', 'Blog::view/$1');
$routes->post('blog/toggleLike', 'Blog::toggleLike');
$routes->post('blog/addComment', 'Blog::addComment');


$routes->post('home/loginProcess', 'Home::loginProcess');
$routes->get('login', 'Home::login');
$routes->get('logout', 'Home::logout');

//blog controlleri
$routes->get('category', 'Category::index');
$routes->get('category', 'Category::view/$1');
$routes->get('category', 'Category::index');
$routes->get('category/(:num)', 'Category::view/$1'); // ID bazlı kategori görüntüleme
$routes->get('category/posts', 'Category::posts');

$routes->get('db-check', 'DatabaseCheck::index');

$routes->get('home', 'Home::index');


$routes->post('blog/addComment', 'BlogView::addComment');


// app/Config/Routes.php
$routes->get('/signup', 'Signup::index');
$routes->post('/signup/register', 'Signup::register');

// app/config/Routes.php
$routes->get('admin-login', 'Admin::login'); // Admin login sayfası
$routes->post('admin/loginProcess', 'Admin::loginProcess');
$routes->get('admin/dashboard', 'Admin::dashboard'); // Admin paneli sayfası (oluşturmanız gerekecek)

$routes->group('admin', function ($routes) {
    $routes->get('comments', 'AdminComment::index'); // Yorum yönetim sayfası
    $routes->get('comments/delete/(:num)', 'AdminComment::delete/$1'); // Yorum silme
});