<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asiento".
 *
 * @property integer $idAsiento
 * @property string $nombreSiento
 * @property integer $idFila
 *
 * @property Fila $idFila0
 * @property Ticket[] $tickets
 * @property Presentacion[] $idPresentacions
 */
class Asiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreSiento', 'idFila'], 'required'],
            [['idFila'], 'integer'],
            [['nombreSiento'], 'string', 'max' => 2],
            [['idFila'], 'exist', 'skipOnError' => true, 'targetClass' => Fila::className(), 'targetAttribute' => ['idFila' => 'idFila']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAsiento' => 'Id Asiento',
            'nombreSiento' => 'Nombre Siento',
            'idFila' => 'Id Fila',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFila0()
    {
        return $this->hasOne(Fila::className(), ['idFila' => 'idFila']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['idAsiento' => 'idAsiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['idPresentacion' => 'idPresentacion'])->viaTable('ticket', ['idAsiento' => 'idAsiento']);
    }
}
