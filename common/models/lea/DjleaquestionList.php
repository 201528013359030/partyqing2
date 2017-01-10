<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "djleaquestion_list".
 *
 * @property integer $paperid
 * @property string $uid
 * @property string $time
 * @property integer $questionNum
 * @property integer $correctNum
 * @property integer $falseNuM
 * @property integer $bankID
 * @property integer $finishflag
 * @property string $questions
 */
class DjleaquestionList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'djleaquestion_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['time'], 'safe'],
            [['questionNum', 'correctNum', 'falseNuM', 'bankID', 'finishflag'], 'integer'],
            [['uid'], 'string', 'max' => 10],
            [['questions'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paperid' => 'Paperid',
            'uid' => 'Uid',
            'time' => 'Time',
            'questionNum' => 'Question Num',
            'correctNum' => 'Correct Num',
            'falseNuM' => 'False Nu M',
            'bankID' => 'Bank ID',
            'finishflag' => 'Finishflag',
            'questions' => 'Questions',
        ];
    }
}
