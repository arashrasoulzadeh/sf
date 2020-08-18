<?php

class FoodMenuCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
}
