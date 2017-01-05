<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industryinfo;
use common\models\Companyinfo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HisprojectinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目历史信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hisprojectinfo-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('Create Hisprojectinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pName',            
            'type',
            //'ofCmp',
            ['attribute' => 'ofCmp',
            'content' => function($dataProvider){
                $industry = Companyinfo::findOne(["id"=>$dataProvider['ofCmp']]);
                return $industry->cName;
            }],
            //'ofIndustry',
            ['attribute' => 'ofIndustry',
            'content' => function($dataProvider){
                $industry = Industryinfo::findOne(["id"=>$dataProvider['ofIndustry']]);
                return $industry->iName;
            }],
            'intro',
            // 'creator',
            // 'createTime',
            // 'manager',
            // 'checked',
            // 'checkOpinion',
            // 'checkTime',
            // 'status',
            // 'background',
            // 'targetIncome',
            // 'beneficiary',
            // 'plan',
            // 'schedule',
            // 'structure',
            // 'expenseControl',
            // 'evaluation',
            // 'memo',
             'updateTime',
             'updateOperator',

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
