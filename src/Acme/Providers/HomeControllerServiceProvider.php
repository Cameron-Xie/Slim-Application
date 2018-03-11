<?php declare(strict_types = 1);

namespace Acme\Providers;

use Acme\Controller\HomeController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class HomeControllerServiceProvider
 * @package Acme\Providers
 */
class HomeControllerServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['HomeController'] = function () {
            return new HomeController();
        };
    }
}
