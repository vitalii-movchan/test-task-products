<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

/**
 * @see https://symfony.com/doc/current/components/runtime.html
 */
return fn(array $context) => new Framework\Kernel(
    environment: (string)$context['APP_ENV'],
    debug: (bool)$context['APP_DEBUG']
);





