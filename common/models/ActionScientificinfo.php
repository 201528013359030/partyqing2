<?php 
namespace common\models;
use yii\base\Model;
use backend\models\ScientificinfoSearch;

class ActionScientificinfo extends Model{
	public function getScientificinfoMenuList(){
		$model = ScientificinfoMenu::find()->asArray()->all();
		return $model;
	}
	public function getScientificinfoList($info){
		$limit = isset($info['limit'])?$info['limit']:10;
		$offset = isset($info['offset'])?$info['offset']:0;
		if(isset($info['type'])){
			$model = Scientificinfo::find()->where(['type'=>$info['type']])->orderBy(['FROM_UNIXTIME(createTime,"%Y-%m-%d")'=>SORT_DESC])->addOrderBy(['validTime'=>SORT_ASC])->limit($limit)->offset($offset)->asArray()->all();
		}else{
			$model = Scientificinfo::find()->orderBy(['FROM_UNIXTIME(createTime,"%Y-%m-%d")'=>SORT_DESC])->addOrderBy(['validTime'=>SORT_ASC])->limit($limit)->offset($offset)->asArray()->all();
		}
		return $model;
	}
	public function getScientificinfo($id){
		$model = Scientificinfo::findOne($id);
		return $model;
	}
	public function searchScientificinfoList($info){
		
	}
}