<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sala;

/**
 * SalaSearch represents the model behind the search form about `app\models\Sala`.
 */
class SalaSearch extends Sala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSala', 'idCine'], 'integer'],
            [['nombreSala'], 'safe'],
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
        $query = Sala::find();

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
            'idSala' => $this->idSala,
            'idCine' => $this->idCine,
        ]);

        $query->andFilterWhere(['like', 'nombreSala', $this->nombreSala]);

        return $dataProvider;
    }
}
