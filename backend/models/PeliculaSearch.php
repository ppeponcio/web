<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelicula;

/**
 * PeliculaSearch represents the model behind the search form about `app\models\Pelicula`.
 */
class PeliculaSearch extends Pelicula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPelicula', 'duracion', 'idGenero', 'idDirector'], 'integer'],
            [['tituloPelicula', 'sinopsis', 'fechaEstreno'], 'safe'],
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
        $query = Pelicula::find();

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
            'idPelicula' => $this->idPelicula,
            'duracion' => $this->duracion,
            'fechaEstreno' => $this->fechaEstreno,
            'idGenero' => $this->idGenero,
            'idDirector' => $this->idDirector,
        ]);

        $query->andFilterWhere(['like', 'tituloPelicula', $this->tituloPelicula])
            ->andFilterWhere(['like', 'sinopsis', $this->sinopsis]);

        return $dataProvider;
    }
}
