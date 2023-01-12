<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('STUFF n\' GO');
        $I->seeLink('Login');
        $I->click('//html/body/header/div[2]/div/div[2]/nav/div/div[2]/a[3]/span');
        $I->wait(2); // wait for page to be opened
        $I->see('Login', 'h1');
        $I->fillField('LoginForm[username]', 'cliente1');
        $I->fillField('LoginForm[password]', '84518451');
        $I->click('login-button');
        $I->wait(2); // wait for page to be opened
        $I->dontSeeLink('Login');
        $I->seeLink('Produtos');
        $I->click('Produtos');
        $I->wait(2);
        $I->click('Imagem do produto');
        $I->wait(2);
        $I->see('Descricao:');
        $I->click('btCarrinho');
        $I->wait(2);
        $I->see('Carrinho', 'h5');
        $I->click('Encomendar');
        $I->wait(2);
        $I->see('Compra efetuada com sucesso!');

    }
}
