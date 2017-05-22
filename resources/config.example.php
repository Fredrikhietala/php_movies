<?php

return [
    'db_host' => '',
    'db_name' => '',
    'db_user' => '',
    'db_password' => '',
    'db_charset' => 'utf8',
    'db_options' => [  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false  ]
];