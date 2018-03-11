<?php declare(strict_types = 1);

namespace Acme\Test\Functional;

use Codeception\Test\Unit;
use function Acme\Functional\Helper\env;

/**
 * Class HelperTest
 * @package Acme\Test\Functional
 */
class HelperTest extends Unit
{
    /** @var \Acme\Test\UnitTester */
    protected $tester;

    // phpcs:ignore
    protected function _before()
    {
        putenv('ENV_VALID_KEY=VALUE');
    }

    // phpcs:ignore
    protected function _after()
    {
        putenv('ENV_VALID_KEY');
    }

    public function testEnvFunction()
    {
        $defaultValue = 'DEFAULT';
        $this->assertEquals('VALUE', env('ENV_VALID_KEY'));
        $this->assertEquals('DEFAULT', env('ENV_INVALID_KEY', $defaultValue));
    }
}
