<?php

namespace common\models\lea;

use Yii;

/**
 * This is the model class for table "djquestion_banklist".
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
class DjquestionBanklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'djquestion_banklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'analysis'], 'required'],
            [['question'], 'string', 'max' => 50],
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
