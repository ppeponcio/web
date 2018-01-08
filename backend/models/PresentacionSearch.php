<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presentacion;
use app\models\Sala;
use app\models\Cine;
use app\models\User;

/**
 * PresentacionSearch represents the model behind the search form about `app\models\Presentacion`.
 */
class PresentacionSearch extends Presentacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPresentacion', 'idPelicula', 'idSala', 'idHorario', 'idIdioma', 'idFormato'], 'integer'],
            [['fecha'], 'safe'],
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
          $query = Presentacion::findBySql('SELECT * from presentacion WHERE idSala IN (SELECT idSala FROM sala WHERE idCine IN (SELECT idCine FROM cine WHERE idCadena = '.$usuario->idCadena.'))');
        }else{
          $query = Presentacion::find();
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
            'idPresentacion' => $this->idPresentacion,
            'idPelicula' => $this->idPelicula,
            'idSala' => $this->idSala,
            'fecha' => $this->fecha,
            'idHorario' => $this->idHorario,
            'idIdioma' => $this->idIdioma,
            'idFormato' => $this->idFormato,
        ]);

        return $dataProvider;
    }
}
