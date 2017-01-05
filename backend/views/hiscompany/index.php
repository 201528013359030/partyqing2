<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HiscompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '企业历史信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hiscompanyinfo-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('Create Hiscompanyinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cName',
            //'ofIndustry',
            ['attribute' => 'ofIndustry',
            'content' => function($dataProvider){
                $industry = Industryinfo::findOne(["id"=>$dataProvider['ofIndustry']]);
                return $industry->iName;
            }],
            'products',
            //'intro',
            'position',
            //'space',
            // 'employees',
            // 'production',
            // 'investments',
            // 'taxes',
            // 'operateStatus',
            // 'creator',
            // 'createTime',
            // 'memo',
             'updateTime',
             'updateOperator',
            // 'checked',
            // 'checkOpinion',
            // 'checkTime',
            // 'assets',
            // 'debts',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '详细信息'),
                        'aria-label' => Yii::t('yii', '详细信息'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url.'&subflag='.Yii::$app->request->get('subflag'), $options);
                },
                ]
                ],
        ],
    ]); ?>
</div>
