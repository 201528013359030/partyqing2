<?php
namespace common\models;
use Yii;
use yii\base\Model;

use common\models\Curl;
use common\models\PublicApiForm;
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
    private $list = [];

	function __construct(){
        $this->ictIp = '127.0.0.1';
        $this->ictIp = '192.168.139.246';
        /*$eid = explode('@',Yii::$app->session['user.uid']); 
        if(isset($eid[1])){
            $this->eid = $eid[1];
        }*/
        $this->eid = yii::$app->session['eid'];
        //$this->eid = 83273;
        $this->url = "http://$this->ictIp/elgg/services/api/rest/json/?method=";
        $this->params['auth_token'] = Yii::$app->session['user.token'];
        $this->params['api_key'] = "36116967d1ab95321b89df8223929b14207b72b1";
        $this->params['govOrg'] = \Yii::$app->params["govOrg"];

    }
    public function storeList(){
        $this->list = array_flip(array_flip($this->list));
        yii::$app->session['list'] = json_encode($this->list); 
    }
    public function getAdminToken(){
        if($this->params["auth_token"] && $this->params["api_key"]){
            return;
        }
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
	public function createTreeData($oData, $memberList){
        $temp = $oData;
        unset($temp['member']);
        unset($temp['child']);
        $tData = array();
        if(!isset( $temp['nodename'][0])){
            return;
        }
        $tData['text'] = $temp['nodename'][0];
        $tData['isExpand'] = false;
        $tData['children'] = array();  
        $tData['icon'] = "images/icons/address.png";  
        $tData["ischecked_m"] = "incomplete";
        $tData["ischecked_c"] = "incomplete";
        $mcount = count($oData['member']);
        if($mcount > 0){
            $flag = 0;
            $flag_1 = 0;
            foreach($oData['member'] as $m){
                if(isset($m['membername'][0])){
                    $_flag = 0;
                    if($memberList && in_array($m['uid'][0], $memberList)){
                        $_flag = 1;
                        $this->list[] = $m['uid'][0];
                        $flag++;
                    }else{
                        $flag_1++;
                    }
                    $tData['children'][] = ["text"=>$m['membername'][0],
                                            "id"=>$m['uid'][0],
                                            "isExpand"=>false,
                                            "icon"=>"images/icons/memeber.gif",
                                            "ischecked"=>($_flag == 1?"complete":"none"),
                                                ];    
                }
            }
            if($mcount == $flag){ 
                $tData["ischecked_m"] = "complete";
            }   

            if($mcount == $flag_1){ 
                $tData["ischecked_m"] = "none";
            }   
        }else{
            $tData["ischecked_m"] = "complete_none";
        }
        $ocount = count($oData['child']);
        if($ocount > 0){
            $flag = 0;
            $flag_1 = 0;
            foreach($oData['child'] as $c){ 
                $array = $this->createTreeData($c, $memberList);   
                if($array["ischecked"] == "complete"){
                    $flag++;
                }
                if($array["ischecked"] == "none"){
                    $flag_1++;
                }
                $tData['children'][] = $array;
                unset($array);
            }
            if($ocount == $flag){
                $tData["ischecked_c"] = "complete";
            }
            if($ocount == $flag_1){
                $tData["ischecked_c"] = "none";
            }
            if(($tData["ischecked_m"] == "complete" || $tData["ischecked_m"] == "complete_none" ) && $tData["ischecked_c"] == "complete"){
                $tData["ischecked"] = "complete";
            }else if($tData["ischecked_m"] == "none" && $tData["ischecked_c"] == "none"){
                $tData["ischecked"] = "none";
            }else if($tData["ischecked_m"] == "complete_none" && $tData["ischecked_c"] == "none"){
                $tData["ischecked"] = "none";
            }else{
                $tData["ischecked"] = "incomplete";
            }
        }else{
            $tData["ischecked"] = $tData["ischecked_m"];
            if($tData["ischecked"] == "complete_none"){
                $tData["ischecked"] = "none";
            }
        }
        if($ocount == 0 && $mcount == 0){
            $tData["ischecked"] = "none";
        }
        return $tData;
    }

    public function getICTContacts(){
        list($tmp, $eid) = explode("@", Yii::$app->session['uid']);
        \Yii::$app->redis->select(11);
        $contacts['result'] = json_decode(\Yii::$app->redis->get("EDATA:".$eid),true);
        if($contacts['result']){
            $contacts['status'] = 0;
            return $contacts;
        }

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
    public function getICTDepartment($id){
        $this->getAdminToken();
        $curl = new Curl();
        $url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.web.get.node.info";
        $params['eid'] = Yii::$app->session['eid'];
        $params['id_list[0]'] =  $id;
        $params['attr_list[0]'] = "nodename";
        $params['auth_token'] = $this->params['auth_token'];
        $params['api_key'] = $this->params['api_key'];
        $contacts = json_decode($curl->post($url, $params),true);
        return $contacts;
    }
    public function getICTContact($uid){
        $this->getAdminToken();
        $curl = new Curl();
        $url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.web.get.node.info";
        $params['eid'] = Yii::$app->session['eid'];
        $params['id_list[0]'] =  $uid;
        $params['attr_list[0]'] = "membername";
        $params['attr_list[1]'] = "imgurl";
        $params['attr_list[2]'] = "employeetype";
        $params['attr_list[3]'] = "departmentnumber";
        $params['auth_token'] = $this->params['auth_token'];
        $params['api_key'] = $this->params['api_key'];
        $contacts = json_decode($curl->post($url, $params),true);
        return $contacts;

    }
    public function getUsers($uids){
        $this->getAdminToken();
        $curl = new Curl();
        $url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.web.get.node.info";
        list($tmp, $eid) = explode("@", $uids[0]);
        $params['eid'] = $eid;
        foreach($uids as $k => $u){
            $params["id_list[$k]"] =  $u;
        }
        $params['attr_list[0]'] = "membername";
        $params['attr_list[1]'] = "mobile";
        $params['attr_list[2]'] = "imgurl";
        $params['attr_list[3]'] = "departmentnumber";
        $params['auth_token'] = $this->params['auth_token'];
        $params['api_key'] = $this->params['api_key'];
        $contacts = json_decode($curl->post($url, $params),true);
        return $contacts;
    }
    public function getUserInfo(array $uids){
        $this->getAdminToken();
        $curl = new Curl();
        $url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.client.get.user.info";
        list($tmp, $eid) = explode("@", $uids[0]);
        $params['eid'] = $eid;
        foreach($uids as $k => $u){
            $params["query_ids[$k]"] =  $u;
        }
        $params['user_id'] = $uids[0];
        $params['auth_token'] = $this->params['auth_token'];
        $params['api_key'] = $this->params['api_key'];
        $contacts = json_decode($curl->post($url, $params),true);
        return $contacts;
    }
    public function getGovUserList(){
        $this->getAdminToken();
        $curl = new Curl();
        $url = "http://$this->ictIp/elgg/services/api/rest/json/?method=ldap.web.get.user.sort";   
        $pUid = \Yii::$app->params["govOrg"];
        list($tmp, $eid) = explode("@", $pUid);
        $params['eid'] = $eid;
        $params["parent"]=$pUid;
        $params['auth_token'] = $this->params['auth_token'];
        $params['api_key'] = $this->params['api_key'];
        $contacts = json_decode($curl->post($url, $params),true);
        return $contacts;
    }
    public function authToken($phone, $password){
        $curl = new Curl();
        $url = $this->url."auth.gettoken";
        $params["name"] = $phone;
        $params['password'] = $password;
        $params['api_key'] = $this->params['api_key'];
        $auth = json_decode($curl->post($url, $params),true);
        print_r($auth);
        if(isset($auth['status'])){
            Yii::$app->session['auth'] = 1;
            Yii::$app->session['auth_token'] = $auth["result"]["auth_token"];
            Yii::$app->session['uid'] = $auth['result']["uid"];
 
            Yii::$app->session['loginName'] = $phone;
            Yii::$app->session['loginPwd'] = $password;
            if(strstr($auth['result']["uid"], "@"))
                list($tmp, $eid) = explode("@", $auth['result']["uid"]);
            Yii::$app->session['eid'] = isset($eid)?$eid:"";
            Yii::$app->session['lastAction'] = time();
            $userInfo = $this->getUsers([$auth['result']["uid"]]);
            Yii::$app->session['userName'] = $userInfo["result"][0]["data"]["membername"][0];
            $company = $this->userCompany($auth['result']["uid"]);
            return 1;
        }else{
            return 0;
        }   
    }
    /**
     * 获取 用户所属企业
     * @return [type] [description]
     */
    public function userCompany($uid){                
        $user = $this->getUserInfo([$uid]);
        //$return['info'] = $user;
        Yii::info($user['result'][0]['data']['parent'],'userCompany');
        if(isset($user['status'])){
            Yii::$app->session['user.company']  = isset($user['result'][0]['data']['parent'][3])?$user['result'][0]['data']['parent'][3]:"";
            return ;
        }else{
            Yii::$app->session['user.company']  = '';
            return '';
        }

    }


    /**
     * 添加部门到ict（ldap+mysql）
     * @param unknown $admin
     * @param unknown $password
     * @param unknown $pid
     * @param unknown $name
     * @param unknown $intro
     */
    public function addDepartment($admin,$password,$pid,$name,$intro){
        $curl = new Curl();
        $url = "http://$this->ictIp/appframe/web/index.php?r=webService/main/api&method=department.add";
        $params['admin'] = $admin;
        $params['password'] = $password;
        $params['pid'] = $pid;
        $params['name'] = $name;
        $params['intro'] = $intro;
        $dept = json_decode($curl->post($url, $params),true);
        return $dept;
    }
    /**
     * 添加ict用户（ldap+mysql）
     * @param unknown $admin
     * @param unknown $password
     * @param unknown $data
     */
    public function addIctUser($admin,$password,$data){
        $curl = new Curl();
        $url = "http://$this->ictIp/appframe/web/index.php?r=webService/main/api&method=user.add";
        $params['admin'] = $admin;
        $params['password'] = $password;
        $params['data'] = $data;
        $ictuser = json_decode($curl->post($url, $params),true);
        return $ictuser;
    }
    
    /**
     * API调用时，通过uid获取到用户信息。
     * @param  [type] $uid [description]
     * @return [type]      [description]
     */
    public function getIctUserInfo($uid){
        Yii::$app->session['uid'] = $uid;
        $userInfo = $this->getUsers([$uid]);
        Yii::$app->session['userName'] = $userInfo["result"][0]["data"]["membername"][0];
        Yii::$app->session['user.mobile'] = $userInfo["result"][0]["data"]["mobile"][0];
        $this->userCompany($uid);
        $this->getIdentity($uid);
        $return['type'] = Yii::$app->session['user.identity.type'];
        $return['username'] = Yii::$app->session['userName'];
        $return['mobile'] = Yii::$app->session['user.mobile'];
        $return['company'] = Yii::$app->session['user.company'];

        return $return;
    }

    /**
     * 获取用户身份  后台 政府 企业
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getIdentity($id){
        $publicApiForm = new PublicApiForm();
        $identity = $publicApiForm->identity($id);
        Yii::$app->session['user.identity.type']= $identity['type'];
        Yii::$app->session['user.identity.action']= $identity['action'];
        return;
    }
    public function logout(){
        Yii::$app->session['auth'] = "";
        Yii::$app->session['uid'] = "";
        Yii::$app->session['eid'] = "";
        Yii::$app->session['lastAction'] = "";
        Yii::$app->session['auth_token'] = "";
        Yii::$app->session['loginName'] = "";
        Yii::$app->session['loginPwd'] = "";
        Yii::$app->session['user.identity.type'] = "";
        Yii::$app->session['user.identity.action'] = "";
        /*unset(Yii::$app->session['auth']);
        unset(Yii::$app->session['uid']);
        unset(Yii::$app->session['eid']);
        unset(Yii::$app->session['lastAction']);
        unset(Yii::$app->session['auth_token']);
        unset(Yii::$app->session['loginName']);
        unset(Yii::$app->session['loginPwd']);       
        unset(Yii::$app->session['user.identity.type']);
        unset(Yii::$app->session['user.identity.action']);*/
        
        $session = Yii::$app->session;
        $session->remove('auth');
        $session->remove('uid');
        $session->remove('eid');
        $session->remove('lastAction');
        $session->remove('auth_token');
        $session->remove('loginName');
        $session->remove('loginPwd');
        $session->remove('user.identity.type');
        $session->remove('user.identity.action');
        
    }
    public function uploadFile($file){
        $fileclient =  new Curl();
        $file = $fileclient->post("http://127.0.0.1/offline_media/offline_upload.php?group=0", array("upload"=>"@".$file));
        $filePath = json_decode($file,true);
        return $filePath;
    }
    /**
     * 轻应用通知
     * @param  [type] $id    轻应用id
     * @param  [type] $uids  接收者id
     * @param  [type] $title 标题
     * @param  [type] $url   通知中链接
     * @return [type]        [description]
     */
    public function lappNotice($id,$uids,$title,$url){
        $curl = new Curl();
        $this->getAdminToken();
        $this->params['id'] = $id;
        $this->params['eid'] = \Yii::$app->params["eid"];
        $this->params['title'] = $title;
        $this->params['url'] = $url;
        if($uids){
            $uids = array_filter($uids);
            for($i=0;$i<count($uids);$i++){
                $this->params["uids[$i]"] = $uids[$i];
            }
        }
        Yii::info($this->params);
        $groupInfo = json_decode($curl->post($this->url."lapp.notice", $this->params),true);
        return 1;
    }

}
	
