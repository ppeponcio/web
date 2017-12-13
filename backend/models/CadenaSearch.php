<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cadena;

/**
 * CadenaSearch represents the model behind the search form about `app\models\Cadena`.
 */
class CadenaSearch extends Cadena
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCadena'], 'integer'],
            [['nombreCadena', 'numeroContacto'], 'safe'],
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
        $query = Cadena::find();

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
            'idCadena' => $this->idCadena,
        ]);

        $query->andFilterWhere(['like', 'nombreCadena', $this->nombreCadena])
            ->andFilterWhere(['like', 'numeroContacto', $this->numeroContacto]);

        return $dataProvider;
    }
}
