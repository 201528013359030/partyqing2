<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IctWebService;
use common\models\Curl;
use common\models\WSes;
use common\models\Esinfo;
use common\models\Industryinfo;
use common\models\ProductSup;
use common\models\ProductReq;
use common\models\Esmessage;
use common\models\Hiscompanyinfo;
use yii\base\Object;
use common\models\SysTrade;
use common\models\Snoopy\Snoopy;
use common\models\Action;
/**
 *
 */
class ActionEs extends Model{
	public function getEsinfoList($info){
			
		//$info='{"uid":"","limit":1,"offset":1,"id":"2","detail":"1"}';
		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$offset = isset($info["offset"]) ? $info["offset"] : 0;
		$conf = array();
		$query_c = "1";
	
	
	

		$model[0]["totalNum"] = $query_c;
		
		return $model;
	}
	
	public function getEsinfoList0($info){
		 
		
		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$offset = isset($info["offset"]) ? $info["offset"] : 0;
		$conf = array();
		$query_c = "1";


		//1，不获取无公司店铺
		if(isset($info["valid"])&&$info["valid"]=="1")
		{
			$query_c.=" and cid in(select id from companyinfo ) ";
		}
		//按照公司名称查询
		if(isset($info["cName"]) && $info["cName"]){

			$query_c .= " and cid in(select id from companyinfo where cName like '%".$info["cName"]."%') ";
		}
		//按照功能区查询
		if(isset($info["domain"]) && strlen($info["domain"])>0){

			$query_c .= " and cid in(select id from companyinfo where domain in (".$info["domain"].")) ";
		}
		//按照企业分类
		if(isset($info["industryClass"]) && strlen($info["industryClass"])>0){
 
			$query_c .= " and cid in(select id from companyinfo where industryClass in (".$info["industryClass"].") )";
		}


		//如果按照公司id查询
		if(isset($info["id"]) && $info["id"]){

			$query_c .= " and id=".$info["id"]." ";
		}
		//如果请求详细信息，且无id
		else if(isset($info["detail"])){
			//如果根据企业用户获取uid
			$comaction=new Action();
			$company=$comaction->getCompanyUid($info);
			if($company)$info["cid"]=$company->id;
			$query_c .= " and cid=".$info["cid"]." ";

		}
		$sql_all = "select * from esinfo where ".$query_c;
	 
 
		$totalNum = count(Esinfo::findBySql($sql_all)->all());
		if(intval($totalNum)<=intval($limit)){
			$offset = 0;
		}
		$sql = "select * from esinfo where ".$query_c." order by id desc limit ".$offset.",".$limit;
		 


		//return $sql;
		$model = Esinfo::findBySql($sql)->asArray()->all();

		//$model = Companyinfo::find()->where($conf)->limit($limit)->offset($offset)->asArray()->all();
		//获取图片路径
		if (file_exists ( "/var/lib/mosquitto/tls" )) {
			$tls = "https://";
		} else {
			$tls = "http://";
		}
		$tls=Yii::$app->params["esmediahttp"];
		$ws = new IctWebService ();
		$offline_ip = $ws->getAdminToken ();
		 

		if($model){
			foreach($model as $k => $m){
				 
				$tempcompany=Companyinfo::findOne($model[$k]["cid"]);
				$model[$k]["cName"] = ($tempcompany&&$tempcompany->cName)?$tempcompany->cName:$model[$k]["cid"];
				if($model[$k]["Imageurl"]){
					$imageurlarr=array();
					 
					$imageurlarr=json_decode($model[$k]["Imageurl"],true);

					 
					$imageurl= $imageurlarr["small_url"];
				}
				$model[$k]["Imageurl"] = $model[$k]["Imageurl"]?$model[$k]["Imageurl"]:"";
				$model[$k]["Imagetrueurl"] = $model[$k]["Imageurl"]?$imageurl:"images/eshop/banner.png";
				$model[$k]["Aboutussum"] = $model[$k]["Aboutussum"]?$model[$k]["Aboutussum"]:"";
				$model[$k]["Aboutus"] = $model[$k]["Aboutus"]?$model[$k]["Aboutus"]:"";
				$model[$k]["Intro"] = $model[$k]["Intro"]?$model[$k]["Intro"]:"";
				$model[$k]["Contractussum"] = $model[$k]["Contractussum"]?$model[$k]["Contractussum"]:"";
				$model[$k]["Contractus"] = $model[$k]["Contractus"]?$model[$k]["Contractus"]:"";
				$model[$k]["Productintro"] = $model[$k]["Productintro"]?$model[$k]["Productintro"]:"";
				$model[$k]["Updatetime"] = $model[$k]["Updatetime"]?$model[$k]["Updatetime"]:"";
				$model[$k]["Updateuser"] = $model[$k]["Updateuser"]?$model[$k]["Updateuser"]:"";
				$model[$k]["photos"] = $model[$k]["photos"]?$model[$k]["photos"]:"";
				$model[$k]["publicContacts"] = ($tempcompany&&$tempcompany->publicContacts)?$tempcompany->publicContacts:"";
				$model[$k]["phone"] =($tempcompany&&$tempcompany->phone)? $tempcompany->phone:"";
				$model[$k]["publicPhone"] = ($tempcompany&&$tempcompany->publicPhone)? $tempcompany->publicPhone:"";
				$model[$k]["publicEmail"] = ($tempcompany&&$tempcompany->publicEmail)? $tempcompany->publicEmail:"";
				
				$model[$k]["publicUrl"] =($tempcompany&&$tempcompany->publicUrl)? $tempcompany->publicUrl:"";
				if(!strstr($model[$k]["publicUrl"],"http"))
				{
					$model[$k]["publicUrl"] ="http://". $model[$k]["publicUrl"];
				}
				$model[$k]["position"] = ($tempcompany&&$tempcompany->position)? $tempcompany->position:"";
				$model[$k]["offline_ip"] = $tls . $offline_ip ['result'] ['offline_ip'] ;
				$model[$k]["legalRep"] = ($tempcompany&&$tempcompany->legalRep)? $tempcompany->legalRep:"";
			}
			$model[0]["totalNum"] = $totalNum;
		}
		return $model;
	}
	 
	 
	public function getEsmessageList($info){

		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$offset = isset($info["offset"]) ? $info["offset"] : 0;
		$conf = array();
		$query_c = "1";


		//如果按照status查询
		if(isset($info["status"]) && $info["status"]){
			 
			$query_c .= " and status=".$info["status"]." ";
		}

		//如果按照type查询
		if(isset($info["type"]) && $info["type"]){
			 
			$query_c .= " and type=".$info["type"]." ";
		}

		//如果按照id查询
		if(isset($info["id"]) && $info["id"]){

			$query_c .= " and id=".$info["id"]." ";
		}
		 
		//按uid查询
		if(isset($info["uid"])){
			//如果根据企业用户获取uid
			$comaction=new Action();
			$company=$comaction->getCompanyUid($info);

			if($company)$info["cid"]=$company->id;
			$query_c .= " and cid=".$info["cid"]." ";

		}
		$sql_all = "select * from esmessage where ".$query_c;
		$totalNum = count(Esmessage::findBySql($sql_all)->all());
		if(intval($totalNum)<=intval($limit)){
			$offset = 0;
		}
		$sql = "select * from esmessage where ".$query_c." order by id desc limit ".$offset.",".$limit;



		//return $sql;
		$model = Esmessage::findBySql($sql)->asArray()->all();

		//$model = Companyinfo::find()->where($conf)->limit($limit)->offset($offset)->asArray()->all();
		if($model){
			foreach($model as $k => $m){
				 
				$model[$k]["Title"] = $model[$k]["Title"]?$model[$k]["Title"]:"";
				$model[$k]["type"] = $model[$k]["type"]?$model[$k]["type"]:"0";
				$model[$k]["typeStr"] = isset(\Yii::$app->params["esType"][$model[$k]["type"]])?\Yii::$app->params["esType"][$model[$k]["type"]]:$model[$k]["type"];
				 
				$model[$k]["name"] = $model[$k]["name"]?$model[$k]["name"]:"";
				$model[$k]["Phone"] = $model[$k]["Phone"]?$model[$k]["Phone"]:"";
				$model[$k]["Email"] = $model[$k]["Email"]?$model[$k]["Email"]:"";
				$model[$k]["description"] = $model[$k]["description"]?$model[$k]["description"]:"";
				$model[$k]["status"] = $model[$k]["status"]?$model[$k]["status"]:"1";
				$model[$k]["statusStr"] = isset(\Yii::$app->params["esStatus"][$model[$k]["status"]])?\Yii::$app->params["esStatus"][$model[$k]["status"]]:$model[$k]["status"];
				$model[$k]["Updatetime"] = $model[$k]["Updatetime"]?$model[$k]["Updatetime"]:"";
				$model[$k]["Updateuser"] = $model[$k]["Updateuser"]?$model[$k]["Updateuser"]:"";
				$model[$k]["createtime"] = $model[$k]["createtime"]?$model[$k]["createtime"]:"";
				 
			}
			$model[0]["totalNum"] = $totalNum;
		}
		 
		 
		return $model;
	}
	 
	public function getEsmessageCreate($info){
		 
		$info = json_decode($info,true);
		 
		//如果根据企业用户获取uid
		$comaction=new Action();
		$company=$comaction->getCompanyUid($info);
		 
		if($company)$info["cid"]=$company->id;

		$model = new Esmessage();
		 
		$model->Title =$info["Title"];
		 
		$model->type = $info["type"];

		$model->name = $info["Name"];

		$model->Phone =$info["Phone"];
		 
		$model->Email = $info["Email"];
		if(isset($info["description"]))$model->description =$info["description"];
		$model->status = "1";
		$model->createtime = date("Y-m-d H:i:s",time());
		$model->cid =$info["cid"];

		 
		if($model->save()){
			 
			return ["succeed"=>1];
		}else{
			//print_r($model->errors);
			throw new \yii\web\HttpException(200,array_values($questioninfo->getFirstErrors())[0],20200);;
		}
		 
		 
		 
		 
		 
	}
	public function getSysTrade(){
		$result = SysTrade::findBySql("SELECT code,name FROM sys_trade where pcode='0'")->asArray()->all();
		$return = array();
		foreach($result as $k => $v){
			$return[$v["code"]] = $v["name"];
		}
		return $return;
	}
	

	public function getProductsupList($info){
		 //$info='{"uid":"15@5","limit":8,"offset":0,"eid":"4"}';
		 
		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$offset = isset($info["offset"]) ? $info["offset"] : 0;
		$conf = array();
		$query_c = "1";

 


		//如果按照供应id查询
		if(isset($info["id"]) && $info["id"]){

			$query_c .= " and id=".$info["id"]." ";
		}
		 
		//如果按照店铺 id 查询
		if(isset($info["eid"]) && $info["eid"]){
		
			$query_c .= " and  provider in(select cName from companyinfo where id in (select cid from esinfo where id=".$info["eid"].")) ";
		}
			
		$sql_all = "select * from product_sup where ".$query_c;
	 
		 
		$totalNum = count(Esinfo::findBySql($sql_all)->all());
		if(intval($totalNum)<=intval($limit)){
			$offset = 0;
		}
		$sql = "select * from product_sup where ".$query_c." order by id desc limit ".$offset.",".$limit;
		 
  

		//return $sql;
		$model = ProductSup::findBySql($sql)->asArray()->all();
 
		//获取图片路径
		if (file_exists ( "/var/lib/mosquitto/tls" )) {
			$tls = "https://";
		} else {
			$tls = "http://";
		}
		$tls=Yii::$app->params["esmediahttp"];
		$ws = new IctWebService ();
		$offline_ip = $ws->getAdminToken ();
		 

		if($model){
			foreach($model as $k => $m){
				$model[$k]["title"] = $model[$k]["title"]?$model[$k]["title"]:"";
				$model[$k]["provider"] = $model[$k]["provider"]?$model[$k]["provider"]:"";
				$model[$k]["quote"] = $model[$k]["quote"]?$model[$k]["quote"]:"";
				$model[$k]["brand"] = $model[$k]["brand"]?$model[$k]["brand"]:"";
				$model[$k]["model"] = $model[$k]["model"]?$model[$k]["model"]:"";
				$model[$k]["standard"] = $model[$k]["standard"]?$model[$k]["standard"]:"";
				$model[$k]["location"] = $model[$k]["location"]?$model[$k]["location"]:"";
				$model[$k]["contact_tel"] = $model[$k]["contact_tel"]?$model[$k]["contact_tel"]:"";
				$model[$k]["contact_name"] = $model[$k]["contact_name"]?$model[$k]["contact_name"]:"";
				$model[$k]["keyword"] = $model[$k]["keyword"]?$model[$k]["keyword"]:"";
				$model[$k]["number"] = $model[$k]["number"]?$model[$k]["number"]:"";
				$model[$k]["detail"] = $model[$k]["detail"]?$model[$k]["detail"]:"";
				$model[$k]["image"] = $model[$k]["image"]?$model[$k]["image"]:"";
		 
				$model[$k]["thumbnail"] = $model[$k]["thumbnail"]?$model[$k]["thumbnail"]:"";
				$model[$k]["sender_uid"] = $model[$k]["sender_uid"]?$model[$k]["sender_uid"]:"";
				$model[$k]["sender_name"] = $model[$k]["sender_name"]?$model[$k]["sender_name"]:"";
				$model[$k]["createTime"] = $model[$k]["createTime"]?$model[$k]["createTime"]:"";
	            $model[$k]["type"] = $model[$k]["type"]?$model[$k]["type"]:"";
	            $model[$k]["typeStr"] = (ProductMenu::findOne(["id"=>$model[$k]["type"]]))?(ProductMenu::findOne(["id"=>$model[$k]["type"]])->name):$model[$k]["type"];
	         
		 
			}
			
		   
 
			$model[0]["totalNum"] = $totalNum;
		}
		return $model;
	}
	 

	public function getProductreqList($info){
		 //$info='{"uid":"15@5","limit":8,"offset":0,"eid":"4"}';
			
		$info = json_decode($info,true);
		$limit = isset($info["limit"]) ? $info["limit"] : 10;
		$offset = isset($info["offset"]) ? $info["offset"] : 0;
		$conf = array();
		$query_c = "1";
	
	
	
	
		//如果按照供应id查询
		if(isset($info["id"]) && $info["id"]){
	
			$query_c .= " and id=".$info["id"]." ";
		}
			
		//如果按照店铺 id 查询
		if(isset($info["eid"]) && $info["eid"]){
	
			$query_c .= " and  cName =  (select cName from companyinfo where id in (select cid from esinfo where id=".$info["eid"].")) ";
		}
			
		$sql_all = "select * from product_req where ".$query_c;
 
			
		$totalNum = count(Esinfo::findBySql($sql_all)->all());
		if(intval($totalNum)<=intval($limit)){
			$offset = 0;
		}
		$sql = "select * from product_req where ".$query_c." order by id desc limit ".$offset.",".$limit;
			
	
	
		//return $sql;
		$model = ProductSup::findBySql($sql)->asArray()->all();
	
		//获取图片路径
		if (file_exists ( "/var/lib/mosquitto/tls" )) {
			$tls = "https://";
		} else {
			$tls = "http://";
		}
		$tls=Yii::$app->params["esmediahttp"];
		$ws = new IctWebService ();
		$offline_ip = $ws->getAdminToken ();
			
	 
		if($model){
			foreach($model as $k => $m){
				$model[$k]["title"] = $model[$k]["title"]?$model[$k]["title"]:"";
				$model[$k]["type"] = $model[$k]["type"]?$model[$k]["type"]:"";
				$model[$k]["createTime"] = $model[$k]["createTime"]?$model[$k]["createTime"]:"";
					
				$model[$k]["typeStr"] = (ProductMenu::findOne(["id"=>$model[$k]["type"]]))?(ProductMenu::findOne(["id"=>$model[$k]["type"]])->name):$model[$k]["type"];
				
				$model[$k]["contact_tel"] = $model[$k]["contact_tel"]?$model[$k]["contact_tel"]:"";
				$model[$k]["contact_name"] = $model[$k]["contact_name"]?$model[$k]["contact_name"]:"";
				$model[$k]["thumbnail"] = $model[$k]["thumbnail"]?$model[$k]["thumbnail"]:"";
				$model[$k]["sender_uid"] = $model[$k]["sender_uid"]?$model[$k]["sender_uid"]:"";
				$model[$k]["sender_name"] = $model[$k]["sender_name"]?$model[$k]["sender_name"]:"";
				$model[$k]["image"] = $model[$k]["image"]?$model[$k]["image"]:"";
				$model[$k]["detail"] = $model[$k]["detail"]?$model[$k]["detail"]:"";
				
				$model[$k]["cName"] = $model[$k]["cName"]?$model[$k]["cName"]:"";
				$model[$k]["address"] = $model[$k]["address"]?$model[$k]["address"]:"";
			 
			 
			
	
			$model[0]["totalNum"] = $totalNum;
		}
		return $model;
	}
}

}
?>
