<?php

return [
    'model_defaults' => [
        'namespace'       => 'App\Model',
        'base_class_name' => 'Illuminate\Database\Eloquent\Model',
        'no_timestamps'   => false,
        'output_path' => 'Model'
    ],
    'db_types' => [
        'enum' => 'string',
    ],
];