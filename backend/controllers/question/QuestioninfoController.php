<?php

namespace backend\controllers\question;

use Yii;
use common\models\Questioninfo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Form;
use common\models\FileList;
use common\models\UploadForm;
use common\models\Page;
use yii\web\UploadedFile;
use yii\web\Response;
use common\models\QuestioninfoSearch;
use common\models\QuestionResult;
use common\models\QuestionProgress;
use common\models\QuestionAppend;
use common\models\IctWebService;
use yii\helpers\Url;


defined('YII_QUESTION') or define('YII_QUESTION', 'v1');
/**
 * QuestioninfoController implements the CRUD actions for Questioninfo model.
 */
class QuestioninfoController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = "main1";
    public $actionId ;
    public function beforeAction($action)
    {
        $this->actionId = $action->id ;

        return parent::beforeAction($action);
    }
    public function actionTest(){
        $ws = new IctWebService();
        return $ws->uploadFile("/tmp/tmp.log");
    }
    public function actionMain(){
        if(Yii::$app->session['user.identity.type'] == 3){
            //企业用户 
            return $this->redirect(['submit']);
        }else{
            //政府用户
            return $this->redirect(['index']);

        }
        return $this->render('main', []);
    }
    public function getAction(){
        $action["finish"] = '';
        $action["index"] = '';
        $action["submit"] = '';
        $action["view"] = '';
        $action["Append"] = '';
        
        $action["$this->actionId"] = 'active';
        // print_r($action);
        return $action;
    }
    /**
     * 已完成列表
     * @return mixed
     */ 
    public function actionFinish()
    {

        $searchModel = new QuestioninfoSearch();
        $params = Yii::$app->request->queryParams;
        if(Yii::$app->session['user.identity.type'] == 3){
            $params["QuestioninfoSearch"]["sender"] = Yii::$app->session['uid'];
        }else{
            $params["QuestioninfoSearch"]["contacts"] = Yii::$app->session['uid'];
        }
        if(!isset(Yii::$app->request->queryParams["QuestioninfoSearch"]["status"])){
            $params["QuestioninfoSearch"]["status"] = 1;
        }

        $params['sort'] = '-createTime';
        Yii::$app->request->queryParams = $params;
        $query = $searchModel->search(Yii::$app->request->queryParams); 
        $list = $query->getModels();
        if($query->getCount() == 0){
            $pageHtml = "";
            $pagecount = 0;
            $p = 0;
        }else{
            $page = new Page($query->getTotalCount(),$query->pagination->pageSize,Yii::$app->request->get("page",1));
            $pageHtml = $page->pagehtml();
            $pagecount = $page->getPagecount();
            $p = Yii::$app->request->post("page",1);
        }
        return $this->render('request_list', [
            'list' => $list,
            'pageHtml' => $pageHtml,
            'pagecount'=>$pagecount,
            'p' => $p ,
            'search' => $params["QuestioninfoSearch"],
            'action' => $this->getAction(),
            'txt'=>'已处理问题'
        ]);

    }
    /**
     * 未完成列表
     * 问题反馈不区分已完成和未完成
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestioninfoSearch();
        $params = Yii::$app->request->queryParams;

        if(YII_QUESTION == "v1"){
            if(Yii::$app->session['user.identity.type'] == 3){
                $params["QuestioninfoSearch"]["sender"] = Yii::$app->session['uid'];
            }else{
                $params["QuestioninfoSearch"]["contacts"] = Yii::$app->session['uid'];
            }
            if(!isset(Yii::$app->request->queryParams["QuestioninfoSearch"]["status"])){
                $params["QuestioninfoSearch"]["status"] = 0;
            }
        }
        if(!isset($params["QuestioninfoSearch"])){
            $params["QuestioninfoSearch"] = [];
        }
        $params['sort'] = '-createTime';
        Yii::$app->request->queryParams = $params;
        $query = $searchModel->search(Yii::$app->request->queryParams); 
        $list = $query->getModels();
        if($query->getCount() == 0){
            $pageHtml = "";
            $pagecount = 0;
            $p = 0;
        }else{
            $page = new Page($query->getTotalCount(),$query->pagination->pageSize,Yii::$app->request->get("page",1));
            $pageHtml = $page->pagehtml();
            $pagecount = $page->getPagecount();
            $p = Yii::$app->request->post("page",1);
        }
        return $this->render('request_list', [
            'list' => $list,
            'pageHtml' => $pageHtml,
            'pagecount'=>$pagecount,
            'p' => $p ,
            'search' => $params["QuestioninfoSearch"],
            'action' => $this->getAction(),
            'txt'=>'未处理问题'
        ]);
    }
    /**
     * 反馈问题 提交
     * @return [type] [description]
     */
    public function actionSubmit()
    {
        $formRules[] = [['title',"content","phone"],'required']; 
        $formRules[] = [['title',"content","phone"],'string']; 
        $formRules[] = [['file'], 'file'];
        $model = new Form($formRules);
        $message = 0;
        if (Yii::$app->request->isPost) {
            $param = Yii::$app->request->post();
            $fileList = Yii::$app->request->post('file_list',[]);
            $attach = [];
            foreach ($fileList as $key => $value) {
                $file = FileList::findOne($value);
                if($file){
                    $attach[] = ["id"=>$value,"name"=>$file->name,"size"=>$file->size,"path"=>$file->path];
                }
            }
            $param['Form']['attach'] = json_encode($attach);
            if(Yii::$app->user->id){
                //yii user
                $param['Form']['sender'] = (string)Yii::$app->user->id;
                $param['Form']['senderName'] = Yii::$app->user->identity->username;
            }else{
                //ict user
                $param['Form']['sender'] = Yii::$app->session['uid'];
                $param['Form']['senderName'] = Yii::$app->session['userName'];
            }
            // $param['Form']['solverDepartment'] = "";
            $param['Form']['createTime'] = time();
            $param['Form']['date'] = date("Y-m-d",$param['Form']['createTime']);
            // $param['Form']['solver'] = Yii::$app->user->id;;

            $questioninfo = new Questioninfo();
            if ($questioninfo->load(["Questioninfo"=>$param['Form']]) && $questioninfo->save()) {
                if(YII_QUESTION == "v1")
                    return $this->redirect(['index']);
                // 
                $message = 1;
            } else {
                echo array_values($questioninfo->getFirstErrors())[0]; 
                $message = -1;
                exit();
            }
        }
        return $this->render('request_edit', [
            "model"=>$model,
            "message"=>$message,
            'action' => $this->getAction(),
            
        ]);
    }
    /**
     * 上传文件
     * @return [type] [description]
     */
    public function actionFileUpload(){

        Yii::$app->response->format = Response::FORMAT_JSON;
        $result['errcode'] = 0; 
        $result['errmsg'] = ""; 
        $formRules[] = [['file'], 'file'];
        $model = new Form($formRules);
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');//单个文件用getInstance，多个文件用getInstances。
            if ($model->file && $model->validate()) {
                $baseName = mb_convert_encoding($model->file->baseName,"gbk", "utf-8");
                $filepath = './uploads/' . $baseName .time(). '.' . $model->file->extension;
                $model->file->saveAs($filepath);
                $file = new FileList();
                $file->name = $baseName. '.' . $model->file->extension;
                $file->size = $model->file->size;
                $file->file = $filepath;
                if($file->save()){
                    $file->path = 'http://'.$_SERVER['HTTP_HOST'].Url::to(['question/questioninfo/file-download','id'=>$file->id]);
                    $file->save();
                    $result['file_id'] = $file->id; 
                    $result['file_input_id'] = Yii::$app->request->post("file_input_id"); 
                }else{
                    $result['errcode'] = 2; 
                    $result['errmsg'] = array_values($file->getFirstErrors())[0]; 
                }
            }else{       
                $result['errcode'] = 2; 
                $result['errmsg'] = array_values($model->getFirstErrors())[0]; 
            }
        }
        return $result;
    }
    /**
     * 下载文件
     * @return [type] [description]
     */
    public function actionFileDownload($id){
        $model = FileList::findOne($id);
        if($model->type == 2){
            $url = explode("?", $model->path);
            $url_0 =explode("media_file",$url[0]);
            $fileName = "/Data/media_file" . $url_0[1];
        }else{
            $fileName = $model->file;
        }
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=".$model->name); 
        readfile($fileName);
        exit();
    }

    /**
     * 用户权限 查看详情/追问 
     * @param integer $id
     * @return mixed
     */
    public function actionAppend($id)
    {

        $model = Questioninfo::findOne($id);

        if (Yii::$app->request->isPost) {
            if(  Yii::$app->request->post("append")){
                $append = new QuestionAppend();
                $append->qid = $id;
                $append->time = time();
                $append->text = Yii::$app->request->post("append");
                if(!$append->save()){
                    echo array_values($append->getFirstErrors())[0]; 
                    exit();
                }
                $model->status = 0;
                $model->save();
            }
            return $this->redirect(['index']);
        }
        $answer = QuestionResult::find()->where(['qid'=>$id])->asArray()->all();
        $progress = QuestionProgress::find()->where(['qid'=>$id])->asArray()->all();
        $append = QuestionAppend::find()->where(['qid'=>$id])->asArray()->all();
        return $this->render('request_con', [
            'model' => $model,
            'id' => $id,
            'answer' => $answer,
            'progress' => $progress,
            'action' => $this->getAction(),
            'append' => $append,
        ]);
    }


    /**
     * 管理员权限 查看详情/解答 
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //临时规则 ict 用户跳转到追加页
        if(Yii::$app->session['user.identity.action'] & 4){
            return $this->redirect(['append','id'=>$id]);
        }
        $model = Questioninfo::findOne($id);

        if (Yii::$app->request->isPost) {
            if(  Yii::$app->request->post("answer")){
                $result = new QuestionResult();
                $result->qid = $id;
                $result->uid = Yii::$app->session['uid']?:"admin";
                $result->name = Yii::$app->session['userName']?:"admin";
                $result->time = time();
                $result->text = Yii::$app->request->post("answer");
                if(!$result->save()){
                    echo array_values($result->getFirstErrors())[0]; 
                    exit();
                }
                $model->status = 1;
                $model->save();
            }
            if(Yii::$app->request->post("progress")){
                $progress = new QuestionProgress();
                $progress->qid = $id;
                $progress->text = Yii::$app->request->post("progress");
                $progress->time = time();                
                if(!$progress->save()){
                    echo array_values($progress->getFirstErrors())[0]; 
                    exit();
                }
                
            }
            return $this->redirect(['index']);
        }
        $answer = QuestionResult::find()->where(['qid'=>$id])->asArray()->all();
        $progress = QuestionProgress::find()->where(['qid'=>$id])->asArray()->all();
        $append = QuestionAppend::find()->where(['qid'=>$id])->asArray()->all();
        return $this->render('request_admin_con', [
            'model' => $model,
            'id' => $id,
            'answer' => $answer,
            'progress' => $progress,
            'action' => $this->getAction(),
            'append' => $append,
        ]);
    }

 
}
