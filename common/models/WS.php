<?php
namespace common\models;
use common\models\Action;
use common\models\IctWebService;
use backend\models\UserBackend;
use Yii;
use yii\base\Object;


class WS extends \common\models\WebService{
	function __construct(){
        parent::init();
        parent::registerApi("company.list.get",
            "getCompanyList",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
        parent::registerApi("company.get",
            "getCompany",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
        parent::registerApi("company.uid.get",
            "getCompanyUid",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
        parent::registerApi("company.extra.get",
            "getCompanyExtra",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
        parent::registerApi("company.his.get",
            "getCompanyHis",
            [
                "info"=>['type'=>'string'],
            ],
            false
        );
        parent::registerApi("company.list", 
            "getCmpList", 
            [
                "info"=>['type'=>'string'],
            ],
            false            
        );
        parent::registerApi("industry.desp.get", 
            "getIndustryDesp", 
            [
                "info"=>['type'=>'string'],
            ],            
            false            
        );
        parent::registerApi("user.identity", 
            "identity", 
            [
                "uid"=>['type'=>'string'],
            ],            
            false            
        );
        parent::registerApi("user.info", 
            "userinfo", 
            [
                "uid"=>['type'=>'string'],
            ],            
            false            
        );
        parent::registerApi("weather.get", 
            "getWeatherInfo", 
            [
                //"city"=>['type'=>'string']
            ],
            false
        );
        parent::registerApi("cmp.foundtime.stat",
            "getCmpFoundTimeStat",
            [
                "domain"=>['type'=>'string','required'=>false]
            ],
            false
        );        
        parent::registerApi("cmp.regtype.stat",
            "getCmpRegtypeStat",
            [
                "domain"=>['type'=>'string','required'=>false]
            ],
            false
        );
        parent::registerApi("cmp.scale.stat",
            "getCmpScaleStat",
            [
                "domain"=>['type'=>'string','required'=>false]
            ],
            false
        );
        parent::registerApi("cmp.industry-class.stat",
            "getCmpIndustryClassStat",
            [
                "domain"=>['type'=>'string','required'=>false]
            ],
            false
        );
        parent::registerApi("domain.get",
            "getDomainInfo",
            [
                //"city"=>['type'=>'string']
            ],
            false
        );
    }
    public function userinfo($uid){
        $userinfo = [];
        $ws = new IctWebService();
        return $ws->getIctUserInfo($uid);
    }
    /**
     * 获取用户身份
     * @param  [type] $uid [description]
     * @return [type]      [description]
     */
    public function identity($uid){
        $return['action'] = 0;
        if(UserBackend::findOne($uid)){
            $return['action'] = $return['action'] | 1;
            $return['type'] = 1;
        }else{
            $ws =  new IctWebService();
            $user = $ws->getUserInfo([$uid]);
            //$return['info'] = $user;
            if($user['status'] == 0){
                if(in_array("企业", $user['result'][0]['data']['parent'])){
                    $return['action'] = $return['action'] | 2;
                    $return['action'] = $return['action'] | 4;
                    $return['type'] = 3;
                }else if(in_array("政府", $user['result'][0]['data']['parent'])){
                    $return['action'] = $return['action'] | 1;
                    $return['type'] = 2;
                }else{
                    $return['type'] = 0;
                }
            }else{
                throw new \yii\web\HttpException(200,'Invalid userid '.$uid,20100);
            }
        }
        return $return;
    }
    public function getIndustryDesp($info){
        //$info = json_decode($info,true);
        $model = new Action();
        $return = $model->getIndustryDesp($info);
        return $return;
    }
    public function getCompanyList($info){
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCompanyList($info);
        return $return;
    }
    public function getCompany($info){
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCompany($info);
        return $return;
    }
    public function getCompanyUid($info){
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCompanyUid($info);
        return $return;
    }
    public function getCompanyExtra($info){
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCompanyExtra($info);
        return $return;
    }
    public function getCompanyHis($info){
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCompanyHis($info);
        return $return;
    }
    public function getCmpList($info) {        
        $info = json_decode($info, true);
        $model = new Action();
        $return = $model->getCmpList($info);
        return $return;
    }
    public function getWeatherInfo(){
        $connection = Yii::$app->db;
        $city = "沈阳";
        $model = new Action();
        $wInfo = $model->getWeatherInfo($city);
        $wData = isset($wInfo["weather_data"])?$wInfo["weather_data"][0]:"";
        //print_r($wData);
        $showInfo = "";
        if($wData){
            $showInfo = $wData["date"]."&nbsp;&nbsp;".$wData["weather"]."&nbsp;&nbsp;".$wData["temperature"];
        }
        $sql = "select * from sysparam where name='weather_info'";
        $command = $connection->createCommand($sql);
        $result = $command->queryOne();
        $curTime = date("Y-m-d H:i:s",time());
        if($result){
            $update = "update sysparam set value='".$showInfo."',exValue='".$curTime."' where name='weather_info'";
        }else{
            $update = "insert into sysparam(name,value,exValue) values('weather_info','".$showInfo."','".$curTime."')";
        }
        $command = $connection->createCommand($update);
        $result = $command->execute();
        file_put_contents("/tmp/weather_info", "\nresult=".($result?"1":"0").",time=".$curTime,FILE_APPEND);
        return $result?"1":"0";
    }
    public function getCmpFoundTimeStat($domain=""){
        $model = new Action();
        $return = $model->getCmpFoundTimeStat($domain);
        return $return;
    }
    public function getCmpRegtypeStat($domain=""){
        $model = new Action();
        $return = $model->getCmpRegtypeStat($domain);
        return $return;
    }
    public function getCmpScaleStat($domain=""){
        $model = new Action();
        $return = $model->getCmpScaleStat($domain);
        return $return;
    }
    public function getCmpIndustryClassStat($domain=""){
        $model = new Action();
        $return = $model->getCmpIndustryClassStat($domain);
        return $return;
    }
    public function getDomainInfo(){
        $cmpDomain = \Yii::$app->params["cmpDomain"];
        $return = "";
        for ($i=0;$i<count($cmpDomain);$i++){            
            $return[$i]["title"] = $cmpDomain[$i];
            $return[$i]["value"] = strval($i);
        }
        return $return;
    }
}
