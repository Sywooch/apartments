<?php

use yii\helpers\Html;


$this->title = 'Добавить комментарий';
$this->params['breadcrumbs'][] = ['label' => 'Коментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
