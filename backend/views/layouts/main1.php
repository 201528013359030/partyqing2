<?php
use yii\helpers\Html;
use mdm\admin\models\Assignment;
use backend\models\UserBackend;
use yii\base\Object;
$user = new UserBackend();
$list = UserBackend::find()->where([])->asArray()->all();
//print_r($list);
//echo "<br>";
//print_r(Yii::$app->user->identity);
//echo "type=".Yii::$app->session["user.identity.type"];
$euserId = "";
$type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"1";
$typearr=['1'=>'后台管理员','2'=>'后台管理员','3'=>'企业管理员'];
for($i=0;$i<count($list);$i++){
    $tmpId = $list[$i]["id"];
    $assign = new Assignment($tmpId);
    $test = $assign->getItems();
    //print_r($test);
    //echo "<br>";
    if(array_key_exists($typearr[$type],$test["assigned"])){
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
        <title>铁西区（开发区）企业云服务平台</title>        
        <?php $this->head() ?>
        <?=Html::cssFile('@web/css/bootstrap.min.css')?>
        <?=Html::cssFile('@web/css/apps.css')?>
        <!--[if lt IE 9]>
        <?=Html::jsFile('@web/js/html5shiv.min.js')?>
        <?=Html::jsFile('@web/js/respond.min.js')?>
<![endif]-->
    </head>
    <body>
    <?php //$this->beginBody() ?>
        <?= $this->render(
            'header1.php',
            ['directoryAsset' => $directoryAsset,'euserId'=>$euserId]
        ) ?>

        <?= $this->render(
            'content1.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
        
        <?= $this->render(
            'bottom.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
    <?php //$this->endBody() ?>
    <?=Html::cssFile('@web/css/datepicker.css')?>
    <?=Html::jsFile('@web/js/jquery.min.js')?>
    <?=Html::jsFile('@web/js/jquery.validate.js')?>
    <?=Html::jsFile('@web/js/bootstrap.min.js')?>
    <?=Html::jsFile('@web/js/bootstrap-datepicker.js')?>
    <?=Html::jsFile('@web/js/apps.js')?>
    <?=Html::jsFile('@web/js/ajaxfileupload.js')?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
