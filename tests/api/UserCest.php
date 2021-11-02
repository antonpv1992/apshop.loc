<?php

use Codeception\Util\HttpCode;

class UserCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('content-type', 'application/json');
    }

    public function getUser(ApiTester $I)
    {
        $I->seeInDatabase('user', ['id' => 1, 'login' => 'apshop', 'email' => 'apshop@email.loc']);
        $I->sendGet('api/user/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "id" => 1,
            "login" => "apshop",
            "email" => "apshop@email.loc",
        ]);
    }

    public function getUsers(ApiTester $I)
    {
        $I->seeInDatabase('user', ['id' => 3, 'login' => 'test1', 'email' => 'test1@test.loc']);
        $I->sendGet('api/users');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "id" => 2,
            "login" => "test",
            "email" => "test@test.loc",
        ]);
        $I->seeResponseMatchesJsonType([
            'id' => 'integer',
            'login' => 'string',
            'email' => 'string:email',
        ]);
    }
}
