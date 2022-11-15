<?php

use common\widgets\Alert;

$this->title = 'Backoffice - ' . Yii::$app->name;
//$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <?= Alert::widget() ?>

</div>