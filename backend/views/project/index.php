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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
