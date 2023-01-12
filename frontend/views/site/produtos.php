<?php
// use yii\helpers\Html;


use yii\widgets\ListView;


/** @var yii\web\View $this */
/** @var  $listDataProvider */

$this->title = "Stuff n' Go";
// $this->params['breadcrumbs'][] = ['label' =>'Produtos'];
?>
<div style="margin-bottom:50px;padding-top:50px" class="site-index">
    <h1 style="text-align:center"><?php echo $model->categoria->nome ?? 'Produtos'; ?> </h1>
    <br>
    <div>
        <div class="container">
            <?php if($listDataProvider->count == 0){ ?>
                <h3 style="text-align:center">Não existem produtos nesta categoria</h3>
            <?php
            }
            $columns = 3;
            $cl = 12 / $columns;
            //dd($listDataProvider);
            $widget = ListView::begin([
                'dataProvider' => $listDataProvider,
                'layout' => "{summary}\n{items}\n{pager}",
                'itemOptions' => ['class' => "col-sm-$cl"],
                'emptyText' => 'Nenhum produto encontrado',
                'options' => ['class' => 'grid-list-view'],

                'itemView' => '_items',
                'pager' => [
                    'maxButtonCount' => 3,
                    'options' => [
                        'tag' => 'ul',
                        'class' => 'pagination justify-content-center',
                        'id' => 'pager-container',
                    ],
                    'disabledPageCssClass' => 'disabled',
                    'activePageCssClass' => 'page-item active',
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledListItemSubTagOptions' => ['class' => 'page-link'],
                    'prevPageCssClass' => 'page-item',
                    'nextPageCssClass' => 'page-item',
                    'firstPageCssClass' => 'page-item',
                    'lastPageCssClass' => 'page-item',
                ],
            ]);
            ?>
            <div>
                <div class='row'>
                    <?= $widget->renderItems(); ?>
                </div>
            </div>
            <?= $widget->renderPager(); ?>
        </div>
    </div>
</div>