<?php


namespace frontend\tests\Unit;

use common\models\Carrinho;
use common\models\Categoria;
use common\models\Iva;
use common\models\Linhacarrinho;
use common\models\Produto;
use frontend\tests\UnitTester;

class LinhaCarrinhoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    // tests
    public function testValidation()
    {
        //Create Iva entry on database
        $iva = new Iva();
        $iva->iva = 13;
        $iva->descricao = 'IVA';
        $iva->ativo = 1;
        $iva->save();

        //Create Categoria entry on database
        $categoria = new Categoria();
        $categoria->nome = 'Teste';
        $categoria->ativo = 1;
        $categoria->id_iva = $iva->idIva;
        $categoria->save();

        //Create Carrinho entry on database
        $carrinho = new Carrinho();

        $carrinho->estado = 'aberto';
        $carrinho->data_criacao = '2021-01-01 12:00:00';
        $carrinho->save();

        //Create Produto entry on database
        $produto = new Produto();
        $produto->nome = 'Teste';
        $produto->descricao = 'Teste';
        $produto->preco_unit = 10;
        $produto->dataCriacao = '2021-01-01 12:00:00';
        $produto->imagem = 'path_to_img';
        $produto->ativo = 1;
        $produto->id_categoria = $categoria->idCategoria;
        $produto->save();


        // LinhaCarriho
        $linha = new LinhaCarrinho();

        $linha->quantidade = 0;
        $this->assertFalse($linha->validate(['quantidade']));

        $linha->quantidade = 11;
        $this->assertFalse($linha->validate(['quantidade']));

        $linha->quantidade = null;
        $this->assertFalse($linha->validate(['quantidade']));

        $linha->quantidade = 'q';
        $this->assertFalse($linha->validate(['quantidade']));

        $linha->quantidade = 1;
        $this->assertTrue($linha->validate(['quantidade']));

        $linha->estado = 'q';
        $this->assertFalse($linha->validate(['estado']));

        $linha->estado = 3;
        $this->assertFalse($linha->validate(['estado']));

        $linha->estado = null;
        $this->assertFalse($linha->validate(['estado']));

        $linha->estado = 0;
        $this->assertTrue($linha->validate(['estado']));

        $linha->estado = 1;
        $this->assertTrue($linha->validate(['estado']));

        $linha->id_carrinho = null;
        $this->assertFalse($linha->validate(['id_carrinho']));

        $linha->id_carrinho = 'q';
        $this->assertFalse($linha->validate(['id_carrinho']));

        $linha->id_carrinho = 999;
        $this->assertFalse($linha->validate(['id_carrinho']));

        $linha->id_carrinho = $carrinho->idCarrinho;
        $this->assertTrue($linha->validate(['id_carrinho']));

        $linha->id_produto = null;
        $this->assertFalse($linha->validate(['id_produto']));

        $linha->id_produto = 'q';
        $this->assertFalse($linha->validate(['id_produto']));

        $linha->id_produto = 999;
        $this->assertFalse($linha->validate(['id_produto']));

        $linha->id_produto = $produto->idProduto;
        $this->assertTrue($linha->validate(['id_produto']));
    }


    public function testSaveUpdateDelete()
    {
        //Create Iva entry on database
        $iva = new Iva();
        $iva->iva = 22;
        $iva->descricao = 'IVA unit';
        $iva->ativo = 1;
        $iva->save();

        $iva = $this->tester->grabRecord('common\models\Iva', ['descricao' => 'IVA unit']);

        //Create Categoria entry on database
        $categoria = new Categoria();
        $categoria->nome = 'Teste unit';
        $categoria->ativo = 1;
        $categoria->id_iva = $iva->idIva;
        $categoria->save();

        $categoria = $this->tester->grabRecord('common\models\Categoria', ['nome' => 'Teste unit']);

        //Create Carrinho entry on database
        $carrinho = new Carrinho();
        $carrinho->estado = 'aberto';
        $carrinho->data_criacao = '2021-01-01 12:00:00';
        $carrinho->save();

        //Create Produto entry on database
        $produto = new Produto();
        $produto->nome = 'Teste unit';
        $produto->descricao = 'Teste unit';
        $produto->preco_unit = 10;
        $produto->dataCriacao = '2021-01-01 12:00:00';
        $produto->imagem = 'path_to_img';
        $produto->ativo = 1;
        $produto->id_categoria = $categoria->idCategoria;
        $produto->save();

        $carrinho = $this->tester->grabRecord('common\models\Carrinho', ['data_criacao' => '2021-01-01 12:00:00']);
        $produto = $this->tester->grabRecord('common\models\Produto', ['nome' => 'Teste unit']);

        //Test Save
        $linha = new LinhaCarrinho();
        $linha->quantidade = 3;
        $linha->estado = 0;
        $linha->id_carrinho = $carrinho->idCarrinho;
        $linha->id_produto = $produto->idProduto;
        $linha->save();

        $linha = $this->tester->grabRecord('common\models\Linhacarrinho', ['id_produto' => $produto->idProduto]);

        $this->tester->seeRecord('common\models\Linhacarrinho', ['idLinha' => $linha->idLinha]);

        //Test Update

        $linha = $this->tester->grabRecord('common\models\Linhacarrinho', ['idLinha' => $linha->idLinha]);
        $linha->quantidade = 7;
        $linha->save();

        $this->tester->seeRecord('common\models\Linhacarrinho', ['idLinha' => $linha->idLinha, 'quantidade' => 7]);
        $this->tester->dontseeRecord('common\models\Linhacarrinho', ['idLinha' => $linha->idLinha, 'quantidade' => 3]);

        //Test Delete
        $linha->delete();
        $this->tester->dontseeRecord('common\models\Linhacarrinho', ['idLinha' => $linha->idLinha]);
    }
}
