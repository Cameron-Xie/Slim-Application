<?php declare(strict_types = 1);

namespace Acme\Slim\Helper;

use Interop\Container\Exception\ContainerException;
use InvalidArgumentException;
use Slim\Container;
use Throwable;

/**
 * @param string $class Full class name.
 * @return mixed
 * @throws InvalidArgumentException
 */
function buildDependencyFromClass(string $class)
{
    if (!class_exists($class)) {
        throw new InvalidArgumentException($class . ' not found');
    }

    return new $class();
}

/**
 * @param Container $container    Slim Container.
 * @param string    $id           Dependency index.
 * @param callable  $errorHandler Call back error handler.
 * @return mixed
 * @throws ContainerException
 */
function buildDependencyFromContainer(Container $container, string $id, callable $errorHandler)
{
    try {
        return $container->get($id);
    } catch (Throwable $e) {
        return $errorHandler($id);
    }
}
