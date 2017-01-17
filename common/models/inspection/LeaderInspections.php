<?php

namespace common\models\inspection;
// use common\models\ActionEs;
use common\models\lea\IctWebService;
// use backend\models\UserBackend;
use Yii;
// use yii\base\Object;

// use yii\filters\AccessControl;
// use yii\web\Controller;
// use yii\filters\VerbFilter;
// use common\models\LoginForm;
// use common\models\lea\lea\ContactForm;
use common\models\lea\Memberlist;
use common\models\lea\DjleaquestionBank;
use common\models\lea\DjleaquestionList;
use common\models\lea\DjleaquestionBanklist;
use common\models\lea\DjleaquestionAnswer;
use yii\web\Response;
// use common\models\Curl;
// use common\models\lea\Organization;

/**
 *
 * @author fang
 * @tutorial 学习教育轻应用中的学习测验类
 */
class LeaderInspections extends \common\models\WebService {

	/**
	 *
	 * @tutorial 构造函数，调用父类init()函数初始化数据，注册接口
	 */
	// header('Access-Control-Allow-Origin:*');
	function __construct() {
		parent::init ();
		parent::registerApi ( "Leaquestion.list.get", "getLeaquestionlist", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.info.get", "getLeaquestioninfo", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.topic.get", "getLeaquestiontopic", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.submit.get", "getLeaquestionsubmit", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.false.get", "getLeaquestionfalse", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.top.get", "getLeaquestiontop", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.end.get", "getLeaquestionend", [
				"info" => [
						'type' => 'string'
				]
		], false );

		parent::registerApi ( "Leaquestion.search.get", "getLeaquestionsearch", [
				"info" => [
						'type' => 'string'
				]
		], false );
	}
	public $enableCsrfValidation = false;
	/**
	 * 交卷
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestionend($info) {
		$info = json_decode ( $info, true );

		// return $info;
		Yii::$app->response->format = Response::FORMAT_JSON;
		// $paperid = Yii::$app->request->get('paperid'); //试卷id
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$paperid = isset ( $info ['paperid'] ) ? $info ['paperid'] : null; // 试卷id

		// $uid = Yii::$app->session['user.id'];
		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];

		$testInfo = DjleaquestionList::findOne ( $paperid );
		if ($testInfo ['finishflag'] == 1) {
			$return ['c'] = - 2;
			$return ['m'] = '重复交卷';
			return $return;
		}

		$correctNum = DjleaquestionAnswer::find ()->where ( [
				'paperID' => $paperid,
				'answerCorrect' => 0
		] )->count ();
		$testInfo->correctNum = $correctNum;
		$testInfo->falseNuM = $testInfo->questionNum - $correctNum;
		$testInfo->finishflag = 1;

		if (! $testInfo->save ()) {
			$return ['c'] = - 1;
			$return ['m'] = '操作失败';
		}
		$answerList = explode ( ',', $testInfo->questions );
		$answerCount = DjleaquestionAnswer::find ()->where ( [
				'paperID' => $paperid
		] )->count ();
		for($i = $answerCount; $i < $testInfo->questionNum; $i ++) {
			$questionanswer = new DjleaquestionAnswer ();
			$questionanswer->uid = ( string ) $uid;
			$questionanswer->questionid = ( string ) $answerList [$i];
			$questionanswer->answer = "0";
			$questionanswer->answerCorrect = '1';
			$questionanswer->paperID = $paperid;
			if (! $questionanswer->save ()) {
				Yii::info ( $answer );
				$return ['c'] = - 1;
				$return ['m'] = '数据插入失败';
			}
		}
		$return ['d'] ['finishflag'] = 1;
		$return ['d'] ['correctNum'] = $testInfo->correctNum;
		$return ['d'] ['falseNuM'] = $testInfo->falseNuM;
		$return ['d'] ['questionNum'] = $testInfo->questionNum;
		return $return;
	}
	/**
	 * 获取排名
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestiontop($info) {

		// die($info);
		$info = json_decode ( $info, true );
		Yii::$app->response->format = Response::FORMAT_JSON;
		// $bankID = Yii::$app->request->get('id'); //专题id
		// $p = Yii::$app->request->get('p',1); //专题id

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$bankID = isset ( $info ["id"] ) ? $info ["id"] : null; // 专题id
		$p = isset ( $info ["p"] ) ? $info ["p"] : "1"; // 页码

		$limit = 15;
		$offset = ($p - 1) * $limit;
		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];
		// return $return;
		$connection = Yii::$app->db;
		$connection->open ();
		// $sql="select * from (SELECT distinct uid,`correctNum` FROM `djquestion_list` WHERE bankID='$bankID' and finishflag='1' order by `correctNum` desc) t group by t.uid order by correctNum desc limit 0,10";
		$sql = "select * from (SELECT distinct uid,`correctNum` FROM `djleaquestion_list` WHERE bankID='$bankID' and finishflag='1'   order by  `correctNum` desc) t group by t.uid order by correctNum desc";

		// $top == DjleaquestionList::findBySql($sql);
		$command = $connection->createCommand ( $sql );
		$top = $command->queryAll ();
		// return $top;
		$count0 = count ( $top );
		if ($count0 > 100) {
			$top = "";
			$sql = "select * from (SELECT distinct uid,`correctNum` FROM `djleaquestion_list` WHERE bankID='$bankID' and finishflag='1'   order by  `correctNum` desc) t group by t.uid order by correctNum desc limit 0,100";
			// $top == DjleaquestionList::findBySql($sql);
			$command = $connection->createCommand ( $sql );
			$top = $command->queryAll ();
		}

		$count = DjleaquestionList::find ()->where ( [
				'bankID' => $bankID
		] )->groupBy ( [
				'uid'
		] )->count ();
		// return $top;
		foreach ( $top as $key => $value ) {
			$userInfo = Memberlist::findOne ( [
					'guid' => $value ['uid']
			] ); // 返回值为数组类型
			$top [$key] ['name'] = $userInfo ['name'];
			$uids [] = $value ['uid'];
		}
		// return $top;
		$ws = new IctWebService ();
		// var_dump($uids);
		$photo = $ws->getMemberPhoto ( $uids );
		// var_dump($photo);
		// die('3');
		Yii::info ( $photo );

		foreach ( $top as $key => $value ) {
			$top [$key] ['name'] = $value ['name'];
			$top [$key] ['photo'] = isset ( $photo [$value ['uid']] ) ? $photo [$value ['uid']] : " ";
			$top [$key] ['top'] = $offset + 1 + $key;
			$top [$key] ['count'] = $count;
		}
		$return ['d'] = $top;
		return $return;
	}
	/**
	 * 查看错题
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestionfalse($info) {
		$info = json_decode ( $info, true );
		Yii::$app->response->format = Response::FORMAT_JSON;
		$return ['c'] = 0;
		$return ['m'] = '';
		$return ['d'] = [ ];
		// $paperid = Yii::$app->request->get('paperid'); //试卷id
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$paperid = isset ( $info ["paperid"] ) ? $info ["paperid"] : null; // 试卷id

		if (! $paperid) {
			// $bankId = Yii::$app->request->get('bankId');
			$bankId = isset ( $info ["bankId"] ) ? $info ["bankId"] : null;
			$paperid = DjleaquestionList::find ()->where ( [
					'bankID' => $bankId,
					'finishflag' => 1
			] )->max ( 'paperid' ); // 选取最近抽到的试卷 --by fyq
		}
		$falseList = DjleaquestionAnswer::find ()->where ( [
				'paperID' => $paperid,
				'answerCorrect' => 1
		] )->asArray ()->all ();
		$info ['count'] = count ( $falseList );
		foreach ( $falseList as $key => $value ) {
			$info ['list'] [$key] ['info'] = DjleaquestionBanklist::findOne ( $value ['questionid'] );
			$info ['list'] [$key] ['answer'] = $value ['answer'];
		}
		$return ['d'] = $info;
		return $return;
	}
	/**
	 * 提交答题
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestionsubmit($info) {
		$info = json_decode ( $info, true );
		Yii::$app->response->format = Response::FORMAT_JSON;
		// $testId = Yii::$app->request->post('paperid'); //试题id
		// $topicId = Yii::$app->request->post('questionid'); //题目id
		// $answer = Yii::$app->request->post('answer'); //答案

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$testId = isset ( $info ['paperid'] ) ? $info ['paperid'] : null; // 试题id
		$topicId = isset ( $info ['questionid'] ) ? $info ['questionid'] : null; // 题目id
		$answer = isset ( $info ['answer'] ) ? $info ['answer'] : null; // 答案

		// $uid = Yii::$app->session['user.id'];
		$return ['c'] = 0;
		$return ['m'] = '';
		if (DjleaquestionAnswer::findOne ( [
				'questionid' => $topicId,
				'paperID' => $testId
		] )) {
			$return ['c'] = - 3;
			$return ['m'] = '题目答案重复提交';
			return $return;
		}
		$topicInof = DjleaquestionBanklist::findOne ( $topicId );
		if (! $topicInof) {
			$return ['c'] = - 2;
			$return ['m'] = '无效的题目ID';
			return $return;
		}
		$questionanswer = new DjleaquestionAnswer ();
		$questionanswer->uid = ( string ) $uid;
		$questionanswer->questionid = ( string ) $topicId;
		$questionanswer->answer = ( string ) $answer;
		$questionanswer->answerCorrect = ( string ) (($topicInof->answerCorrect == $answer) ? 0 : 1);
		$questionanswer->paperID = $testId;
		if (! $questionanswer->save ()) {
			Yii::info ( $questionanswer );
			Yii::info ( $answer );
			$return ['c'] = - 1;
			$return ['m'] = '数据插入失败 ' . array_values ( $questionanswer->getFirstErrors () ) [0];
		}
		$testInfo = DjleaquestionList::findOne ( $testId );
		$answerCount = DjleaquestionAnswer::find ()->where ( [
				'paperID' => $testId
		] )->count ();

		$return ['d'] ['finishflag'] = 0;
		$return ['d'] ['correctNum'] = 0;
		$return ['d'] ['falseNuM'] = 0;
		$return ['d'] ['questionNum'] = 0;
		if ($answerCount >= $testInfo->questionNum) {
			$correctNum = DjleaquestionAnswer::find ()->where ( [
					'paperID' => $testId,
					'answerCorrect' => 0
			] )->count ();
			$testInfo->correctNum = $correctNum;
			$testInfo->falseNuM = $testInfo->questionNum - $correctNum;
			$testInfo->finishflag = 1;
			// $testInfo->save();
			$return ['d'] ['finishflag'] = 1;
			$return ['d'] ['correctNum'] = $testInfo->correctNum;
			$return ['d'] ['falseNuM'] = $testInfo->falseNuM;
			$return ['d'] ['questionNum'] = $testInfo->questionNum;
		}
		return $return;
	}
	/**
	 * 首页试题列表
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestionlist($info) {

		// return $info;
		$info = json_decode ( $info, true );

		Yii::$app->response->format = Response::FORMAT_JSON;
		// $uid = Yii::$app->request->get('uid');
		// $p = Yii::$app->request->get('p',1);

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		$planid = isset ( $info ['planid'] ) ? $info ['planid'] : '1'; // 学习计划id
		$p = isset ( $info ['p'] ) ? $info ['p'] : "1"; // 资料列表页码

		$return ['c'] = 0;
		$return ['m'] = '';
		// die($uid);
		if (! $uid) {
			$return ['c'] = - 1;
			$return ['m'] = '无效用户';
			return $return;
		}
		$eid = explode ( "@", $uid );
		Yii::$app->session ['user.id'] = $uid;
		Yii::$app->session ['user.eid'] = $eid [1];
		$limit = 15;
		$offset = ($p - 1) * $limit;

		// 答题总人数
		// $answerList = DjleaquestionList::find()->where(['bankID'=>$id])->groupBy(['uid'])->asArray()->all();

		$oid = Memberlist::findOne ( [
				'guid' => $uid
		] );

		if ($oid) {
			$list = DjleaquestionBank::find ()->where ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'bankflag' => '0',
					'planid' => $planid
			] )->orWhere ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'orgid' => $oid->officeAddress,
					'plainid' => $planid
			] )->limit ( $limit )->offset ( $offset )->asArray ()->all ();
			$count = DjleaquestionBank::find ()->where ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'bankflag' => '0',
					'planid' => $planid
			] )->orWhere ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'orgid' => $oid->officeAddress,
					'plainid' => $planid
			] )->count ();
		} else {
			$list = DjleaquestionBank::find ()->where ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'bankflag' => '0',
					'planid' => $planid
			] )->limit ( $limit )->offset ( $offset )->asArray ()->all ();
			$count = DjleaquestionBank::find ()->where ( [
					'deleteflag' => 0,
					'eid' => $eid [1],
					'bankflag' => '0',
					'planid' => $planid
			] )->count ();
		}
		foreach ( $list as $key => $value ) {

			// 答题总人数
			$answerList = DjleaquestionList::find ()->where ( [
					'bankID' => $value ['bankid']
			] )->groupBy ( [
					'uid'
			] )->asArray ()->all ();
			$list [$key] ['answerCount'] = count ( $answerList );

			if ($value ['sender']) {
				$list [$key] ['oname'] = $value ['sender'];
			} else {
				$list [$key] ['oname'] = '党建';
			}
			$list [$key] ['count'] = $count;

			if (! $list [$key] ['pic']) {
				// 默认图片地址
				$list [$key] ['pic'] = 'https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=51553588,3796425299&fm=58';
			}
		}
		$return ['d'] = $list;
		return $return;
	}

	/**
	 *
	 * @param unknown $info
	 * @param $searchtitle 搜索关键字
	 * @return 返回搜索出来的学习测验试题
	 */
	public function getLeaquestionsearch($info) {

		// $searchtitle=\yii::$app->request->get('searchtitle');
		// var_dump($info);
		$info = json_decode ( $info, true );
		// $info = json_decode($info,true);
		// var_dump($info);
		// die('2');

		$searchtitle = isset ( $info ["searchtitle"] ) ? $info ["searchtitle"] : null;
		$planid = isset ( $info ['planid'] ) ? $info ['planid'] : null; // 学习计划id
		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;

		$connection = Yii::$app->db;
		$connection->open (); // 初始化数据库
		                     // $uid =\Yii::$app->session['user.id'];

		$return ['c'] = 0;
		$return ['m'] = '';
		// die($uid);
		if (! $uid) {
			$return ['c'] = - 1;
			$return ['m'] = '无效用户';
			return $return;
		}

		$eid = explode ( '@', $uid );
		$limit = 15;

		$oid = Memberlist::findOne ( [
				'guid' => $uid
		] );

		// 直接构造查询语句
		$sq0 = "select * from djleaquestion_bank where deleteflag='0' and eid='" . $eid [1] . "' and bankflag ='0' and planid= '" . $planid . "'and (title like '%" . $searchtitle . "%' or bankid like '%" . $searchtitle . "%'  or sender like '%" . $searchtitle . "%' or orgid like '%" . $searchtitle . "%' ) ORDER BY createtime desc LIMIT 15";
		// die($sq0);
		// $sq0="select count(*) from djleaquestion_bank where deleteflag='0' and eid='".$eid[1]."' and bankflag ='0' and planid= '".$planid."'and (title like '%".$searchtitle."%' or bankid like '%".$searchtitle."%' or creattime like '%".$searchtitle."%' or sender like '%".$searchtitle."%' or orgid like '%".$searchtitle."%' ) ORDER BY time desc LIMIT 15";
		// $sq0="select * from djdongtai where top=0 and eid='".$eid[1]."'and (title like '%".$searchtitle."%' or keywords like '%".$searchtitle."%') ORDER BY time desc LIMIT 15";
		$command = $connection->createCommand ( $sq0 );
		$list = $command->queryAll ();
		$count = count ( $list );

		foreach ( $list as $key => $value ) {
			// 答题总人数
			$answerList = DjleaquestionList::find ()->where ( [
					'bankID' => $value ['bankid']
			] )->groupBy ( [
					'uid'
			] )->asArray ()->all ();
			$list [$key] ['answerCount'] = count ( $answerList );

			if ($value ['sender']) {
				$list [$key] ['oname'] = $value ['sender'];
			} else {
				$list [$key] ['oname'] = '党建';
			}
			$list [$key] ['count'] = $count;

			if (! $list [$key] ['pic']) {
				// 默认图片地址
				$list [$key] ['pic'] = 'https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=51553588,3796425299&fm=58';
			}
		}
		$return ['d'] = $list;
		return $return;
	}

	/**
	 * 试题首页信息
	 *
	 * @return [type] [description]
	 */
	public function getLeaquestioninfo($info) {
		// die($info);
		$info = json_decode ( $info, true );
		Yii::$app->response->format = Response::FORMAT_JSON;
		// $id = Yii::$app->request->get('id');//题库id,学习计划id --by fyq

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$id = isset ( $info ['id'] ) ? $info ['id'] : "1";
		// die('2');
		// die($info);
		// $uid = Yii::$app->session['user.id'];
		$answerList = DjleaquestionList::find ()->where ( [
				'bankID' => $id
		] )->groupBy ( [
				'uid'
		] )->asArray ()->all ();

// 		die($uid);
		$return ['c'] = 0;
		$return ['m'] = '';
		if (! $uid) {
			$return ['c'] = - 1;
			$return ['m'] = '无效用户';
			return $return;
		}
		$data ['sum'] = 0;
		$bank = DjleaquestionBank::findOne ( $id );
		$data ['bank'] = $bank ['title'];
		$data ['bankid'] = $id;
		// 题目个数
		$data ['questionnum'] = $bank ['questionnum'];
		if ($answerList) {
			// 答题总人数
			$data ['sum'] = count ( $answerList );
			$connection = Yii::$app->db;
			$connection->open ();
			// 查询学习考试客户端抽题结果中已答完题目的得分前五名用户--by fyq
			$sql = "select * from (SELECT distinct uid,`correctNum` FROM `djquestion_list` WHERE bankID='$id'   and finishflag='1'  order by  `correctNum` desc) t group by t.uid order by correctNum desc limit 0,5"; // 外层的查询语句对吗？？？返回集字段没有完全包含在groupby语句中
			                                                                                                                                                                                                         // $top == DjleaquestionList::findBySql($sql);
			$command = $connection->createCommand ( $sql );
			$top = $command->queryAll ();
			$topname = array ();
			$topvalue = array ();
			foreach ( $top as $key => $value ) {
				$userInfo = Memberlist::findOne ( [
						'guid' => $value ['uid']
				] );
				$top [$key] ['name'] = $value ['uid'];
				$topname [] = $userInfo ['name'];
				$topvalue [] = $value ['correctNum'];
			}

			// 前五名
			$data ['top'] = [
					'title' => '答题排行榜',
					'name' => implode ( ',', $topname ),
					'value' => implode ( ',', $topvalue )
			];
			$myMax = DjleaquestionList::find ()->where ( [
					'uid' => $uid,
					'bankID' => $id
			] )->max ( 'correctNum' );
			if (! $myMax) {
				$myMax = 0;
			}
			// 查询得分比当前用户高的人数 -- by fyq
			$ranking = DjleaquestionList::find ()->where ( [
					'bankID' => $id
			] )->andWhere ( [
					'>',
					'correctNum',
					$myMax
			] )->groupBy ( [
					'uid'
			] )->orderBy ( [
					'correctNum' => SORT_DESC
			] )->count () + 1;
			// 我的排名
			$data ['ranking'] = $ranking;
			// 最好成绩
			$data ['max'] = $myMax;
			$bankInfo = DjleaquestionBank::findOne ( $id );

			$data ['falseNuM'] = $bankInfo->questionnum - $myMax;

			$count = DjleaquestionList::find ()->where ( [
					'uid' => $uid,
					'bankID' => $id,
					'finishflag' => '1'
			] )->count ();

			// 我答题次数
			$data ['count'] = $count;
		} else {
		}
		// 是否有未完成
		if (DjleaquestionList::findOne ( [
				'uid' => $uid,
				'finishflag' => 0,
				'bankID' => $id
		] )) {
			$data ['finishflag'] = 0;
		} else {
			$data ['finishflag'] = 1;
		}
		$return ['d'] = $data;
		return $return;
	}
	/**
	 * 获取测试题目
	 */
	public function getLeaquestiontopic($info) {

		// die("22");
		$info = json_decode ( $info, true );
		// return $info;
		Yii::$app->response->format = Response::FORMAT_JSON;
		$uid = Yii::$app->session ['user.id'];
		// $id = Yii::$app->request->get('id'); //专题id
		// $new = Yii::$app->request->get('new',0); //重新开始

		$uid = isset ( $info ['uid'] ) ? $info ['uid'] : null;
		$auth_token = isset ( $info ['auth_token'] ) ? $info ['auth_token'] : null;
		$id = isset ( $info ['id'] ) ? $info ['id'] : null; // 专题id
		$new = isset ( $info ['new'] ) ? $info ['new'] : "0"; // 重新开始
		                                           // die($id);

		$return ['c'] = 0;
		$return ['m'] = '';

		if ($new == 1) {
			// 重新答题
			$test = DjleaquestionList::findOne ( [
					'uid' => $uid,
					'finishflag' => 0,
					'bankID' => $id
			] );
			if ($test) {
				if (! $test->delete ()) {
					$return ['c'] = - 1;
					$return ['m'] = '重新开始失败';
					return $return;
				}
				;
			}
		}
		$nowTest = DjleaquestionList::findOne ( [
				'uid' => $uid,
				'finishflag' => 0,
				'bankID' => $id
		] );
		if (! $nowTest) {
			$bankInfo = DjleaquestionBank::findOne ( $id );
			$nowTest = new DjleaquestionList ();
			$nowTest->uid = $uid;
			$nowTest->time = time ();
			$nowTest->questionNum = $bankInfo ['questionnum'];
			$nowTest->bankID = $id;
			// die($bankInfo['questionnum']);
			$questions = $this->randTopic ( $id, $bankInfo ['questionnum'] ); // 随机获取$questionnum个题目 -- by fyq
			if ($questions == - 1) {
				$return ['c'] = - 2;
				$return ['m'] = '没有足够的题目';
				return $return;
			}
			$nowTest->questions = implode ( ',', $questions ); // 将随机获取的题目编号，用‘，’隔开。-- by fyq
			$nowTest->save ();
		} else {
		}

		// 获取当前题目
		$count = DjleaquestionAnswer::find ()->where ( [
				'paperID' => $nowTest->paperid
		] )->count ();
		// $topicId = explode(',', $nowTest->questions)[$count];
		$questionsList = explode ( ',', $nowTest->questions );

		$poticInfo ['paperId'] = $nowTest->paperid;
		$poticInfo ['count'] = $count;
		foreach ( $questionsList as $key => $value ) {
			$poticInfo ['questions'] [] = DjleaquestionBanklist::findOne ( $value );
		}
		$return ['d'] = $poticInfo;
		return $return;
	}
	/**
	 * 随机题目
	 *
	 * @param [type] $id
	 *        	[description]
	 * @return [type] [description]
	 */
	public function randTopic($id, $questionnum) {
		// die($questionnum);
		$banklist = DjleaquestionBanklist::find()->where(['bankID'=>$id])->asArray()->all();
    	$sou = [];
    	foreach ($banklist as $key => $value) {
    		$sou[] = $value['questionid']; //将题库的题目id放到数组$sou --by fyq
    	}
    	if(count($sou) < $questionnum){
    		return -1;
    	}
    	$randKey = array_rand($sou,$questionnum);//将题库的题目id放到数组$sou,从中随机抽取$questionnum个题目-- by fyq
    	foreach ($randKey as $key => $value) {
    		$randValue[] = $sou[$value];
    	}
    	return $randValue;
    }
}
