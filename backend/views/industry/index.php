<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IndustryinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '行业信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industryinfo-index">

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
            'iName',            
            //'type',
            ['attribute' => 'type',
            'content' => function($dataProvider){
                return Yii::$app->params['industrytype'][$dataProvider['type']];
            }],
            'intro',
            //'memo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
