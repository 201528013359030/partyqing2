<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "memberlist".
 *
 * @property string $uid
 * @property string $name
 * @property string $password
 * @property string $pcid
 * @property string $phoneid
 * @property string $padid
 * @property string $eid
 * @property string $oid
 * @property string $duty
 * @property string $business
 * @property string $mobileNumber
 * @property string $phoneNumber
 * @property string $extenNumber
 * @property string $email
 * @property string $photo
 * @property string $enterTime
 * @property integer $presenceStatus
 * @property integer $useStatus
 * @property string $memo
 * @property integer $isAdmin
 * @property string $type
 * @property string $role
 * @property string $guid
 * @property integer $sex
 * @property string $rank
 * @property string $homeNumber
 * @property string $officeAddress
 * @property integer $isLeave
 * @property string $employeeID
 * @property string $cornet
 * @property integer $isLeader
 */
class Memberlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'eid', 'mobileNumber'], 'required'],
            [['presenceStatus', 'useStatus', 'isAdmin', 'sex', 'isLeave', 'isLeader'], 'integer'],
            [['name', 'password', 'pcid', 'phoneid', 'padid', 'duty', 'business', 'mobileNumber', 'phoneNumber', 'extenNumber', 'email', 'enterTime', 'guid', 'homeNumber', 'employeeID', 'cornet'], 'string', 'max' => 32],
            [['eid', 'type', 'role'], 'string', 'max' => 16],
            [['oid', 'rank'], 'string', 'max' => 512],
            [['photo', 'officeAddress'], 'string', 'max' => 128],
            [['memo'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'name' => 'Name',
            'password' => 'Password',
            'pcid' => 'Pcid',
            'phoneid' => 'Phoneid',
            'padid' => 'Padid',
            'eid' => 'Eid',
            'oid' => 'Oid',
            'duty' => 'Duty',
            'business' => 'Business',
            'mobileNumber' => 'Mobile Number',
            'phoneNumber' => 'Phone Number',
            'extenNumber' => 'Exten Number',
            'email' => 'Email',
            'photo' => 'Photo',
            'enterTime' => 'Enter Time',
            'presenceStatus' => 'Presence Status',
            'useStatus' => 'Use Status',
            'memo' => 'Memo',
            'isAdmin' => 'Is Admin',
            'type' => 'Type',
            'role' => 'Role',
            'guid' => 'Guid',
            'sex' => 'Sex',
            'rank' => 'Rank',
            'homeNumber' => 'Home Number',
            'officeAddress' => 'Office Address',
            'isLeave' => 'Is Leave',
            'employeeID' => 'Employee ID',
            'cornet' => 'Cornet',
            'isLeader' => 'Is Leader',
        ];
    }
}
