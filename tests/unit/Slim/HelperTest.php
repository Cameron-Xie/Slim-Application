<?php declare(strict_types = 1);

namespace Acme\Test\Slim;

use Codeception\Test\Unit;
use DateTime;
use InvalidArgumentException;
use Mockery;
use Slim\Container;
use function Acme\Slim\Helper\buildDependencyFromClass;
use function Acme\Slim\Helper\buildDependencyFromContainer;

/**
 * Class HelperTest
 * @package Acme\Test\Slim
 */
class HelperTest extends Unit
{
    /** @var \Acme\Test\UnitTester */
    protected $tester;

    /** @var Container */
    protected $container;

    // phpcs:ignore
    protected function _before()
    {
        $this->container = Mockery::mock(Container::class);
        $this->container->shouldReceive('get')
            ->withArgs([DateTime::class])
            ->andReturn(new DateTime());
    }

    // phpcs:ignore
    protected function _after()
    {
        unset($this->container);
    }


    public function testBuildDependencyFromClassSuccess()
    {
        $this->assertInstanceOf(DateTime::class, buildDependencyFromClass(DateTime::class));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBuildDependencyFromClassFailed()
    {
        buildDependencyFromClass('InvalidClassName');
    }

    public function testBuildDependencyFromContainerSuccess()
    {
        $errorHandler = function ($id) {
            return $id;
        };

        $this->assertInstanceOf(
            DateTime::class,
            buildDependencyFromContainer($this->container, DateTime::class, $errorHandler)
        );
    }


    public function testBuildDependencyFromContainerFailed()
    {
        $errorHandler = function ($id) {
            return $id;
        };

        $this->assertEquals(
            'InvalidClassName',
            buildDependencyFromContainer($this->container, 'InvalidClassName', $errorHandler)
        );
    }
}
