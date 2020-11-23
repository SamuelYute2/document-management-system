<?php

namespace App\Modules\Documents\Clients\API\Routes;

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
            'prefix' => 'documents',
            'as' => 'documents.',
            //'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get.all',
                'uses' => 'DocumentAPIController@getAll',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'DocumentAPIController@store',
            ]);

            $router->get('/{document}', [
                'as' => 'get',
                'uses' => 'DocumentAPIController@get',
            ]);

            $router->put('/{document}', [
                'as' => 'update',
                'uses' => 'DocumentAPIController@update',
            ]);

            $router->delete('/{document}', [
                'as' => 'delete',
                'uses' => 'DocumentAPIController@delete',
            ]);

            $router->get('/{document}/employee', [
                'as' => 'employee',
                'uses' => 'DocumentAPIController@getEmployee',
            ]);

            $router->get('/{document}/departments', [
                'as' => 'departments.get.all',
                'uses' => 'DocumentAPIController@getDepartments',
            ]);

            $router->post('/{document}/departments', [
                'as' => 'departments.attach',
                'uses' => 'DocumentAPIController@attachDepartments',
            ]);

            $router->delete('/{document}/departments', [
                'as' => 'departments.detach',
                'uses' => 'DocumentAPIController@detachDepartments',
            ]);

            $router->get('/{document}/versions', [
                'as' => 'versions',
                'uses' => 'DocumentAPIController@getVersions',
            ]);
        });
    }
}
