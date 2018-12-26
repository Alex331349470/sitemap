<?php

namespace App\Http\Controllers\Api;

use App\Models\Index;
use Illuminate\Http\Request;

class ElasticSearchController extends Controller
{
    protected $elas;

    public function __construct()
    {
        $this->elas = app('es');
    }

    public function search(Request $request)
    {
        $params = [
            'index' => 'doc',
            'body' => [
                'query' => [
                    'query_string' => [
                        'query' => $request->name
                    ]
                ]
            ]
        ];

        $data = $this->elas->search($params);
        
        return $this->response->array($data)->setStatusCode(200);
    }

    public function splicSearch(Request $request)
    {

    }
}

