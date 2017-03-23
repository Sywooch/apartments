<?php

use yii\helpers\Html;


$this->title = 'Добавить квартиру';
$this->params['breadcrumbs'][] = ['label' => 'Квартиры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content"">
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
                'facilities' => $facilities,
            ]) ?>
        </div>
    </div>
</section>

