<?php

namespace App\Modules\Departments\Clients\API\Routes;

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
            'prefix' => 'departments',
            'as' => 'departments.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get.all',
                'uses' => 'DepartmentAPIController@getAll',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'DepartmentAPIController@store',
            ]);

            $router->get('/{department}', [
                'as' => 'get',
                'uses' => 'DepartmentAPIController@get',
            ]);

            $router->put('/{department}', [
                'as' => 'update',
                'uses' => 'DepartmentAPIController@update',
            ]);

            $router->delete('/{department}', [
                'as' => 'delete',
                'uses' => 'DepartmentAPIController@delete',
            ]);

            $router->get('/{department}/employees', [
                'as' => 'employees',
                'uses' => 'DepartmentAPIController@getEmployees',
            ]);

            $router->get('/{department}/documents', [
                'as' => 'documents',
                'uses' => 'DepartmentAPIController@getDepartments',
            ]);
        });
    }
}
