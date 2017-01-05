<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enterprise".
 *
 * @property string $eid
 * @property string $ename
 * @property string $type
 * @property integer $ofIndustry
 * @property string $intro
 * @property string $phoneNumber
 * @property string $faxNumber
 * @property string $license
 * @property string $logo
 * @property string $memo
 * @property integer $isOpen
 * @property string $uid
 * @property string $vision
 * @property string $officeAddress
 * @property string $contacts
 * @property string $postCode
 * @property string $email
 * @property string $webSite
 * @property string $defaultTypes
 * @property string $centrexNumber
 * @property string $outPrefix
 * @property integer $offlinemsgpath
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ename'], 'required'],
            [['ofIndustry', 'isOpen', 'offlinemsgpath'], 'integer'],
            [['ename', 'license', 'email', 'webSite', 'centrexNumber'], 'string', 'max' => 64],
            [['type', 'phoneNumber', 'faxNumber', 'contacts', 'postCode', 'outPrefix'], 'string', 'max' => 32],
            [['intro', 'memo'], 'string', 'max' => 256],
            [['logo', 'officeAddress', 'defaultTypes'], 'string', 'max' => 128],
            [['uid'], 'string', 'max' => 16],
            [['vision'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eid' => 'Eid',
            'ename' => 'Ename',
            'type' => 'Type',
            'ofIndustry' => 'Of Industry',
            'intro' => 'Intro',
            'phoneNumber' => 'Phone Number',
            'faxNumber' => 'Fax Number',
            'license' => 'License',
            'logo' => 'Logo',
            'memo' => 'Memo',
            'isOpen' => 'Is Open',
            'uid' => 'Uid',
            'vision' => 'Vision',
            'officeAddress' => 'Office Address',
            'contacts' => 'Contacts',
            'postCode' => 'Post Code',
            'email' => 'Email',
            'webSite' => 'Web Site',
            'defaultTypes' => 'Default Types',
            'centrexNumber' => 'Centrex Number',
            'outPrefix' => 'Out Prefix',
            'offlinemsgpath' => 'Offlinemsgpath',
        ];
    }
}
