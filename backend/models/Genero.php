<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property integer $idGenero
 * @property string $nombreGenero
 *
 * @property Pelicula[] $peliculas
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreGenero'], 'required'],
            [['nombreGenero'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGenero' => 'Id Genero',
            'nombreGenero' => 'Nombre Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['idGenero' => 'idGenero']);
    }
}
