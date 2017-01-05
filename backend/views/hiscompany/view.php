<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Hiscompanyinfo */

//$this->title = $model->id;
$this->title = "企业历史信息详情";
$this->params['breadcrumbs'][] = ['label' => 'Hiscompanyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hiscompanyinfo-view">

    <!-- <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?//= Html::a('Delete', ['delete', 'id' => $model->id], [
            //'class' => 'btn btn-danger',
           // 'data' => [
                //'confirm' => 'Are you sure you want to delete this item?',
                //'method' => 'post',
            //],
        //]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cName',
            'intro',
            'position',
            'space',
            'products',
            'employees',
            'production',
            'investments',
            'taxes',
            'operateStatus',
            //'ofIndustry',
            ['attribute' => 'ofIndustry',  'value' => Industryinfo::findOne(['id'=>$model->ofIndustry])?Industryinfo::findOne(['id'=>$model->ofIndustry])->iName:'' ],//加上这段代码
            'creator',
            'createTime',            
            //'checked',
            ['attribute' => 'checked',  'value' => Yii::$app->params['checkStatus'][$model->checked] ],
            'checkOpinion',
            'checkTime',
            'assets',
            'debts',
            'memo',
            'updateTime',
            'updateOperator',
        ],
    ]) ?>

</div>
