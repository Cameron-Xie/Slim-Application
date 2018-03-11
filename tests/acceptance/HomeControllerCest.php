<?php declare(strict_types = 1);

namespace Acme\Test;

/**
 * Class HomeControllerCest
 * @package Acme\Test
 */
class HomeControllerCest
{
    public function testHelloEndPoint(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->canSeeResponseCodeIs(200);
    }
}
