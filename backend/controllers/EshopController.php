<?php
namespace backend\controllers;
use Yii;
use common\models\WSEs;

class EshopController extends \yii\rest\Controller
{
    public function actionApi($method)
    { 
        $webService = new WSEs();
        $webService->setMethod($method);
        
        return $webService->run();
    }
}
