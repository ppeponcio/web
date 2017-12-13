<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "precio".
 *
 * @property integer $idPrecio
 * @property string $nombrePrecio
 * @property double $valorPrecio
 *
 * @property Formato[] $formatos
 */
class Precio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'precio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombrePrecio', 'valorPrecio'], 'required'],
            [['valorPrecio'], 'number'],
            [['nombrePrecio'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPrecio' => 'Id Precio',
            'nombrePrecio' => 'Nombre Precio',
            'valorPrecio' => 'Valor Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormatos()
    {
        return $this->hasMany(Formato::className(), ['idPrecio' => 'idPrecio']);
    }
}
