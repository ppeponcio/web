<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "actor".
 *
 * @property integer $idPelicula
 * @property integer $idPersona
 *
 * @property Pelicula $idPelicula0
 * @property Persona $idPersona0
 */
class Actor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPelicula', 'idPersona'], 'required'],
            [['idPelicula', 'idPersona'], 'integer'],
            [['idPelicula'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::className(), 'targetAttribute' => ['idPelicula' => 'idPelicula']],
            [['idPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['idPersona' => 'idPersona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPelicula' => 'Id Pelicula',
            'idPersona' => 'Id Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelicula0()
    {
        return $this->hasOne(Pelicula::className(), ['idPelicula' => 'idPelicula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona0()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'idPersona']);
    }
    public function getcomboPelicula() {
        $models = Pelicula::find()->asArray()->all();
        return ArrayHelper::map($models, 'idPelicula', 'tituloPelicula');
    }
    public function getcomboPersona() {
        $models = Persona::find()->where(['director'=>'0'])->asArray()->all();
        return ArrayHelper::map($models, 'idPersona',
        function($model, $defaultValue) {
        return $model['nombrePersona'].' '.$model['apellidoPersona'];
    });
    }
}
