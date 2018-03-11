<?php declare(strict_types = 1);

use Slim\App;
use Slim\Container;
use function Functional\map;

$config = require __DIR__ . '/config.php';

// Set default timezone
date_default_timezone_set($config->get('app.timezone', 'UTC'));

// New Container
$container = new Container($config->get('app', []));

// New App
$app = new App($container);

// Service Provider Register
map($config->get('providers', []), function ($class) use ($container) {
    $container->register(new $class());
});

// Global middleware
//map($config->get('middleware', []), function ($class) use ($app, $container) {
//    $app->add(buildDependencyFromContainer($container, $class, 'Acme\Slim\Helper\buildDependencyFromClass'));
//});

// Routes
$app->group('/api/v1', function () use ($app) {
    require __DIR__ . '/../routes/api.php';
});

return $app;
