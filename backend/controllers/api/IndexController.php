<?php
namespace backend\controllers\api;
use Yii;
use common\models\PublicApiForm;

class IndexController extends \yii\rest\Controller
{

    public $enableCsrfValidation = false;
    public function actionUser($method)
    {
        $webService = new PublicApiForm();
        $webService->setMethod($method);
        return $webService->run();
    }
}
