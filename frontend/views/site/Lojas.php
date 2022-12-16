<?php


/** @var yii\web\View $this */

$this->title = "Stuff n' Go";
?>
<div class="container" style="padding-right:450px;padding-left:450px">
    <h1 style="text-align:center;padding-top:60px;border-bottom:black 1px solid
    ">Lojas</h1>
    
</div>  
<h6 style="opacity:60%;
        padding-top:25px;
        text-align:center">Conheça as Lojas Stuff'N Go espalhadas por Portugal Continental !</h6>

<div style="padding-top:50px;padding-bottom:50px;padding-right:825px" class="container">
    
  <?php foreach($model as $model){?>
    
    <div style="color:black;
              padding-top:25px;">

        <i style="font-size:larger 
                ">
           <?= $model->descricao?>
        </i>

            <!-- Talvez colocar nome das lojas numa lista com scrollbar e depois (com JS)ao lado, ao clicar dá load ás imformações da mesma ! -->
            
        <p style="font-size:medium;
            text-align:justify;"> <?= $model->morada->rua.' , '.$model->morada->cod_postal. ' , '.$model->morada->cidade.' , '.$model->morada->pais?></p>

        <p> <span> Email:</span> <span style="font-size:medium;
            text-align:justify;
            opacity:70%"><?= $model->email ?></span></p>

       

        <b style="font-size:medium;
            text-align:justify;
            padding-top:25px;
            opacity:80% "><?= $model->telefone ?></b>

     <hr>   
    

    </div>
    
    <?php }?>
</div>