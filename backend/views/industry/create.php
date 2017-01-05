<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Industryinfo */

$this->title = '新建行业信息';
$this->params['breadcrumbs'][] = ['label' => 'Industryinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industryinfo-create">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
