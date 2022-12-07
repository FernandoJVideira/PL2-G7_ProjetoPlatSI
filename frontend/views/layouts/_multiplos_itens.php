<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var string $title */
/** @var array $items */

?>
<div class="nav-item dropdown dropright">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $title ?><i class="fa fa-angle-right float-right mt-1"></i></a>
    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
        <?php
        foreach ($items as $item) {
            echo Html::tag('a', $item, ['class' => 'dropdown-item', 'href' => URL::to(['site/login'])]);
        }

        ?>
    </div>
</div>