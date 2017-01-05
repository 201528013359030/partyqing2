<?php


namespace common\models\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;
use common\models\Questioninfo;
use common\models\Companyinfo;

class CompanyinfoBehavior extends Behavior
{


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => [$this, 'afterUpdateContacts'],
            ActiveRecord::EVENT_AFTER_DELETE => [$this, 'afterUpdateContacts'],

        ];
    }
    /**
     * 更新问题负责人
     * @param  [type] $event [description]
     * @return [type]        [description]
     */
    public function afterUpdateContacts($event)
    {
        if(($event->sender->govContact != $event->sender->getOldAttribute("govContact")) && $event->sender->getOldAttribute("govContact")){
            Questioninfo::updateAll(['contacts' => implode(',',[$event->sender->govContact])], ['in',"contacts",$event->sender->getOldAttribute("govContact")]);
        }
        return ;
    }
}
