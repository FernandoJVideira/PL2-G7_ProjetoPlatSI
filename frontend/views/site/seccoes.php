<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = "Stuff n' Go";
?>
<div class="container" style="padding-right:450px;padding-left:450px">
    <h1 style="text-align:center;padding-top:60px;border-bottom:black 1px solid
    "><?= $loja->descricao ?></h1>
</div>
<h6 style="opacity:60%;
        padding-top:10px;
        text-align:center">Número atual do tira senhas de cada seccão da <?= $loja->descricao ?></h6>
<div style="margin-bottom:100px;padding-top:50px" class="site-index">
    <div class="container">
        <div class="row row-cols-3">
            <?php foreach ($model as $model) { ?>

                <div style="padding:30px">
                    <h4 style="opacity:70%"><b> <span style="color:black;"><?= $model->seccaoIdSeccao->nome  ?> :</span> </b></h4>
                    <div class="card" style="width: 18rem;background-color:white;">
                        <div style="margin-top:3vh;" class="col ">
                            <div style="height:30vh; width:16vw;">
                                <!-- object-fit:cover -->
                                <h1 style="padding-top:50px;text-align:center"><?= $model->numeroAtual ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>