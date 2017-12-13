<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Precio;

/**
 * PrecioSearch represents the model behind the search form about `app\models\Precio`.
 */
class PrecioSearch extends Precio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPrecio'], 'integer'],
            [['nombrePrecio'], 'safe'],
            [['valorPrecio'], 'number'],
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
        $query = Precio::find();

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
            'idPrecio' => $this->idPrecio,
            'valorPrecio' => $this->valorPrecio,
        ]);

        $query->andFilterWhere(['like', 'nombrePrecio', $this->nombrePrecio]);

        return $dataProvider;
    }
}
