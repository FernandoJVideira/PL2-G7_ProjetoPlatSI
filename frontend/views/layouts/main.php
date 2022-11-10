<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        function bootstrap(){
            const teste = document.getElementsByTagName("link");
            if(teste.length > 5)
                teste[5].remove();
        }
        window.onload = bootstrap();
    </script>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
    <!-- Topbar Start -->
    <div class="container-fluid">
      <div
        class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex"
      >
        <div class="col-lg-4">
          <a href="<?= URL::to(['site/index']); ?>" class="text-decoration-none">
              <span class="h1 text-uppercase text-primary bg-dark px-2">Stuff</span>
              <span class="h1 text-lowercase text-dark bg-primary px-2 ml-n1">n'</span>
              <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Go</span>
          </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
          <form action="">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="Procurar produtos"
              />
              <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
        </div>
      </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categorias</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php $this->beginContent('@frontend/views/layouts/_multiplos_itens.php', ['title' => 'Dresses', 'items' => ["Mens Dresses", "Women's Dresses", "Baby's Dresses"]]) ?><?php $this->endContent();?>
                        <?= Html::a('Shirts',[''],['class' => ['nav-item nav-link']]) ?>
                        <?= Html::a('Jeans',[''],['class' => ['nav-item nav-link']]) ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="<?= URL::to(['site/index']) ?>" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Stuff</span>
                        <span class="h1 text-lowercase text-light bg-primary px-2 ml-n1">n'</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Go</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown d-lg-none">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Area Pessoal <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <?= Html::a('Favoritos',['site/favorites'],['class' => ['dropdown-item']]) ?>
                                    <?= Html::a('Carrinho',['site/cart'],['class' => ['dropdown-item']]) ?>
                                    <?php if(Yii::$app->user->isGuest){
                                        echo Html::a('Login', ['site/login'], ['class' => 'dropdown-item', 'style' => 'border-top: 1px solid #6c757d;']);
                                        echo Html::a('Registar', ['site/signup'], ['class' => 'dropdown-item']);
                                    }else
                                        echo Html::a('Logout', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item', 'style' => 'border-top: 1px solid #6c757d;']); ?>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary" style="padding-bottom: 2px;">Favoritos</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary" style="padding-bottom: 2px;">Carrinho</span>
                            </a>
                            <?php
                                if(Yii::$app->user->isGuest)
                                    echo Html::a(HTML::tag('i', '', ['class' => 'fa fa-user text-primary']) . HTML::tag('span', 'Login', ['class' => 'badge text-secondary', 'style' => 'padding-bottom: 2px;']), ['site/login'], ['class' => 'btn px-0 ml-3']);
                                else
                                    echo Html::a(HTML::tag('i', '', ['class' => 'fa fa-user text-primary']) . HTML::tag('span', 'Logout( ' . Yii::$app->user->identity->username.' )', ['class' => 'badge text-secondary', 'style' => 'padding-bottom: 2px;']), ['site/logout'], ['class' => 'btn px-0 ml-3', 'data-method' => 'post'])

                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Acessos Rápidos</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Produtos</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Lojas</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Aplicação</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Novidades</a>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Area Pessoal</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php if(Yii::$app->user->isGuest){
                                echo Html::a('<i class="fa fa-angle-right mr-2"></i>Login', ['site/login'], ['class' => 'text-secondary mb-2']);
                                echo Html::a('<i class="fa fa-angle-right mr-2"></i>Registar', ['site/signup'], ['class' => 'text-secondary mb-2']);
                            }else
                                echo Html::a('<i class="fa fa-angle-right mr-2"></i>Logout', ['site/logout'], ['data-method' => 'post', 'class' => 'text-secondary mb-2']); ?>

                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Carrinho de compras</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Favoritos</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Para receber as nossas novas promoções subscreve ao newsletter!</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Introduz aqui o teu Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Inscrever</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; All Rights Reserved. Designed by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
        </div>
    </div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php $this->endBody() ?>
<script>
    window.onclick = function(event) {
        if (!event.target.matches('.navbar-vertical')) {
            var dropdowns = document.getElementById("navbar-vertical");
                if (dropdowns.classList.contains('show')) {
                    dropdowns.classList.remove('show');
                }
            }
        }
</script>
</body>
</html>
<?php $this->endPage();
