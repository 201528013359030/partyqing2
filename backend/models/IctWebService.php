<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use app\models\Enterpris;

use backend\models\Curl;
/**
 * 
 */
class IctWebService extends Model
{
	public $ictIp;
	public $eid;
    public $url;
    public $params = [];
    public $attr = [];
    public $noticeUrl = "/notice/web/index.php?r=admin/noticecontent/index&uid=&eguid=&auth_token=&id=";
    public $allTypeMemberUid;
    public $allTypeMemberName;
    public $memberUids=[];
	public $imgIp;
    
	function __construct(){
        $enterprisId = Yii::$app->session['user.enterprisId'];
       // $einfo = Enterpris::find()->where(['enterpris_id'=>$enterprisId])->one();
        //$this->ictIp = $einfo['ip'];
        //$this->eid = $einfo['eid'];
      //  $this->ictIp = 'localhost:9096';
 
       // $this->ictIp = '192.168.139.248';
      	 $this->ictIp="127.0.0.1";

 
        $this->imgIp = '210.72.128.171:8002';
//         $eid = explode('@',Yii::$app->session['user.uid']); 
//         if(isset($eid[1])){
//             $this->eid = $eid[1];
//         }
        $this->eid = '5';
        //$this->eid = yii::$app->session['eid'];
        $this->url = "http://$this->ictIp/elgg/services/api/rest/json/?method=";
        $this->params['auth_token'] = Yii::$app->session['user.token'];
        //$this->params['api_key'] = Yii::$app->session['user.apiKey'];
        $this->params['api_key'] = "36116967d1ab95321b89df8223929b14207b72b1";

    }
    public function getAdminToken(){
        $curl = new Curl();
        $url = $this->url . "auth.gettoken";
        $params['name']="buliping";
        $params['password']="123456";
        $params['api_key']="36116967d1ab95321b89df8223929b14207b72b1";
        $elggAdmin = json_decode($curl->post($url, $params), true);
        $this->params = null;
        $this->params['auth_token'] = $elggAdmin['result']['auth_token'];
        $this->params['api_key'] = $params['api_key'];
        return $elggAdmin;
    }
//     public function loginElgg($name,$pwd){
//         $curl = new Curl();
//         $url = $this->url . "auth.gettoken";
//         $params['name']=$name;
//         $params['password']=$pwd;
//         $params['api_key']="36116967d1ab95321b89df8223929b14207b72b1";
//         $elggAdmin = json_decode($curl->post($url, $params), true);
//         if(isset($elggAdmin['status'])){
//             $this->params['auth_token'] = $elggAdmin['result']['auth_token'];
//             $this->params['uid'] = $elggAdmin['result']['uid'];
//             $this->params['api_key'] = $params['api_key'];
//             return 1;
//         }else{
//             return 0;
//         }
//     }
    public function getMemberUids($oData,$memberUids){
    	$temp = $oData;
    	unset($temp['member']);
    	unset($temp['child']);
    	$tData = array();
    	if(!isset( $temp['nodename'][0])){
    		return;
    	}
    	if(count($oData['member'])>0){
    		foreach($oData['member'] as $m){
    			if(isset($m['membername'][0])){
    				$arr = array();
    				//$arr['membername']=$m['membername'][0];
    				$arr['id']=$m['uid'][0];
    				array_push($this->memberUids, $arr);
    				$tData['children'][] = ["text"=>$m['membername'][0],
    						"id"=>$m['uid'][0],
    						"mobile"=>(isset($m['mobile'][0])?$m['mobile'][0]:null),
    				];
    			}
    		}
    	}
    	if(count($oData['child'])>0){
    		foreach($oData['child'] as $c){
    			$tData['children'][] = $this->getMemberUids($c,$this->memberUids);
    		}
    	}
    	return $tData;
    }
    public function getUids(){
    	$contacts = $this->getICTContacts();
    	$result = $contacts['result'][0]['data'];
    	$this->getMemberUids($result,$this->memberUids);
    	return $this->memberUids;	
    }
    public function getICTContacts(){
//     	list($tmp, $eid) = explode("@", '11@5');
//     	list($tmp, $eid) = explode("@", Yii::$app->session['uid']);
//     	\Yii::$app->redis->select(11);
//     	$contacts['result'] = json_decode(\Yii::$app->redis->get("EDATA:".$eid),true);
//     	if($contacts['result']){
//     		$contacts['status'] = 0;
//     		return $contacts;
//     	}    
//		$eid = '5';
		$eid = $this->eid;
    	$this->getAdminToken();
    	$curl = new Curl();
    	$url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.web.search";
    	$params['eid'] = $eid;
    	$params['id_list[0]'] =  "null";
    	$params['attr_list[0]'] = "membername";
    	$params['attr_list[1]'] = "uid";
    	$params['auth_token'] = $this->params['auth_token'];
    	$params['api_key'] = $this->params['api_key'];
    	$contacts = json_decode($curl->post($url, $params),true);
    	return $contacts;    
    }
	public function lappNotice($id,$eid,$title,$publicinfoID){
		$curl = new Curl();
		$url=$this->url.'lapp.notice';
		$this->params['id']= $id;
		$this->params['eid'] = $eid;
		$this->params['title']=$title;
		$this->params['url']= 'http://210.72.128.171:8002/advanced_zyr/phone/html/main.html?serverIp=http://210.72.128.171:8002&uid=&auth_token=#content_'.$publicinfoID;
		$curl->post($url,$this->params);	
	}
	
	public function get_mac(){
		@exec("ifconfig -a", $array);
		$temp_array = array();
		$mac_addr = "";
		foreach ( $array as $value ){
			if (
					preg_match("/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i",$value, $temp_array ) ){
						$mac_addr = $temp_array[0];
						break;
			}
		}
		unset($temp_array);
		return $mac_addr;
	}
	
// 	public function authToken($uid,$token){
// 		$curl = new Curl();
// 		$url = $this->url."check.user.token";
// 		$uidexp = explode('@',$uid);
// 		if($uidexp[0] == 'buliping'){
// 			$uid = $uidexp[0];
// 		}
// 		$this->params['uid'] = $uid;
// 		$this->params['auth_token'] = $token;
// 		$auth = json_decode($curl->post($url, $this->params),true);
// 		if(isset($auth['result']['success'])){
// 			return 1;
// 		}else{
// 			//print_r($this->params);
// 			//print_r(json_encode($auth));
// 			//exit;
// 			return 0;
// 		}
// 	}
	
// 	public function getNodeInfo($uid,$info=false){
// 		if(!is_array($uid)){
// 			$this->params['id_list[0]'] = $uid;
// 		}else{
// 			for($i=0;$i<count($uid);$i++){
// 				$this->params["id_list[$i]"] = $uid[$i];
// 			}
// 		}
// 		if($info){
// 			for($i=0;$i<count($info);$i++){
// 				$this->params["attr_list[$i]"] = $info[$i];
// 			}
// 		}else{
// 			$this->params['attr_list[0]'] = "true";
// 		}
// 		$curl = new Curl();
// 		$url = $this->url."ldap.web.get.node.info";
// 		if(isset($this->eid)){
// 			$this->params['eid'] = $this->eid;
// 		}
// 		$info = json_decode($curl->post($url, $this->params),true);
// 		return $info;
// 	}
}
	
