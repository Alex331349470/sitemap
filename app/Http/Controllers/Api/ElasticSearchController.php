<?php

namespace App\Http\Controllers\Api;

use App\Models\Index;
use Illuminate\Http\Request;
use Goutte\Client;

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
        $params = [
            'index' => 'doc',
            'body' => [
                'query' => [
                    'match' => $request->name
                ]
            ]
        ];

        $data = $this->elas->search($params);

        return $this->response->array($data)->setStatusCode(200);
    }

    public function crawlerSearch(Request $request)
    {
        $client = new Client();
        $crawler = $client->request('GET', $request->url);

        dd($crawler);
    }
}
