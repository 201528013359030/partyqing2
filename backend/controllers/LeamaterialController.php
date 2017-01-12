<?php
namespace backend\controllers;
use Yii;
use common\models\lea\Leamaterials;

class LeamaterialController extends \yii\rest\Controller
{
    public function actionApi($method)
    {
    	header("Access-Control-Allow-Origin: *");// # 跨域处理
        $webService = new Leamaterials();
        $webService->setMethod($method);

        return $webService->run();
    }
}
