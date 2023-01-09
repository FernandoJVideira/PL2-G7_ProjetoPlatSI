<?php


namespace frontend\tests\Unit;

use common\models\Carrinho;
use common\models\Linhacarrinho;
use common\models\Morada;
use common\models\Promocao;
use common\models\User;
use common\models\Utilizador;
use frontend\tests\UnitTester;

class CarrinhoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;


    // tests
    public function testValidations()
    {
        //Create User entry on database
        $user = new User();
        $user->username = 'fernando';
        $user->email = 'fernandoj.videira@pm.me';
        $user->password = 'okmokmokm';
        $user->generateAuthKey();
        $user->save();

        //Create Utilizador entry on database
        $utilizador = new Utilizador();
        $utilizador->setAttribute('nome', 'Fernando');
        $utilizador->setAttribute('nif', '123456789');
        $utilizador->setAttribute('telemovel', '123456789');
        $user = $this->tester->grabRecord('app\models\User', ['username' => 'fernando']);
        $utilizador->setAttribute('id_user', $user->id);
        $utilizador->save();

        //Create Morada entry on database
        $morada = new Morada();
        $morada->setAttribute('rua', 'Rua teste unit');
        $morada->setAttribute('cidade','123');
        $morada->setAttribute('cod_postal','1232');
        $morada->setAttribute('pais','Portugal');
        $morada->save();

        //Create Promoção entry on database
        $promocao = new Promocao();
        $promocao->setAttribute('nome_promo', 'Teste unit');
        $promocao->setAttribute('percentagem', 10);
        $promocao->setAttribute('data_limite', '2021-01-01');
        $promocao->setAttribute('codigo', '12345');
        $promocao->save();



        //Carrinho
        $carrinho = new Carrinho();
        $morada = $this->tester->grabRecord('common\models\Morada', ['rua' => 'Rua teste unit']);
        $promo = $this->tester->grabRecord('common\models\Promocao', ['nome_promo' => 'Teste unit']);
        $usr = $this->tester->grabRecord('common\models\Utilizador', ['nome' => 'Fernando']);

        $carrinho->setAttribute('id_morada', 999);//Morada com id 999 não existe na base de dados
        $this->assertFalse($carrinho->validate(['id_morada']));

        $carrinho->setAttribute('id_morada', $morada->idMorada);
        $this->assertTrue($carrinho->validate(['id_morada']));

        //O valor do id_morada pode ser null enquanto o utilizador não "fecha" o carrinho
        $carrinho->setAttribute('id_morada', null);
        $this->assertTrue($carrinho->validate(['id_morada']));

        $carrinho->setAttribute('data_criacao', '2020/01/01');
        $this->assertFalse($carrinho->validate(['data_criacao']));

        //Pode ser null dado que a base de dados lhe dá o valor default da data quando a entry é criada
        $carrinho->setAttribute('data_criacao', null);
        $this->assertTrue($carrinho->validate(['data_criacao']));

        $carrinho->setAttribute('data_criacao', '2022-01-01 12:00:00');
        $this->assertTrue($carrinho->validate(['data_criacao']));

        $carrinho->setAttribute('id_user', 999); //Utilizador com id 999 não existe na base de dados
        $this->assertFalse($carrinho->validate(['id_user']));

        $carrinho->setAttribute('id_user', $usr->idUser);
        $this->assertTrue($carrinho->validate(['id_user']));

        //O valor do id_user pode ser null enquanto o utilizador é "Guest" e não se encontra logado
        $carrinho->setAttribute('id_user', null);
        $this->assertTrue($carrinho->validate(['id_user']));

        $carrinho->setAttribute('id_promocao', 999); //Promoção com id 999 não existe na base de dados
        $this->assertFalse($carrinho->validate(['id_promocao']));

        $carrinho->setAttribute('id_promocao', $promo->idPromocao);
        $this->assertTrue($carrinho->validate(['id_promocao']));

        //O valor do id_promo pode ser null enquanto o utilizador não inserir um código de promoção
        $carrinho->setAttribute('id_promocao', null);
        $this->assertTrue($carrinho->validate(['id_promocao']));

        $carrinho->setAttribute('estado', 'Pendente');
        $this->assertFalse($carrinho->validate(['estado']));

        $carrinho->setAttribute('estado', null);
        $this->assertFalse($carrinho->validate(['estado']));

        //O estado apenas aceita estes 3 valores
        $carrinho->setAttribute('estado', 'aberto');
        $this->assertTrue($carrinho->validate(['estado']));

        $carrinho->setAttribute('estado', 'fechado');
        $this->assertTrue($carrinho->validate(['estado']));

        $carrinho->setAttribute('estado', 'emProcessamento');
        $this->assertTrue($carrinho->validate(['estado']));

    }

    public function testSaveUpdateDelete()
    {
        //Create User entry on database
        $user = new User();
        $user->username = 'fernando';
        $user->email = 'fernandoj.videira@pm.me';
        $user->password = 'okmokmokm';
        $user->generateAuthKey();
        $user->save();

        //Create Utilizador entry on database
        $utilizador = new Utilizador();
        $utilizador->setAttribute('nome', 'Fernando');
        $utilizador->setAttribute('nif', '123456789');
        $utilizador->setAttribute('telemovel', '123456789');
        $utilizador->setAttribute('id_user', $user->id);
        $utilizador->save();

        //Create Morada entry on database
        $morada = new Morada();
        $morada->setAttribute('rua', 'Ruas');
        $morada->setAttribute('cidade','123');
        $morada->setAttribute('cod_postal','1232');
        $morada->setAttribute('pais','Portugal');
        $morada->save();

        //Create Promoção entry on database
        $promocao = new Promocao();
        $promocao->setAttribute('nome_promo', 'Teste');
        $promocao->setAttribute('percentagem', 10);
        $promocao->setAttribute('data_limite', '2021-01-01');
        $promocao->setAttribute('codigo', '12345');
        $promocao->save();


        //Test Save
        $carrinho = new Carrinho();

        $carrinho->estado = 'aberto';
        $carrinho->data_criacao = '2020-01-01 12:00:00';
        $carrinho->id_user = $utilizador->idUser;
        $carrinho->save();

        $this->tester->seeRecord('common\models\Carrinho', ['data_criacao' => '2020-01-01 12:00:00']);

        //Test Update
        $carrinho = $this->tester->grabRecord('common\models\Carrinho', ['data_criacao' => '2020-01-01 12:00:00']);
        $carrinho->estado = 'emProcessamento';
        $carrinho->save();

        $this->tester->seeRecord('common\models\Carrinho', ['idCarrinho' => $carrinho->idCarrinho, 'estado' => 'emProcessamento']);
        $this->tester->dontSeeRecord('common\models\Carrinho', ['idCarrinho' => $carrinho->idCarrinho, 'estado' => 'aberto']);

        //Test Delete
        $carrinho->delete();
        $this->tester->dontSeeRecord('common\models\Carrinho', ['idCarrinho' => $carrinho->idCarrinho]);


    }

}
