<?php
use yii\helpers\Html;
use mdm\admin\models\Assignment;
use backend\models\UserBackend;
use yii\base\Object;
$user = new UserBackend();
$list = UserBackend::find()->where([])->asArray()->all();
//print_r($list);
//echo "<br>";
$euserId = "";
for($i=0;$i<count($list);$i++){
    $tmpId = $list[$i]["id"];
    $assign = new Assignment($tmpId);
    $test = $assign->getItems();
    //print_r($test);
    //echo "<br>";
    if(array_key_exists("企业管理员",$test["assigned"])){
        $euserId = $tmpId;
        break;
    }
}
//echo "userId=".$euserId;
/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition <?= \dmstr\helpers\AdminLteHelper::skinClass() ?> sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset,'euserId'=>$euserId]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset,'euserId'=>$euserId]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
