<?php

namespace App\Modules\Roles\Clients\API\Routes;

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
            'prefix' => 'roles',
            'as' => 'roles.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get.all',
                'uses' => 'RoleAPIController@getAll',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'RoleAPIController@store',
            ]);

            $router->get('/{role}', [
                'as' => 'get',
                'uses' => 'RoleAPIController@get',
            ]);

            $router->put('/{role}', [
                'as' => 'update',
                'uses' => 'RoleAPIController@update',
            ]);

            $router->delete('/{role}', [
                'as' => 'delete',
                'uses' => 'RoleAPIController@delete',
            ]);

            $router->get('/{role}/employees', [
                'as' => 'employees',
                'uses' => 'RoleAPIController@getEmployees',
            ]);

            $router->get('/{role}/documents', [
                'as' => 'documents',
                'uses' => 'RoleAPIController@getDocuments',
            ]);
        });
    }
}
