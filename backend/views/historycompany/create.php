<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Historycompanyinfo */

$this->title = 'Create Historycompanyinfo';
$this->params['breadcrumbs'][] = ['label' => 'Historycompanyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historycompanyinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
