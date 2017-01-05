<?php


namespace common\models\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;
use common\models\Questioninfo;
use common\models\Companyinfo;
use common\models\IctWebService;

class QuestioninfoBehavior extends Behavior
{


    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => [$this, 'afterInsertContacts'],
        ];
    }
    /**
     * 设置问题负责人
     * @param  [type] $event [description]
     * @return [type]        [description]
     */
    public function afterInsertContacts($event)
    {
        $companyName = Yii::$app->session['user.company'];
        $company = Companyinfo::findOne(["cName"=>$companyName]);
        if($company){
            $event->sender->contacts = implode(',',[$company->govContact]);
            $event->sender->save();
        }
        // 发送通知
        $ws = new IctWebService();
        $url = \Yii::$app->params['serverHttp']."/advancedRequestMore/html/main.html?serverIp=".\Yii::$app->params['serverHttp']."&uid=&auth_token=#content_{$event->sender->qID}";
        $ws->lappNotice(9,[$company->govContact,$event->sender->sender],$event->sender->title,$url);
        return ;
    }
}
