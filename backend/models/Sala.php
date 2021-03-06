<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "sala".
 *
 * @property integer $idSala
 * @property string $nombreSala
 * @property integer $idCine
 *
 * @property Fila[] $filas
 * @property Presentacion[] $presentacions
 * @property Pelicula[] $idPeliculas
 * @property Cine $idCine0
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreSala', 'idCine'], 'required'],
            [['idCine'], 'integer'],
            [['nombreSala'], 'string', 'max' => 100],
            [['idCine'], 'exist', 'skipOnError' => true, 'targetClass' => Cine::className(), 'targetAttribute' => ['idCine' => 'idCine']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSala' => 'Id Sala',
            'nombreSala' => 'Nombre Sala',
            'idCine' => 'Id Cine',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilas()
    {
        return $this->hasMany(Fila::className(), ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['idPelicula' => 'idPelicula'])->viaTable('presentacion', ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCine0()
    {
        return $this->hasOne(Cine::className(), ['idCine' => 'idCine']);
    }
    public function getcomboCine() {
        $models = Cine::find()->asArray()->all();
        return ArrayHelper::map($models, 'idCine', 'nombreCine');
    }
}
