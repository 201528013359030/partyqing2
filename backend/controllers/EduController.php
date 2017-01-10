<?php
namespace backend\controllers;
use Yii;
use common\models\Edus;

class EduController extends \yii\rest\Controller
{
    public function actionApi($method)
    {

        $webService = new Edus();
        $webService->setMethod($method);

        return $webService->run();
    }
}
