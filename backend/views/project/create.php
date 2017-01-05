<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Projectinfo */

$this->title = '新建项目';
$this->params['breadcrumbs'][] = ['label' => 'Projectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectinfo-create">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
