<?php

return [

    'paths' => ['api/*', 'front/*'], // Add paths that you want to allow CORS for

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:3000'], // Add your frontend's origin here

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];


