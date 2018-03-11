<?php declare(strict_types = 1);

use function Acme\Functional\Helper\env;

return [
    'app' => [
        'settings' => [
            'displayErrorDetails' => env('APP_DEBUG', true),
        ],

        /*
         * Timezone
         */
        'timezone' => env('TIMEZONE', 'UTC'),
    ],
];
