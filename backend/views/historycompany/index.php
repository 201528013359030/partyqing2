<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistorycompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historycompanyinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historycompanyinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Historycompanyinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cName',
            'intro',
            'position',
            'space',
            // 'products',
            // 'employees',
            // 'production',
            // 'investments',
            // 'taxes',
            // 'operateStatus',
            // 'ofIndustry',
            // 'creator',
            // 'createTime',
            // 'memo',
            // 'updateTime',
            // 'updateOperator',
            // 'checked',
            // 'checkOpinion',
            // 'checkTime',
            // 'assets',
            // 'debts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
