<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property string $oid
 * @property string $eid
 * @property string $name
 * @property string $parentID
 * @property string $intro
 * @property string $type
 * @property string $phoneNumber
 * @property string $manager
 * @property string $memo
 * @property integer $level
 * @property integer $rank
 * @property string $uid
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eid', 'name', 'rank'], 'required'],
            [['level', 'rank'], 'integer'],
            [['eid', 'parentID', 'uid'], 'string', 'max' => 16],
            [['name', 'type', 'phoneNumber', 'manager'], 'string', 'max' => 32],
            [['intro', 'memo'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'oid' => 'Oid',
            'eid' => 'Eid',
            'name' => 'Name',
            'parentID' => 'Parent ID',
            'intro' => 'Intro',
            'type' => 'Type',
            'phoneNumber' => 'Phone Number',
            'manager' => 'Manager',
            'memo' => 'Memo',
            'level' => 'Level',
            'rank' => 'Rank',
            'uid' => 'Uid',
        ];
    }
}
