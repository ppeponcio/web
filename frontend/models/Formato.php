<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formato".
 *
 * @property integer $idFormato
 * @property string $nombreFormato
 * @property integer $idPrecio
 *
 * @property Precio $idPrecio0
 * @property Presentacion[] $presentacions
 */
class Formato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreFormato', 'idPrecio'], 'required'],
            [['idPrecio'], 'integer'],
            [['nombreFormato'], 'string', 'max' => 150],
            [['idPrecio'], 'exist', 'skipOnError' => true, 'targetClass' => Precio::className(), 'targetAttribute' => ['idPrecio' => 'idPrecio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFormato' => 'Id Formato',
            'nombreFormato' => 'Nombre Formato',
            'idPrecio' => 'Id Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrecio0()
    {
        return $this->hasOne(Precio::className(), ['idPrecio' => 'idPrecio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['idFormato' => 'idFormato']);
    }
}
