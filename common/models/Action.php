<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IctWebService;
use common\models\Curl;
use common\models\WS;
use common\models\Companyinfo;
use common\models\Industryinfo;
use common\models\Extrainfo;
use common\models\Hiscompanyinfo;
use yii\base\Object;
use common\models\SysTrade;
use common\models\Snoopy\Snoopy;
use common\models\Economyinfo;
/**
 * 
 */
class Action extends Model{
    public function getCompanyList($info){
        $limit = isset($info["limit"]) ? $info["limit"] : 10;
        $offset = isset($info["offset"]) ? $info["offset"] : 0;
        $totalNum = 0;
        if(isset($info["search"])){
            if(isset($info["govUid"]) && $info["govUid"]){
                $model = Companyinfo::find()->where(["and","cName like '%".$info["search"]."%'","(govLeader='".$info["govUid"]."' or govContact='".$info["govUid"]."')"])->limit($limit)->offset($offset)->orderBy('id asc')->asArray()->all();
                $totalNum = count(Companyinfo::find()->where(["and","cName like '%".$info["search"]."%'","(govLeader='".$info["govUid"]."' or govContact='".$info["govUid"]."')"])->all());
            }else{
                $model = Companyinfo::find()->where(["like","cName",$info["search"]])->limit($limit)->offset($offset)->orderBy('id asc')->asArray()->all();
                $totalNum = count(Companyinfo::find()->where(["like","cName",$info["search"]])->all());
            }            
        }else{
            if(isset($info["govUid"]) && $info["govUid"]){
                $model = Companyinfo::find()->where(["or","govLeader='".$info["govUid"]."'","govContact='".$info["govUid"]."'"])->limit($limit)->offset($offset)->orderBy('id asc')->asArray()->all();
                $totalNum = count(Companyinfo::find()->where([])->all());
            }else{
                $model = Companyinfo::find()->where([])->limit($limit)->offset($offset)->orderBy('id asc')->asArray()->all();
                $totalNum = count(Companyinfo::find()->where([])->all());
            }            
        }
        /*$city = "沈阳";
        $tmp = $this->getLngAndLat($city);
        $lng_lat = "";
        if(isset($tmp["location"])){
            $lng_lat = "[".$tmp["location"]["lng"].",".$tmp["location"]["lat"]."]";
        }*/
        if($model){
            foreach($model as $k => $m){                
                $model[$k]["ofIndustryStr"] = (SysTrade::findOne(["code"=>$model[$k]["ofIndustry"]]))?(SysTrade::findOne(["code"=>$model[$k]["ofIndustry"]])->name):$model[$k]["ofIndustry"];
                $model[$k]["regMark"] = $model[$k]["regMark"]?$model[$k]["regMark"]:"";
                $model[$k]["taxes"] = $model[$k]["taxes"]?$model[$k]["taxes"]:"0";
                $model[$k]["industryClassStr"] = (SysTrade::findOne(["code"=>$model[$k]["industryClass"]]))?(SysTrade::findOne(["code"=>$model[$k]["industryClass"]])->name):$model[$k]["industryClass"];
                $model[$k]["statusStr"] = isset(\Yii::$app->params["cmpStatus"][$model[$k]["status"]])?\Yii::$app->params["cmpStatus"][$model[$k]["status"]]:$model[$k]["status"];
                $model[$k]["scaleStr"] = isset(\Yii::$app->params["cmpScale"][$model[$k]["scale"]])?\Yii::$app->params["cmpScale"][$model[$k]["scale"]]:$model[$k]["scale"];
                $model[$k]["typeStr"] = isset(\Yii::$app->params["cmpType"][$model[$k]["type"]])?\Yii::$app->params["cmpType"][$model[$k]["status"]]:$model[$k]["type"];
                $model[$k]["domainStr"] = isset(\Yii::$app->params["cmpDomain"][$model[$k]["domain"]])?\Yii::$app->params["cmpDomain"][$model[$k]["domain"]]:$model[$k]["domain"];
                $model[$k]["regTypeStr"] = isset(\Yii::$app->params["cmpRegtype"][$model[$k]["regType"]])?\Yii::$app->params["cmpRegtype"][$model[$k]["regType"]]:$model[$k]["regType"];
                $model[$k]["localRegionStr"] = isset(\Yii::$app->params["cmpRegion"][$model[$k]["localRegion"]])?\Yii::$app->params["cmpRegion"][$model[$k]["localRegion"]]:$model[$k]["localRegion"];
                /*$model[$k]["lngAndLat"] = $this->getLngAndLat($m["cName"]);
                $tmp = $this->getLngAndLat($m["cName"]);
                if(isset($tmp["location"])){
                    $lng_lat = "[".$tmp["location"]["lng"].",".$tmp["location"]["lat"]."]";
                }
                $model[$k]["lngAndLat"] = $lng_lat;*/
            }
            $model[0]["totalNum"] = $totalNum;
        }
        return $model;
    }
    public function getCompanyList_query($info){
        $info = json_decode($info,true);
        $limit = isset($info["limit"]) ? $info["limit"] : 10;
        $offset = isset($info["offset"]) ? $info["offset"] : 0;
        $conf = array();
        $query_c = "1";
        if(isset($info["cName"]) && $info["cName"]){
            //$model = Companyinfo::find()->where(["like","cName",$info["search"]])->limit($limit)->offset($offset)->asArray()->all();
            //array_push($conf, ["like","cName",$info["cName"]]);
            $query_c .= " and cName like '%".$info["cName"]."%'"; 
        }else{
            //$model = Companyinfo::find()->where([])->limit($limit)->offset($offset)->asArray()->all();
        }
        if(isset($info["regMark"]) && $info["regMark"]){
            $query_c .= " and regMark like '%".$info["regMark"]."%'";
        }
        if(isset($info["ofIndustry"]) && $info["ofIndustry"]){
            $query_c .= " and ofIndustry like '".$info["ofIndustry"]."%'";
        }
        if(isset($info["legalRep"]) && $info["legalRep"]){
            $query_c .= " and legalRep like '%".$info["legalRep"]."%'";
        }
        if(isset($info["domain"]) && strlen($info["domain"])>0){
            $query_c .= " and domain in (".$info["domain"].")";
        }
        if(isset($info["regCapital"]) && $info["regCapital"]){
            $capList = explode(",", $info["regCapital"]);
            $tmp = "";
            for($k=0;$k<count($capList);$k++){
                if(strstr($capList[$k], '-')){
                    $capList1 = explode("-", $capList[$k]);
                    if($tmp){
                        $tmp .= " or (regCapital between ".$capList1[0]." and ".$capList1[1].")";
                    }else{
                        $tmp .= "(regCapital between ".$capList1[0]." and ".$capList1[1].")";
                    }                    
                }else{
                    if($tmp){
                        $tmp .= " or (regCapital".$capList[$k].")";
                    }else{
                        $tmp .= "(regCapital".$capList[$k].")";
                    }
                }
            }
            if(strlen($tmp)>0){
                $query_c .= " and (".$tmp.")";
            }
        }
        if(isset($info["foundingTime"]) && $info["foundingTime"]){
            $capList = explode(",", $info["foundingTime"]);
            $tmp = "";
            for($k=0;$k<count($capList);$k++){
                if(strstr($capList[$k], '-')){
                    $capList1 = explode("-", $capList[$k]);
                    if($tmp){
                        $tmp .= " or (substring(foundingTime,1,4) between ".$capList1[0]." and ".$capList1[1].")";
                    }else{
                        $tmp .= "(substring(foundingTime,1,4) between ".$capList1[0]." and ".$capList1[1].")";
                    }
                }else{
                    if($tmp){
                        $tmp .= " or (substring(foundingTime,1,4)".$capList[$k].")";
                    }else{
                        $tmp .= "(substring(foundingTime,1,4)".$capList[$k].")";
                    }
                }
            }
            if(strlen($tmp)>0){
                $query_c .= " and (".$tmp.")";
            }
        }
        if(isset($info["employees"]) && $info["employees"]){
            $capList = explode(",", $info["employees"]);
            $tmp = "";
            for($k=0;$k<count($capList);$k++){
                if(strstr($capList[$k], '-')){
                    $capList1 = explode("-", $capList[$k]);
                    if($tmp){
                        $tmp .= " or (employees between ".$capList1[0]." and ".$capList1[1].")";
                    }else{
                        $tmp .= "(employees between ".$capList1[0]." and ".$capList1[1].")";
                    }
                }else{
                    if($tmp){
                        $tmp .= " or (employees".$capList[$k].")";
                    }else{
                        $tmp .= "(employees".$capList[$k].")";
                    }
                }
            }
            if(strlen($tmp)>0){
                $query_c .= " and (".$tmp.")";
            }
        }
        if(isset($info["production"]) && $info["production"]){
            $capList = explode(",", $info["production"]);
            $tmp = "";
            for($k=0;$k<count($capList);$k++){
                if(strstr($capList[$k], '-')){
                    $capList1 = explode("-", $capList[$k]);
                    if($tmp){
                        $tmp .= " or (production between ".$capList1[0]." and ".$capList1[1].")";
                    }else{
                        $tmp .= "(production between ".$capList1[0]." and ".$capList1[1].")";
                    }
                }else{
                    if($tmp){
                        $tmp .= " or (production".$capList[$k].")";
                    }else{
                        $tmp .= "(production".$capList[$k].")";
                    }
                }
            }
            if(strlen($tmp)>0){
                $query_c .= " and (".$tmp.")";
            }
        }
        if(isset($info["nature"]) && $info["nature"]){
            //$query_c .= " and nature in (".$info["nature"].")";
            $capList = explode(",", $info["nature"]);
            $tmp = "";
            for($k=0;$k<count($capList);$k++){                
                if($tmp){
                    $tmp .= " or (find_in_set('".$capList[$k]."',nature))";
                }else{
                    $tmp .= "(find_in_set('".$capList[$k]."',nature))";
                }
            }
            if(strlen($tmp)>0){
                $query_c .= " and (".$tmp.")";
            }
        }
        if(isset($info["govUid"]) && $info["govUid"]){
            $query_c .= " and (govLeader='".$info["govUid"]."' or govContact='".$info["govUid"]."')";
        }
        $sql_all = "select * from companyinfo where ".$query_c;
        $totalNum = count(Companyinfo::findBySql($sql_all)->all());
        if(intval($totalNum)<=intval($limit)){
            $offset = 0;
        }
        $sql = "select * from companyinfo where ".$query_c." order by id asc limit ".$offset.",".$limit;
        //return $sql;
        $model = Companyinfo::findBySql($sql)->asArray()->all();
        
        //$model = Companyinfo::find()->where($conf)->limit($limit)->offset($offset)->asArray()->all();
        if($model){
            foreach($model as $k => $m){
                $model[$k]["ofIndustryStr"] = (SysTrade::findOne(["code"=>$model[$k]["ofIndustry"]]))?(SysTrade::findOne(["code"=>$model[$k]["ofIndustry"]])->name):$model[$k]["ofIndustry"];
                $model[$k]["regMark"] = $model[$k]["regMark"]?$model[$k]["regMark"]:"";
                $model[$k]["taxes"] = $model[$k]["taxes"]?$model[$k]["taxes"]:"";
            }
            $model[0]["totalNum"] = $totalNum;
        }
        return $model;
    }
    public function getCompany($info){
        $cmp = "";
        $conf = array();
        if(isset($info["eid"]) && $info["eid"]){
            $conf["eid"] = $info["eid"];
        }
        if(isset($info["id"]) && $info["id"]){
            $conf["id"] = $info["id"];
        }else {
            if(isset($info["uid"]) && $info["uid"] && strstr($info["uid"], '@')){
                $ictWs = new IctWebService();
                $uids[0] = $info["uid"];
                $nodeInfo = $ictWs->getUsers($uids);
                $cName = "";
                if($nodeInfo){
                    $cName = isset($nodeInfo["result"][0]["data"]["departmentnumber"][0])?$nodeInfo["result"][0]["data"]["departmentnumber"][0]:"";
                }
                if($cName){
                    $conf["cName"] = $cName;
                    //$cmp = Companyinfo::find()->where($conf)->all();
                }
            }
        }
        $city = "沈阳";
        $tmp = $this->getLngAndLat($city);
        $lng_lat = "";
        if(isset($tmp["location"])){
            $lng_lat = "[".$tmp["location"]["lng"].",".$tmp["location"]["lat"]."]";
        }
        $cmp = Companyinfo::find()->where($conf)->asArray()->all();
        if($cmp){
            foreach($cmp as $k => $m){
                $cmp[$k]["ofIndustryStr"] = (SysTrade::findOne(["code"=>$cmp[$k]["ofIndustry"]]))?(SysTrade::findOne(["code"=>$cmp[$k]["ofIndustry"]])->name):$cmp[$k]["ofIndustry"];
                $cmp[$k]["regMark"] = $cmp[$k]["regMark"]?$cmp[$k]["regMark"]:"";
                $cmp[$k]["taxes"] = $cmp[$k]["taxes"]?$cmp[$k]["taxes"]:"0";
                $cmp[$k]["industryClassStr"] = (SysTrade::findOne(["code"=>$cmp[$k]["industryClass"]]))?(SysTrade::findOne(["code"=>$cmp[$k]["industryClass"]])->name):$cmp[$k]["industryClass"];
                $cmp[$k]["statusStr"] = isset(\Yii::$app->params["cmpStatus"][$cmp[$k]["status"]])?\Yii::$app->params["cmpStatus"][$cmp[$k]["status"]]:$cmp[$k]["status"];
                $cmp[$k]["scaleStr"] = isset(\Yii::$app->params["cmpScale"][$cmp[$k]["scale"]])?\Yii::$app->params["cmpScale"][$cmp[$k]["scale"]]:$cmp[$k]["scale"];
                $cmp[$k]["typeStr"] = isset(\Yii::$app->params["cmpType"][$cmp[$k]["type"]])?\Yii::$app->params["cmpType"][$cmp[$k]["status"]]:$cmp[$k]["type"];
                $cmp[$k]["domainStr"] = isset(\Yii::$app->params["cmpDomain"][$cmp[$k]["domain"]])?\Yii::$app->params["cmpDomain"][$cmp[$k]["domain"]]:$cmp[$k]["domain"];
                $cmp[$k]["regTypeStr"] = isset(\Yii::$app->params["cmpRegtype"][$cmp[$k]["regType"]])?\Yii::$app->params["cmpRegtype"][$cmp[$k]["regType"]]:$cmp[$k]["regType"];
                $cmp[$k]["localRegionStr"] = isset(\Yii::$app->params["cmpRegion"][$cmp[$k]["localRegion"]])?\Yii::$app->params["cmpRegion"][$cmp[$k]["localRegion"]]:$cmp[$k]["localRegion"];
                $tmp = $this->getLngAndLat($m["cName"]);
                if(isset($tmp["location"])){
                    $lng_lat = "[".$tmp["location"]["lng"].",".$tmp["location"]["lat"]."]";
                }
                $cmp[$k]["lngAndLat"] = $lng_lat;
            }
        }
        return $cmp;
    }
    public function getCompanyUid($info){
        $cmp = "";
        $conf = array();
        if(isset($info["uid"]) && $info["uid"] && strstr($info["uid"], '@')){
            $ictWs = new IctWebService();
            $uids[0] = $info["uid"];
            $nodeInfo = $ictWs->getUsers($uids);
            $cName = "";
            if($nodeInfo){
                $cName = isset($nodeInfo["result"][0]["data"]["departmentnumber"][0])?$nodeInfo["result"][0]["data"]["departmentnumber"][0]:"";
            }
            if($cName){
                $conf["cName"] = $cName;
                //return $conf;
                $cmp = Companyinfo::find()->where($conf)->one();
            }
        }
        return $cmp;
    }
    public function getCompanyExtra($info){
        $extra = "";
        $conf = array();
        if(isset($info["eid"]) && $info["eid"]){
            $conf["eid"] = $info["eid"];
        }
        if(isset($info["id"]) && $info["id"]){
            $conf["id"] = $info["id"];
        }else{ 
            if(isset($info["uid"]) && $info["uid"] && strstr($info["uid"], '@')){
                $ictWs = new IctWebService();
                $uids[0] = $info["uid"];
                $nodeInfo = $ictWs->getUsers($uids);
                $cName = "";
                if($nodeInfo){
                    $cName = isset($nodeInfo["result"][0]["data"]["departmentnumber"][0])?$nodeInfo["result"][0]["data"]["departmentnumber"][0]:"";
                }
                if($cName){
                    $conf["cName"] = $cName;
                }
            }
        }
        $cmp = Companyinfo::find()->where($conf)->one();
        if($cmp){
            $extra = Extrainfo::find()->where(["cId"=>$cmp->id])->asArray()->all();
        }
        /*if($info["eid"]){
            $cmp = Companyinfo::find()->where(["eid"=>$info["eid"]])->asArray()->one();
            if($cmp){
                $extra = Extrainfo::find()->where(["cId"=>$cmp["id"]])->asArray()->all();
            }
        }*/
        if($extra){
            foreach($extra as $k => $m){
                $extra[$k]["cName"] = $cmp["cName"];
                $extra[$k]["type"] = \Yii::$app->params["extraType"][$extra[$k]["type"]];
            }
        }
        return $extra;
    }
    public function getCompanyHis($info){
        $his = "";
        $conf = array();
        if(isset($info["eid"]) && $info["eid"]){
            $conf["eid"] = $info["eid"];
        }
        if(isset($info["id"]) && $info["id"]){
            $conf["id"] = $info["id"];
        }else{
            if(isset($info["uid"]) && $info["uid"] && strstr($info["uid"], '@')){
                $ictWs = new IctWebService();
                $uids[0] = $info["uid"];
                $nodeInfo = $ictWs->getUsers($uids);
                $cName = "";
                if($nodeInfo){
                    $cName = isset($nodeInfo["result"][0]["data"]["departmentnumber"][0])?$nodeInfo["result"][0]["data"]["departmentnumber"][0]:"";
                }
                if($cName){
                    $conf["cName"] = $cName;
                }
            }
        }
        $cmp = Companyinfo::find()->where($conf)->one();
        if($cmp){
            $his = Hiscompanyinfo::find()->where(["cName"=>$cmp["cName"]])->asArray()->all();
        }
        /*if($info["eid"]){
            $cmp = Companyinfo::find()->where(["eid"=>$info["eid"]])->asArray()->one();
            if($cmp){
                $his = Hiscompanyinfo::find()->where(["cName"=>$cmp["cName"]])->asArray()->all();
            }
        }*/
        if($his){
            foreach($his as $k => $m){
                $his[$k]["ofIndustryStr"] = (SysTrade::findOne(["code"=>$his[$k]["ofIndustry"]]))?(SysTrade::findOne(["code"=>$his[$k]["ofIndustry"]])->name):$his[$k]["ofIndustry"];
                $his[$k]["taxes"] = $his[$k]["taxes"]?$his[$k]["taxes"]:"";
            }
        }
        return $his;
    }
    public function getCmpList($info){
        $limit = isset($info["limit"]) ? $info["limit"] : 10;
        $offset = isset($info["offset"]) ? $info["offset"] : 0;
        if(isset($info["search"])){
            $query = Companyinfo::find()->where(["like","cName",$info["search"]]);
        }else{
            $query = Companyinfo::find()->where([]);
        }
        
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $limit,
            ],
            'sort' => [
                'defaultOrder' => [
                    'createTime' => SORT_DESC,
                    'id' => SORT_ASC,
                ]
            ],
        ]);
        
        // ����һ��Postʵ��������
        $posts = $provider->getModels();
        if($posts){
            foreach($posts as $k => $m){
                $posts[$k]["ofIndustryStr"] = (SysTrade::findOne(["code"=>$posts[$k]["ofIndustry"]]))?(SysTrade::findOne(["code"=>$posts[$k]["ofIndustry"]])->name):$posts[$k]["ofIndustry"];
                $posts[$k]["regMark"] = $posts[$k]["regMark"]?$posts[$k]["regMark"]:"";
            }
        }
        // �ڵ�ǰҳ��ȡ���������Ŀ
        $count = $provider->getCount();
        
        // ��ȡ����ҳ��������������
        $totalCount = $provider->getTotalCount();
        //$return["info"] = $info;
        $return["totalNum"] = $totalCount;
        $return["pageSize"] = $limit;
        $return["curPage"] = "1";
        $return["curNum"]  = $count;
        $return["list"] = $posts;        
        return $return;
    }
    public function getParamOptions($param,$chked){
        $paramArr = \Yii::$app->params[$param];
        $options = "";
        foreach($paramArr as $key => $value){
            if(strcasecmp($key, $chked)==0){
                $options .= "<option value='".$key."' selected>".$value."</option>";
            }else{
                $options .= "<option value='".$key."'>".$value."</option>";
            }
        }
        return $options;
    }
    public function getParamCheckboxs($param,$chked,$name){
        $paramArr = \Yii::$app->params[$param];
        $options = "";
        if(strlen($chked)>0){
            $chked = ",".$chked.",";
        }
        foreach($paramArr as $key => $value){
            //if(strcasecmp($key, $chked)==0){
            if(strstr($chked, ",".$key.",")){
                $options .= "<input type='checkbox'  value='".$key."' name='".$name."' checked>&nbsp;".$value."&nbsp;&nbsp;&nbsp;&nbsp;";
            }else{
                $options .= "<input type='checkbox'  value='".$key."' name='".$name."'>&nbsp;".$value."&nbsp;&nbsp;&nbsp;&nbsp;";
            }
        }
        return $options;
    }
    public function getSysTrade(){
        $result = SysTrade::findBySql("SELECT code,name FROM sys_trade where pcode='0'")->asArray()->all();
        $return = array();
        foreach($result as $k => $v){
            $return[$v["code"]] = $v["name"];
        }
        return $return;
    }
    public function getSysTradeSub(){
        $result = SysTrade::findBySql("SELECT code,name,pcode FROM sys_trade where length(pcode)=1 and pcode!='0'")->asArray()->all();
        $return = array();        
        foreach($result as $k => $v){
            $return[$v["pcode"]][] = $v;
        }
        return $return;
    }
    public function getSysTrade_info($query_c="1"){
        $result = SysTrade::findBySql("SELECT code,name,pcode FROM sys_trade where ".$query_c)->asArray()->one();
        
        return $result;
    }
    public function getTradeOptions($chked){
        $tradeArr = $this->getSysTrade();
        $options = "";
        foreach($tradeArr as $k => $v){
            if (strcasecmp($chked,$k)==0){
                $options .= "<option value='".$k."' selected>".$k.".".$v."</option>";
            }else{
                $options .= "<option value='".$k."'>".$k.".".$v."</option>";
            }
        }
        return $options;
    }
    public function getIndustryDesp($info){
        $class = isset($info) ? $info: "";
        $return = "";
        if($class){
            $query = SysTrade::find()->where(["code"=>$class])->asArray()->one();
            if($query){
                $return = $query["descrition"];
            }
        }
        return $return;
    }
    public function getOrgUid($name,$eid){
        $connection = Yii::$app->db;
        $uid = "";
        $sql = "select * from ict2.organization where name='".$name."' and eid='".$eid."'";
        $command = $connection->createCommand($sql);
        $result = $command->queryOne();
        
        if($result["uid"]){
            $uid = $result["uid"];
        }
        return $uid;
    }
    public function getUrlContent($url){        
        $snoopy = new Snoopy();
        //$url = "http://www.baidu.com";
        // $snoopy->fetch($url);
        // $snoopy->fetchtext($url);//去除HTML标签和其他的无关数据
        $snoopy->fetch($url);//获取全文
        //只返回网页中链接 默认情况下，相对链接将自动补全，转换成完整的URL。
        // $snoopy->fetchlinks($url);
        $result = $snoopy->results;
        return $result;
        //var_dump($snoopy->results);
    }
    public function getWeatherInfo($city){
        $curl = new Curl();
        $url = "http://api.map.baidu.com/telematics/v3/weather?location=".$city."&output=json&ak=cM2X0lVniay8Qv3PulRPq1ofOT3GntsH";
        $param = array();
        $info = json_decode($curl->post($url,$param),true);
        $result = "";
        if(isset($info["status"]) && strcasecmp($info["status"], "success")==0){
            $result = $info["results"][0];
        }
        return $result;
    }
    public function getWinfo_fromdb(){
        $connection = Yii::$app->db;
        $sql = "select * from sysparam where name='weather_info'";
        $command = $connection->createCommand($sql);
        $result = $command->queryOne();
        $curTime = date("Y-m-d H:i:s",time());
        $return = "";
        if($result){
            $return = $result["value"];
        }
        return $return;
    }
    public function getLngAndLat($address){
        $curl = new Curl();
        $url = "http://api.map.baidu.com/geocoder?address=".$address."&output=json&key=37492c0ee6f924cb5e934fa08c6b1676";
        $param = array();
        $info = json_decode($curl->post($url,$param),true);
        $result = "";
        if(isset($info["status"]) && strcasecmp($info["status"], "ok")==0){
            $result = $info["result"];
        }
        return $result;
    }
    public function getDomainStat(){
        $result = SysTrade::findBySql("SELECT domain,count(cName) cNum FROM companyinfo group by domain having cNum>0")->asArray()->all();
        $totalNum = 0;
        foreach($result as $k => $v){
            $result[$k]["domainName"] = \Yii::$app->params["cmpDomain"][$v["domain"] ];
            $totalNum += intval($v["cNum"]);
        }
        $result[0]["totalNum"] = $totalNum;
        return $result;
    }
    public function getEconomyList($cId,$fromYear){
        $list = Economyinfo::find()->where(["and","cId='".$cId."'","ofyear>".$fromYear.""])->asArray()->all();
        $result = "";
        if($list){
            $result = json_encode($list);
        }        
        return $result;
    }
    public function getGovUserOptions($chked){
        $ws = new IctWebService();
        $connection = Yii::$app->db;
        $list = $ws->getGovUserList();
        $result = "";
        $options = "";
        if(isset($list["status"]) && ($list["status"] == "0")){
            $result = isset($list["result"])?$list["result"]:"";
            foreach ($result as $k=>$v){                
                $sql = "select name from ict2.memberlist where guid='".$v."'";
                $command = $connection->createCommand($sql);
                $qresult = $command->queryOne();
                $name = "";
                if($qresult){
                    $name = $qresult["name"];
                    if(strcasecmp($v, $chked) == 0){
                        $options .= "<option value='".$v."' selected>".$name."</option>";
                    }else{
                        $options .= "<option value='".$v."'>".$name."</option>";
                    }                    
                }                    
            }
        }
        return $options;
    }
    public function getGovUserName($uid){
        $connection = Yii::$app->db;
        $result = "";
        if($uid){            
            $sql = "select name,mobileNumber from ict2.memberlist where guid='".$uid."'";
            $command = $connection->createCommand($sql);
            $qresult = $command->queryOne();
            if($qresult){
                $result = $qresult;
            }
        }
        return $result;
    }
    public function getCmpFoundTimeStat($domain){
        $connection = \Yii::$app->db;
        $result = "";
        $conf = "1 and year(foundingTime) is not null";
        if(strlen($domain)>0){
            $conf .= " and domain='".$domain."'";            
        }
        $sql = "SELECT year(foundingTime) statYear,count(cName) statValue FROM ".Companyinfo::tableName()." where ".$conf." group by year(foundingTime)";
        $result = Companyinfo::findBySql($sql)->asArray()->all();
        $totalNum = 0;
        foreach($result as $k => $v){
            $totalNum += intval($v["statValue"]);
        }
        $result[0]["totalNum"] = $totalNum;
        return $result;
    }
    public function getCmpRegtypeStat($domain){
        $connection = \Yii::$app->db;
        $result = "";
        $conf = "1 and (regType is not null and regType!='' and regType!='0')";
        if(strlen($domain)>0){
            $conf .= " and domain='".$domain."'";
        }
        $sql = "SELECT regType,count(cName) statValue FROM ".Companyinfo::tableName()." where ".$conf." group by regType";
        $result = Companyinfo::findBySql($sql)->asArray()->all();
        $totalNum = 0;
        foreach($result as $k => $v){
            $result[$k]["regTypeStr"] = isset(\Yii::$app->params["cmpRegtype"][$result[$k]["regType"]])?\Yii::$app->params["cmpRegtype"][$result[$k]["regType"]]:"";
            $totalNum += intval($v["statValue"]);
        }
        $result[0]["totalNum"] = $totalNum;
        return $result;
    }
    public function getCmpScaleStat($domain){
        $connection = \Yii::$app->db;
        $result = "";
        $conf = "1 and (scale is not null and scale!='')";
        if(strlen($domain)>0){
            $conf .= " and domain='".$domain."'";
        }
        $sql = "SELECT scale,count(cName) statValue FROM ".Companyinfo::tableName()." where ".$conf." group by scale";
        $result = Companyinfo::findBySql($sql)->asArray()->all();
        $totalNum = 0;
        foreach($result as $k => $v){
            $result[$k]["scaleStr"] = isset(\Yii::$app->params["cmpScale"][$result[$k]["scale"]])?\Yii::$app->params["cmpScale"][$result[$k]["scale"]]:"";
            $totalNum += intval($v["statValue"]);
        }
        $result[0]["totalNum"] = $totalNum;
        return $result;
    }
    public function getCmpIndustryClassStat($domain){
        $connection = \Yii::$app->db;
        $result = "";
        $conf = "1 and (industryClass is not null and industryClass!='' and length(industryClass)=1)";
        if(strlen($domain)>0){
            $conf .= " and domain='".$domain."'";
        }
        $sql = "SELECT industryClass,count(cName) statValue FROM ".Companyinfo::tableName()." where ".$conf." group by industryClass";
        $result = Companyinfo::findBySql($sql)->asArray()->all();
        $totalNum = 0;
        $classArr = array();
        $classArr[0]["name"] = "第一产业";
        $classArr[0]["class"] = "A";
        $classArr[0]["statValue"] = 0;
        $classArr[1]["name"] = "第二产业";
        $classArr[1]["class"] = "B,C,D,E";
        $classArr[1]["statValue"] = 0;
        $classArr[2]["name"] = "第三产业";
        $classArr[2]["class"] = "F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T";
        $classArr[2]["statValue"] = 0;
        foreach($result as $k => $v){
            $trade = SysTrade::find()->where(['code'=>$result[$k]["industryClass"]])->asArray()->one();
            //$result[$k]["industryClassStr"] = $trade?$trade["name"]:"";
            foreach ($classArr as $k1=>$v1){
                if(strstr($v1["class"], $result[$k]["industryClass"])){
                    $classArr[$k1]["statValue"] += intval($v["statValue"]); 
                }
            }
            $totalNum += intval($v["statValue"]);
        }
        $classArr[0]["totalNum"] = $totalNum;
        return $classArr;
    }
}
?>
