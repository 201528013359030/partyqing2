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
        parent::registerApi("edu.plan.detail",
        		"plandetail",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edu.plan.count",
        		"plancount",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edu.plan.percent",
        		"planpercent",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
    }
    public function getEduList($info){
 
    	//Yii::$app->response->format = Response::FORMAT_JSON;   
    	//$info='{"uid":"7@3","limit":,"p":}'; 	

		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
		$p = isset($info["p"]) ? $info["p"] : null;  //第几页
		$uid = isset($info["uid"]) ? $info["uid"] : null;

    	if(!$uid){
    		$return['status'] = -1;
    		$return['message'] = '无效用户';
    		return $return;
    	}
    	//file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
    	$eid = explode("@", $uid);
    	Yii::$app->session['user.id']  = $uid;
    	
    	$connection = Yii::$app->db;
    	$connection->open();
    	//$sq0="SELECT partyoid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$partyoid0 = $command->queryOne();
    	//$partyoid=$partyoid0["partyoid"];
    	$partyoid="8067";
    
    	if(!$partyoid){
    		$return['status'] = -1;
    		$return['message'] = '没有党支部';
    		return $return;
    	}
    	$offset = ($p-1)*$limit;
    	$time=date("Y-m-d H:i:s",time());
    	//return $time;
    	if($p){
    		$sq0="select * , @flag:=1 as flag from djleaplan where partyoid='".$partyoid."' and starttime<'".$time."' and endtime>'".$time."' limit ".$offset.",".$limit;//正在进行
    		$command = $connection->createCommand($sq0);
    		$list1 = $command->queryAll();
    		$count1=count($list1);
    		if($count1<$limit){
    			$limit2=$limit-$count1;
    			$sq0="select * , @flag:=2 as flag from djleaplan where partyoid='".$partyoid."' and starttime>'".$time."'limit ".$offset.",".$limit2;//还未开始
    			$command = $connection->createCommand($sq0);
    			$list2 = $command->queryAll();
    			$count2=count($list2);
    			if($count1+$count2<$limit){
    				$limit3=$limit-$count1-$count2;
    				$sq0="select * , @flag:=3 as flag from djleaplan where partyoid='".$partyoid."' and endtime<'".$time."'limit ".$offset.",".$limit3;//已结束
    				$command = $connection->createCommand($sq0);
    				$list3 = $command->queryAll();
    			}
    		}
    	}else{
    		$sq0="select * , @flag:=1 as flag from djleaplan where partyoid='".$partyoid."' and starttime<'".$time."' and endtime>'".$time."'";//正在进行
    		$command = $connection->createCommand($sq0);
    		$list1 = $command->queryAll();
    	
    		$sq0="select * , @flag:=2 as flag from djleaplan where partyoid='".$partyoid."' and starttime>'".$time."'";//还未开始
    		$command = $connection->createCommand($sq0);
    		$list2 = $command->queryAll();
    		$sq0="select * , @flag:=3 as flag from djleaplan where partyoid='".$partyoid."' and endtime<'".$time."'";//已结束
    		$command = $connection->createCommand($sq0);
    		$list3 = $command->queryAll();    		    	
    	}
    	//$sq0="select * from (select * from djleaplan d1 where starttime<'".$time."' and endtime>'".$time."') union all ".
    	//"select * from (select * from djleaplan d2 where starttime>'".$time."') union all ".
    	//"select * from (select * from djleaplan d3 where endtime<'".$time."')";
    	
    	//$sq0="select * from djleaplan where eid='".$eid[1]."' and partyoid='".$partyoid."' and ORDER BY starttime<'".$time."' desc LIMIT 0,".$search_count."";
    	$list = array_merge($list1,$list2,$list3);
    	$count=count($list);
    	for($i=0;$i<$count;$i++){
    		$sq0="select id from djleacont where materid='".$list[$i]["id"]."'";//已结束
    		$command = $connection->createCommand($sq0);
    		$result = $command->queryAll();
    		$sq0="select id from djleacont where materid='".$list[$i]["id"]."' and isend=1";//已结束
    		$command = $connection->createCommand($sq0);
    		$result0 = $command->queryAll();    		
    		if(count($result)==0){
    			$list[$i]["percent"]=0;
    		}else{
    			$a=count($result0)/count($result);
    			$a=round($a, 2);
    		    $list[$i]["percent"]=$a*100;
    		}
    	}
    	$return['partyname'] = "研发中心党支部";
    	$return['role'] = 2;
    	$return['list'] = $list;
    	//print_r($list);exit;
    	return $return;    
     
    }
    public function plandetail($info){
    
    	//Yii::$app->response->format = Response::FORMAT_JSON;
    	//$info='{"uid":"7@3","limit":,"p":}';
    
    	$info = json_decode($info,true);

    	$planid = isset($info["planid"]) ? $info["planid"] : null; 
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    
    	if(!$uid){
    		$return['status'] = -1;
    		$return['message'] = '无效用户';
    		return $return;
    	}
    	//file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
    	$eid = explode("@", $uid);
    	 
    	$connection = Yii::$app->db;
    	$connection->open();

    		$sq0="select * from djleaplan where id='".$planid."'";//正在进行
    		$command = $connection->createCommand($sq0);
    		$list = $command->queryOne();

    	$return['list'] = $list;
    	//print_r($list);exit;
    	return $return;
    	 
    }
    public function plancount($info){
    	//不获取公司不存在的商铺
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","planid":"2"}';
    	$planid = isset($info["planid"]) ? $info["planid"] : null;  
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	
    	if(!$uid){
    		$return['status'] = -1;
    		$return['message'] = '无效用户';
    		return $return;
    	}
    	if(!$planid){
    		$return['status'] = -1;
    		$return['message'] = '学习计划为空';
    		return $return;
    	}
    	$connection = Yii::$app->db;
    	$connection->open();
    	
    	$sq0="select id from djleaplancount where planid='".$planid."' and uid='".$uid."'";
    	$command = $connection->createCommand($sq0);
    	$count = $command->queryOne();
    
    	if($count){}else{
    		$sq2="INSERT INTO djleaplancount(uid,planid) VALUES('$uid','$planid')";
    		$command = $connection->createCommand($sq2);
    		$command->execute();
    		$sq0="UPDATE djleaplan SET readd=readd+1 WHERE id='".$planid."'";
    		$command = $connection->createCommand($sq0);
    		$command->execute();//返回值 1-成功 0-失败
    	}    
    	$return['status'] = 1;
    	$return['message'] = 'success';
  
    	return  $return;
    }
 
}
	