<?php
// use yii\helpers\Html;


use yii\widgets\ListView;
  



/** @var yii\web\View $this */

$this->title = "Stuff n' Go";
// $this->params['breadcrumbs'][] = ['label' =>'Produtos'];
?>
<div style="margin-bottom:50px;padding-top:50px"  class="site-index">

    <h1 style="text-align:center"><?php echo $model->categoria->nome ?? 'Produtos';?> </h1>
                                           
    <br>
    <div>
        <div class="container">
            <?php
                $columns = 3;
                $cl = 12 / $columns;?>
                <?php
                                   
                                   $widget = ListView::begin([
                                        'dataProvider' => $listDataProvider, //Tirar Foreach e apresentar só a listView ;
                                        'layout' => "{summary}\n{items}\n{pager}",  
                                        'itemOptions'  => ['class' => "col-sm-$cl"],
                                        'emptyText' => 'Não há produtos',
                                        'options'=> ['class' => 'grid-list-view' ],
                                        'beforeItem'   => function ($model, $key, $index, $widget) use ($columns) {
                                            if ( $index % $columns == 0 ) {
                                                return "<div class='row'>";
                                            }
                                        },
                                        'afterItem' => function ($model, $key, $index, $widget) use ($columns) { 
                                                        if ( $index > 0 && ($index % $columns == $columns -1 )) {                
                                                            return "</div>"; 
                                                   }               
                                        },
                                        'itemView' => '_items',
                                        'pager' =>  [
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
                    <?= $widget->renderItems(); ?>
                </div>
                
                <?= $widget->renderPager(); ?>


   
</div>