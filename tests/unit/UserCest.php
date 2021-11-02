<?php

use App\Mapper\UserMapper;
use App\Model\User;
use Codeception\Stub;

use function PHPUnit\Framework\containsEqual;

class UserCest
{
    private $user;

    public function _before(UnitTester $I)
    {
        $this->user = new UserMapper();
    }

    // tests
    public function tryToTestCorrectUserLogin(UnitTester $I)
    {
        $login = 'test';
        $actual = $this->user->getUserByLogin($login);
        $I->assertIsArray($actual);
    }

    public function tryToTestIncorrectUserLogin(UnitTester $I)
    {
        $login = 'tests';
        $actual = $this->user->getUserByLogin($login);
        $I->assertFalse($actual);
    }

    public function tryToTestCorrectUserLoginStub(UnitTester $I)
    {
        $login = 'apshop';
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $actual->method('getUserByLogin')->willReturn(true);
        $I->assertTrue($actual->getUserByLogin($login));
    }

    public function tryToTestIncorrectUserLoginStub(UnitTester $I)
    {
        $login = 'apshops';
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $I->assertNull($actual->getUserByLogin($login));
    }

    public function tryToTestCorrectUserEmail(UnitTester $I)
    {
        $email = 'test@test.loc';
        $actual = $this->user->getUserByEmail($email);
        $I->assertIsArray($actual);
    }

    public function tryToTestIncorrectUserEmail(UnitTester $I)
    {
        $email = 'test@tests.loc';
        $actual = $this->user->getUserByEmail($email);
        $I->assertFalse($actual);
    }

    public function tryToTestCorrectUserEmailStub(UnitTester $I)
    {
        $email = 'apshop@email.loc';
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $actual->method('getUserByEmail')->willReturn(true);
        $I->assertTrue($actual->getUserByEmail($email));
    }

    public function tryToTestIncorrectUserEmailStub(UnitTester $I)
    {
        $email = 'apshops@email.loc';
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $I->assertNull($actual->getUserByEmail($email));
    }

    public function tryToTestCorrectGetUsers(UnitTester $I)
    {
        $actual = $this->user->getUsers();
        $I->assertIsArray($actual);
    }

    public function tryToTestIncorrectGetUsers(UnitTester $I)
    {
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $actual->method('getUsers')->willReturn(false);
        $I->assertFalse($actual->getUsers());
    }

    public function tryToTestCorrectSaveUser(UnitTester $I)
    {
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $actual->method('saveUser')->willReturn(true);
        $I->assertTrue($actual->saveUser([]));
    }

    public function tryToTestInceorrectSaveUser(UnitTester $I)
    {
        $actual = Stub::makeEmptyExcept(new UserMapper, []);
        $actual->method('saveUser')->willReturn(false);
        $I->assertFalse($actual->saveUser([]));
    }

    public function tryToTestCorrectCheckRegistrationData(UnitTester $I)
    {
        $data = [
            'login' => 'apshop2',
            'email' => 'apshop2@email.loc',
            'password' => 'password',
            'confirm_password' => 'password'
        ];
        $actual = Stub::makeEmpty(new UserMapper, ['checkRegistrationData' => function($data) {
            $logins = ['apshop', 'test'];
            $emails = ['apshop@email.loc', 'test@test.loc'];
            return !in_array($data['login'], $logins) && !in_array($data['email'], $emails) && $data['password'] === $data['confirm_password'];
        }]);
        $I->assertTrue($actual->checkRegistrationData($data));
    }

    public function tryToTestInceorrectCheckRegistrationLogin(UnitTester $I)
    {
        $data = [
            'login' => 'apshop',
            'email' => 'apshop2@email.loc',
            'password' => 'password',
            'confirm_password' => 'password'
        ];
        $actual = Stub::makeEmpty(new UserMapper, ['checkRegistrationData' => function($data) {
            $logins = ['apshop', 'test'];
            $emails = ['apshop@email.loc', 'test@test.loc'];
            return !in_array($data['login'], $logins) && !in_array($data['email'], $emails) && $data['password'] === $data['confirm_password'];
        }]);
        $I->assertFalse($actual->checkRegistrationData($data));
    }

    
    public function tryToTestInceorrectCheckRegistrationEmail(UnitTester $I)
    {
        $data = [
            'login' => 'apshop2',
            'email' => 'apshop@email.loc',
            'password' => 'password',
            'confirm_password' => 'password'
        ];
        $actual = Stub::makeEmpty(new UserMapper, ['checkRegistrationData' => function($data) {
            $logins = ['apshop', 'test'];
            $emails = ['apshop@email.loc', 'test@test.loc'];
            return !in_array($data['login'], $logins) && !in_array($data['email'], $emails) && $data['password'] === $data['confirm_password'];
        }]);
        $I->assertFalse($actual->checkRegistrationData($data));
    }

    public function tryToTestInceorrectCheckRegistrationPassword(UnitTester $I)
    {
        $data = [
            'login' => 'apshop2',
            'email' => 'apshop2@email.loc',
            'password' => 'password1',
            'confirm_password' => 'password'
        ];
        $actual = Stub::makeEmpty(new UserMapper, ['checkRegistrationData' => function($data) {
            $logins = ['apshop', 'test'];
            $emails = ['apshop@email.loc', 'test@test.loc'];
            return !in_array($data['login'], $logins) && !in_array($data['email'], $emails) && $data['password'] === $data['confirm_password'];
        }]);
        $I->assertFalse($actual->checkRegistrationData($data));
    }

    public function tryToTestCorrectedCheckLoginData(UnitTester $I)
    {
        $data = [
            'login' => 'test',
            'password' => 'password',
        ];
        $obj = [];
        $actual = Stub::makeEmpty(new UserMapper, ['checkLoginData' => function($user, $data) {
            $login = 'test';
            $password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
            return $data['login'] === $login && password_verify($data['password'], $password);
        }]);
        $I->assertTrue($actual->checkLoginData($obj, $data));
    }

    public function tryToTestIncorrectedCheckLoginName(UnitTester $I)
    {
        $data = [
            'login' => 'test1',
            'password' => 'password',
        ];
        $obj = [];
        $actual = Stub::makeEmpty(new UserMapper, ['checkLoginData' => function($user, $data) {
            $login = 'test';
            $password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
            return $data['login'] === $login && password_verify($data['password'], $password);
        }]);
        $I->assertFalse($actual->checkLoginData($obj, $data));
    }

    public function tryToTestIncorrectedCheckLoginPassword(UnitTester $I)
    {
        $data = [
            'login' => 'test',
            'password' => 'password1',
        ];
        $obj = [];
        $actual = Stub::makeEmpty(new UserMapper, ['checkLoginData' => function($user, $data) {
            $login = 'test';
            $password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
            return $data['login'] === $login && password_verify($data['password'], $password);
        }]);
        $I->assertFalse($actual->checkLoginData($obj, $data));
    }
}
