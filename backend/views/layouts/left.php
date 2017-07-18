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
                    ['label' => 'Сайт', 'icon' => 'glyphicon glyphicon-home', 'url' => '/'],
                    ['label' => 'Заказы', 'icon' => 'fa fa-shopping-cart', 'url' => '/admin/orders/'],
                    ['label' => 'Квартиры', 'icon' => 'fa fa-bed', 'url' => '/admin/apartment/'],
                    ['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => '/admin/user/'],
                    ['label' => 'Комментарии', 'icon' => 'fa fa-comments', 'url' => '/admin/comments/'],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '<span class="glyphicon glyphicon-cog"></span> Настройки',
                        'items' => [
                            ['label' => 'Смена пароля', 'url' => '/admin/user/change-password/']
                        ]
                    ]
//                    [
//                        'label' => '<span class="glyphicon glyphicon-warning-sign"></span> RBAC',
//                        'items' => [
//                            ['label' => 'Назначения', 'url' => ['/admin/assignment/']],
//                            ['label' => 'Роли', 'url' => ['/admin/role/'],],
//                            ['label' => 'Разрешения', 'url' => ['/admin/permission/'],],
//                            ['label' => 'Маршруты', 'url' => ['/admin/route/'],],
//                            ['label' => 'Правила', 'url' => ['/admin/rule/'],],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
