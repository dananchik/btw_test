<?php

return [
    'registration' => [
        'controller' => 'main',
        'action' => 'registr',
        'db'=>true,
    ],
    'avtorization' => [
        'controller' => 'main',
        'action' => 'avtorization',
        'db'=>true
    ],
    '' => [
        'controller' => 'wether',
        'action' => 'show_wether',
        'db'=>false
    ],
    'feadback' => [
        'controller' => 'feadback',
        'action' => 'write_feadback',
        'db'=>true,
    ],
    'logout'=>['controller'=>'main',
        'action'=>'logout',
        'db'=>false],
    'show_feadbacks' => [
        'controller' => 'feadback',
        'action' => 'show_feadbacks',
        'db'=>true,
    ]
];