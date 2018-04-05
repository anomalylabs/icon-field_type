<?php

return [
    'fontawesome' => [
        'prefix'  => 'fa fa-',
        'name'    => 'Font Awesome',
        'regex'   => '\.fa\-([a-z0-9-]+):before{',
        'website' => 'https://fontawesome.com/v4.7.0/icons/',
        'path'    => 'anomaly.field_type.icon::scss/fontawesome/font-awesome.scss',
    ],
    'ionicons'    => [
        'prefix'  => 'icon ion-',
        'name'    => 'Ionicons',
        'website' => 'http://ionicons.com/',
        'regex'   => '\.ion\-([a-z0-9-]+):before{',
        'path'    => 'anomaly.field_type.icon::scss/ionicons/ionicons.scss',
    ],
    'icomoon'     => [
        'prefix'  => 'ico icon-',
        'name'    => 'IcoMoon',
        'regex'   => '\.icon\-([a-z0-9-]+):before{',
        'website' => 'https://icomoon.io/#preview-free',
        'path'    => 'anomaly.field_type.icon::scss/icomoon/icomoon.scss',
    ],
];
