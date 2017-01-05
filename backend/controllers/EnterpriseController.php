<?php

namespace backend\controllers;

use Yii;
use common\models\Enterprise;
use common\models\Action;
use backend\models\EnterpriseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Object;

/**
 * EnterpriseController implements the CRUD actions for Enterprise model.
 */
class EnterpriseController extends Controller
{
    public $enableCsrfValidation = false;//yii默认表单csrf验证，如果post不带改参数会报错！
    public $layout = "main1";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','connection','circular'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                    [
                        'actions' => ['index','connection','circular'],
                        'allow' => true,
                        'matchCallback' => function($rule,$action){
                            $type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"";
                            return (strcasecmp($type, "2") ===0 || strcasecmp($type, "3") ===0);
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Enterprise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnterpriseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionConnection(){
        return $this->render('connection');
    }
    public function actionCircular(){
        return $this->render('circular');
    }
    public function actionSearchWord(){
        return $this->render('search-word');
    }
    public function actionEqu(){
        $domain = "";
        if(strlen(\Yii::$app->request->post("domain"))>0){
            $domain = \Yii::$app->request->post("domain");
        }
        $action = new Action();
        $foundtimeArr = $action->getCmpFoundTimeStat($domain);
        $output = array_slice($foundtimeArr, -10, 10);
        $foundtimeJson = json_encode($output);
        $regtypeArr = $action->getCmpRegtypeStat($domain);
        $output = array_slice($regtypeArr, -10, 10);
        $regtypeJson = json_encode($output);
        $industryArr = $action->getCmpIndustryClassStat($domain);
        $industryJson = json_encode($industryArr);
        $scaleArr = $action->getCmpScaleStat($domain);
        $scaleJson = json_encode($scaleArr);
        $domainOptions = $action->getParamOptions("cmpDomain", $domain);        
        return $this->render('equ', [
            'foundtimeJson' => $foundtimeJson,
            'regtypeJson' => $regtypeJson,
            'industryJson' => $industryJson,
            'scaleJson' => $scaleJson,
            'domainOptions' => $domainOptions,
        ]);
    }
    public function actionFeedback(){
        return $this->render('feedback');
    }

    /**
     * Displays a single Enterprise model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Enterprise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enterprise();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->eid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Enterprise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->eid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Enterprise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Enterprise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Enterprise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enterprise::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
