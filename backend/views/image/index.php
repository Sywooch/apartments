<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Фото квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if ($searchModel->apartment_id) : ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($uploadForm, 'files[]')->fileInput(['multiple' => true])->label('Фотографии') ?>

        <button class="btn btn-primary">Загрузить</button>
        <?php ActiveForm::end() ?>
    <?php endif ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'header' => 'Фото',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    return Html::img($result = 'http://'.substr(strstr($model->image, 'domains\\'), 8, strlen($model->image)),
                        ['width' => '100px', 'height' => '100px']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'contentOptions'=>['style'=>'width: 2%;'],
            ],
        ],
    ]); ?>

</div>