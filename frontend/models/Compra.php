<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "compra".
 *
 * @property integer $idCompra
 * @property integer $cantidad
 * @property double $subtotalCompra
 * @property integer $idUsuario
 * @property integer $idPresentacion
 * @property string $createdAt
 *
 * @property Presentacion $idPresentacion0
 * @property User $idUsuario0
 * @property Ticket[] $tickets
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'cantidad', 'subtotalCompra', 'idUsuario', */'idPresentacion'], 'required'],
            [['cantidad', 'idUsuario', 'idPresentacion'], 'integer'],
            [['subtotalCompra'], 'number'],
            [['createdAt'], 'safe'],
            [['idPresentacion'], 'exist', 'skipOnError' => true, 'targetClass' => Presentacion::className(), 'targetAttribute' => ['idPresentacion' => 'idPresentacion']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUsuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCompra' => 'Id Compra',
            'cantidad' => 'Cantidad',
            'subtotalCompra' => 'Subtotal Compra',
            'idUsuario' => 'Id Usuario',
            'idPresentacion' => 'Id Presentacion',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPresentacion0()
    {
        return $this->hasOne(Presentacion::className(), ['idPresentacion' => 'idPresentacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['idCompra' => 'idCompra']);
    }
    public function getcomboPresentacion() {
      $time = new \DateTime('now');
      $today = $time->format('Y-m-d');
      /*$today = $time->format('Y-m-d H:i:s');*/
        $models = Presentacion::find()->select(['idPresentacion', 'CONCAT(tituloPelicula," : ",nombreIdioma,IF(subtitulos," - Subtitulada","")," : ",nombreFormato," : ",fecha," ",nombreHorario) AS full_name'])->leftJoin('horario','`Horario`.`idHorario` = `presentacion`.`idHorario`')->leftJoin('formato','`formato`.`idFormato` = `presentacion`.`idFormato`')->leftJoin('idioma','`idioma`.`idIdioma` = `presentacion`.`idIdioma`')->leftJoin('Pelicula','`pelicula`.`idPelicula` = `presentacion`.`idPelicula`')->where(['>=','fecha',$today])->asArray()->all();
        return ArrayHelper::map($models, 'idPresentacion', 'full_name');
    }
}
