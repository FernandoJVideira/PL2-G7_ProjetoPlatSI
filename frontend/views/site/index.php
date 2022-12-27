<?php

/** @var yii\web\View $this */

/** @var $models */

use yii\helpers\Url;

$this->title = "Stuff n' Go";

?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= Yii::getAlias('@web') ?>../../Imgs/banner1.png" class="d-block w-100" alt="..." height="400px">
        </div>
        <div class="carousel-item">
            <img src="<?= Yii::getAlias('@web') ?>../../Imgs/banner2.png" class="d-block w-100" alt="..." height="400px">
        </div>
        <div class="carousel-item">
            <img src="<?= Yii::getAlias('@web') ?>../../Imgs/banner3.png" class="d-block w-100" alt="..." height="400px">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="site-index">
    <div class="container">
        <div class="p-5  bg-transparent rounded-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-5">With Stuff'n Go, you buy and you ready to Go!</h1>
            </div>
        </div>
        <div class="body-content">
            <div class="container mx-auto">
                <div class="d-flex justify-content-around">
                    <?php if(count($models) >= 3)
                            foreach ($models as $model) { ?>
                            <?php $this->beginContent('@frontend/views/site/_items.php', ['model' => $model]);
                            $this->endContent(); ?>
                    <?php } ?>
                </div>
                <div>
                    <br>
                    <a href="<?= URL::toRoute(['site/aplicacao']) ?>">
                        <figure onmouseover="style=' box-shadow: -4px -3px 15px 10px rgba(0,0,0,0.06);'"
                                onmouseout="style='box-shadow:none;'" class="img-box">
                            <figcaption
                                    style="position:absolute;padding-top:15vh;padding-left:20%;color:aliceblue;font-size:xxx-large"
                                    class="figcaption"><b><i style="color:black;opacity:60%"> Descubra a nossa App <br>e
                                        as suas vantagens</i></b></figcaption>
                            <img style="width:100%;object-position:var(--focal-point-x) var(--focal-point-y);height:50vh;object-fit:cover;"
                                 src="<?= Yii::getAlias('@web') ?>../../Imgs/App_Png.png" alt="Image is Failling to Load"
                                 class="slider-img  responsive-image image-resize">
                        </figure>
                    </a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>







