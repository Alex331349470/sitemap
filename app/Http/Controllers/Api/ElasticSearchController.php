<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class ElasticSearchController extends Controller
{
    public function search(Request $request)
    {
        $params = [];

        $data = app('es')->search($params);

        return $this->response->item($data)->setStatusCode(201);
    }

    public function spliceSearch(Request $request)
    {
        $params = [];

        $data = app('es')->search($params);
        
        return $this->response->item($data)->setStatusCode(201);
    }
}
