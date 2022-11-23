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
        $createStore = $auth->createPermission('createLoja');
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

        /* Creating a permission called createMetodoPagamento and adding it to the authManager. */
        $createMetodoPagamento = $auth->createPermission('createMetodoPagamento');
        $createMetodoPagamento->description = 'Criar um tipo de pagamento';
        $auth->add($createMetodoPagamento);

        /* Creating a permission called createIva and adding it to the authManager. */
        $createIva = $auth->createPermission('createIva');
        $createIva->description = 'Criar uma taxa IVA';
        $auth->add($createIva);

        /* Creating a permission called createReview and adding it to the authManager. */
        $createReview = $auth->createPermission('createReview');
        $createReview->description = 'Criar uma review';
        $auth->add($createReview);

        //create a permission called createMorada and add it to the authManager
        $createMorada = $auth->createPermission('createMorada');
        $createMorada->description = 'Criar uma morada';
        $auth->add($createMorada);

        /* Creating a permission called favoritos and adding it to the authManager. */
        $favoritos = $auth->createPermission('favoritos');
        $favoritos->description = 'Adicionar/Remover um produto aos favoritos';
        $auth->add($favoritos);

        /* Creating a permission called backend and adding it to the authManager. */
        $backend = $auth->createPermission('backend');
        $backend->description = 'Aceder ao backend';
        $auth->add($backend);

        //Update permissions

        //create a permission called updateOwn and add it to the authManager
        $updateOwn = $auth->createPermission('updateOwn');
        $updateOwn->description = 'Atualizar os dados do próprio utilizador';
        $auth->add($updateOwn);

        //create a permition called updateProduto and adding it to the authManager
        $updateProduto = $auth->createPermission('updateProduto');
        $updateProduto->description = 'Atualizar um produto';
        $auth->add($updateProduto);

        //create a permition called updateStock and adding it to the authManager
        $updateStock = $auth->createPermission('updateStock');
        $updateStock->description = 'Atualizar o stock de um produto';
        $auth->add($updateStock);

        //create a permition called updateDadosEmpresa and adding it to the authManager 
        $updateDadosEmpresa = $auth->createPermission('updateDadosEmpresa'); 
        $updateDadosEmpresa->description = 'Atualizar os dados de uma empresa'; 
        $auth->add($updateDadosEmpresa); 
 

        //create a permition called updateMetodoPagamento and adding it to the authManager
        $updateMetodoPagamento = $auth->createPermission('updateMetodoPagamento');
        $updateMetodoPagamento->description = 'Atualizar um metodo de pagamento';
        $auth->add($updateMetodoPagamento);

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

        //create a permition called updateDadosEncomenda and adding it to the authManager
        $updateDadosEncomenda = $auth->createPermission('updateMoradaEncomenda');
        $updateDadosEncomenda->description = 'Atualizar a morada de uma encomenda';
        $auth->add($updateDadosEncomenda);

        //create a permition called updateCliente and adding it to the authManager
        $updateCliente = $auth->createPermission('updateCliente');
        $updateCliente->description = 'Atualizar os dados de um cliente';
        $auth->add($updateCliente);

        //create a permition called updateFuncionario and adding it to the authManager
        $updateFuncionario = $auth->createPermission('updateFuncionario');
        $updateFuncionario->description = 'Atualizar os dados de um funcionário';
        $auth->add($updateFuncionario);

        //create a permition called updateGestor and adding it to the authManager
        $updateGestor = $auth->createPermission('updateGestor');
        $updateGestor->description = 'Atualizar os dados de um gestor';
        $auth->add($updateGestor);

        //create a permition called updateAdmin and adding it to the authManager
        $updateAdmin = $auth->createPermission('updateAdmin');
        $updateAdmin->description = 'Atualizar os dados de um administrador';
        $auth->add($updateAdmin);

        //create a permition called updateLoja and adding it to the authManager
        $updateLoja = $auth->createPermission('updateLoja');
        $updateLoja->description = 'Atualizar os dados de uma loja';
        $auth->add($updateLoja);

        //create a permition called updateSeccao and adding it to the authManager
        $updateSeccao = $auth->createPermission('updateSeccao');
        $updateSeccao->description = 'Atualizar os dados de uma seccao';
        $auth->add($updateSeccao);

        //create a permition called updateEmpresa and adding it to the authManager
        $updateEmpresa = $auth->createPermission('updateEmpresa');
        $updateEmpresa->description = 'Atualizar os dados de uma empresa';
        $auth->add($updateEmpresa);

        //create a permition called updateMorada and adding it to the authManager
        $updateMorada = $auth->createPermission('updateMorada');
        $updateMorada->description = 'Atualizar os dados de uma morada';
        $auth->add($updateMorada);

        //View permissions

        //create a permission called viewCliente and add it to the authManager
        $viewCliente = $auth->createPermission('viewCliente');
        $viewCliente->description = 'Ver os dados de um cliente';
        $auth->add($viewCliente);

        //create a permition called viewGestor and adding it to the authManager
        $viewGestor = $auth->createPermission('viewGestor');
        $viewGestor->description = 'Ver a listagem de todos gestores';
        $auth->add($viewGestor);

        //create a permition called viewAdmins and adding it to the authManager
        $viewAdmins = $auth->createPermission('viewAdmin');
        $viewAdmins->description = 'Ver a listagem de todos administradores';
        $auth->add($viewAdmins);

        //create a permition called viewFuncionario and adding it to the authManager
        $viewFuncionario = $auth->createPermission('viewFuncionario');
        $viewFuncionario->description = 'Ver a listagem de todos funcionários';
        $auth->add($viewFuncionario);

        //create a permition called viewEmpresa and adding it to the authManager
        $viewEmpresa = $auth->createPermission('viewEmpresa');
        $viewEmpresa->description = 'Ver os dados da empresa';
        $auth->add($viewEmpresa);

        //create a permition called viewLoja and adding it to the authManager
        $viewLoja = $auth->createPermission('viewLoja');
        $viewLoja->description = 'Ver os dados da loja';
        $auth->add($viewLoja);

        //create a permition called viewEstatisticas and adding it to the authManager
        $viewEstatisticas = $auth->createPermission('viewEstatisticas');
        $viewEstatisticas->description = 'Ver as estatisticas da loja';
        $auth->add($viewEstatisticas);

        //create a permition called viewHistoricoDeEncomendas and adding it to the authManager
        $viewHistoricoDeEncomendas = $auth->createPermission('viewHistoricoDeEncomendas');
        $viewHistoricoDeEncomendas->description = 'Ver o historico de encomendas';
        $auth->add($viewHistoricoDeEncomendas);

        //create a permition called viewLoja and adding it to the authManager
        $viewLoja = $auth->createPermission('viewLoja');
        $viewLoja->description = 'Ver os dados da loja';
        $auth->add($viewLoja);

        //create a permition called viewEmpresa and adding it to the authManager
        $viewEmpresa = $auth->createPermission('viewEmpresa');
        $viewEmpresa->description = 'Ver os dados da empresa';
        $auth->add($viewEmpresa);

        //create a permition called viewCategorias and adding it to the authManager
        $viewCategorias = $auth->createPermission('viewCategorias');
        $viewCategorias->description = 'Ver a listagem de todas as categorias';
        $auth->add($viewCategorias);

        //create a permition called viewOwn and adding it to the authManager
        $viewOwn = $auth->createPermission('viewOwn');
        $viewOwn->description = 'Ver os dados do proprio utilizador';
        $auth->add($viewOwn);

        //Delete permissions

        //create a permition called deleteAdmin and adding it to the authManager
        $deleteAdmin = $auth->createPermission('deleteAdmin');
        $deleteAdmin->description = 'Desativar um administrador';
        $auth->add($deleteAdmin);

        //create a permition called deleteGestor and adding it to the authManager
        $deleteGestor = $auth->createPermission('deleteGestor');
        $deleteGestor->description = 'Desativar um gestor';
        $auth->add($deleteGestor);

        //create a permition called deleteFuncionario and adding it to the authManager
        $deleteFuncionario = $auth->createPermission('deleteFuncionario');
        $deleteFuncionario->description = 'Desativar um funcionário';
        $auth->add($deleteFuncionario);

        //create a permition called deleteCliente and adding it to the authManager
        $deleteCliente = $auth->createPermission('deleteCliente');
        $deleteCliente->description = 'Desativar um cliente';
        $auth->add($deleteCliente);

        //create a permition called deleteProduto and adding it to the authManager
        $deleteProduto = $auth->createPermission('deleteProduto');
        $deleteProduto->description = 'Desativar um produto';
        $auth->add($deleteProduto);

        //create a permition called deleteIva and adding it to the authManager
        $deleteIva = $auth->createPermission('deleteIva');
        $deleteIva->description = 'Desativar uma taxa IVA';
        $auth->add($deleteIva);

        //create a permition called deleteCategoria and adding it to the authManager
        $deleteCategoria = $auth->createPermission('deleteCategoria');
        $deleteCategoria->description = 'Desativar uma categoria';
        $auth->add($deleteCategoria);

        //create a permition called deleteMorada and adding it to the authManager
        $deleteMorada = $auth->createPermission('deleteMorada');
        $deleteMorada->description = 'Remover uma morada';
        $auth->add($deleteMorada);

        //create a permition called deleteLoja and adding it to the authManager
        $deleteLoja = $auth->createPermission('deleteLoja');
        $deleteLoja->description = 'Remover uma loja';
        $auth->add($deleteLoja);



        /* Creating the roles and assigning permissions to them. */

        /* Creating a role called admin and adding it to the authManager. */
        $admin  = $auth->createRole('Admin');
        $auth->add($admin);
        $auth->addChild($admin, $backend);
        $auth->addChild($admin, $createAdmin);
        $auth->addChild($admin, $createStore);
        $auth->addChild($admin, $createGestor);
        $auth->addChild($admin, $createFuncionario);
        $auth->addChild($admin, $createCliente);
        $auth->addChild($admin, $createProduto);
        $auth->addChild($admin, $createCategoria);
        $auth->addChild($admin, $createMetodoPagamento);
        $auth->addChild($admin, $createIva);
        $auth->addChild($admin, $createMorada);
        $auth->addChild($admin, $updateOwn);
        $auth->addChild($admin, $updateAdmin);
        $auth->addChild($admin, $updateLoja);
        $auth->addChild($admin, $updateGestor);
        $auth->addChild($admin, $updateFuncionario);
        $auth->addChild($admin, $updateCliente);
        $auth->addChild($admin, $updateProduto);
        $auth->addChild($admin, $updateCategoria);
        $auth->addChild($admin, $updateDadosEmpresa);
        $auth->addChild($admin, $updateIva);
        $auth->addChild($admin, $updateEmpresa);
        $auth->addChild($admin, $updateMorada);
        $auth->addChild($admin, $updateMetodoPagamento);
        $auth->addChild($admin, $updateDadosEmpresa); 
        $auth->addChild($admin, $viewOwn);
        $auth->addChild($admin, $viewGestor);
        $auth->addChild($admin, $viewAdmins);
        $auth->addChild($admin, $viewFuncionario);
        $auth->addChild($admin, $viewCliente);
        $auth->addChild($admin, $viewEstatisticas);
        $auth->addChild($admin, $viewHistoricoDeEncomendas);
        $auth->addChild($admin, $viewLoja);
        $auth->addChild($admin, $viewEmpresa);
        $auth->addChild($admin, $viewCategorias);
        $auth->addChild($admin, $deleteAdmin);
        $auth->addChild($admin, $deleteGestor);
        $auth->addChild($admin, $deleteFuncionario);
        $auth->addChild($admin, $deleteCliente);
        $auth->addChild($admin, $deleteProduto);
        $auth->addChild($admin, $deleteIva);
        $auth->addChild($admin, $deleteCategoria);
        $auth->addChild($admin, $deleteMorada);
        $auth->addChild($admin, $deleteLoja);

        /* Creating a role called gestor and adding it to the authManager. */
        $gestor = $auth->createRole('Gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $backend);
        $auth->addChild($gestor, $createFuncionario);
        $auth->addChild($gestor, $createCliente);
        $auth->addChild($gestor, $createProduto);
        $auth->addChild($gestor, $createCategoria);
        $auth->addChild($gestor, $createMetodoPagamento);
        $auth->addChild($gestor, $createIva);
        $auth->addChild($gestor, $createMorada);
        $auth->addChild($gestor, $updateMetodoPagamento);
        $auth->addChild($gestor, $updateLoja);
        $auth->addChild($gestor, $updateFuncionario);
        $auth->addChild($gestor, $updateCliente);
        $auth->addChild($gestor, $updateProduto);
        $auth->addChild($gestor, $updateCategoria);
        $auth->addChild($gestor, $updateMorada);
        $auth->addChild($gestor, $updateIva);
        $auth->addChild($gestor, $updateOwn);
        $auth->addChild($gestor, $viewOwn);
        $auth->addChild($gestor, $viewFuncionario);
        $auth->addChild($gestor, $viewCliente);
        $auth->addChild($gestor, $viewEstatisticas);
        $auth->addChild($gestor, $viewLoja);
        $auth->addChild($gestor, $viewHistoricoDeEncomendas);
        $auth->addChild($gestor, $viewLoja);
        $auth->addChild($gestor, $viewCategorias);
        $auth->addChild($gestor, $deleteFuncionario);
        $auth->addChild($gestor, $deleteCliente);
        $auth->addChild($gestor, $deleteProduto);
        $auth->addChild($gestor, $deleteIva);
        $auth->addChild($gestor, $deleteCategoria);
        $auth->addChild($gestor, $deleteMorada);

        /* Creating a role called funcionario and adding it to the authManager. */
        $funcionario = $auth->createRole('Funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $backend);
        $auth->addChild($funcionario, $viewCliente);
        $auth->addChild($funcionario, $viewOwn);
        $auth->addChild($funcionario, $createCliente);
        $auth->addChild($funcionario, $updateOwn);
        $auth->addChild($funcionario, $updateCliente);
        $auth->addChild($funcionario, $deleteCliente);
        $auth->addChild($funcionario, $deleteMorada);
        $auth->addChild($funcionario, $updateStock);



        /* Creating a role called cliente and adding it to the authManager. */
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createEncomenda);
        $auth->addChild($cliente, $createReview);
        $auth->addChild($cliente, $updateOwn);
        $auth->addChild($cliente, $viewOwn);
        $auth->addChild($cliente, $viewHistoricoDeEncomendas);
        $auth->addChild($cliente, $deleteMorada);
        $auth->addChild($cliente, $favoritos);

        // Assign role to user
        $auth->assign($admin, 1);
    }
}
