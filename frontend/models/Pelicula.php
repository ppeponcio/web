<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelicula".
 *
 * @property integer $idPelicula
 * @property string $tituloPelicula
 * @property integer $duracion
 * @property string $sinopsis
 * @property string $fechaEstreno
 * @property integer $idGenero
 * @property integer $idDirector
 *
 * @property Actor[] $actors
 * @property Persona[] $idPersonas
 * @property Persona $idDirector0
 * @property Genero $idGenero0
 * @property Presentacion[] $presentacions
 */
class Pelicula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelicula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tituloPelicula', 'duracion', 'sinopsis', 'fechaEstreno', 'idGenero', 'idDirector'], 'required'],
            [['duracion', 'idGenero', 'idDirector'], 'integer'],
            [['fechaEstreno'], 'safe'],
            [['tituloPelicula'], 'string', 'max' => 150],
            [['sinopsis'], 'string', 'max' => 300],
            [['idDirector'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['idDirector' => 'idPersona']],
            [['idGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['idGenero' => 'idGenero']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPelicula' => 'Id Pelicula',
            'tituloPelicula' => 'Titulo Pelicula',
            'duracion' => 'Duracion',
            'sinopsis' => 'Sinopsis',
            'fechaEstreno' => 'Fecha Estreno',
            'idGenero' => 'Id Genero',
            'idDirector' => 'Id Director',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::className(), ['idPelicula' => 'idPelicula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonas()
    {
        return $this->hasMany(Persona::className(), ['idPersona' => 'idPersona'])->viaTable('actor', ['idPelicula' => 'idPelicula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDirector0()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'idDirector']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenero0()
    {
        return $this->hasOne(Genero::className(), ['idGenero' => 'idGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['idPelicula' => 'idPelicula']);
    }
}
