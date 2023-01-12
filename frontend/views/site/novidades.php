<?php
// use yii\helpers\Html;
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = "Stuff n' Go";
  // $this->params['breadcrumbs'][] = ['label' =>'Produtos'];
?>
<div style="margin-bottom:100px;padding-top:50px" class="site-index">
    <h1 style="text-align:center"> Novidades </h1>
    <br>
    <div class="container">
        <h5 style="opacity:60%;
        text-align:center">Conheça as novidades, descubra o que temos de novo e o que pode fazer diferença no seu dia a dia aqui .</h5>
    </div>
    <br>
    <br>
    <div>
        <div class="container">
            <div class="row row-cols-3">
                <?php foreach ($model as $model) { ?>
                    <!-- Colocar link para Página de Detalhes-->
                    <a style="<?php //if (!($model->idProduto % 3) == 0) {
                                        //echo "border-right:1px #FFD333 groove;";
                                    //} ?>;padding:30px;margin-bottom:30px" href="<?= URL::toRoute(['site/detalhes', 'id'=>$model->idProduto]) ?>">
                    <div class="card" onmouseover="style='width: 18rem; box-shadow: -4px -3px 15px 10px rgba(0,0,0,0.06);'" onmouseout="style='width: 18rem;background-color:white;'" style="width: 18rem;background-color:white;">
                        <div style="margin-top:3vh;" class="col ">
                            <div style="height:30vh; width:16vw;">
                                <!-- object-fit:cover -->
                                <img style="height:20vh;width:200px;margin-left:25px" class="card-img-top"  src="<?= Yii::getAlias('@web') ?>/../../common/Images/<?= $model->imagem ?? $model->produtos->imagem ?>" alt="Imagem do produto">
                            </div>
                            <div class="card-title">
                                <b> <span style="color:black"><?= $model->nome ?></span> <span style="float:right; margin-right:20px; color:#FFD333">€<?= $model->preco_unit ?>/unit</span> </b>
                                <br>
                                <p style="color:black;opacity:70%"><?= $model->categoria->nome ?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>