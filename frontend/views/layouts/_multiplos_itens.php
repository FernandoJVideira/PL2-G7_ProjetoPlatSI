<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;


/** @var string $title */
/** @var array $items */

?>
<div class="nav-item dropdown dropright">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" ><?= $title ?><i class="fa fa-angle-right float-right mt-1"></i></a>
    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
        <?php
        foreach (Categoria::find()->where(['ativo'=> 1])->all() as $item) {
            echo Html::tag('a', $item->nome, ['class' => 'dropdown-item', 'href' => URL::toRoute(['site/tipo', 'id'=> $item->idCategoria])]);  
        }

        ?>
    </div>
</div>