<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $createAdmin = $auth->createPermission('createAdmin');
        $createAdmin->description = 'Criar um Admin';
        $auth->add($createAdmin);

        $createStore = $auth->createPermission('createStore');
        $createStore->description = 'Criar uma Loja';
        $auth->add($createStore);

        $createGestor = $auth->createPermission('createGestor');
        $createGestor->description = 'Criar um Gestor';
        $auth->add($createGestor);

        $createFuncionario = $auth->createPermission('createFuncionario');
        $createFuncionario->description = 'Criar um funcionário';
        $auth->add($createFuncionario);

        $createCliente = $auth->createPermission('createCliente');
        $createCliente->description = 'Criar um cliente';
        $auth->add($createCliente);

        $createProduto = $auth->createPermission('createProduto');
        $createProduto->description = 'Criar um produto';
        $auth->add($createProduto);

        $createCategoria = $auth->createPermission('createCategoria');
        $createCategoria->description = 'Criar uma categoria';
        $auth->add($createCategoria);

        $createMarca = $auth->createPermission('createMarca');
        $createMarca->description = 'Criar uma marca';
        $auth->add($createMarca);

        $createEncomenda = $auth->createPermission('createEncomenda');
        $createEncomenda->description = 'Criar uma encomenda';
        $auth->add($createEncomenda);

        $createTipoPagamento = $auth->createPermission('createTipoPagamento');
        $createTipoPagamento->description = 'Criar um tipo de pagamento';
        $auth->add($createTipoPagamento);

        $createIva = $auth->createPermission('createIva');
        $createIva->description = 'Criar uma taxa IVA';
        $auth->add($createIva);

        $createReview = $auth->createPermission('createReview');
        $createReview->description = 'Criar uma review';
        $auth->add($createReview);

        $backend = $auth->createPermission('backend');
        $backend->description = 'Aceder ao backend';
        $auth->add($backend);

        $admin  = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backend);
        $auth->addChild($admin, $createAdmin);
        $auth->addChild($admin, $createStore);
        $auth->addChild($admin, $createGestor);
        $auth->addChild($admin, $createFuncionario);
        $auth->addChild($admin, $createCliente);
        $auth->addChild($admin, $createProduto);
        $auth->addChild($admin, $createCategoria);
        $auth->addChild($admin, $createMarca);
        $auth->addChild($admin, $createTipoPagamento);
        $auth->addChild($admin, $createIva);

        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $createFuncionario);
        $auth->addChild($gestor, $createCliente);
        $auth->addChild($gestor, $createProduto);
        $auth->addChild($gestor, $createCategoria);
        $auth->addChild($gestor, $createMarca);
        $auth->addChild($gestor, $createTipoPagamento);
        $auth->addChild($gestor, $createIva);

        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createCliente);


        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createEncomenda);
        $auth->addChild($cliente, $createReview);

    }
}