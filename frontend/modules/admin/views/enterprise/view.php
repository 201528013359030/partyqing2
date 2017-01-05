<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Enterprise */

$this->title = $model->eid;
$this->params['breadcrumbs'][] = ['label' => 'Enterprises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->eid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->eid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eid',
            'ename',
            'type',
            'ofIndustry',
            'intro',
            'phoneNumber',
            'faxNumber',
            'license',
            'logo',
            'memo',
            'isOpen',
            'uid',
            'vision',
            'officeAddress',
            'contacts',
            'postCode',
            'email:email',
            'webSite',
            'defaultTypes',
            'centrexNumber',
            'outPrefix',
            'offlinemsgpath',
        ],
    ]) ?>

</div>
