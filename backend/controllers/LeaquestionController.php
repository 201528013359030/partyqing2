<?php
namespace backend\controllers;
use Yii;
use common\models\lea\Leaquestions;

class LeaquestionController extends \yii\rest\Controller
{
    public function actionApi($method)
    {
//     	die("22");
    	header("Access-Control-Allow-Origin: *"); # 跨域处理
        $webService = new Leaquestions();

        $webService->setMethod($method);

        return $webService->run();
    }
}
