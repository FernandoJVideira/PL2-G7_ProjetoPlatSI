<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Stuff n' Go</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= \yii\helpers\Url::toRoute(['utilizador/view', 'idUser' => Yii::$app->user->identity->id]) ?>" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Gestão de Empresa',
                        'icon' => 'fas fa-building',
                        'url' => ['empresa/index'],
                        'visible' => Yii::$app->user->can('viewEmpresa'),
                    ],
                    [
                        'label' => 'Gestão de Lojas Geral',
                        'icon' => 'fas fa-store',
                        'items' => [
                            ['label' => 'Lojas', 'url' => ['loja/index'], 'iconStyle' => 'far', 'visible' => Yii::$app->user->can('createLoja')],
                            ['label' => 'Ivas', 'url' => ['iva/index'], 'iconStyle' => 'far', 'visible' => Yii::$app->user->can('createIva')],
                            ['label' => 'Categorias', 'url' => ['categoria/index'], 'iconStyle' => 'far', 'visible' => Yii::$app->user->can('createCategoria')],
                            ['label' => 'Produtos', 'url' => ['produto/index'], 'iconStyle' => 'far', 'visible' => Yii::$app->user->can('createProduto')],

                        ],
                        'visible' => isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Admin']),
                    ],
                    [
                        'label' => 'Gestão de Utilizadores',
                        'icon' => 'fa-solid fa-users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Admins', 'url' => ['utilizador/index?role=Admin'], 'iconStyle' => 'far', 'active' => Yii::$app->request->get('role') == 'Admin', 'visible' => Yii::$app->user->can('ViewAdmin')],
                            ['label' => 'Gestores', 'url' => ['utilizador/index?role=Gestor'], 'iconStyle' => 'far', 'active' => Yii::$app->request->get('role') == 'Gestor', 'visible' => Yii::$app->user->can('ViewGestor')],
                            ['label' => 'Funcionários', 'url' => ['utilizador/index?role=Funcionario'], 'iconStyle' => 'far', 'active' => Yii::$app->request->get('role') == 'Funcionario', 'visible' => Yii::$app->user->can('ViewFuncionario')],
                            ['label' => 'Clientes', 'url' => ['utilizador/index?role=Cliente'], 'iconStyle' => 'far', 'active' => Yii::$app->request->get('role') == 'Cliente'],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>