<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use common\models\Companyinfo;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Projectinfo */

$this->title = '审核项目信息';
$this->params['breadcrumbs'][] = ['label' => 'Projectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projectinfo-update">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

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
            //'checkOpinion',
            //'checkTime',
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
        ],
    ]) ?>
    <div class="projectinfo-form">
    
        <?php $form = ActiveForm::begin(); ?>
    
        <?= $form->field($model, 'checked')->dropDownList(Yii::$app->params["checkStatus"]) ?>
    
        <?= $form->field($model, 'checkOpinion')->textarea()?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>
    
    </div>
</div>
