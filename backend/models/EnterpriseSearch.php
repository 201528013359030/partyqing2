<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Enterprise;

/**
 * EnterpriseSearch represents the model behind the search form about `common\models\Enterprise`.
 */
class EnterpriseSearch extends Enterprise
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eid', 'ofIndustry', 'isOpen', 'offlinemsgpath'], 'integer'],
            [['ename', 'type', 'intro', 'phoneNumber', 'faxNumber', 'license', 'logo', 'memo', 'uid', 'vision', 'officeAddress', 'contacts', 'postCode', 'email', 'webSite', 'defaultTypes', 'centrexNumber', 'outPrefix'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Enterprise::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'eid' => $this->eid,
            'ofIndustry' => $this->ofIndustry,
            'isOpen' => $this->isOpen,
            'offlinemsgpath' => $this->offlinemsgpath,
        ]);

        $query->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'phoneNumber', $this->phoneNumber])
            ->andFilterWhere(['like', 'faxNumber', $this->faxNumber])
            ->andFilterWhere(['like', 'license', $this->license])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'vision', $this->vision])
            ->andFilterWhere(['like', 'officeAddress', $this->officeAddress])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'postCode', $this->postCode])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'webSite', $this->webSite])
            ->andFilterWhere(['like', 'defaultTypes', $this->defaultTypes])
            ->andFilterWhere(['like', 'centrexNumber', $this->centrexNumber])
            ->andFilterWhere(['like', 'outPrefix', $this->outPrefix]);

        return $dataProvider;
    }
}
