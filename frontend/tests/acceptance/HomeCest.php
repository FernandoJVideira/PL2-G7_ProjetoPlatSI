<?php

namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use common\models\User;
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
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', '84518451');
        $I->click('login-button');
        $I->wait(5); // wait for page to be opened
        $I->dontSeeLink('Login');
        $I->seeLink('Produtos');
        $I->click('Produtos');

    }
}
