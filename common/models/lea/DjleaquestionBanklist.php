<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "djleaquestion_banklist".
 *
 * @property integer $questionid
 * @property string $question
 * @property string $answerA
 * @property string $answerB
 * @property string $answerC
 * @property string $answerD
 * @property string $answerCorrect
 * @property string $questionflag
 * @property string $bankID
 * @property string $score
 * @property string $analysis
 */
class DjleaquestionBanklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'djleaquestion_banklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'analysis'], 'required'],
            [['question'], 'string', 'max' => 700],
            [['answerA', 'answerB', 'answerC', 'answerD', 'answerCorrect', 'questionflag', 'bankID'], 'string', 'max' => 128],
            [['score'], 'string', 'max' => 2],
            [['analysis'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'questionid' => 'Questionid',
            'question' => 'Question',
            'answerA' => 'Answer A',
            'answerB' => 'Answer B',
            'answerC' => 'Answer C',
            'answerD' => 'Answer D',
            'answerCorrect' => 'Answer Correct',
            'questionflag' => 'Questionflag',
            'bankID' => 'Bank ID',
            'score' => 'Score',
            'analysis' => 'Analysis',
        ];
    }
}
