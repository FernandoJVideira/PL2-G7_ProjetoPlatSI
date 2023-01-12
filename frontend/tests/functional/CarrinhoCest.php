<?php

namespace frontend\tests\Functional;

use backend\tests\Functional\CriarFuncionarioCest;
use Codeception\Util\Locator;
use frontend\tests\FunctionalTester;

class CarrinhoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->fillField('LoginForm[username]', 'cliente1');
        $I->fillField('LoginForm[password]', '84518451');
        $I->click('login-button');
    }

    // tests
    public function CarrinhoSemProdutos(FunctionalTester $I)
    {
        $I->amOnRoute('/carrinho/view');
        $I->see('Não existem itens no carrinho! Adicione produtos ao carrinho.');
    }
    public function CarrinhoAdicionarProduto(FunctionalTester $I)
    {
        $I->amOnRoute('/site/produtos');
        $I->see('Produtos', 'h1');
        $I->click('Imagem do produto');
        $I->see('Descricao:');
        $I->click('btCarrinho');
        $I->see('Carrinho', 'h5');
        $I->click('btn-alert');
        $I->see('Compra efetuada com sucesso!');
    }

    public function CarrinhoAdicionarCupao(FunctionalTester $I){
        $I->click('Produtos');
        $I->see('Produtos', 'h1');
        $I->click('Imagem do produto');
        $I->see('Descricao:');
        $I->click('btCarrinho');
        $I->see('Carrinho', 'h5');
        $I->fillField('codigoPromo', 'abcde');
        $I->click('Aplicar');
        $sub_total = $I->grabTextFrom('descendant-or-self::h6[3]');
        $desconto = $I->grabTextFrom('descendant-or-self::h6[7]');
        $I->see(trim($sub_total, '€')-trim($desconto, '€'));
    }

    public function CarrinhoAdicionarCupaoInvalido(FunctionalTester $I){
        $I->click('Produtos');
        $I->see('Produtos', 'h1');
        $I->click('Imagem do produto');
        $I->see('Descricao:');
        $I->click('btCarrinho');
        $I->see('Carrinho', 'h5');
        $I->fillField('codigoPromo', 'dsdsd');
        $I->click('Aplicar');
        $I->see('Código de promoção inválido!');
    }
}
