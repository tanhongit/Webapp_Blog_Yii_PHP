<?php
return array(
    'urlFormat' => 'path',
    'showScriptName' => false,
    'rules' => array(
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
        'contact' => 'site/contact',
        'login' => 'site/login',

        'product/list/<id:\d+>',
    ),
);