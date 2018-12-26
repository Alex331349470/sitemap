<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1.0.0',[
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    $api->get('version', function () {
        return response('this is a test for dingo api');
    });

    $api->get('search', 'ElasticSearchController@search')
        ->name('api.search.search');
});
