<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EnterpriseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enterprises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enterprise', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eid',
            'ename',
            'type',
            'ofIndustry',
            'intro',
            // 'phoneNumber',
            // 'faxNumber',
            // 'license',
            // 'logo',
            // 'memo',
            // 'isOpen',
            // 'uid',
            // 'vision',
            // 'officeAddress',
            // 'contacts',
            // 'postCode',
            // 'email:email',
            // 'webSite',
            // 'defaultTypes',
            // 'centrexNumber',
            // 'outPrefix',
            // 'offlinemsgpath',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
