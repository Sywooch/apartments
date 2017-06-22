<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>

<?php Pjax::begin(['id' => 'new_country']); ?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'itemView' => '_apartment',
    'layout' => "<div id=\"test\" class=\"items\">{items}\n{pager}</div>",
    'options' => [
        'tag' => false,
    ],
    'itemOptions' => [
        'tag' => false
    ]
]);?>
<?php Pjax::end(); ?>
<!--<ul class="pagination">-->
<!--    <li><a href="#">Предыдущая</a></li>-->
<!--    <li class="page_active"><a href="#">1</a></li>-->
<!--    <li><a href="#">2</a></li>-->
<!--    <li>...</li>-->
<!--    <li><a href="#">7</a></li>-->
<!--    <li><a href="#">Следующая</a></li>-->
<!--</ul>-->
