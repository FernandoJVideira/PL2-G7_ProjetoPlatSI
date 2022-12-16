<?php

/** @var yii\web\View $this */

$this->title = "Stuff n' Go";

?>
<div style="margin-top:50px;margin-bottom:50px;padding-top:100px;padding-bottom:100px;display:flex;background-color:white;" class="container">
    <div style="text-align:start">
        <img style="height:38vh;
                    width:22vw;
                    color:black ;
                    padding-left:25px;
                    
                    " src="../../Imgs/StickMan_Running.png" class="image-responsive" alt="<?= $model->imagem ?>">
    </div>
    <div style="color:black;
              padding-left:50px;
              padding-top:25px;">

        <h1 style="font-size:xxx-large; ">

            <span ><b><?= ucfirst($model->nome) ?></b></span>
            <br>
            <span >
                <p style="font-size:medium;
                                    text-align:justify;
                                    opacity:60%"> <?= ucfirst($model->categoria->nome) ?></p>
            </span>
            
        </h1>


        <br>

        <p style="font-size:larger;
            text-align:justify;">Descricao:</p>

        <p style="font-size:medium;
            text-align:justify;
            opacity:60%"> <?= ucfirst($model->descricao) ?>.</p>

       

        <p style="font-size:larger;
            text-align:justify;
            padding-top:6vh;
            padding-bottom:3vh"><b>€<?= $model->preco_unit ?>/un</b></p>


        <!-- Colocar Botão para adicionar aos Favoritos -->


    </div>
    <div style="text-align:end">
        <button style="
        border:1px #FFD333 groove;
        margin-top:33vh;
        margin-left:50px" class="btn btn-dark">Adicionar ao Carrinho</button>
        
    </div>
</div>