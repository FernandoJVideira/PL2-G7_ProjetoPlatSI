<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use Codeception\Util\Locator;
use common\fixtures\UserFixture;

class StockCest
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
    public function StockRequisitarAdicionar(FunctionalTester $I)
    {
        $I->click('Gestão de stock', 'a');
        $I->see('Gestão de stock de', 'h1');
        $beforeRequest = $I->grabTextFrom('tbody tr:nth-child(1) td:nth-child(3)');
        $I->click('Requisitar stock');
        $I->see('Requisitar stock', 'h1');
        $I->fillField('Stock[quant_req]', '10');
        $I->click('Guardar');
        $afterRequest = $I->grabTextFrom('tbody tr:nth-child(1) td:nth-child(3)');
        $I->see(($beforeRequest + 10) == $afterRequest);
        $beforeAdd = $I->grabTextFrom('tbody tr:nth-child(1) td:nth-child(2)');
        $I->click('Adicionar stock');
        $I->see('Receber Stock:', 'h1');
        $I->fillField('Stock[quant_stock]', '10');
        $I->click('Guardar');
        $afterAdd = $I->grabTextFrom('tbody tr:nth-child(1) td:nth-child(2)');
        $I->see(($beforeAdd + 10) == $afterAdd);
    }


}
