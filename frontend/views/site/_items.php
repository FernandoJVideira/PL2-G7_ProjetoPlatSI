<?php

use yii\helpers\Url;


?>
<div  style="padding:30px;padding-right:3vw;  margin-bottom:30px;">
    <a  href="<?= URL::toRoute(['site/detalhes', 'id' => $model->idProduto ?? $model->produtos]) ?>">

        <div class="card" onmouseover="style='width: 18rem;box-shadow: -4px -3px 15px 10px rgba(0,0,0,0.06);margin-right:100px'" onmouseout="style='width: 18rem;background-color:white;margin-right:100px'" style="width: 18rem;background-color:white;margin-right:100px">

            <div class="col " style="margin-top:3vh;">

                <div style="height:30vh; width:16vw;">
                    <img style="height:20vh;width:200px;margin-left:25px"  src="../../Imgs/StickMan_Running.png" class="card-img-top" alt="<?= $model->imagem ?? $model->produtos->imagem ?>">
                </div>
                <div class="card-title">
                    <b> <span style="color:black"><?= $model->nome ?? $model->produtos->nome ?></span> <span style="float:right;color:#FFD333">€<?= $model->preco_unit ?? $model->produtos->preco_unit ?>/unit</span> </b>
                    <br>
                    <p style="color:black;opacity:70%"><?= $model->categoria->nome ?? $model->nome  ?></p>
                    <div>

                        <!-- div para -->

                        <!-- Colocar Botão para adicionar ao Carrinho -->

                        <!-- Colocar Botão para adicionar aos Favoritos -->

                    </div>


                </div>

            </div>
        </div>

    </a>

    
</div>
<?php 
              
                 
    
