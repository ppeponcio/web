<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fila".
 *
 * @property integer $idFila
 * @property string $nombreFila
 * @property integer $idSala
 *
 * @property Asiento[] $asientos
 * @property Sala $idSala0
 */
class Fila extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fila';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreFila', 'idSala'], 'required'],
            [['idSala'], 'integer'],
            [['nombreFila'], 'string', 'max' => 1],
            [['idSala'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['idSala' => 'idSala']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFila' => 'Id Fila',
            'nombreFila' => 'Nombre Fila',
            'idSala' => 'Id Sala',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsientos()
    {
        return $this->hasMany(Asiento::className(), ['idFila' => 'idFila']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSala0()
    {
        return $this->hasOne(Sala::className(), ['idSala' => 'idSala']);
    }
}
