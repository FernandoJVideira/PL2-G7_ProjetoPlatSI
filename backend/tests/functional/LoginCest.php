<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'erau');
        $I->fillField('LoginForm[password]', 'password_0');
        $I->click('submit');

        $I->see('Gestão de Utilizadores');
    }

    public function loginUserCamposVazios(FunctionalTester $I)
    {
        $I->click('submit');
        $I->see('Este campo é obrigatório');
    }
    public function loginUserDadosErrados(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'asdasd');
        $I->fillField('LoginForm[password]', 'passasdasdword_0');
        $I->click('submit');

        $I->see('Username ou password incorretos');
    }

    public function loginUserSemPermissoes(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'cliente');
        $I->fillField('LoginForm[password]', 'password_0');
        $I->click('submit');

        $I->see('Não tem permissão para aceder a esta área.');
    }
}
