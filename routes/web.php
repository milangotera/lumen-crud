<?php

/**
*
* @version 1.0
*
* @author Milan Gotera <milangotera@gmail.com>
* @copyright milangotera@gmail.com
*
*/

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return 'Api v1';
});

$router->get('/employees', 'EmployeeController@list');
$router->post('/employees', 'EmployeeController@new');
$router->delete('/employees/{id}', 'EmployeeController@delete');
