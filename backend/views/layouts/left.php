<aside class="main-sidebar">

    <section class="sidebar">
        >
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Администратор</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        >

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Сайт', 'icon' => 'fa fa-home', 'url' => '/frontend/web/'],
                    ['label' => 'Заказы', 'icon' => 'fa fa-shopping-cart', 'url' => '/backend/web/orders/'],
                    ['label' => 'Квартиры', 'icon' => 'fa fa-bed', 'url' => '/backend/web/apartment/'],
                    ['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => '/backend/web/user/'],
                    ['label' => 'Комментарии', 'icon' => 'fa fa-user', 'url' => '/backend/web/comments/'],
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '<span class="glyphicon glyphicon-warning-sign"></span> RBAC',
                        'items' => [
                            ['label' => 'Назначения', 'url' => ['/admin/assignment/']],
                            ['label' => 'Роли', 'url' => ['/admin/role/'],],
                            ['label' => 'Разрешения', 'url' => ['/admin/permission/'],],
                            ['label' => 'Маршруты', 'url' => ['/admin/route/'],],
                            ['label' => 'Правила', 'url' => ['/admin/rule/'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
