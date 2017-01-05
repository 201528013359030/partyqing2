<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hiscompanyinfo */

$this->title = 'Create Hiscompanyinfo';
$this->params['breadcrumbs'][] = ['label' => 'Hiscompanyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hiscompanyinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
