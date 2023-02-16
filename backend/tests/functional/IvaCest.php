<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class IvaCest
{


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'asdasdasd');
        $I->click('submit');
        $I->see('Gestão Geral de Lojas');
    }

    // tests
    public function IvaCamposVazios(FunctionalTester $I)
    {
        $I->click('Ivas', 'a');
        $I->see('IVA', 'h1');
        $I->click('Criar Iva');
        $I->see('Criar Iva', 'h1');
        $I->click('Guardar');
        $I->see('Este campo é obrigatório');
    }

    public function IvaValorInvalido(FunctionalTester $I)
    {
        $I->click('Ivas', 'a');
        $I->see('IVA', 'h1');
        $I->click('Criar Iva');
        $I->see('Criar Iva', 'h1');
        $I->fillField('Iva[iva]', 'asdasd');
        $I->click('Guardar');
        $I->see('Este campo deve ser um número');
        $I->fillField('Iva[iva]', '130');
        $I->click('Guardar');
        $I->see('Este campo deve ser um número');
    }

    public function IvaValorRepetido(FunctionalTester $I)
    {
        $I->click('Ivas', 'a');
        $I->see('IVA', 'h1');
        $I->click('Criar Iva');
        $I->see('Criar Iva', 'h1');
        $I->fillField('Iva[iva]', '23');
        $I->fillField('Iva[descricao]', 'IVA 23%');
        $I->click('Guardar');
        $I->see('Este valor já existe');
    }

    public function IvaValido(FunctionalTester $I)
    {
        $I->click('Ivas', 'a');
        $I->see('IVA', 'h1');
        $I->click('Criar Iva');
        $I->see('Criar Iva', 'h1');
        $I->fillField('Iva[iva]', '1');
        $I->fillField('Iva[descricao]', 'IVA 1%');
        $I->click('Guardar');
        $I->see('IVA', 'h1');
        $I->see('IVA 1%');
    }
}
