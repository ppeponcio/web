<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idioma".
 *
 * @property integer $idIdioma
 * @property string $nombreIdioma
 * @property integer $subtitulos
 */
class Idioma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idioma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreIdioma', 'subtitulos'], 'required'],
            [['subtitulos'], 'integer'],
            [['nombreIdioma'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIdioma' => 'Id Idioma',
            'nombreIdioma' => 'Nombre Idioma',
            'subtitulos' => 'Subtitulos',
        ];
    }
}
