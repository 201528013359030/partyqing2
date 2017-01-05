<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Historyprojectinfo */

$this->title = 'Create Historyprojectinfo';
$this->params['breadcrumbs'][] = ['label' => 'Historyprojectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historyprojectinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
