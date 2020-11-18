<?php

namespace App\Modules\Users\Clients\API\Routes;

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
            'prefix' => 'users',
            'as' => 'users.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get.all',
                'uses' => 'UserAPIController@getAll',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'UserAPIController@store',
            ]);

            $router->get('/{user}', [
                'as' => 'get',
                'uses' => 'UserAPIController@get',
            ]);

            $router->put('/{user}', [
                'as' => 'update',
                'uses' => 'UserAPIController@update',
            ]);

            $router->delete('/{user}', [
                'as' => 'delete',
                'uses' => 'UserAPIController@delete',
            ]);

            $router->patch('/{user}/toggle', [
                'as' => 'toggle',
                'uses' => 'UserAPIController@toggle',
            ]);

            $router->patch('/{user}/password/change', [
                'as' => 'password.change',
                'uses' => 'UserAPIController@changePassword',
            ]);

            $router->patch('/{user}/password/reset', [
                'as' => 'password.reset',
                'uses' => 'UserAPIController@resetPassword',
            ]);
        });
    }
}
