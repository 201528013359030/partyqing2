<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=ict2',
            'username' => 'root',
            'password' => 'psw.db7898',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],        
        // 配置缓存
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 配置语言
        'language'=>'zh-CN',
    ],
];
