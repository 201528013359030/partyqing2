<?php
namespace common\models;
//use common\models\ActionEs;
use common\models\IctWebService;
//use backend\models\UserBackend;
use Yii;
use yii\base\Object;
class Edutask  extends \common\models\WebService{
	function __construct(){		
        parent::init();
        parent::registerApi("edutask.list.get",
            "getEdutaskList",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );    
        parent::registerApi("edutask.list.search",
        		"edutasksearch",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.detail.get",
        		"edutaskdetail",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.send",
        		"edutaskfeelsend",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.list",
        		"edutaskfeellist",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.search",
        		"edutaskfeelsearch",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.detail",
        		"edutaskfeeldetail",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.comment",
        		"edutaskfeelcomment",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.prop",
        		"edutaskfeelprop",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.comment.prop",
        		"edutaskcommentprop",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.task.complete",
        		"edutaskcomplete",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
        parent::registerApi("edutask.feel.recommend",
        		"edutaskfeelrecommend",
        		[
        		"info"=>['type'=>'string'],
        		],
        		false
        );
      
    }
    public function getEdutaskList($info){
 
    	//Yii::$app->response->format = Response::FORMAT_JSON;   
    	//$info='{"p":"","planid":,"2":}'; 	
		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
		$p = isset($info["p"]) ? $info["p"] : null;  //第几页
		$planid = isset($info["planid"]) ? $info["planid"] : null;

    	if(!$planid){
    		$return['status'] = -1;
    		$return['message'] = '无效学习计划';
    		return $return;
    	}
    	//file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
    	$connection = Yii::$app->db;
    	$connection->open();

    	$offset = ($p-1)*$limit;
    	if($p){
    	$sq0="select * from djleacont where materid='".$planid."' order by top,time desc limit ".$offset.",".$limit;
    	$command = $connection->createCommand($sq0);
    	$list = $command->queryAll();   
    	}else{
    		$sq0="select * from djleacont where materid='".$planid."' order by top desc,time desc";
    		$command = $connection->createCommand($sq0);
    		$list = $command->queryAll();   	
    	}
    	$return['role'] = 1;
    	$return['list'] = $list;
    	//print_r($list);exit;
    	return $return;    
     
    }
    public function edutasksearch($info){
    
    	//Yii::$app->response->format = Response::FORMAT_JSON;
    	//$info='{"p":"","planid":"2","searchcontent":"是啥"}';
    	$info = json_decode($info,true);
    	$searchcontent = isset($info["searchcontent"]) ? $info["searchcontent"] : null;
    	$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
    	$p = isset($info["p"]) ? $info["p"] : null;  //第几页
    	$planid = isset($info["planid"]) ? $info["planid"] : null;
    
    	if(!$planid){
    		$return['status'] = -1;
    		$return['message'] = '无效学习计划';
    		return $return;
    	}
    	//file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
    	$connection = Yii::$app->db;
    	$connection->open();
    
    	$offset = ($p-1)*$limit;
    if($searchcontent){
    	if($p){
    		$sq0="select * from djleacont where materid='".$planid."' and (title like '%".$searchcontent."%' or keywords like '%".$searchcontent."%') limit ".$offset.",".$limit;
    		$command = $connection->createCommand($sq0);
    		$list = $command->queryAll();
    	}else{
    		$sq0="select * from djleacont where materid='".$planid."' and (title like '%".$searchcontent."%' or keywords like '%".$searchcontent."%')";
    		$command = $connection->createCommand($sq0);
    		$list = $command->queryAll();
    	}
    }else{
    		if($p){
    			$sq0="select * from djleacont where materid='".$planid."' limit ".$offset.",".$limit;
    			$command = $connection->createCommand($sq0);
    			$list = $command->queryAll();
    		}else{
    			$sq0="select * from djleacont where materid='".$planid."'";
    			$command = $connection->createCommand($sq0);
    			$list = $command->queryAll();
    		}
    }
    	$return['list'] = $list;
    	$return['role'] = 1;
    	//print_r($list);exit;
    	return $return;
    	 
    }
    public function edutaskdetail($info){

    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","planid":"2"}';
    	$taskid = isset($info["taskid"]) ? $info["taskid"] : null;     	
    
    	if(!$taskid){
    		$return['status'] = -1;
    		$return['message'] = '学习任务为空';
    		return $return;
    	}
    	$connection = Yii::$app->db;
    	$connection->open();
    	
    	$sq0="select * from djleacont where id='".$taskid."'";
    	$command = $connection->createCommand($sq0);
    	$detail = $command->queryOne();
    	if($detail['materials']){
    		$details=explode(',',$detail['materials']);    	
    		$count=count($details);
    		for($i=0;$i<$count;$i++){
    			$detail['materialinfo'][$i]['id']=$details[$i];
    			$sq0="select title from djleamaterial where id='".$details[$i]."' order by time desc";
    			$command = $connection->createCommand($sq0);
    			$de= $command->queryOne();
    			$detail['materialinfo'][$i]['title']=$de['title'];
    		}
    	}
    	
    	$sq0="UPDATE djleacont SET readd=readd+1 WHERE id='".$taskid."'";
    	$command = $connection->createCommand($sq0);
    	$command->execute();

    	return  $detail;
    }
    public function edutaskfeelsend($info){
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$taskid = isset($info["taskid"]) ? $info["taskid"] : null;
    	$title = isset($info["title"]) ? $info["title"] : null;
    	$content = isset($info["content"]) ? $info["content"] : null;     	
    	$files = isset($info["files"]) ? $info["files"] : null;
    	if(!$title){
    		$return['status'] = -1;
    		$return['message'] = '标题为空';
    		return $return;
    	}
    	if(!$content){
    		$return['status'] = -1;
    		$return['message'] = '心得为空';
    		return $return;
    	}
    	$eid0 = explode("@", $uid);
    	$eid=$eid0[1];
    	$connection = Yii::$app->db;
    	$connection->open();
 
    	//$sq0="SELECT name,orgid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$re = $command->queryOne();
    	//$orgid=$re["orgid"];
    	//$name=$re["name"];
    	$name="小花";    	
    	$orgid="8280";
    	$sq0="select materid from djleacont where id='".$taskid."'";
    	$command = $connection->createCommand($sq0);
    	$plan = $command->queryOne();
    	$planid=$plan['materid'];
    	
    	$time=date("Y-m-d H:i:s",time());
    	$sq0="select * from djleafeel where sender='".$taskid."' and senduser='".$uid."'";
    	$command = $connection->createCommand($sq0);
    	$result0 = $command->queryOne();
    	
    	if($result0){
    		$sq0="UPDATE djleafeel SET title='".$title."',content='".$content."',files='".$files."' WHERE id='".$result0["id"]."'";
    		$command = $connection->createCommand($sq0);
    		$result=$command->execute();
    		//file_put_contents("D://wt.txt","sql:".json_encode($sq0)."\n", FILE_APPEND);
    		$result=1;
    	}else{
    	$sq2="INSERT INTO djleafeel(title,content,sender,senduser,sendname,files,time,orgid,eid,planid) VALUES('$title','$content','$taskid','$uid','$name','$files','$time','$orgid','$eid','$planid')";
    	$command = $connection->createCommand($sq2);
    	$result=$command->execute();    	
    	}   	
    	if($result){
    	    $return['status'] = 1;
    	    $return['message'] = 'success';
    	}else{
    		$return['status'] = -1;
    		$return['message'] = 'fail';
    	}
    	
    	return  $return;
    }
    public function edutaskfeellist($info){
    	   	 
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$planid = isset($info["planid"]) ? $info["planid"] : null;
    	$taskid = isset($info["taskid"]) ? $info["taskid"] : null;
    	$top = isset($info["top"]) ? $info["top"] : null;
    	$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
    	$p = isset($info["p"]) ? $info["p"] : 1;  //第几页
    	$offset = ($p-1)*$limit;
    	
    	$connection = Yii::$app->db;
    	$connection->open();
    	if($planid){
    	 if($top==1){
    	 	$sq0="select * from djleafeel where top=1 and publish=1 and planid='".$planid."' limit ".$offset.",".$limit;
    	  }else{
    	    $sq0="select * from djleafeel where planid='".$planid."'limit ".$offset.",".$limit;
    	 }
    	 $return["myfeel"]=0;
    	}else if($taskid){
    		$sq0="select id from djleafeel where sender='".$taskid."' and senduser='".$uid."'";
    		$command = $connection->createCommand($sq0);
    		$myfeel= $command->queryOne();
    		if($myfeel){$return["myfeel"]=1;}else{$return["myfeel"]=0;}
    	 if($top==1){
    	 	$sq0="select * from djleafeel where top=1 and publish=1 and sender='".$taskid."' limit ".$offset.",".$limit;
    	  }else{
    	    $sq0="select * from djleafeel where sender='".$taskid."'limit ".$offset.",".$limit;    	  
    	 }
    	}
    	//file_put_contents("D://wt.txt","sql:".json_encode($sq0)."\n", FILE_APPEND);
    	$command = $connection->createCommand($sq0);
    	$list = $command->queryAll();
    	$count=count($list);
    	for($i=0;$i<$count;$i++){
    	$sq0="select id from djleafeelprop where leafeelid='".$list[$i]["id"]."' and type=16";
    	$command = $connection->createCommand($sq0);
    	$commentlist = $command->queryAll();
    	$list[$i]["commentcount"]=count($commentlist);//评论数
    	
    	$sq0="select id from djleafeelprop where leafeelid='".$list[$i]["id"]."' and type=17";
    	$command = $connection->createCommand($sq0);
    	$prop = $command->queryAll();
    	$list[$i]["propcount"]=count($prop); //心得赞
    	}
    	
    	$return["list"]=$list;
    	return  $return;
    }
    public function edutaskfeelsearch($info){
    
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$taskid = isset($info["taskid"]) ? $info["taskid"] : null;
    	$top = isset($info["top"]) ? $info["top"] : null;
    	$searchcontent = isset($info["searchcontent"]) ? $info["searchcontent"] : null;
    	$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
    	$p = isset($info["p"]) ? $info["p"] : null;  //第几页
    	$offset = ($p-1)*$limit;
    	$connection = Yii::$app->db;
    	$connection->open();
    	if($searchcontent){
    	    if($top==1){
    		   $sq0="select * from djleafeel where top=1 and publish=1 and sender='".$taskid."' and (title like '%".$searchcontent."%' or keywords like '%".$searchcontent."%') limit ".$offset.",".$limit;
    		   $command = $connection->createCommand($sq0);
    		   $list = $command->queryAll();
    	    }else{
    		   $sq0="select * from djleafeel where sender='".$taskid."' and (title like '%".$searchcontent."%' or keywords like '%".$searchcontent."%') limit ".$offset.",".$limit;
    		   $command = $connection->createCommand($sq0);
    		   $list = $command->queryAll();
    	    }
    	}else{
    		if($top==1){
    			$sq0="select * from djleafeel where top=1 and publish=1 and sender='".$taskid."' limit ".$offset.",".$limit;
    			$command = $connection->createCommand($sq0);
    			$list = $command->queryAll();
    		}else{
    			$sq0="select * from djleafeel where sender='".$taskid."' limit ".$offset.",".$limit;
    			$command = $connection->createCommand($sq0);
    			$list = $command->queryAll();
    		}
    	}
    	$count=count($list);
    	for($i=0;$i<$count;$i++){
    		$sq0="select id from djleafeelprop where leafeelid='".$list[$i]["id"]."' and type=16";
    		$command = $connection->createCommand($sq0);
    		$commentlist = $command->queryAll();
    		$list[$i]["commentcount"]=count($commentlist);//评论数
    		 
    		$sq0="select id from djleafeelprop where leafeelid='".$list[$i]["id"]."' and type=17";
    		$command = $connection->createCommand($sq0);
    		$prop = $command->queryAll();
    		$list[$i]["propcount"]=count($prop); //心得赞
    	}
    	$return["list"]=$list;
    	return  $return;
    }
    public function edutaskfeeldetail($info){
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$feelid = isset($info["feelid"]) ? $info["feelid"] : null;
    	$limit = isset($info["limit"]) ? $info["limit"] : 15;//一页默认15条
    	$p = isset($info["p"]) ? $info["p"] : 1;  //第几页
    	$offset = ($p-1)*$limit;
    	$connection = Yii::$app->db;
    	$connection->open();
    	
    	$sq0="select * from djleafeel where id='".$feelid."'";
    	$command = $connection->createCommand($sq0);
    	$detail = $command->queryOne();
    	$return["detail"]=$detail;
    	
    	$sq0="select * from djleafeelprop where leafeelid='".$feelid."' and type=16 order by time desc limit ".$offset.",".$limit;
    	$command = $connection->createCommand($sq0);
    	$commentlist = $command->queryAll();  	
    	//$return["sql"]=$sq0;
    	$count=count($commentlist);
    	for($i=0;$i<$count;$i++){
    		$sq0="select * from djleafeelprop where commentid='".$commentlist[$i]["id"]."' and type=18";
    		$command = $connection->createCommand($sq0);
    		$commentprop = $command->queryAll();
    		$commentpropcount=count($commentprop);
    		$commentlist[$i]['commentprop']=$commentprop;
    		$commentlist[$i]['commentpropcount']=$commentpropcount;
    	}
    	$return["commentlist"]=$commentlist;
    	$sq0="select * from djleafeelprop where leafeelid='".$feelid."' and type=16";
    	$command = $connection->createCommand($sq0);
    	$commentcount = $command->queryAll();
    	$return["commentcount"]=count($commentcount);
    	$sq0="select * from djleafeelprop where leafeelid='".$feelid."' and type=17";
    	$command = $connection->createCommand($sq0);
    	$prop = $command->queryAll();
    	$return["prop"]=$prop;
    	$return["propcount"]=count($prop);
    	
    	return  $return;
    }
    public function edutaskfeelcomment($info){
    
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$feelid = isset($info["feelid"]) ? $info["feelid"] : null;
    	$content = isset($info["content"]) ? $info["content"] : null;
    	$connection = Yii::$app->db;
    	$connection->open();
    	$time=date("Y-m-d H:i:s",time());
    	$eid0 = explode("@", $uid);
    	$eid=$eid0[1];
    	//$sq0="SELECT name,orgid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$re = $command->queryOne();
    	//$orgid=$re["orgid"];
    	//$name=$re["name"];
    	$name="小花";
    	$orgid="8082";
    	$sq2="INSERT INTO djleafeelprop(leafeelid,type,time,senduser,sendname,content,orgid,eid) VALUES('$feelid','16','$time','$uid','$name','$content','$orgid','$eid')";
    	$command = $connection->createCommand($sq2);
    	$result=$command->execute();
    	if($result){
    	    $return['status'] = 1;
    	    $return['message'] = 'success';
    	}else{
    		$return['status'] = -1;
    		$return['message'] = 'fail';
    	}
    	return  $return;
    }
    public function edutaskfeelprop($info){
    
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$feelid = isset($info["feelid"]) ? $info["feelid"] : null;
    	$connection = Yii::$app->db;
    	$connection->open();
    	$time=date("Y-m-d H:i:s",time());
    	$eid0 = explode("@", $uid);
    	$eid=$eid0[1];
    	//$sq0="SELECT name,orgid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$re = $command->queryOne();
    	//$orgid=$re["orgid"];
    	//$name=$re["name"];
    	$name="小花";
    	$orgid="8082";

    	$sq0="select * from djleafeelprop where leafeelid='".$feelid."' and senduser='".$uid."' and type=17";
    	$command = $connection->createCommand($sq0);
    	$result0 = $command->queryOne();
    	if($result0){
    		$return['status'] = 1;
    		$return['message'] = 'again';
    	}else{
    	$sq2="INSERT INTO djleafeelprop(leafeelid,type,time,senduser,sendname,orgid,eid) VALUES('$feelid','17','$time','$uid','$name','$orgid','$eid')";
    	$command = $connection->createCommand($sq2);
    	$result=$command->execute();    	
    	if($result){
    	    $return['status'] = 1;
    	    $return['message'] = 'success';
    	}else{
    		$return['status'] = -1;
    		$return['message'] = 'fail';
    	}
    	}
    	return  $return;
    }
    public function edutaskcommentprop($info){
       
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$commentid = isset($info["commentid"]) ? $info["commentid"] : null;
    	$connection = Yii::$app->db;
    	$connection->open();
    	$time=date("Y-m-d H:i:s",time());
    	$eid0 = explode("@", $uid);
    	$eid=$eid0[1];
    	//$sq0="SELECT name,orgid FROM djwfmemparty where uid='".$uid."'";
    	//$command = $connection->createCommand($sq0);
    	//$re = $command->queryOne();
    	//$orgid=$re["orgid"];
    	//$name=$re["name"];
    	$name="小花";
    	$orgid="8082";
    	$sq0="select * from djleafeelprop where commentid='".$commentid."' and senduser='".$uid."' and type=18";
    	$command = $connection->createCommand($sq0);
    	$result0 = $command->queryOne();
    	if($result0){
    		$return['status'] = 1;
    		$return['message'] = 'again';
    	}else{
    	$sq2="INSERT INTO djleafeelprop(commentid,type,time,senduser,sendname,orgid,eid) VALUES('$commentid','18','$time','$uid','$name','$orgid','$eid')";
    	$command = $connection->createCommand($sq2);
    	$result=$command->execute();
    	if($result){
    	    $return['status'] = 1;
    	    $return['message'] = 'success';
    	}else{
    		$return['status'] = -1;
    		$return['message'] = 'fail';
    	}
    	}
    	return  $return;
    }
    public function edutaskcomplete($info){
    	 
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$taskid = isset($info["taskid"]) ? $info["taskid"] : null;
    	$connection = Yii::$app->db;
    	$connection->open();
    
    	$sq0="select isend from djleacont where id='".$taskid."'";
    	$command = $connection->createCommand($sq0);
    	$result0 = $command->queryOne();
    	if($result0["isend"]==1){
    		$return['status'] = 1;
    		$return['message'] = 'again';
    	}else{
    		$sq0="UPDATE djleacont SET isend=1 WHERE id='".$taskid."'";
    		$command = $connection->createCommand($sq0);
    		$result=$command->execute();
    		if($result){
    			$return['status'] = 1;
    			$return['message'] = 'success';
    		}else{
    			$return['status'] = -1;
    			$return['message'] = 'fail';
    		}
    	}
    	return  $return;
    }
    public function edutaskfeelrecommend($info){
    
    	$info = json_decode($info,true);
    	//$info='{"uid":"7@3","taskid":"2","title":"xxx","content":"2"}';
    	$uid = isset($info["uid"]) ? $info["uid"] : null;
    	$feelid = isset($info["feelid"]) ? $info["feelid"] : null;
    	$connection = Yii::$app->db;
    	$connection->open();
    
    	$sq0="select * from djleafeel where id='".$feelid."'";
    	$command = $connection->createCommand($sq0);
    	$result0 = $command->queryOne();
    	if($result0["top"]==1){
    		$return['status'] = 1;
    		$return['message'] = 'again';
    	}else{
    		$sq0="UPDATE djleafeel SET top=1 WHERE id='".$feelid."'";
    		$command = $connection->createCommand($sq0);
    		$result=$command->execute();
    		if($result){
    			$return['status'] = 1;
    			$return['message'] = 'success';
    		}else{
    			$return['status'] = -1;
    			$return['message'] = 'fail';
    		}
    	}
    	return  $return;
    }
}
	