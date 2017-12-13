<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cadena".
 *
 * @property integer $idCadena
 * @property string $nombreCadena
 * @property string $numeroContacto
 *
 * @property Cine[] $cines
 */
class Cadena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cadena';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCadena', 'numeroContacto'], 'required'],
            [['nombreCadena'], 'string', 'max' => 100],
            [['numeroContacto'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCadena' => 'Id Cadena',
            'nombreCadena' => 'Nombre Cadena',
            'numeroContacto' => 'Numero Contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCines()
    {
        return $this->hasMany(Cine::className(), ['idCadena' => 'idCadena']);
    }
}
