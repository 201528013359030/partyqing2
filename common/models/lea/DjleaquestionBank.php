<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "djleaquestion_bank".
 *
 * @property integer $bankid
 * @property string $title
 * @property string $eid
 * @property string $orgid
 * @property string $bankflag
 * @property string $createtime
 * @property string $deleteflag
 * @property integer $questionnum
 * @property string $pic
 * @property string $sender
 * @property string $planid
 */
class DjleaquestionBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'djleaquestion_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'sender', 'planid'], 'required'],
            [['createtime'], 'safe'],
            [['questionnum'], 'integer'],
            [['title', 'sender'], 'string', 'max' => 100],
            [['eid'], 'string', 'max' => 20],
            [['orgid'], 'string', 'max' => 10],
            [['bankflag', 'deleteflag'], 'string', 'max' => 1],
            [['pic'], 'string', 'max' => 200],
            [['planid'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bankid' => 'Bankid',
            'title' => 'Title',
            'eid' => 'Eid',
            'orgid' => 'Orgid',
            'bankflag' => 'Bankflag',
            'createtime' => 'Createtime',
            'deleteflag' => 'Deleteflag',
            'questionnum' => 'Questionnum',
            'pic' => 'Pic',
            'sender' => 'Sender',
            'planid' => 'Planid',
        ];
    }
}
