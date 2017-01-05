<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EconomyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Economyinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="economyinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Economyinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cId',
            'ofyear',
            'assets',
            'ownersEquity',
            // 'revenue',
            // 'profit',
            // 'mainBusiness',
            // 'retainedProfits',
            // 'totalTax',
            // 'totalDebts',
            // 'employees',
            // 'status',
            // 'stockTransfer',
            // 'investment',
            // 'memo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
