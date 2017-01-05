<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industryinfo;
use common\models\Companyinfo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Projectinfos';
$this->title = '项目信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectinfo-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{check-update}',
            'buttons' => [
                // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                'check-update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '审核'),
                        'aria-label' => Yii::t('yii', '审核'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url.'&subflag='.Yii::$app->request->get('subflag'), $options);
                },
                ]
            ],
        ],
    ]); ?>
</div>
