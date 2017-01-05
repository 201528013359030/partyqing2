<?php 
namespace common\models;
use Yii;
use yii\base\Model;
use common\models\Publicinfo;
use common\models\PublicinfoMenu;
use dmstr\widgets\Menu;

class ActionPublicinfo extends Model{
	public function getPublicinfoList($info){
		$limit = isset($info['limit'])?$info['limit']:10;
		$offset = isset($info['offset'])?$info['offset']:0;
		if(isset($info['type'])){
			$model = Publicinfo::find()->where(['type'=>$info['type']])->orderBy(['createTime'=>SORT_DESC])->limit($limit)->offset($offset)->asArray()->all();
		}else {
			$model = Publicinfo::find()->where([])->orderBy(['createTime'=>SORT_DESC])->limit($limit)->offset($offset)->asArray()->all();
		}
		if(isset($info['uid'])){
			foreach ($model as $key=>$result){
				$model[$key]['mark'] = 0;
				$count = PublicinfoRead::find()->where(['pid'=>$result['Id']])->andWhere(['uid'=>$info['uid']])->asArray()->count();
				if($count>0){
					$model[$key]['mark'] = 1;
				}
			}
		}
		return $model;
	}
	public function getPublicinfo($info){
		$model = Publicinfo::findOne(['id'=>$info['id']]);
		if($model!=null){
			$model->readers = $model->readers+1;
			$db = Yii::$app->db;
			$transaction = $db->beginTransaction ();
			try{
				$model->save();
				if(isset($info['uid'])){
					$result = PublicinfoRead::find()->where(['pid'=>$info['id']])->andWhere(['uid'=>$info['uid']])->one();
					if($result!=null){
						$result->delete();
					}
				}
				$transaction->commit ();
			}catch (Exception $e){
				$transaction->rollBack ();
				throw new \yii\web\HttpException(200,array_values($model->getFirstErrors())[0],20100);
			}
		}else{
			return null;
		}
		return $model;
	}
	public function getPublicinfoMenuList($info){
		//$limit = isset($info['limit'])?$info['limit']:10;
		//$offset = isset($info['offset'])?$info['offset']:0;
		if(isset($info['id'])){
			//$model = PublicinfoMenu::find()->where(['id'=>$info['id']])->limit($limit)->offset($offset)->asArray()->all();
			$model = PublicinfoMenu::find()->where(['id'=>$info['id']])->asArray()->all();
		}else{
			//$model = PublicinfoMenu::find()->where([])->limit($limit)->offset($offset)->asArray()->all();
			$model = PublicinfoMenu::find()->where([])->asArray()->all();
		}
		if(isset($info['uid'])){
			foreach ($model as $key=>$menu){
				$model[$key]['mark'] = 0;
				$count = PublicinfoRead::find()->where(['type'=>$menu['id']])->andWhere(['uid'=>$info['uid']])->asArray()->count();
				if($count>0){
					$model[$key]['mark'] = 1;
				}
			}
		}
		return $model;
	}
	public function getPublicinfoMenu($info){
		if($info["id"]){
			$publicinfoMenu = PublicinfoMenu::find()->where(["id"=>$info["id"]])->asArray()->one();
		}
		return $publicinfoMenu;
	}
	public function addPublicinfo($info){
		$model = new Publicinfo();
		$model->title = $info['title'];
		$model->content = $info['content'];
		if(isset($info['attach'])){
			$model->attach = $info['attach'];
		}
		$model->sender_id = $info['uid'];
		$model->createTime = (String)time();
		$model->type = $info['type'];
		$model->readers=0;
		if(isset($info['sender_name'])){
			$model->sender_name=$info['sender_name'];
		}
		if($model->save()){
			return 1;
		}else{
			return 0;
		}
	}
	public function updatePublicinfoMenu($info){
		$model = PublicinfoMenu::findOne(['id'=>$info['id']]);
		if(isset($info['menu_name'])){
			$model->menu_name= $info['menu_name'];
		}
	}
	public function getPublicinfoByTitle($info){
		$limit = isset($info['limit'])?$info['limit']:10;
		$offset = isset($info['offset'])?$info['offset']:0;
		if(isset($info['type'])){
			//$model = Publicinfo::find()->where(['type'=>$info['type']])->andFilterWhere(['like','title',$info['title']])->orderBy(['createTime'=>SORT_DESC])->limit($limit)->offset($offset)->asArray()->all();
			$model = Publicinfo::find()->where(['type'=>$info['type']])->andFilterWhere(['like','title',$info['title']])->orderBy(['createTime'=>SORT_DESC])->asArray()->all();
		}else{
			//$model = Publicinfo::find()->filterWhere(['like','title',$info['title']])->orderBy(['createTime'=>SORT_DESC])->limit($limit)->offset($offset)->asArray()->all();
			$model = Publicinfo::find()->filterWhere(['like','title',$info['title']])->orderBy(['createTime'=>SORT_DESC])->asArray()->all();
		}
		
		return $model;
	}
	public function searchPublicinfoList($info){
		$limit = isset($info['limit'])?$info['limit']:10;
		$offset = isset($info['offset'])?$info['offset']:0;
		$sql = "select * from publicinfo";
		$flag = 0;
		if(isset($info['title'])){
			$sql=$sql.' where title like "%'.$info['title'].'%"';
			$flag = 1;
		}			
		if(isset($info['type'])){
			if($flag){
				$sql = $sql.' and type = '.$info['type'];
			}else{
				$sql = $sql.' where type = '.$info['type'];
				$flag=1;
			}
		}
		if(isset($info['sender_name'])){
			if($flag){
				$sql = $sql.' and sender_name like "%'.$info['sender_name'].'%"';
			}else{
				$sql = $sql.' where sender_name like "%'.$info['sender_name'].'%"';
				$flag=1;
			}
		}
		if(isset($info['createTime'])){
			$time_start = strtotime($info['createTime'].' 00:00:00');
			$time_end = $time_start + 24*60*60 -1;
			if($flag){
				$sql = $sql.' and createTime > "'.$time_start.'" and createTime < "'.$time_end.'"';
			}else{
				$sql = $sql.' where createTime > "'.$time_start.'" and createTime < "'.$time_end.'"';
				$flag=1;
			}
		}
		$sql = $sql.' order by createTime desc limit '.$limit.' offset '.$offset;
	//	echo $sql;
		$model = \Yii::$app->db->createCommand($sql)->queryAll();
		return $model;
	//	return $sql;
	}
	
	public function getPublicinfoCount($info){
		$sql = "select count(id) as total from publicinfo";
		$flag = 0;
		if(isset($info['title'])){
			$sql=$sql.' where title like "%'.$info['title'].'%"';
			$flag = 1;
		}
		if(isset($info['type'])){
			if($flag){
				$sql = $sql.' and type = '.$info['type'];
			}else{
				$sql = $sql.' where type = '.$info['type'];
				$flag=1;
			}
		}
		if(isset($info['sender_name'])){
			if($flag){
				$sql = $sql.' and sender_name like "%'.$info['sender_name'].'%"';
			}else{
				$sql = $sql.' where sender_name like "%'.$info['sender_name'].'%"';
				$flag=1;
			}
		}
		if(isset($info['createTime'])){
			$time_start = strtotime($info['createTime'].' 00:00:00');
			$time_end = $time_start + 24*60*60 -1;
			if($flag){
				$sql = $sql.' and createTime > "'.$time_start.'" and createTime < "'.$time_end.'"';
			}else{
				$sql = $sql.' where createTime > "'.$time_start.'" and createTime < "'.$time_end.'"';
				$flag=1;
			}
		}
		$sql = $sql.' order by createTime desc';
		//echo $sql;
		$model = \Yii::$app->db->createCommand($sql)->queryAll();
		//var_dump($model);
		return $model;
	}
	
	public function getPublicinfoSubscribeList($info){
		//select publicinfo_menu.id as id,publicinfo_menu.menu_name as menu_name,count(publicinfo_subscribe.id) as total from  publicinfo_menu left join  publicinfo_subscribe on publicinfo_subscribe.type = publicinfo_menu.id group by publicinfo_subscribe.type  order by count(publicinfo_subscribe.id) desc
		//select publicinfo_menu.id as id,publicinfo_menu.menu_name as menu_name,count(publicinfo_subscribe.id) as total from  publicinfo_menu left join  publicinfo_subscribe on publicinfo_subscribe.type = publicinfo_menu.id  where publicinfo_subscribe.type =1 group by publicinfo_subscribe.type  order by count(publicinfo_subscribe.id) desc
		//select publicinfo_menu.id as id,publicinfo_menu.menu_name as menu_name,count(publicinfo_subscribe.id) as total from  publicinfo_menu left join  publicinfo_subscribe on publicinfo_subscribe.type = publicinfo_menu.id  where publicinfo_subscribe.type=1  order by count(publicinfo_subscribe.id) desc
		$sql = "select publicinfo_menu.id as type,publicinfo_menu.menu_name as menu_name,count(publicinfo_subscribe.id) as total from  publicinfo_menu left join  publicinfo_subscribe on publicinfo_subscribe.type = publicinfo_menu.id";
		if(isset($info['type'])){
			$sql = $sql.' where publicinfo_menu.id ='.$info['type'];
		}else{
			$sql = $sql.' group by publicinfo_menu.id';
		}
		if(isset($info['order'])){
			if($info['order']==2)
				$sql = $sql.' order by count(publicinfo_subscribe.id) asc';
			if($info['order']==3)
				$sql = $sql. ' order by count(publicinfo_subscribe.id) desc';
		}
		$model = \Yii::$app->db->createCommand($sql)->queryAll();
		return $model;
	}
	
	public function getPublicinfoSubscribeDetail($info){
		$limit = isset($info['limit'])?$info['limit']:10;
		$offset = isset($info['offset'])?$info['offset']:0;
		$model = PublicinfoSubscribe::find()->where(['type'=>$info['type']]);
		if(isset($info['username'])){
			$model = $model->andWhere(['username'=>$info['username']]);
		}
		if(isset($info['order'])){
			if($info['order']==2)
				$model = $model->orderBy(['createTime'=>SORT_ASC]);
				//$model = PublicinfoSubscribe::find()->where(['type'=>$info['type']])->orderBy(['createTime'=>SORT_ASC])->limit($limit)->offset($offset)->asArray()->all();
			if($info['order']==3)
				$model = $model->orderBy(['createTime'=>SORT_DESC]);
				//$model = PublicinfoSubscribe::find()->where(['type'=>$info['type']])->orderBy(['createTime'=>SORT_DESC])->limit($limit)->offset($offset)->asArray()->all();
		}
			$model = $model->limit($limit)->offset($offset)->asArray()->all();
		return $model;
	}
}