<?php

$router = new Phalcon\Mvc\Router(false);


$router->add('/category/{slug}', array(
    'controller' => 'category',
    'action' => 'index')
)->setName('category');


$router->add('/users/login', array(
    'controller' => 'author',
    'action' => 'login')
)->setName('login');


$router->add('/author/{id}', array(
    'controller' => 'author',
    'action' => 'index')
)->setName('author');



$router->add('/{slug}', array(
    'controller' => 'index',
    'action' => 'post')
)->setName('post');




$router->add('/', array(
    'controller' => 'index',
    'action' => 'index'));

return $router;