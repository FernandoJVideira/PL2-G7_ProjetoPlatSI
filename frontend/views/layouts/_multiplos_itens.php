<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;


$mainCategories = Categoria::find()->andwhere(['ativo'=> 1])->andWhere(['id_categoria' => null])->all();

foreach ($mainCategories as $category) {
    if (count(Categoria::getSubCategorias($category->idCategoria)) > 0) { ?>
        <div class="nav-item dropdown dropright">
            <?= '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >' . $category->nome . '<i class="fa fa-angle-right float-right mt-1"></i></a>'; ?>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <?php
                foreach (Categoria::getSubCategorias($category->idCategoria) as $subcategory)
                    echo Html::tag('a', $subcategory->nome, ['class' => 'dropdown-item', 'href' => URL::to(['site/tipo', 'id' => $subcategory->idCategoria])]);
                ?>
            </div>
        </div>
    <?php }
    else
        echo '<a href="'. URL::to(['site/tipo', 'id' => $category->idCategoria]) .'" class="nav-link ">' . $category->nome . '</a>';
}
?>
