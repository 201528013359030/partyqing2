<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShareholdersinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shareholdersinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shareholdersinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shareholdersinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cId',
            'ofyear',
            'sName',
            'sType',
            // 'investAmount',
            // 'proportion',
            // 'investTime',
            // 'memo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
