<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\UserBackend as User;
use common\models\IctWebService;
use yii\base\Object;
use common\models\PublicApiForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    /*[
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],*/
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {        
        //echo "type=".Yii::$app->session["user.identity.type"];
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->redirect('index.php?r=home/index');
        }
        //$username = Yii::$app->request->post("username");        
        $model = new LoginForm();        
        if ($model->load(Yii::$app->request->post())) {
            $username = Yii::$app->request->post()["LoginForm"]["username"];
            $password = Yii::$app->request->post()["LoginForm"]["password"];
            $rememberMe = Yii::$app->request->post()["LoginForm"]["rememberMe"];
            //echo "username=".Yii::$app->request->post()["LoginForm"]["username"]."---pwd=".$password."--remember=".$rememberMe."<br>";
            //print_r(Yii::$app->request->post());
            $backUser = User::findByUsername($username);
            //echo "<br>";
            //print_r($backUser);
            if($backUser){
                if ($model->login()) {
                    $this->getIdentity(Yii::$app->user->id);
                    //return $this->goBack();
                    return $this->redirect('index.php?r=home/index');
                } else {
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
            }else{
                //ict user
                $ws = new IctWebService();
                if($ws->authToken($username, $password)){
                    $this->getIdentity(Yii::$app->session['uid']);
                    //\app\models\Log::create(1,"��¼�ɹ�");
                    //$ictuser = new User();
                    //$ictuser->username = $username;
                    //$ictuser->password_hash = $password;
                    //$ictuser->auth_key = $ws->authToken($username, $password);
                    //Yii::$app->user->login($ictuser, $rememberMe ? 3600 * 24 * 30 : 0);
                    
                    return $this->redirect('index.php?r=home/index');
                }else{
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
            }
            
        }else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
    }
    /**
     * 获取用户身份  后台 政府 企业
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getIdentity($id){
        $publicApiForm = new PublicApiForm();
        $identity = $publicApiForm->identity($id);
        Yii::$app->session['user.identity.type']= $identity['type'];
        Yii::$app->session['user.identity.action']= $identity['action'];
        return;
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        //$ict_ws = new IctWebService();
        //$ict_ws->logout();
        $session = Yii::$app->session;
        $session->destroy();
        Yii::$app->user->logout();        
        return $this->goHome();
    }
}
