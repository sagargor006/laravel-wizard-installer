<?php

return [
    /**
     * Server requirements
     */
    'requirements' => [
        'php' => [
            'version' => '7.2.5',
            'extensions' => [
                'openssl',
                'pdo',
                'mbstring',
                'tokenizer',
                'JSON',
                'cURL',
            ]
        ]
    ],
    /**
     * Storage permissions
     */
    'permissions' => [
        'storage/framework/' => '775',
        'storage/logs/' => '775',
        'bootstrap/cache/' => '775',
    ],
];
