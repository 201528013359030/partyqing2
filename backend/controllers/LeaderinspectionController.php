<?php
namespace backend\controllers;
use Yii;
use common\models\inspection\LeaderInspections;

class LeaderinspectionController extends \yii\rest\Controller
{
    public function actionApi($method)
    {
//     	die("22");
    	header("Access-Control-Allow-Origin: *"); # 跨域处理
        $webService = new LeaderInspections();

        $webService->setMethod($method);

        return $webService->run();
    }
}
