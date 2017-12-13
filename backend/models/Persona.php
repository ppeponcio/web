<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $idPersona
 * @property string $nombrePersona
 * @property string $apellidoPersona
 * @property integer $director
 *
 * @property Actor[] $actors
 * @property Pelicula[] $idPeliculas
 * @property Pelicula[] $peliculas
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombrePersona', 'apellidoPersona', 'director'], 'required'],
            [['director'], 'integer'],
            [['nombrePersona', 'apellidoPersona'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'nombrePersona' => 'Nombre Persona',
            'apellidoPersona' => 'Apellido Persona',
            'director' => 'Director',
            'fullName' => Yii::t('app', 'Full Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::className(), ['idPersona' => 'idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['idPelicula' => 'idPelicula'])->viaTable('actor', ['idPersona' => 'idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['idDirector' => 'idPersona']);
    }
    public function getFullName() {
   return $this->nombrePersona . ' ' . $this->apellidoPersona;
}
}
