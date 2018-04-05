<?php

return [
    'fontawesome' => [
        'prefix' => 'fa fa-',
        'name'   => 'Font Awesome',
        'regex'  => '\.fa\-([a-z0-9-]+):before{',
        'path'   => 'anomaly.field_type.icon::scss/fontawesome/font-awesome.scss',
    ],
    'ionicons'    => [
        'prefix' => 'icon ion-',
        'name'   => 'Ionicons',
        'regex'  => '\.ion\-([a-z0-9-]+):before{',
        'path'   => 'anomaly.field_type.icon::scss/ionicons/ionicons.scss',
    ],
];
