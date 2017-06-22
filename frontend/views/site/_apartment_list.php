<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>

<?php Pjax::begin(['id' => 'a_list']); ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'activePageCssClass' => 'page_active',
            'nextPageLabel' => 'Следующая',
            'prevPageLabel' => 'Предыдущая',
        ],
        'itemView' => '_apartment',
        'layout' => "<div id=\"test\" class=\"items\">{items}\n{pager}</div>",
        'options' => [
            'tag' => false,
        ],
        'itemOptions' => [
            'tag' => false
        ]
    ]);?>
<?php Pjax::end() ?>
