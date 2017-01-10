<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "djleaquestion_answer".
 *
 * @property integer $id
 * @property string $uid
 * @property string $questionid
 * @property string $answer
 * @property string $answerCorrect
 * @property integer $paperID
 */
class DjleaquestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'djleaquestion_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questionid', 'answer', 'paperID'], 'required'],
            [['paperID'], 'integer'],
            [['uid'], 'string', 'max' => 20],
            [['questionid', 'answerCorrect'], 'string', 'max' => 10],
            [['answer'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'questionid' => 'Questionid',
            'answer' => 'Answer',
            'answerCorrect' => 'Answer Correct',
            'paperID' => 'Paper ID',
        ];
    }
}
