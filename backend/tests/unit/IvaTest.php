<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Iva;

class IvaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    // tests
    public function testValidation()
    {
        //For "Unique" validation testing
        $ivaTest = new Iva();
        $ivaTest->iva = 10;
        $ivaTest->descricao = 'Teste';
        $ivaTest->ativo = 1;
        $ivaTest->save();


        $iva = new Iva();

        //Value < 1
        $iva->iva = 0;
        $this->assertFalse($iva->validate(['iva']));

        //Value > 100
        $iva->iva = 101;
        $this->assertFalse($iva->validate(['iva']));

        //Iva already exists
        $iva->iva = $ivaTest->iva;
        $this->assertFalse($iva->validate(['iva']));

        //Null Iva
        $iva->iva = null;
        $this->assertFalse($iva->validate(['iva']));

        //Non Numeric Value
        $iva->iva = 'q';
        $this->assertFalse($iva->validate(['iva']));

        //Valid Value in range [1,100]
        $iva->iva = 13;
        $this->assertTrue($iva->validate(['iva']));

        //Too short description
        $iva->descricao = 'T';
        $this->assertFalse($iva->validate(['descricao']));

        //Too long description
        $iva->descricao = 'Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooongg';
        $this->assertFalse($iva->validate(['descricao']));

        //Null description
        $iva->descricao = null;
        $this->assertFalse($iva->validate(['descricao']));

        //Valid description
        $iva->descricao = 'Teste';
        $this->assertTrue($iva->validate(['descricao']));

        //Null ativo
        $iva->ativo = null;
        $this->assertFalse($iva->validate(['ativo']));

        //Invalid ativo
        $iva->ativo = 2;
        $this->assertFalse($iva->validate(['ativo']));

        //Valid ativo
        $iva->ativo = 1;
        $this->assertTrue($iva->validate(['ativo']));
    }

    public function testSaveUpdateDelete()
    {
        //Test Save
        $iva = new Iva();

        $iva->iva = 13;
        $iva->descricao = 'Teste';
        $iva->ativo = 1;
        $iva->save();

        $this->tester->seeRecord('common\models\Iva', ['iva' => 13]);

        //Test Update
        $iva = $this->tester->grabRecord('common\models\Iva', ['iva' => 13]);
        $iva->ativo = 0;
        $iva->save();

        $this->tester->seeRecord('common\models\Iva', ['iva' => 13, 'ativo' => 0]);
        $this->tester->dontseeRecord('common\models\Iva', ['iva' => 13, 'ativo' => 1]);

        //Test Delete
        $iva->delete();
        $this->tester->dontseeRecord('common\models\Iva', ['iva' => 13]);
    }
}
