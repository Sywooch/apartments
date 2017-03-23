<?php

use yii\helpers\Html;


$this->title = 'Обновить квартиру: ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Квартиры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_ru, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
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
