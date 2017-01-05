<?php
namespace common\models;
use common\models\ActionEs;
use common\models\IctWebService;
use backend\models\UserBackend;
use Yii;
use yii\base\Object;
 

class WSEs   extends \common\models\WebService{
	function __construct(){
        parent::init();
        parent::registerApi("esinfo.list.get",
            "getEsinfoList",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
 
        parent::registerApi("esmessage.list.get",
        		"getEsmessageList",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
  
        parent::registerApi("esmessage.create",
        		"getEsmessageCreate",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("productsup.list.get",
        		"getProductsupList",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("productreq.list.get",
        		"getProductreqList",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
    }
 
    public function actionSubmit($title)
    {
    	 
    		return ["succeed"=>1];
     
    }
 
    public function getEsinfoList($info){
       //不获取公司不存在的商铺
 
    	return 11;
        $model = new ActionEs();
        $return = $model->getEsinfoList($info);
        
        return  $return;
    }
    public function getEsmessageList($info){
    	//不获取公司不存在的商铺
    
    	 
    	$model = new ActionEs();
    	$return = $model->getEsmessageList($info);
    
    	return  $return;
    }
    public function getEsmessageCreate($info){
    	//不获取公司不存在的商铺
     
    	 
    			$model = new ActionEs();
    	$return = $model->getEsmessageCreate($info);
    
    	return  $return;
    }
    public function getProductsupList($info){
    	 
    	 
    
    	$model = new ActionEs();
    	$return = $model->getProductsupList($info);
    
    	return  $return;
    }
    public function getProductreqList($info){
    	//不获取公司不存在的商铺
    
    
    	$model = new ActionEs();
    	$return = $model->getProductreqList($info);
    
    	return  $return;
    }
 
}
	