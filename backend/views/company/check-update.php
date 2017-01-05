<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Companyinfo */

//$this->title = 'Update Companyinfo: ' . $model->id;
$this->title = '审核企业信息';
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companyinfo-update">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
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
            //'checkOpinion',
            //'checkTime',
            'assets',
            'debts',
            'memo',
        ],
    ]) ?>
    <div class="companyinfo-form">
    
    <?php $form = ActiveForm::begin(); ?>    
    
    <?= $form->field($model, 'checked')->dropDownList(Yii::$app->params["checkStatus"]) ?>

    <?= $form->field($model, 'checkOpinion')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
