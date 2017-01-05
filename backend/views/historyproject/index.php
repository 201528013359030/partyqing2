<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistoryprojectinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historyprojectinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historyprojectinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Historyprojectinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pName',
            'intro',
            'type',
            'ofCmp',
            // 'ofIndustry',
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
            // 'updateTime',
            // 'updateOperator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
