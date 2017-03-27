<?php
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;

echo $model->title_ru;

$user_id = 1;
if(!Yii::$app->user->isGuest) {
    $user_id = Yii::$app->user->identity->getId();
}
?>

<h3>Комментарии</h3>

<?php
    if(isset($comments)){
        foreach($comments as $comment){
            echo $comment->apartment->title_ru.'<br/>';
            echo $comment->user->username.'<br/>';
            echo $comment->comment.'<br/>';
        }
    }
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($new_comment, 'apartment_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <?= $form->field($new_comment, 'user_id')->hiddenInput(['value' => $user_id])->label(false) ?>

    <?= $form->field($new_comment, 'comment')->textArea() ?>

    <?php if(!Yii::$app->user->isGuest) { ?>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

