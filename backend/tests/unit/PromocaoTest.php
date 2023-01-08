<?php


namespace unit;

use common\models\Promocao;
use backend\tests\UnitTester;

class PromocaoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    // tests
    public function testValidation()
    {
        //Create Promoção entry on database
        $promocao = new Promocao();
        $promocao->setAttribute('nome_promo', 'Teste');
        $promocao->setAttribute('percentagem', 10);
        $promocao->setAttribute('data_limite', '2021-01-01');
        $promocao->setAttribute('codigo', '12345');
        $promocao->save();


        //Promoção

        $promocao = new Promocao();
        $promo = $this->tester->grabRecord('common\models\Promocao', ['nome_promo' => 'Teste']);

        $promocao->setAttribute('nome_promo', 'P');
        $this->assertFalse($promocao->validate(['nome_promo']));

        $promocao->setAttribute('nome_promo', 'Loooooooooooooooooooooooooooooooooooooooooooooooong');
        $this->assertFalse($promocao->validate(['nome_promo']));

        $promocao->setAttribute('nome_promo', null);
        $this->assertFalse($promocao->validate(['nome_promo']));

        $promocao->setAttribute('nome_promo', 'Promoção');
        $this->assertTrue($promocao->validate(['nome_promo']));

        $promocao->setAttribute('percentagem', 0);
        $this->assertFalse($promocao->validate(['percentagem']));

        $promocao->setAttribute('percentagem', 101);
        $this->assertFalse($promocao->validate(['percentagem']));

        $promocao->setAttribute('percentagem', null);
        $this->assertFalse($promocao->validate(['percentagem']));

        $promocao->setAttribute('percentagem', 50);
        $this->assertTrue($promocao->validate(['percentagem']));

        $promocao->setAttribute('data_limite', '2020/01/01');
        $this->assertFalse($promocao->validate(['data_limite']));

        $promocao->setAttribute('data_limite', null);
        $this->assertFalse($promocao->validate(['data_limite']));

        $promocao->setAttribute('data_limite', '2022-01-01');
        $this->assertTrue($promocao->validate(['data_limite']));

        $promocao->setAttribute('codigo', '12');
        $this->assertFalse($promocao->validate(['codigo']));

        $promocao->setAttribute('codigo', 'Loooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooggggg');
        $this->assertFalse($promocao->validate(['codigo']));

        $promocao->setAttribute('codigo', null);
        $this->assertFalse($promocao->validate(['codigo']));

        //Este valor já se encontra registado, logo não é válido
        $promocao->setAttribute('codigo', $promo->codigo);
        $this->assertFalse($promocao->validate(['codigo']));

        $promocao->setAttribute('codigo', 'EWDSF');
        $this->assertTrue($promocao->validate(['codigo']));

    }

    public function testSaveUpdateDelete()
    {
        //Test Save
        $promocao = new Promocao();

        //$promocao->idPromocao = 1;
        $promocao->nome_promo = 'Promoção';
        $promocao->codigo = 'GLHFG';
        $promocao->percentagem = 20;
        $promocao->data_limite = '2024-01-01';
        $promocao->save();

        $this->tester->seeRecord('common\models\Promocao', ['codigo' => 'GLHFG']);

        //Test Update
        $promocao = $this->tester->grabRecord('common\models\Promocao', ['codigo' => 'GLHFG']);
        $promocao->data_limite = '2023-03-03';
        $promocao->save();


        $this->tester->seeRecord('common\models\Promocao', ['codigo' => 'GLHFG', 'data_limite' => '2023-03-03']);
        $this->tester->dontseeRecord('common\models\Promocao', ['codigo' => 'GLHFG', 'data_limite' => '2024-01-01']);

        //Test Delete
        $promocao->delete();
        $this->tester->dontseeRecord('common\models\Promocao', ['codigo' => 'GLHFG']);

    }
}
