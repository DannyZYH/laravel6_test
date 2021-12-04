<?php

return [
    'hosts' => [
        [
            'host' => env('ELASTICSEARCH_HOST', 'elasticsearch'),
            'port' => env('ELASTICSEARCH_PORT', '9200'),
            'scheme' => env('ELASTICSEARCH_SCHEME', 'http'),
//                 'path'   => env('ELASTICSEARCH_PATH', '/elastic'),
//            'user' => env('ELASTICSEARCH_USER'),
//            'pass' => env('ELASTICSEARCH_PASS'),
        ]
    ],
    'log_index' => env('ELASTIC_LOG_INDEX'),
    'log_type' => env('ELASTIC_LOG_TYPE'),
];

