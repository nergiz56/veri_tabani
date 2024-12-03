<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('marketing', 'Home::marketing');
$routes->get('blog', 'Home::blog');
$routes->get('contact', 'Home::contact');
$routes->get('register', 'Home::register');
$routes->get('login', 'Home::login');


// Diğer sayfalar için benzer şekilde eklemeler yapabilirsiniz.
