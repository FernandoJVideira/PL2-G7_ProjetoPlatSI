<?php

use common\widgets\Alert;

$this->title = 'Backoffice - ' . Yii::$app->name;
//$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <?= Alert::widget() ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $count_clientes,
                'text' => 'Clientes Registados',
                'icon' => 'fas fa-users',
                'linkText' => 'Ver clientes ',
                'linkUrl' => ['utilizador/index?role=Cliente'],
            ]) ?>
        </div>
    </div>
</div>