<?php
namespace backend\controllers;
use Yii;
use common\models\WS;

class MainController extends \yii\rest\Controller
{
    public function actionApi($method)
    {
        $webService = new WS();
        $webService->setMethod($method);
        return $webService->run();
    }
}
