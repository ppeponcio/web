<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cine;
use app\models\User;

/**
 * CineSearch represents the model behind the search form about `app\models\Cine`.
 */
class CineSearch extends Cine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCine', 'idCadena'], 'integer'],
            [['nombreCine', 'direccionCine'], 'safe'],
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
        $usuario = User::find()->where(['id' => Yii::$app->user->id])->one();
        if($usuario->idCadena !== null){
          $query = Cine::find()->where(['idCadena' => $usuario->idCadena]);
        }else{
          $query = Cine::find();
        }


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
            'idCine' => $this->idCine,
            'idCadena' => $this->idCadena,
        ]);

        $query->andFilterWhere(['like', 'nombreCine', $this->nombreCine])
            ->andFilterWhere(['like', 'direccionCine', $this->direccionCine]);

        return $dataProvider;
    }
}
