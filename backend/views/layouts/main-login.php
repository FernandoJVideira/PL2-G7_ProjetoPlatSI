<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;

\hail812\adminlte3\assets\AdminLteAsset::register($this);
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>

</head>
<body class="hold-transition login-page">
<?php  $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE
    </div>
    <?= Alert::widget() ?>
    <!-- /.login-logo -->

    <?= $content ?>
</div>
<!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>