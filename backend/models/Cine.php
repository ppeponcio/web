<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cine".
 *
 * @property integer $idCine
 * @property string $nombreCine
 * @property string $direccionCine
 * @property integer $idCadena
 *
 * @property Cadena $idCadena0
 * @property Sala[] $salas
 */
class Cine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCine', 'direccionCine', 'idCadena'], 'required'],
            [['idCadena'], 'integer'],
            [['nombreCine'], 'string', 'max' => 100],
            [['direccionCine'], 'string', 'max' => 150],
            [['idCadena'], 'exist', 'skipOnError' => true, 'targetClass' => Cadena::className(), 'targetAttribute' => ['idCadena' => 'idCadena']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCine' => 'Id Cine',
            'nombreCine' => 'Nombre Cine',
            'direccionCine' => 'Direccion Cine',
            'idCadena' => 'Id Cadena',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCadena0()
    {
        return $this->hasOne(Cadena::className(), ['idCadena' => 'idCadena']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['idCine' => 'idCine']);
    }

    public function getcomboCadena() {
        $models = Cadena::find()->asArray()->all();
        return ArrayHelper::map($models, 'idCadena', 'nombreCadena');
    }
}
