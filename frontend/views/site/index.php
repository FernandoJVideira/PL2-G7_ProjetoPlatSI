<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = "Stuff n' Go";

?>
<div style="display: flex;flex-direction:row;text-align:center;height:350px;margin-bottom:16vh"class="slider">     

           

            <button style="height:350px;margin-top:20vh;" onmouseover="style='transform: scale(1.10);height:350px;margin-top:20vh;'" onmouseout="style='transform: scale(1.00);height:350px;margin-top:20vh;'" class="carousel-control-prev btn" type="button" onclick="prev();"><i style="color:burlywood"class="fa fa-angle-left fa-5x"></i></button>
			<a href="<?= URL::toRoute('site/produtos') ?>">
            <figure class="img-box">
                    <figcaption style="position:absolute;padding-top:45vh;padding-left:42%;color:aliceblue;"class="figcaption">Descubra os produto deste Natal.</figcaption>
                    <img style="width:100%;object-position:var(--focal-point-x) var(--focal-point-y);height:50vh;object-fit:cover;"src="../../Imgs/banner1.png" alt="Image is Failling to Load" class="slider-img  responsive-image image-resize">

                    <!-- ------------------------------------------------------------------------------------------------ -->
                    <!-- ------------------------------------------------------------------------------------------------ -->
                    <!-- ------------------------------------------------------------------------------------------------ -->

                    <!-- Talvez coloque um botao para levar para onde quero ! " Onclick=(Função) "-> Falar com o Ferreira -->
                                <!-- Se funcionar, tirar anchor e colocar como os botões em cima -->
                                                <!-- Capaz de não funcionar  -->
                    <!-- ------------------------------------------------------------------------------------------------ -->
                    <!-- ------------------------------------------------------------------------------------------------ -->
                    <!-- ------------------------------------------------------------------------------------------------ -->


            </figure>

            </a>
            <button  class="carousel-control-next btn" style="height:355px;margin-top:20vh;margin-right:20px"  onmouseover="style='transform: scale(1.10);height:355px;margin-top:20vh;margin-right:20px'" onmouseout="style='transform: scale(1.00);height:355px;margin-top:20vh;margin-right:20px'" type="button" onclick="next()" ><i style="color:burlywood"class="fa fa-angle-right fa-5x"></i></button>
</div>

<!-- A class container coloca os elementos em um bloco invisivel, não deixando ocupar a largura toda !!! -->

<div class="site-index">
<div class="container"> 

    <div class="p-5  bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">

            <h1 class="display-5">With Stuff'n Go,you buy and you ready to Go !</h1>
            
        </div>
    </div>

    <div class="body-content">
    <div class="container">
    <div class="row row-cols-3">
    <?php foreach ($model as $model) { ?>

<!-- Colocar link para Página de Detalhes-->
<a style="<?php //if (!($model->idProduto % 3) == 0) {
                    //echo "border-right:1px #FFD333 groove;";
                //} ?>;padding:30px;margin-bottom:30px"
                href="<?= URL::toRoute(['site/detalhes', 'id'=>$model->idProduto]) ?>">

<div class="card" onmouseover="style='width: 18rem; box-shadow: -4px -3px 15px 10px rgba(0,0,0,0.06);'" onmouseout="style='width: 18rem;background-color:white;'" style="width: 18rem;background-color:white;">
    <div style="margin-top:3vh;" class="col ">
        
        <div style="height:30vh; width:16vw;">
                                            <!-- object-fit:cover -->
            <img style="height:20vh;width:200px;margin-left:25px" class="card-img-top"  src="../../Imgs/StickMan_Running.png" alt="<?= $model->imagem ?>">
        </div>
        <div class="card-title">
            <b> <span style="color:black"><?= $model->nome ?></span> <span style="float:right; margin-right:20px; color:#FFD333">€<?= $model->preco_unit ?>/unit</span> </b>
            <br>
            <p style="color:black;opacity:70%"><?= $model->categoria->nome ?></p>

        </div>

    </div>
</div>
</a>
<!-- <?php /* if ($model->idProduto % 3 == 0) {
    echo "<div style='border-top:1px #FFD333 groove'></div>";
    echo "<div style='border-top:1px #FFD333 groove'></div>";
    echo "<div style='border-top:1px #FFD333 groove'></div>";
    echo "<br>";
} */
?> -->
<?php } ?>
        </div>
        <div>
        <a  href="<?= URL::toRoute(['site/aplicacao'])?>">
        <figure onmouseover="style=' box-shadow: -4px -3px 15px 10px rgba(0,0,0,0.06);'" onmouseout="style='box-shadow:none;'" class="img-box">
                    <figcaption style="position:absolute;padding-top:15vh;padding-left:20%;color:aliceblue;font-size:xxx-large"class="figcaption"><b><i style="color:black;opacity:60%"> Descubra a nossa App <br>e as suas vantagens</i></b></figcaption>
                    <img style="width:100%;object-position:var(--focal-point-x) var(--focal-point-y);height:50vh;object-fit:cover;"src="../../Imgs/App_Png.png" alt="Image is Failling to Load" class="slider-img  responsive-image image-resize">
            </figure>
            </a>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                    
            
           
                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                            <!-- btn-outline-secundary -> Esconde a Achor -->
                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>    

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
            
        </div>

    </div>
</div>
</div>







