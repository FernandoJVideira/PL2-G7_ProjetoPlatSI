<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;


/**
 * Class LoginCest
 */
class LoginCest
{

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'asdasdasd');
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
        $I->fillField('LoginForm[username]', 'cliente1');
        $I->fillField('LoginForm[password]', '84518451');
        $I->click('submit');

        $I->see('Não tem permissão para aceder a esta área.');
    }
}
