<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;

class HomeController extends Controller
{
    public $client = null;

    public function __construct()
    {
//        $this-> client = ClientBuilder::create()->setHosts($this->host)->build();
        $host = [env('ELASTICSEARCH_HOST', 'elasticsearch') . ":9200"];
        $this->client = ClientBuilder::create()->setHosts($host)->build();
    }

    //创建
    public function index()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];

        $response = $this->client->index($params);
        print_r($response);

        //中文分词数据插入
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'id2',
            'body' => ['testField' => 'abc']
        ];

        $response = $this->client->index($params);
        print_r($response);
    }

    //根据id更新
    public function update()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField' => '中华人民共和国']
        ];

        $response = $this->client->index($params);
        print_r($response);
    }

    public function get()
    {
        $params = [
            'index' => 'my_index',
            'id' => 'my_id'
        ];

//        $response = $this->client->get($params);      //初始数据
//        print_r($response);     //Array ( [_index] => my_index [_type] => _doc [_id] => my_id [_version] => 2 [_seq_no] => 1 [_primary_term] => 1 [found] => 1 [_source] => Array ( [testField] => abc ) )

        $source = $this->client->getSource($params);    //直接获取值
        print_r($source);       //Array ( [testField] => abc )

    }

    public function search(){
        $params = [
            'index' => 'my_index',
            'body'  => [
                'query' => [
                    'match' => [
                        'testField' => '中华'
                    ]
                ]
            ]
        ];

        $response = $this->client->search($params); //Array ( [took] => 54 [timed_out] => [_shards] => Array ( [total] => 1 [successful] => 1 [skipped] => 0 [failed] => 0 ) [hits] => Array ( [total] => Array ( [value] => 1 [relation] => eq ) [max_score] => 0.2876821 [hits] => Array ( [0] => Array ( [_index] => my_index [_type] => my_type [_id] => my_id [_score] => 0.2876821 [_source] => Array ( [testField] => abc ) ) ) ) )
        print_r($response);
    }



    public function delete()
    {
    }

}
