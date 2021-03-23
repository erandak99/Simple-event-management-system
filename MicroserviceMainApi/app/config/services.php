<?php

return [
    'staff'   =>  [
        'base_uri' =>  env('STAFF_SERVICE_BASE_URL'),
        'secret'   =>  env('STAFF_SERVICE_SECRET'),
    ],

    'branch'   =>  [
        'base_uri' =>  env('BRANCH_SERVICE_BASE_URL'),
        'secret'   =>  env('BRANCH_SERVICE_SECRET'),
    ],

    'event'   =>  [
        'base_uri' =>  env('EVENT_SERVICE_BASE_URL'),
        'secret'   =>  env('EVENT_SERVICE_SECRET'),
    ],
];
