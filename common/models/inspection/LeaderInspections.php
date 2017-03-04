<?php

namespace common\models\inspection;
// use common\models\ActionEs;
use common\models\IctWebService;
// use backend\models\UserBackend;
use Yii;

use yii\web\Response;

/**
 *
 * @author fang
 * @tutorial 学习教育轻应用中的学习测验类
 */

header('Access-Control-Allow-Origin:*');
class LeaderInspections extends \common\models\WebService {

	/**
	 *
	 * @tutorial 构造函数，调用父类init()函数初始化数据，注册接口
	 */

	function __construct() {
		parent::init ();
		parent::registerApi ( "LeaderInspection.plan.complete", "planComplete", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "LeaderInspection.party.member", "partyMember", [
				"info" => [
						'type' => 'string'
				]
		], false );
	}
	public $enableCsrfValidation = false;
	/**
	 * 各支部学习计划完成情况
	 *
	 * @return [type] [description]
	 */
	public function planComplete($info) {
		$info = json_decode ( $info, true );

		// return $info;
		Yii::$app->response->format = Response::FORMAT_JSON;
		// $paperid = Yii::$app->request->get('paperid'); //试卷id
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		$return['status'] = "0"; //status=0 表示正确返回
		$return['message'] = "";

	if(!$uid){
    		$return['status'] = -1;
    		$return['message'] = '无效用户，uid为空';
    		return $return;
    	}

		$db = \Yii::$app->db;
		$db->open();

		$organ =null;
		$organInfo = null;
		$organParent = null;
		$organChild = null;

		$sql = "";
		$command = "";
		$sql = "select partyoid from djpartyuser where uid = '".$uid."'";
		$command = $db->createCommand($sql);
		$oid = $command->queryOne();

		if(!$oid){
			$return['status'] = -1;
			$return['message'] = '无效用户，无对应的组织信息';
			return $return;
		}

// 		var_dump($oid);
// 		var_dump($oid['partyoid']);
// 		die('3');
		//获取当前用户对应的党组织信息
		$organInfo = $this->getPartyParentOid($oid['partyoid']);

		if($organInfo['state'] == '-1'){
			$return['status'] = -1;
			$return['message'] = '无id='.$organInfo['organ'].'的党组织信息';
			return $return;
		}
		if($organInfo['state'] == '0'){
			$organParent = $organInfo['organ'];
		}

		//查询支部信息
		$sql = "";
		$command ="";
		$sql = "select oid,name from organization where parentID = '".$organParent['oid']."'"; //获取党组织信息
		$command = $db->createCommand($sql);
		$organChild = $command->queryAll();
// 		if(!$organChild){
// 			$return['status'] = -1;
// 			$return['message'] = '无组织信息';
// 			return $return;
// 		}

// 		$organChild[count($organChild)] = $organParent; //将上级党委加入支部列表


/**********************v0 begin*********************************/

// 		$sql = "";
// 		$command ="";
// 		$sql = "select oid,name from organization where  level=2 and orgtype='1'"; //获取党组织信息
// 		$command = $db->createCommand($sql);
// 		$organ = $command->queryAll();
// 		if(!$organ){
// 			$return['status'] = -1;
// 			$return['message'] = '无组织信息';
// 			return $return;
// 		}

/**********************v0 end*********************************/
		$organ = $organChild;
		//获取党组织对应学习计划信息
		for($j=0;$j<count($organ);$j++){

			$sql = "";
			$command ="";
			$sql = "select id,title,partyoid,time from djleaplan where partyoid = '".$organ[$j]['oid']."' and time like '%".date('Y')."%'";
			$command = $db->createCommand($sql);
			$plans = $command->queryAll();

			if(!$plans){
				$organ[$j]['plans']['status'] = "-1";
				$organ[$j]['plans']['message'] = "无计划";
				continue;
			}
			$plans['status'] = "0";

			//统计个学习计划完成情况
		for($i=0;$i<count($plans)-1;$i++){
			$sql = "";
			$command ="";
			$sql = "select * from djleacont where materid = '".$plans[$i]['id']."'" ;
			$command = $db->createCommand($sql);
			$countAll = $command->query()->count();

			if(!$countAll){
				$plans[$i]['status']="-1";
				$plans[$i]['message'] = "无任务";
				continue;
			}
			$plans[$i]['status']="0";

			$sql = "";
			$command ="";
			$sql = "select * from djleacont where isend = '1' and materid = '".$plans[$i]['id']."'";
			$command = $db->createCommand($sql);
			$countComplete = $command->query()->count();

			$plans[$i]['completePercent'] =ceil(($countComplete/$countAll)*100);
		}
		$organ[$j]['plans'] = $plans;
		}
		$return['message'] = $organ;
		return $return;
	}
	/**
	 * 各支部党员人数
	 *
	 * @return [type] [description]
	 */
	public function partyMember($info) {

		Yii::$app->response->format = Response::FORMAT_JSON;
		$info = json_decode ( $info, true );
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		$return['status'] = "0";
		$return['message'] = "";
		if(!$uid){
			$return['status'] = "-1";
			$return['message'] = "无效用户";
		}

// 		$db = \Yii::$app->db;
// 		$db->open();

// 		$sql = "";
// 		$command = "";
// 		$sql = "select oid,name from organization where level=2 and orgtype='1'";
// // 		$sql = "select name,count(*) from organization a,memberlist b where a.oid=b.oid and b.sex = 0 group by oid";
// 		$command =$db->createCommand($sql);
// 		$organ = $command->queryAll();

// 		if(!$organ){
// 			$return['status'] = "-1";
// 			$return['message'] = "无组织信息";
// 		}


		$db = \Yii::$app->db;
		$db->open();

		$organ =null;
		$organInfo = null;
		$organParent = null;
		$organChild = null;

		$sql = "";
		$command = "";
		$sql = "select partyoid from djpartyuser where uid = '".$uid."'";
		$command = $db->createCommand($sql);
		$oid = $command->queryOne();

		if(!$oid){
			$return['status'] = -1;
			$return['message'] = '无效用户，无对应的组织信息';
			return $return;
		}

		// 		var_dump($oid);
		// 		var_dump($oid['partyoid']);
		// 		die('3');
		//获取当前用户对应的党组织信息
		$organInfo = $this->getPartyParentOid($oid['partyoid']);

		if($organInfo['state'] == '-1'){
			$return['status'] = -1;
			$return['message'] = '无id='.$organInfo['organ'].'的党组织信息';
			return $return;
		}
		if($organInfo['state'] == '0'){
			$organParent = $organInfo['organ'];
		}

		//查询支部信息
		$sql = "";
		$command ="";
		$sql = "select oid,name from organization where parentID = '".$organParent['oid']."'"; //获取党组织信息
		$command = $db->createCommand($sql);
		$organChild = $command->queryAll();
// 		if(!$organChild){
// 			$return['status'] = -1;
// 			$return['message'] = '无组织信息';
// 			return $return;
// 		}

// 		$organChild[count($organChild)] = $organParent;

		$organ = $organChild;
		//查询党委和各支部人数
		for($i=0;$i<count($organ);$i++){

			$sql = "";
			$command = "";
			$sql = "select count(*) as count from djpartymem_view where partyoid = '".$organ[$i]['oid']."' and sex = 1 and istrue = 1"; //查询女性人数
			$command = $db->createCommand($sql);
			$girls = $command->queryOne();

// 			var_dump($girls);
// 			die('1');

			$sql = "";
			$command = "";
			$sql = "select count(*) as count  from djpartymem_view where partyoid = '".$organ[$i]['oid']."' and sex = 0 and istrue = 1";//查询男性人数
			$command = $db->createCommand($sql);
			$boys = $command->queryOne();

			$organ[$i]['girls'] = $girls['count'];
			$organ[$i]['boys'] = $boys['count'];
		}

		$return ['message'] = $organ;
		return $return;
	}

	//根据支部oid查找党委oid
	 function getPartyParentOid($oid){

		$connection = Yii::$app->db;
		$connection->open ();

		$sql = "select * from organization where oid='" . $oid . "'";
		$sqlCommand = $connection->createCommand ( $sql );
		$result = $sqlCommand->queryOne();
		if (!$result) {
			return array (
					'state' => - 1,
					'organ' => $oid
			);
		}
		if ($result ['level'] == '2'&& $result ['orgtype'] == '1') {
			return array (
					'state' => 0,
					'organ' => $result
			);
		} else {
			return $this->getPartyParentOid($result['parentID']);
		}

	}
}
