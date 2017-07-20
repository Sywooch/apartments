<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>

<div class="comments-form">
    <div class="row">
        <div class="col-md-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'apartment_id')->dropDownList(
                ArrayHelper::map(\common\models\Apartment::find()->orderBy('id DESC')->all(), 'id', 'title_ru'),
                ['prompt'=>'Выберите квартиру']);
            ?>

            <?= $form->field($model, 'user_id')->dropDownList(
                ArrayHelper::map(\common\models\User::find()->orderBy('id DESC')->all(), 'id', 'username'),
                ['prompt'=>'Выберите пользователя']);
            ?>

            <?= $form->field($model, 'city')->textInput(['placeholder' => 'Днепр']) ?>

            <?= $form->field($model, 'comment')->textArea(['rows' => 6]) ?>

            <?= $form->field($model, 'rating')->dropDownList([
                'prompt'=>'Выберите оценку',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]);
            ?>

            <?= $form->field($model, 'rating_price')->dropDownList([
                'prompt'=>'Выберите оценку',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]);
            ?>

            <?= $form->field($model, 'rating_clean')->dropDownList([
                'prompt'=>'Выберите оценку',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]);
            ?>

            <?= $form->field($model, 'rating_communication')->dropDownList([
                'prompt'=>'Выберите оценку',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]);
            ?>

            <?= $form->field($model, 'rating_place')->dropDownList([
                'prompt'=>'Выберите оценку',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]);
            ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
