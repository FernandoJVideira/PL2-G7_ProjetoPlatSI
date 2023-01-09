<?php


namespace frontend\tests\Unit;

use common\models\Morada;
use common\models\User;
use common\models\Utilizador;
use frontend\tests\UnitTester;

class MoradaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    // tests
    public function testValidation()
    {
        //Create User entry on database
        $user = new User();
        $user->username = 'fernando';
        $user->email = 'fernandoj.videira@pm.me';
        $user->password = 'okmokmokm';
        $user->generateAuthKey();
        $user->save();

        $user = $this->tester->grabRecord('app\models\User', ['username' => 'fernando']);


        //Create Utilizador entry on database
        $utilizador = new Utilizador();
        $utilizador->setAttribute('nome', 'Fernando');
        $utilizador->setAttribute('nif', '123456789');
        $utilizador->setAttribute('telemovel', '123456789');
        $utilizador->setAttribute('id_user', $user->id);
        $utilizador->save();

        $utilizador = $this->tester->grabRecord('common\models\Utilizador', ['id_user' => $user->id]);

        //Morada
        $morada = new Morada();

        $morada->setAttribute('rua', 'R');
        $this->assertFalse($morada->validate(['rua']));

        $morada->setAttribute('rua', 'Loooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooogggggg');
        $this->assertFalse($morada->validate(['rua']));

        $morada->setAttribute('rua', null);
        $this->assertFalse($morada->validate(['rua']));

        $morada->setAttribute('rua', 'Rua');
        $this->assertTrue($morada->validate(['rua']));

        $morada->setAttribute('cidade', 'C');
        $this->assertFalse($morada->validate(['cidade']));

        $morada->setAttribute('cidade', 'Loooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooogggggg');
        $this->assertFalse($morada->validate(['cidade']));

        $morada->setAttribute('cidade', null);
        $this->assertFalse($morada->validate(['cidade']));

        $morada->setAttribute('cidade', 'Cidade');
        $this->assertTrue($morada->validate(['cidade']));

        $morada->setAttribute('cod_postal', '123');
        $this->assertFalse($morada->validate(['cod_postal']));

        $morada->setAttribute('cod_postal', null);
        $this->assertFalse($morada->validate(['cod_postal']));

        $morada->setAttribute('cod_postal', '123456789');
        $this->assertTrue($morada->validate(['cod_postal']));

        $morada->setAttribute('pais', 'P');
        $this->assertFalse($morada->validate(['pais']));

        $morada->setAttribute('pais', 'Looooooooooooooooooooooooooooooooooooooggggg');
        $this->assertFalse($morada->validate(['pais']));

        $morada->setAttribute('pais', null);
        $this->assertFalse($morada->validate(['pais']));

        $morada->setAttribute('pais', 'Portugal');
        $this->assertTrue($morada->validate(['pais']));

        $morada->setAttribute('id_user', 999);
        $this->assertFalse($morada->validate(['id_user']));

        $morada->setAttribute('id_user', 'P');
        $this->assertFalse($morada->validate(['id_user']));

        $morada->setAttribute('id_user', $utilizador->idUser);
        $this->assertTrue($morada->validate(['id_user']));

        //O valor da morada pode ser null se pertencer à empresa ou a uma Loja, nesse caso não haverá um utilizador associado
        $morada->setAttribute('id_user', null);
        $this->assertTrue($morada->validate(['id_user']));
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

        $user = $this->tester->grabRecord('app\models\User', ['username' => 'fernando']);

        //Create Utilizador entry on database
        $utilizador = new Utilizador();
        $utilizador->setAttribute('nome', 'Fernando');
        $utilizador->setAttribute('nif', '123456789');
        $utilizador->setAttribute('telemovel', '123456789');
        $utilizador->setAttribute('id_user', $user->id);
        $utilizador->save();

        $utilizador = $this->tester->grabRecord('common\models\Utilizador', ['id_user' => $user->id]);

        //Test Save
        $morada = new Morada();
        $morada->rua = 'Rua do unit';
        $morada->cidade = 'Cidade';
        $morada->cod_postal = '1234-343';
        $morada->pais = 'Portugal';
        $morada->id_user = $utilizador->idUser;
        $morada->save();

        $this->tester->seeRecord('common\models\Morada', ['rua' => 'Rua do unit']);

        //Test Update
        $morada = $this->tester->grabRecord('common\models\Morada', ['rua' => 'Rua do unit']);

        $morada->rua = 'Rua unit2';
        $morada->save();

        $this->tester->seeRecord('common\models\Morada', ['idMorada' => $morada->idMorada, 'rua' => 'Rua unit2']);
        $this->tester->dontSeeRecord('common\models\Morada', ['idMorada' => $morada->idMorada, 'rua' => 'Rua do unit']);

        //Test Delete
        $morada->delete();
        $this->tester->dontSeeRecord('common\models\Morada', ['idMorada' => $morada->idMorada]);

    }

}
