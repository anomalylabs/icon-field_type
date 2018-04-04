<?php

return [
    'mode'          => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'dropdown',
            'options'       => [
                'dropdown' => 'anomaly.field_type.icon::config.mode.option.dropdown',
                'search'   => 'anomaly.field_type.icon::config.mode.option.search',
            ],
        ],
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.text',
    ],
];
