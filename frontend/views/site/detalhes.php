<?php

/** @var yii\web\View $this */
/** @var  $model */

$this->title = "Stuff n' Go";

?>
<style>
    .tooltip1 {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .tooltip1 .tooltiptext1 {
        visibility: hidden;
        width:max-content;
        background-color: black;
        color: #fff;
        text-align: left;
        border-radius: 6px;
        padding: 5px;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
    }

    .tooltip1:hover .tooltiptext1 {
        visibility: visible;
    }
</style>
<div style="margin-top:50px;margin-bottom:50px;padding-top:100px;display:flex;background-color:white;" class="container">
    <div style="text-align:start">
        <img style="height: 300px;
                    width: 300px;
                    color:black ;
                    padding-left:25px;"
             src="../../../common/Images/<?= $model->imagem ?>" class="image-responsive" alt="Image is Failling to Load">
    </div>
    <div style="color:black;
              padding-left:50px;
              padding-top:25px;">
        <h1 style="font-size:xxx-large; ">
            <span><b><?= ucfirst($model->nome) ?></b></span>
            <br>
            <span >
                <p style="font-size:medium;
                                    text-align:justify;
                                    opacity:60%"> <?= ucfirst($model->categoria->nome) ?></p>
                <p style="font-size:medium;
                                    text-align:justify;
                                    opacity:60%"> <b>Referencia : </b><?= $model->referencia?></p>
            </span>
        </h1>
        <br>
        <p style="font-size:larger;
            text-align:justify;">Descricao:</p>
        <p style="font-size:medium;
            text-align:justify;
            opacity:60%"> <?= ucfirst($model->descricao) ?></p>
        <div class="tooltip1" >Disponibilidade:
            <span class="tooltiptext1">
            <?php foreach ($model->getAllStocks() as $ar => $va){ ?>
                <?= $ar . ": " . $va  ?><br>
            <?php } ?>
                </span>
        </div>
        <p style="font-size:larger;
            text-align:justify;
            padding-top:6vh;
            padding-bottom:3vh"><b>€<?= $model->preco_unit ?>/un</b></p>
    </div>
    <div class="mt-auto p-2">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="<?= \yii\helpers\Url::toRoute('linhacarrinho/create') ?>?idProduto=<?= $model->idProduto ?>" ><button name="btCarrinho" type="button" class="btn btn-primary">Carrinho</button></a>
            <button onclick="location.href='<?= \yii\helpers\Url::toRoute('favorito/create') ?>?idProduto=<?= $model->idProduto ?>'" type="button" class="btn btn-dark"><i class="<?= ($model->getFavoritos(Yii::$app->user->id)->one() != null) ? 'fas' : 'far'?> fa-heart"></i></button>

        </div>
    </div>
</div>