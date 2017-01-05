<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => '基础信息管理', 
                        'icon' => 'fa fa-file-code-o', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            [
                                'label' => 'Level Two',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => '企业（项目）信息添加',
                        'icon' => 'fa fa-file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '企业信息添加', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/enterprise/index']],
                            ['label' => '项目信息添加', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                        ],
                    ],
                    ['label' => '信息审核', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    [
                        'label' => '企业（项目）数据维护',
                        'icon' => 'fa fa-file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '企业数据维护', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '项目数据维护', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                        ],
                    ],
                    ['label' => '数据变更备案', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    [
                        'label' => '经济数据统计',
                        'icon' => 'fa fa-file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '产业经济数据', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '居民消费水平', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '固定资产投资', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '工商企业', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '社会零售', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => '社会消费品', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                        ],
                    ],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],                   
                ],
            ]
        ) ?>

    </section>

</aside>
