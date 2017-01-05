<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegioninfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '区域信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regioninfo-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?//= Html::a('Create Regioninfo', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'aName',
            'aID',
            'personNum',
            'familyNum',
            // 'memo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
