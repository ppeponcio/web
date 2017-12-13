<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property integer $idHorario
 * @property string $nombreHorario
 * @property string $horaInicio
 * @property string $horaFin
 *
 * @property Presentacion[] $presentacions
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreHorario', 'horaInicio', 'horaFin'], 'required'],
            [['horaInicio', 'horaFin'], 'safe'],
            [['nombreHorario'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idHorario' => 'Id Horario',
            'nombreHorario' => 'Nombre Horario',
            'horaInicio' => 'Hora Inicio',
            'horaFin' => 'Hora Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['idHorario' => 'idHorario']);
    }
}
