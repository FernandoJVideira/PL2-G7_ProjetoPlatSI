<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class EncomendaCest
{
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
        $I->fillField('LoginForm[username]', 'erau');
        $I->fillField('LoginForm[password]', 'password_0');
        $I->click('submit');
        $I->see('Gestão de Loja');
    }

    // tests
    public function EncomendaFechar(FunctionalTester $I)
    {
        $I->click('Gestão de encomendas', 'a');
        $I->see('Gestão de encomendas de', 'h1');
        $I->click('Ver encomenda');
        $I->see('Encomenda de', 'h1');
        $I->click('Fechar encomenda');
        $I->see('Fechado');
    }

}
