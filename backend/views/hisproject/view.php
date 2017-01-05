<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Companyinfo;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Hisprojectinfo */

//$this->title = $model->id;
$this->title = "项目历史信息详情";
$this->params['breadcrumbs'][] = ['label' => 'Hisprojectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hisprojectinfo-view">

    <!-- <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?//= Html::a('Delete', ['delete', 'id' => $model->id], [
            //'class' => 'btn btn-danger',
            //'data' => [
                //'confirm' => 'Are you sure you want to delete this item?',
                //'method' => 'post',
            //],
        //]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pName',
            'intro',
            'type',
            //'ofCmp',
            ['attribute' => 'ofCmp',  'value' => Companyinfo::findOne(['id'=>$model->ofCmp])?Companyinfo::findOne(['id'=>$model->ofCmp])->cName:'' ],//加上这段代码
            //'ofIndustry',
            ['attribute' => 'ofIndustry',  'value' => Industryinfo::findOne(['id'=>$model->ofIndustry])?Industryinfo::findOne(['id'=>$model->ofIndustry])->iName:'' ],//加上这段代码
            'creator',
            'createTime',
            'manager',
            //'checked',
            ['attribute' => 'checked',  'value' => Yii::$app->params['checkStatus'][$model->checked] ],
            'checkOpinion',
            'checkTime',
            //'status',
            ['attribute' => 'status',  'value' => Yii::$app->params['projectStatus'][$model->status] ],
            'background',
            'targetIncome',
            'beneficiary',
            'plan',
            'schedule',
            'structure',
            'expenseControl',
            'evaluation',
            'memo',
            'updateTime',
            'updateOperator',
        ],
    ]) ?>

</div>
