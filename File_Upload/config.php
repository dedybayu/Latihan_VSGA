<?php

return [
    'connection' => 'mysql',
    'name'       => 'db_file_upload',
    'username'   => 'root',
    'password'   => '',
    'options'    => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];
