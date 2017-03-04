<?php

namespace common\models\lea;
// use common\models\ActionEs;
use common\models\IctWebService;
// use backend\models\UserBackend;
use Yii;
use yii\base\Object;

/**
 *
 * @author fang
 * @tutorial 学习教育轻应用中的资料汇总类，访问资料汇总列表和具体的资料汇总信息
 */
class Leamaterials extends \common\models\WebService {

	/**
	 *
	 * @tutorial 构造函数，调用父类init()函数初始化数据，注册接口
	 */
	function __construct() {
		parent::init ();
		parent::registerApi ( "Leamaterial.list.get", "getLeamateriallist", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leamaterial.search.get", "getLeamaterialsearch", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leamaterial.morelist.get", "getLeamaterialmorelist", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leamaterial.data.get", "getLeamaterialdata", [
				"info" => [
						'type' => 'string'
				]
		], false );
	}

	/**
	 *
	 * @param unknown $info
	 * @param $uid 用户uid
	 * @param $id 应该是对应的学习计划id
	 * @return 返回学习资料的列表
	 */
	public function getLeamateriallist($info) {
		// $auth = new AuthToken();
		// $auth->authTokenSession(); //fyq
		// $id=\Yii::$app->request->get('id');
		// $uid=\yii::$app->request->get('uid');
		$info = json_decode ( $info, true ); // 将json字符串转换为数组--byfyq

		$id = isset ( $info ["id"] ) ? $info ["id"] : "1";
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$planid = isset ( $info ['planid'] ) ? $info ['planid'] : "2"; // 学习计划id
		$p = isset ( $info ['p'] ) ? $info ['p'] : "1";

		\Yii::$app->session ['user.uid'] = $uid;
		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];
		$limit = 15;
		$offset = ($p - 1) * $limit;

		// $uid =\Yii::$app->session['user.uid'];
		$connection = Yii::$app->db;
		$connection->open ();

		$eid = explode ( '@', $uid );
		$listtop = null;
		$counttop = null;
		// 查询置顶的记录
		// $condition="select * from djleamaterial where top=1 and eid='".$eid[1]."' and planid = '".$planid."' order by time desc limit 3";
		// // die($condition);
		// // $condition="select * from djdongtai where top=1 and eid='".$eid[1]."'order by time desc limit 3";
		// $result = $connection->createCommand($condition);
		// $listtop= $result->queryAll();
		// $counttop=count($listtop);
		// if(empty($listtop)){
		// $listtop[0]['pic']="../web/img/banner1.png";
		// $arr=getimagesize($listtop[0]['pic']);
		// //$arr[0] //宽度$arr[1] //高度
		// if($arr[0]/$arr[1]>1.789){$listtop[0]['pic2']="1";}else{$listtop[0]['pic2']="2";}
		// $listtop[0]['id']="";
		// }else{
		// for($i=0;$i<$counttop;$i++){
		// $UAvator=$listtop[$i]['pic'];
		// $arr=getimagesize($UAvator);
		// //$arr[0] //宽度$arr[1] //高度
		// if($arr[0]/$arr[1]>1.789){$listtop[$i]['pic2']="1";}else{$listtop[$i]['pic2']="2";}
		// $listtop[$i]['content'] = null;
		// }
		// }
		// $a=$arr[0]/$arr[1];
		// print_r($a);exit;
		$condition = "select * from djleamaterial where top=0 and eid='" . $eid [1] . "' and planid= '" . $planid . "' order by time desc limit " . $limit . " offset " . $offset;
		// die($condition);
		// $condition="select * from djdongtai where top=0 and eid='".$eid[1]."'order by time desc limit 15";
		$result = $connection->createCommand ( $condition );
		$list = $result->queryAll ();
		$count = count ( $list );
		for($i = 0; $i < $count; $i ++) {
			$UAvator = $list [$i] ['pic'];
			if ($UAvator) {
			} else {
				$list [$i] ['pic'] = "../web/img/pic2.png";
			}
			$arr = getimagesize ( $UAvator );
			// $arr[0] //宽度$arr[1] //高度
			if ($arr [0] / $arr [1] > 1.789) {
				$list [$i] ['pic2'] = "1";
			} else {
				$list [$i] ['pic2'] = "2";
			}
			// print_r($list[$i]['pic2']);exit;
			$a = $list [$i] ['content'];
			if (strstr ( $a, "divvideocontent" )) {
				$list [$i] ['video'] = "1";
			} else {
				$list [$i] ['video'] = "0";
			}
			$list [$i] ['content'] = null;
			$list [$i] ['ytime'] = date ( "Y-m-d", strtotime ( $list [$i] ['time'] ) );
			$list [$i] ['htime'] = date ( "H:i:s", strtotime ( $list [$i] ['time'] ) );
		}
		\Yii::$app->session ['public_count'] = $count;
		$return ['d'] = array (
				'list' => $list,
				'listtop' => $listtop,
				'count' => $count,
				'counttop' => $counttop
		);

		return $return;
	}

	/**
	 *
	 * @param unknown $info
	 * @param $searchtitle 搜索关键字
	 * @return 返回搜索出来的学习资料列表
	 */
	public function getLeamaterialsearch($info) {

		// $searchtitle=\yii::$app->request->get('searchtitle');
		$info = json_decode ( $info, true );

		$searchtitle = isset ( $info ["searchtitle"] ) ? $info ["searchtitle"] : null;
		$planid = isset ( $info ['planid'] ) ? $info ['planid'] : null; // 学习计划id
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		$connection = Yii::$app->db;
		$connection->open (); // 初始化数据库

		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];

		$eid = explode ( '@', $uid );
		$sq0 = "select * from djleamaterial where top=0 and eid='" . $eid [1] . "' and planid= '" . $planid . "'and (title like '%" . $searchtitle . "%' or keywords like '%" . $searchtitle . "%') ORDER BY time desc LIMIT 15";
		// $sq0="select * from djdongtai where top=0 and eid='".$eid[1]."'and (title like '%".$searchtitle."%' or keywords like '%".$searchtitle."%') ORDER BY time desc LIMIT 15";
		$command = $connection->createCommand ( $sq0 );
		$state = $command->queryAll ();
		$count = count ( $state );
		for($i = 0; $i < $count; $i ++) {
			$UAvator = $state [$i] ['pic'];
			if ($UAvator) {
			} else {
				$state [$i] ['pic'] = "../web/img/pic2.png";
			}

			$arr = getimagesize ( $UAvator );
			if ($arr [0] / $arr [1] > 1.789) {
				$state [$i] ['pic2'] = "1";
			} else {
				$state [$i] ['pic2'] = "2";
			}
			// file_put_contents("D:\\wt1.txt","sum:".json_encode($state)."\n", FILE_APPEND);
			$a = $state [$i] ['content'];
			if (strstr ( $a, "divvideocontent" )) {
				$state [$i] ['video'] = "1";
			} else {
				$state [$i] ['video'] = "0";
			}
			$state [$i] ['content'] = null;
			$state [$i] ['ytime'] = date ( "Y-m-d", strtotime ( $state [$i] ['time'] ) );
			$state [$i] ['htime'] = date ( "H:i:s", strtotime ( $state [$i] ['time'] ) );
		}
		\Yii::$app->session ['search_count'] = $count;
		// file_put_contents("log.log","num:". $sq2."\n", FILE_APPEND);

		$return ['d'] = $state;
		return $return;
	}

	/**
	 *
	 * @param unknown $info
	 * @return 返回下拉加载出的学习资料列表
	 */
	public function getLeamaterialmorelist($info) {

		// $uid =\Yii::$app->session['user.uid'];
		// \Yii::$app->session['public_count']="5";

		// $searchcontent=\yii::$app->request->get('searchcontent');
		// $id=\yii::$app->request->get('id');
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$searchcontent = isset ( $info ['searchcontent'] ) ? $info ['searchcontente'] : null;
		$id = isset ( $info ['id'] ) ? $info ['id'] : null;
		$planid = isset ( $info ['planid'] ) ? $info ['planid'] : null; // 学习计划id

		$connection = Yii::$app->db;
		$connection->open (); // 初始化数据库
		                     // $uid =\Yii::$app->session['user.uid'];
		$eid = explode ( '@', $uid );
		$public_count = \Yii::$app->session ['public_count'];
		if (strlen ( $searchcontent ) > 0) {
			$search_count = \Yii::$app->session ['search_count'];
			$sq0 = "select * from djleamaterial where top=0 and eid='" . $eid [1] . "' and planid = '" . $planid . "' and title like ('%" . $searchcontent . "%' or keywords like '%" . $searchcontent . "%') ORDER BY time desc LIMIT " . $search_count . ",15";
			$search_count = $search_count + 15;
			\Yii::$app->session ['search_count'] = $search_count;
		} else {
			$public_count = \Yii::$app->session ['public_count'];
			$sq0 = "select * from djleamaterial where top=0 and eid='" . $eid [1] . "'ORDER BY time desc LIMIT " . $public_count . ",15"; // 从第$public_count+1条开始取15条数据。
			$public_count = $public_count + 15;
			\Yii::$app->session ['public_count'] = $public_count;
		}
		$command = $connection->createCommand ( $sq0 );
		$news = $command->queryAll ();

		// file_put_contents("D:\\wt1.txt","sum:".$sql."\n", FILE_APPEND);
		\Yii::$app->session ['searchcontent'] = $searchcontent;
		$count = count ( $news );
		for($i = 0; $i < $count; $i ++) {
			$UAvator = $news [$i] ['pic'];
			if ($UAvator) {
			} else {
				$news [$i] ['pic'] = "../web/img/pic2.png";
			}
			// file_put_contents("D:\\wt1.txt","sum:".json_encode($news)."\n", FILE_APPEND);
			$arr = getimagesize ( $UAvator );
			if ($arr [0] / $arr [1] > 1.789) {
				$news [$i] ['pic2'] = "1";
			} else {
				$news [$i] ['pic2'] = "2";
			}

			$a = $news [$i] ['content'];
			if (strstr ( $a, "divvideocontent" )) {
				$news [$i] ['video'] = "1";
			} else {
				$news [$i] ['video'] = "0";
			}
			$news [$i] ['time'] = date ( "Y-m-d", strtotime ( $news [$i] ['time'] ) );
		}
		$return = $news;
		return $return;
		// echo json_encode($return);
		exit ();
	}

	/**
	 *
	 * @param unknown $info
	 * @param $id 学习资料条目的id
	 * @return 根据学习资料id返回对应学习资料的详细数据
	 */
	public function getLeamaterialdata($info) {
		// $auth = new AuthToken();
		// $auth->authTokenSession();
		// $id=\Yii::$app->request->get('id');
		$info = json_decode ( $info, true ); // 解析json串

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$id = isset ( $info ['id'] ) ? $info ['id'] : null;

		// $uid="22@33";
		// $uid=\Yii::$app->session['user.uid'];
		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];

		// if(!$uid){
		// $return['c'] = -1;
		// $return['m'] = '';
		// return $return;
		// }
		$connection = Yii::$app->db;
		$connection->open ();

		$condition = "select * from djleamaterial where id='" . $id . "'";
		$result = $connection->createCommand ( $condition );
		$inte = $result->queryOne ();
		$inte ['content'] = str_replace ( 'src="http://182.92.96.36', 'src="https://182.92.96.36', $inte ['content'] );

		$sq0 = "UPDATE djleamaterial SET readd=readd+1 WHERE id='" . $id . "'";
		$command = $connection->createCommand ( $sq0 );
		$command->execute ();

		$return ['d'] = [
				'content' => $inte,
				'id' => $id
		]
		;
		return $return;
	}
	public function getEduList($info) {

		// Yii::$app->response->format = Response::FORMAT_JSON;
		// $info='{"uid":"","limit":1,"offset":1,"id":"2","detail":"1"}';
		$info = json_decode ( $info, true );
		// $limit = isset($info["limit"]) ? $info["limit"] : 10;
		$p = isset ( $info ["p"] ) ? $info ["offset"] : null;
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		if (! $uid) {
			$return ['c'] = - 1;
			$return ['m'] = '无效用户';
			return $return;
		}
		// file_put_contents("D://wt.txt","sql:".$info."\n", FILE_APPEND);
		$eid = explode ( "@", $uid );
		Yii::$app->session ['user.id'] = $uid;
		Yii::$app->session ['user.eid'] = $eid [1];
		$connection = Yii::$app->db;
		$connection->open ();
		// $sq0="SELECT partyoid FROM djwfmemparty where uid='".$uid."'";
		// $command = $connection->createCommand($sq0);
		// $partyoid0 = $command->queryOne();
		// $partyoid=$partyoid0["partyoid"];
		$partyoid = "8067";
		Yii::$app->session ['user.partyoid'] = $partyoid;
		if (! $partyoid) {
			$return ['c'] = - 1;
			$return ['m'] = '没有党支部';
			return $return;
		}
		$limit = 15;
		$offset = ($p - 1) * $limit;
		$time = date ( "Y-m-d H:i:s", time () );
		// return $time;
		if ($p) {
			$sq0 = "select * from djleaplan where starttime<'" . $time . "' and endtime>'" . $time . "' limit " . $offset . "," . $limit; // 正在进行
			$command = $connection->createCommand ( $sq0 );
			$list1 = $command->queryAll ();
			$count1 = count ( $list1 );
			if ($count1 < $limit) {
				$limit2 = $limit - $count1;
				$sq0 = "select * from djleaplan where starttime>'" . $time . "'limit " . $offset . "," . $limit2; // 还未开始
				$command = $connection->createCommand ( $sq0 );
				$list2 = $command->queryAll ();
				$count2 = count ( $list2 );
				if ($count1 + $count2 < $limit) {
					$limit3 = $limit - $count1 - $count2;
					$sq0 = "select * from djleaplan where endtime<'" . $time . "'limit " . $offset . "," . $limit3; // 已结束
					$command = $connection->createCommand ( $sq0 );
					$list3 = $command->queryAll ();
				}
			}
		} else {
			$sq0 = "select * from djleaplan where starttime<'" . $time . "' and endtime>'" . $time . "'"; // 正在进行
			$command = $connection->createCommand ( $sq0 );
			$list1 = $command->queryAll ();
			$sq0 = "select * from djleaplan where starttime>'" . $time . "'"; // 还未开始
			$command = $connection->createCommand ( $sq0 );
			$list2 = $command->queryAll ();
			$sq0 = "select * from djleaplan where endtime<'" . $time . "'"; // 已结束
			$command = $connection->createCommand ( $sq0 );
			$list3 = $command->queryAll ();
		}
		// $sq0="select * from (select * from djleaplan d1 where starttime<'".$time."' and endtime>'".$time."') union all ".
		// "select * from (select * from djleaplan d2 where starttime>'".$time."') union all ".
		// "select * from (select * from djleaplan d3 where endtime<'".$time."')";

		// $sq0="select * from djleaplan where eid='".$eid[1]."' and partyoid='".$partyoid."' and ORDER BY starttime<'".$time."' desc LIMIT 0,".$search_count."";
		$list = array_merge ( $list1, $list2, $list3 );

		$return ['list'] = $list;
		// print_r($list);exit;
		return $return;

		$model = new ActionEs ();
		$return = $model->getEsinfoList($info);

        return  $return;
    }
}
