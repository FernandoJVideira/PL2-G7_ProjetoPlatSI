<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class CriarFuncionarioCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', '84518451');
        $I->click('submit');
        $I->amOnRoute('/utilizador/create?role=Funcionario');
    }

    // tests
    public function criarFuncionario(FunctionalTester $I)
    {

        $I->see('Criar Funcionario', 'h1');
        $I->fillField('SignupForm[nome]', 'Funcionario Teste');
        $I->fillField('SignupForm[username]', 'Teste');
        $I->fillField('SignupForm[email]', 'funcionario@teste.pt');
        $I->fillField('SignupForm[password]', '123456789');
        $I->fillField('SignupForm[telemovel]', '912345678');
        $I->fillField('SignupForm[nif]', '123456789');
        $I->fillField('SignupForm[morada]', 'Rua Teste');
        $I->fillField('SignupForm[cidade]', 'porto');
        $I->fillField('SignupForm[codigo_postal]', '4000-000');
        $I->selectOption('SignupForm[pais]', 'Portugal');
        $I->selectOption('SignupForm[id_loja]', '1');
        $I->click('submit');

        $I->see('Funcionario Teste');
        $I->seeRecord('common\models\Utilizador', ['nome' => 'Funcionario Teste']);
    }

    public function criarFuncionarioCamposVazios(FunctionalTester $I)
    {
        $I->see('Criar Funcionario', 'h1');
        $I->click('submit');
        $I->see('Tem de ser selecionada uma loja!');
        $I->selectOption('SignupForm[id_loja]', '1');
        $I->click('submit');
        $I->see('O nome tem de ser preenchido!');
        $I->see('O username tem de ser preenchido!');
        $I->see('O e-mail tem de ser preenchido!');
        $I->see('A password tem de ser preenchida!');
        $I->see('O telemóvel tem de ser preenchido!');
        $I->see('O nif tem de ser preenchido!');
        $I->see('A morada tem de ser preenchida!');
        $I->see('A cidade tem de ser preenchida!');
        $I->see('O código postal tem de ser preenchido!');
    }

    public function criarFuncionarioEmailErrado(FunctionalTester $I)
    {
        $I->see('Criar Funcionario', 'h1');
        $I->fillField('SignupForm[nome]', 'Funcionario Teste');
        $I->fillField('SignupForm[username]', 'Teste');
        $I->fillField('SignupForm[email]', 'ttttt');
        $I->fillField('SignupForm[password]', '123456799');
        $I->fillField('SignupForm[telemovel]', '912345679');
        $I->fillField('SignupForm[nif]', '123456789');
        $I->fillField('SignupForm[morada]', 'Rua Teste');
        $I->fillField('SignupForm[cidade]', 'porto');
        $I->fillField('SignupForm[codigo_postal]', '4000-000');
        $I->selectOption('SignupForm[pais]', 'Portugal');
        $I->selectOption('SignupForm[id_loja]', '1');
        $I->click('submit');
        $I->see('O e-mail não é válido!');
    }

    public function criarFuncionarioUsernameRepetido(FunctionalTester $I)
    {
        $I->see('Criar Funcionario', 'h1');
        $I->fillField('SignupForm[nome]', 'Funcionario Teste');
        $I->fillField('SignupForm[username]', 'funcionario1');
        $I->fillField('SignupForm[email]', 'ttttt@as.ad');
        $I->fillField('SignupForm[password]', '123456299');
        $I->fillField('SignupForm[telemovel]', '912342679');
        $I->fillField('SignupForm[nif]', '123456789');
        $I->fillField('SignupForm[morada]', 'Rua Teste');
        $I->fillField('SignupForm[cidade]', 'porto');
        $I->fillField('SignupForm[codigo_postal]', '4000-000');
        $I->selectOption('SignupForm[pais]', 'Portugal');
        $I->selectOption('SignupForm[id_loja]', '1');
        $I->click('submit');
        $I->see('Existe uma conta registada com este username!');
    }
    public function criarFuncionarioNifRepetido(FunctionalTester $I)
    {
        $I->see('Criar Funcionario', 'h1');
        $I->fillField('SignupForm[nome]', 'Funcionario Teste');
        $I->fillField('SignupForm[username]', 'qweqwe');
        $I->fillField('SignupForm[email]', 'ttttt@as.ad');
        $I->fillField('SignupForm[password]', '123456299');
        $I->fillField('SignupForm[telemovel]', '912342679');
        $I->fillField('SignupForm[nif]', '123321123');
        $I->fillField('SignupForm[morada]', 'Rua Teste');
        $I->fillField('SignupForm[cidade]', 'porto');
        $I->fillField('SignupForm[codigo_postal]', '4000-000');
        $I->selectOption('SignupForm[pais]', 'Portugal');
        $I->selectOption('SignupForm[id_loja]', '1');
        $I->click('submit');
        $I->see('Existe uma conta registada com este nif!');
    }
}
