<?php
return array(
    'urlFormat' => 'path',
    'showScriptName' => false,
    'rules' => array(
        '<controller:\w+>/<id:\w+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
        'contact' => 'site/contact',
        'login' => 'site/login',

        // 'product/detail/<\w+>',
        'cart' => 'shoppingCart/index',
        'checkout' => 'shoppingCart/checkout',
        'category' => 'category/index',
        'category/<\w+>' => 'category/view',
        // 'category/<id:\d+>/*' => 'category',
    ),
);
