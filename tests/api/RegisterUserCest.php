<?php

class registerUserCest
{
    var $auth_info;

    public function _before(ApiTester $I)
    {
        $this->auth_info = [
            "email" => "arashrasoulzadeh@gmail.com",
            "password" => "test"
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');

    }

    // tests
    public function registerTest(ApiTester $I)
    {
        $I->sendPOST("/api/auth/register", $this->auth_info);
        $I->seeResponseCodeIs(200);
    }

    public function loginTest(ApiTester $I)
    {
        $I->sendPOST("/api/auth/login", $this->auth_info);
        $I->seeResponseCodeIs(200);
    }
}
