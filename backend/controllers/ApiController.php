<?php

namespace backend\controllers;

use Yii;

use common\models\Companyinfo;
use backend\models\CompanyinfoSearch;
use yii\base\Object;
class ApiController extends \yii\rest\Controller
{
    private $result=['code'=>0,'mess'=>''];
    public function actions()
    {
       $actions = parent::actions();
        // 注销系统自带的实现方法
       unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);
       return $actions;
    }
    /**
     * 获取企业列表
     * @return [type] [description]
     */
    public function actionCompanyList()
    {   
        $searchModel = new CompanyinfoSearch();
        $post['CompanyinfoSearch'] = Yii::$app->request->post();
        // return $post;
        $query = $searchModel->search($post);
        // $query->setSort(10);
        $total = 0;
        if($query->getCount()>0){
            $total = ceil($query->getTotalCount()/$query->getCount()) ;
            $this->result['data'] = ['total'=>$total,'list'=>$query->getModels()];
        }else{
            $this->result['data'] = ['total'=>$total,'list'=>[]];
        }                
        return $this->result;
    }
}
