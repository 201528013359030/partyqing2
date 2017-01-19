<?php
namespace backend\controllers;
use Yii;
use common\models\Edutask;

class EdutaskController extends \yii\rest\Controller
{
    public function actionApi($method)
    { 
    	
        $webService = new Edutask();
        $webService->setMethod($method);
      
        return $webService->run();
    }
}
