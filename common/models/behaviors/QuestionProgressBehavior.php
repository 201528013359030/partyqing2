<?php


namespace common\models\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;
use common\models\Questioninfo;
use common\models\Companyinfo;
use common\models\IctWebService;

class QuestionProgressBehavior extends Behavior
{


    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => [$this, 'afterLappNotice'],
        ];
    }

    /**
     * 通知
     * @param  [type] $event [description]
     * @return [type]        [description]
     */
    public function afterLappNotice($event)
    {
        $model = Questioninfo::findOne($event->sender->qid);
        // 发送通知
        $ws = new IctWebService();
        $url = \Yii::$app->params['serverHttp']."/advancedRequestMore/html/main.html?serverIp=".\Yii::$app->params['serverHttp']."&uid=&auth_token=#content_{$event->sender->qid}";
        $uids = explode(',', $model->contacts);
        $uids[] = $model->sender;
        $ws->lappNotice(9,$uids,$model->title,$url);
        return ;
    }
}
