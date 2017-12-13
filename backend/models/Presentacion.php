<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "presentacion".
 *
 * @property integer $idPresentacion
 * @property integer $idPelicula
 * @property integer $idSala
 * @property string $fecha
 * @property integer $idHorario
 * @property integer $idIdioma
 * @property integer $idFormato
 *
 * @property Formato $idFormato0
 * @property Horario $idHorario0
 * @property Idioma $idIdioma0
 * @property Pelicula $idPelicula0
 * @property Sala $idSala0
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPelicula', 'idSala', 'fecha', 'idHorario', 'idIdioma', 'idFormato'], 'required'],
            [['idPelicula', 'idSala', 'idHorario', 'idIdioma', 'idFormato'], 'integer'],
            [['fecha'], 'safe'],
            [['idPelicula', 'idSala'], 'unique', 'targetAttribute' => ['idPelicula', 'idSala'], 'message' => 'The combination of Id Pelicula and Id Sala has already been taken.'],
            [['idFormato'], 'exist', 'skipOnError' => true, 'targetClass' => Formato::className(), 'targetAttribute' => ['idFormato' => 'idFormato']],
            [['idHorario'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['idHorario' => 'idHorario']],
            [['idIdioma'], 'exist', 'skipOnError' => true, 'targetClass' => Idioma::className(), 'targetAttribute' => ['idIdioma' => 'idIdioma']],
            [['idPelicula'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::className(), 'targetAttribute' => ['idPelicula' => 'idPelicula']],
            [['idSala'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['idSala' => 'idSala']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPresentacion' => 'Id Presentacion',
            'idPelicula' => 'Id Pelicula',
            'idSala' => 'Id Sala',
            'fecha' => 'Fecha',
            'idHorario' => 'Id Horario',
            'idIdioma' => 'Id Idioma',
            'idFormato' => 'Id Formato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFormato0()
    {
        return $this->hasOne(Formato::className(), ['idFormato' => 'idFormato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdHorario0()
    {
        return $this->hasOne(Horario::className(), ['idHorario' => 'idHorario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdIdioma0()
    {
        return $this->hasOne(Idioma::className(), ['idIdioma' => 'idIdioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelicula0()
    {
        return $this->hasOne(Pelicula::className(), ['idPelicula' => 'idPelicula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSala0()
    {
        return $this->hasOne(Sala::className(), ['idSala' => 'idSala']);
    }
    public function getcomboSala() {
        $models = Sala::find()->asArray()->all();
        return ArrayHelper::map($models, 'idSala', 'nombreSala');
    }
    public function getcomboPelicula() {
        $models = Pelicula::find()->asArray()->all();
        return ArrayHelper::map($models, 'idPelicula', 'tituloPelicula');
    }
    public function getcomboHorario() {
        $models = Horario::find()->asArray()->all();
        return ArrayHelper::map($models, 'idHorario', 'nombreHorario');
    }
    public function getcomboIdioma() {
        $models = Idioma::find()->asArray()->all();
        return ArrayHelper::map($models, 'idIdioma', 'nombreIdioma');
    }
    public function getcomboFormato() {
        $models = Formato::find()->asArray()->all();
        return ArrayHelper::map($models, 'idFormato', 'nombreFormato');
    }
}
