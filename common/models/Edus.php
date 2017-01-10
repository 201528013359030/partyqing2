<?php
namespace common\models;
//use common\models\ActionEs;
use common\models\IctWebService;
//use backend\models\UserBackend;
use Yii;
use yii\base\Object;


class Edus  extends \common\models\WebService{
	function __construct(){
        parent::init();
        parent::registerApi("edu.list.get",
            "getEduList",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
    }


    public function getEduList($info){
//     	die("23");

    	//Yii::$app->response->format = Response::FORMAT_JSON;
    	//$info='{"uid":"","limit":1,"offset":1,"id":"2","detail":"1"}';

		$info = json_decode($info,true);
		//$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$p = isset($info["p"]) ? $info["offset"] : null;
		$uid = isset($info["uid"]) ? $info["uid"] : null;

    	if(!$uid){
    		$return['c'] = -1;
    		$return['m'] = '无效用户';
    		return $return;
    	}
    	//file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
    	$eid = explode("@", $uid);
    	Yii::$app->session['user.id']  = $uid;
    	Yii::$app->session['user.eid'] = $eid[1];
    	$connection = Yii::$app->db;
    	$connection->open();
    	//$sq0="SELECT partyoid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$partyoid0 = $command->queryOne();
    	//$partyoid=$partyoid0["partyoid"];
    	$partyoid="8067";
    	Yii::$app->session['user.partyoid']  = $partyoid;
    	if(!$partyoid){
    		$return['c'] = -1;
    		$return['m'] = '没有党支部';
    		return $return;
    	}
    	$limit = 15;
    	$offset = ($p-1)*$limit;
    	$time=date("Y-m-d H:i:s",time());
    	//return $time;
    	if($p){
    		$sq0="select * from djleaplan where starttime<'".$time."' and endtime>'".$time."' limit ".$offset.",".$limit;//正在进行
    		$command = $connection->createCommand($sq0);
    		$list1 = $command->queryAll();
    		$count1=count($list1);
    		if($count1<$limit){
    			$limit2=$limit-$count1;
    			$sq0="select * from djleaplan where starttime>'".$time."'limit ".$offset.",".$limit2;//还未开始
    			$command = $connection->createCommand($sq0);
    			$list2 = $command->queryAll();
    			$count2=count($list2);
    			if($count1+$count2<$limit){
    				$limit3=$limit-$count1-$count2;
    				$sq0="select * from djleaplan where endtime<'".$time."'limit ".$offset.",".$limit3;//已结束
    				$command = $connection->createCommand($sq0);
    				$list3 = $command->queryAll();
    			}
    		}
    	}else{
    		$sq0="select * from djleaplan where starttime<'".$time."' and endtime>'".$time."'";//正在进行
    		$command = $connection->createCommand($sq0);
    		$list1 = $command->queryAll();
    		$sq0="select * from djleaplan where starttime>'".$time."'";//还未开始
    		$command = $connection->createCommand($sq0);
    		$list2 = $command->queryAll();
    		$sq0="select * from djleaplan where endtime<'".$time."'";//已结束
    		$command = $connection->createCommand($sq0);
    		$list3 = $command->queryAll();
    	}
    	//$sq0="select * from (select * from djleaplan d1 where starttime<'".$time."' and endtime>'".$time."') union all ".
    	//"select * from (select * from djleaplan d2 where starttime>'".$time."') union all ".
    	//"select * from (select * from djleaplan d3 where endtime<'".$time."')";

    	//$sq0="select * from djleaplan where eid='".$eid[1]."' and partyoid='".$partyoid."' and ORDER BY starttime<'".$time."' desc LIMIT 0,".$search_count."";
    	$list = array_merge($list1,$list2,$list3);



    	$return['list'] = $list;
    	//print_r($list);exit;
    	return $return;

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
