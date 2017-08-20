<?php
use yii\widgets\ListView;
?>

<div class="container">
     <div class="row">
          <?=
               ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_list',
              'summary'=>'',
          ]);
          ?>
     </div>
</div>
