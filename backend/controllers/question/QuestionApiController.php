<?php
namespace backend\controllers\question;
use Yii;
use common\models\QuestionApi;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\CompositeAuth;

class QuestionApiController extends \yii\rest\Controller
{

    public $enableCsrfValidation = false;
 //    public function behaviors()
	// {
	//     $behaviors = parent::behaviors();
	//     $behaviors['authenticator'] = [
	//         'class' => CompositeAuth::className(),
	//         'authMethods' => [
	//             QueryParamAuth::className(),
	//         ],
	//     ];
	//     return $behaviors;
	// }
    public function actionApi($method)
    {
        $webService = new QuestionApi();
        $webService->setMethod($method);
        return $webService->run();
    }
}
