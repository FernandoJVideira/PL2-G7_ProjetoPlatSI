<?php


namespace frontend\tests\Unit;

use common\models\User;
use common\models\Utilizador;
use frontend\tests\UnitTester;

class UtilizadorTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;


    // tests
    public function testValidation()
    {
        //Create user entry on database
        $user = new User();
        $user->username = 'fernando';
        $user->email = 'fernandoj.videira@pm.me';
        $user->password = 'okmokmokm';
        $user->generateAuthKey();
        $user->save();

        //Loja com id 1 já existe na base de dados

        //Testing
        $utilizador = new Utilizador();
        $user = User::find()->where(['username' => 'fernando'])->one();

        $utilizador->setAttribute('nome', 'Loooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooogggggg');
        $this->assertFalse($utilizador->validate(['nome']));

        $utilizador->setAttribute('nome', 'S');
        $this->assertFalse($utilizador->validate(['nome']));

        $utilizador->setAttribute('nome', 'Válido');
        $this->assertTrue($utilizador->validate(['nome']));

        $utilizador->setAttribute('nif', '123');
        $this->assertFalse($utilizador->validate(['nif']));

        $utilizador->setAttribute('nif', '123456789');
        $this->assertTrue($utilizador->validate(['nif']));

        $utilizador->setAttribute('nif', 'gsvcaqqqq');
        $this->assertFalse($utilizador->validate(['nif']));

        $utilizador->setAttribute('telemovel', '123');
        $this->assertFalse($utilizador->validate(['telemovel']));

        $utilizador->setAttribute('telemovel', '123456789');
        $this->assertTrue($utilizador->validate(['telemovel']));

        $utilizador->setAttribute('telemovel', 'gsvcassss');
        $this->assertFalse($utilizador->validate(['telemovel']));

        $utilizador->setAttribute('id_user', 2);
        $this->assertFalse($utilizador->validate(['id_user']));

        $utilizador->setAttribute('id_user', $user->id);
        $this->assertTrue($utilizador->validate(['id_user']));

        $utilizador->setAttribute('id_loja', 2);
        $this->assertFalse($utilizador->validate(['id_loja']));

        $utilizador->setAttribute('id_loja', 1);
        $this->assertTrue($utilizador->validate(['id_loja']));

        //Se o user for cliente não estará associado a uma loja
        $utilizador->setAttribute('id_loja', null);
        $this->assertTrue($utilizador->validate(['id_loja']));

    }

    public function testSaveUpdateDelete()
    {
        //Create user entry on database
        $user = new User();
        $user->username = 'diogo';
        $user->email = 'diogo@gmail.com';
        $user->password = 'okmokmokm';
        $user->generateAuthKey();
        $user->save();


        //Test Save
        $utilizador = new Utilizador();

        $utilizador->setAttribute('nome', 'Diogo');
        $utilizador->setAttribute('nif', '123456789');
        $utilizador->setAttribute('telemovel', '123456789');
        $utilizador->setAttribute('id_user', $user->id);
        $utilizador->setAttribute('id_loja', null);
        $utilizador->save();

        $this->tester->seeRecord('common\models\Utilizador', ['nome' => 'Diogo']);

        //Test Update
        $utilizador = $this->tester->grabRecord('common\models\Utilizador', ['id_user' => $user->id]);

        $utilizador->setAttribute('nome', 'Jorge');
        $utilizador->save();

        $this->tester->dontseeRecord('common\models\Utilizador', ['nome' => 'Diogo']);
        $this->tester->seeRecord('common\models\Utilizador', ['nome' => 'Jorge']);

        //Test Delete
        $utilizador->delete();
        $this->tester->dontseeRecord('common\models\Utilizador', ['nome' => 'Jorge']);

    }
}
