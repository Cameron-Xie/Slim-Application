<?php declare(strict_types = 1);

namespace Acme\Functional\Helper;

/**
 * @param string $id      Environment variable.
 * @param mixed  $default Default fallback.
 * @return mixed
 */
function env(string $id, $default = '')
{
    $value = getenv($id);

    return $value ? $value : $default;
}
