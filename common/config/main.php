<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
        ],
        'redis' => [
    'class' => 'yii\redis\Connection',
    'hostname' => 'localhost',
    'port' => 6379,
    'database' => 0,
                   ],
    ],
];
