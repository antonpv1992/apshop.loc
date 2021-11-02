<?php

class SignInControllerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField(['name' => 'login'], 'apshop');
        $I->fillField(['name' => 'password'], 'password');
        $I->click('Sign In');
        $I->see('Our company');
        $I->see('Logout');
        $I->click('Logout');
        $I->see('Login');
    }
}
