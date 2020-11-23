<?php

namespace App\Modules\Employees\Clients\API\Routes;

use Illuminate\Routing\Router;

class APIv1Router
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $this->router->group([
            'prefix' => 'employees',
            'as' => 'employees.',
            //'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get.all',
                'uses' => 'EmployeeAPIController@getAll',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'EmployeeAPIController@store',
            ]);

            $router->get('/{employee}', [
                'as' => 'get',
                'uses' => 'EmployeeAPIController@get',
            ]);

            $router->put('/{employee}', [
                'as' => 'update',
                'uses' => 'EmployeeAPIController@update',
            ]);

            $router->delete('/{employee}', [
                'as' => 'delete',
                'uses' => 'EmployeeAPIController@delete',
            ]);

            $router->get('/{employee}/user', [
                'as' => 'user',
                'uses' => 'EmployeeAPIController@getUser',
            ]);

            $router->get('/{employee}/department', [
                'as' => 'department',
                'uses' => 'EmployeeAPIController@getDepartment',
            ]);
        });
    }
}
