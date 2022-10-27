<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

/*In this file's context, when refering to users Delete means a change to the unactive status*/

class RbacController extends Controller
{
    public function actionInit()
    {
        /* Creating permissions. */
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        //Create permissions

        /* Creating a permission called createAdmin and adding it to the authManager. */
        $createAdmin = $auth->createPermission('createAdmin');
        $createAdmin->description = 'Criar um Admin';
        $auth->add($createAdmin);

        /* Creating a permission called createStore and adding it to the authManager. */
        $createStore = $auth->createPermission('createStore');
        $createStore->description = 'Criar uma Loja';
        $auth->add($createStore);

        /* Creating a permission called createGestor and adding it to the authManager. */
        $createGestor = $auth->createPermission('createGestor');
        $createGestor->description = 'Criar um Gestor';
        $auth->add($createGestor);

        /* Creating a permission called createFuncionario and adding it to the authManager. */
        $createFuncionario = $auth->createPermission('createFuncionario');
        $createFuncionario->description = 'Criar um funcionário';
        $auth->add($createFuncionario);

        /* Creating a permission called createCliente and adding it to the authManager. */
        $createCliente = $auth->createPermission('createCliente');
        $createCliente->description = 'Criar um cliente';
        $auth->add($createCliente);

        /* Creating a permission called createProduto and adding it to the authManager. */
        $createProduto = $auth->createPermission('createProduto');
        $createProduto->description = 'Criar um produto';
        $auth->add($createProduto);

        /* Creating a permission called createCategoria and adding it to the authManager. */
        $createCategoria = $auth->createPermission('createCategoria');
        $createCategoria->description = 'Criar uma categoria';
        $auth->add($createCategoria);

        /* Creating a permission called createEncomenda and adding it to the authManager. */
        $createEncomenda = $auth->createPermission('createEncomenda');
        $createEncomenda->description = 'Criar uma encomenda';
        $auth->add($createEncomenda);

        /* Creating a permission called createTipoPagamento and adding it to the authManager. */
        $createTipoPagamento = $auth->createPermission('createTipoPagamento');
        $createTipoPagamento->description = 'Criar um tipo de pagamento';
        $auth->add($createTipoPagamento);

        /* Creating a permission called createIva and adding it to the authManager. */
        $createIva = $auth->createPermission('createIva');
        $createIva->description = 'Criar uma taxa IVA';
        $auth->add($createIva);

        /* Creating a permission called createReview and adding it to the authManager. */
        $createReview = $auth->createPermission('createReview');
        $createReview->description = 'Criar uma review';
        $auth->add($createReview);

        /* Creating a permission called backend and adding it to the authManager. */
        $backend = $auth->createPermission('backend');
        $backend->description = 'Aceder ao backend';
        $auth->add($backend);

        //Update permissions

        //create a permition called updateCliente and adding it to the authManager
        $updateCliente = $auth->createPermission('updateCliente');
        $updateCliente->description = 'Atualizar um cliente';
        $auth->add($updateCliente);

        //create a permition called updateProduto and adding it to the authManager
        $updateProduto = $auth->createPermission('updateProduto');
        $updateProduto->description = 'Atualizar um produto';
        $auth->add($updateProduto);

        //create a permition called updateTiposDePagamento and adding it to the authManager
        $updateTiposDePagamento = $auth->createPermission('updateTiposDePagamento');
        $updateTiposDePagamento->description = 'Atualizar um tipo de pagamento';
        $auth->add($updateTiposDePagamento);

        //create a permition called updateIva and adding it to the authManager
        $updateIva = $auth->createPermission('updateIva');
        $updateIva->description = 'Atualizar uma taxa IVA';
        $auth->add($updateIva);

        //create a permition called updateCategoria and adding it to the authManager
        $updateCategoria = $auth->createPermission('updateCategoria');
        $updateCategoria->description = 'Atualizar uma categoria';
        $auth->add($updateCategoria);

        //create a permition called updateEncomenda and adding it to the authManager
        $updateStatusEncomenda = $auth->createPermission('updateStatusEncomenda');
        $updateStatusEncomenda->description = 'Atualizar o status de uma encomenda';
        $auth->add($updateStatusEncomenda);

        //create a permition called updateMoradaEncomenda and adding it to the authManager
        $updateMoradaEncomenda = $auth->createPermission('updateMoradaEncomenda');
        $updateMoradaEncomenda->description = 'Atualizar a morada de uma encomenda';
        $auth->add($updateMoradaEncomenda);

        //create a permition called updateDadosCliente and adding it to the authManager
        $updateDadosCliente = $auth->createPermission('updateDadosCliente');
        $updateDadosCliente->description = 'Atualizar os dados de um cliente';
        $auth->add($updateDadosCliente);

        //create a permition called updateDadosFuncionario and adding it to the authManager
        $updateDadosFuncionario = $auth->createPermission('updateDadosFuncionario');
        $updateDadosFuncionario->description = 'Atualizar os dados de um funcionário';
        $auth->add($updateDadosFuncionario);

        //create a permition called updateDadosGestor and adding it to the authManager
        $updateDadosGestor = $auth->createPermission('updateDadosGestor');
        $updateDadosGestor->description = 'Atualizar os dados de um gestor';
        $auth->add($updateDadosGestor);

        //create a permition called updateDadosAdmin and adding it to the authManager
        $updateDadosAdmin = $auth->createPermission('updateDadosAdmin');
        $updateDadosAdmin->description = 'Atualizar os dados de um administrador';
        $auth->add($updateDadosAdmin);

        //create a permition called updateDadosLoja and adding it to the authManager
        $updateDadosLoja = $auth->createPermission('updateDadosLoja');
        $updateDadosLoja->description = 'Atualizar os dados de uma loja';
        $auth->add($updateDadosLoja);

        //create a permition called updateDadosSeccao and adding it to the authManager
        $updateDadosSeccao = $auth->createPermission('updateDadosSeccao');
        $updateDadosSeccao->description = 'Atualizar os dados de uma seccao';
        $auth->add($updateDadosSeccao);

        //View permissions

        //create a permition called viewFuncionarios and adding it to the authManager
        $viewFuncionarios = $auth->createPermission('viewFuncionarios');
        $viewFuncionarios->description = 'Ver a listagem de todos funcionários';
        $auth->add($viewFuncionarios);

        /* Creating the roles and assigning permissions to them. */

        /* Creating a role called admin and adding it to the authManager. */
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
        $auth->addChild($admin, $createTipoPagamento);
        $auth->addChild($admin, $createIva);


        /* Creating a role called gestor and adding it to the authManager. */
        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $createFuncionario);
        $auth->addChild($gestor, $createCliente);
        $auth->addChild($gestor, $createProduto);
        $auth->addChild($gestor, $createCategoria);
        $auth->addChild($gestor, $createTipoPagamento);
        $auth->addChild($gestor, $createIva);

        /* Creating a role called funcionario and adding it to the authManager. */
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createCliente);


        /* Creating a role called cliente and adding it to the authManager. */
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createEncomenda);
        $auth->addChild($cliente, $createReview);
    }
}
