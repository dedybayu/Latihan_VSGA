<?php

return [
    'connection' => 'mysql',
    'name'       => 'db_register',
    'username'   => 'root',
    'password'   => '',
    'options'    => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];
