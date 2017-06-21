<?php
use yii\widgets\ListView;
?>


<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'itemView' => '_apartment',
    'layout' => "{pager}\n{summary}\n<div id=\"test\" class=\"items\">{items}</div>\n{pager}",
    'options' => [
        'tag' => false
    ],
    'itemOptions' => [
        'tag' => false
    ]
]);?>

<!--<ul class="pagination">-->
<!--    <li><a href="#">Предыдущая</a></li>-->
<!--    <li class="page_active"><a href="#">1</a></li>-->
<!--    <li><a href="#">2</a></li>-->
<!--    <li>...</li>-->
<!--    <li><a href="#">7</a></li>-->
<!--    <li><a href="#">Следующая</a></li>-->
<!--</ul>-->
