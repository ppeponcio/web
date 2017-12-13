<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "ticket".
 *
 * @property integer $idTicket
 * @property integer $idAsiento
 * @property integer $idCompra
 *
 * @property Asiento $idAsiento0
 * @property Compra $idCompra0
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['idAsiento'/*, 'idCompra'*/], 'required'],
            [['idAsiento', 'idCompra'], 'integer'],
            [['idAsiento'], 'unique'],
            [['idAsiento'], 'exist', 'skipOnError' => true, 'targetClass' => Asiento::className(), 'targetAttribute' => ['idAsiento' => 'idAsiento']],
            [['idCompra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['idCompra' => 'idCompra']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTicket' => 'Id Ticket',
            'idAsiento' => 'Id Asiento',
            'idCompra' => 'Id Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsiento0()
    {
        return $this->hasOne(Asiento::className(), ['idAsiento' => 'idAsiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompra0()
    {
        return $this->hasOne(Compra::className(), ['idCompra' => 'idCompra']);
    }
    public function getcomboAsientos($idPresentacion) {
        $subQuery= Asiento::find()->select('asiento.idAsiento')->leftJoin('ticket','`ticket`.`idAsiento` = `asiento`.`idAsiento`')->leftJoin('compra','`compra`.`idCompra` = `ticket`.`idCompra`')->where(['compra.idPresentacion' => $idPresentacion]);
        $query = Asiento::find()->select('asiento.*')->leftJoin('fila','`fila`.`idFila` = `asiento`.`idFila`')->leftJoin('presentacion','`presentacion`.`idSala` = `fila`.`idSala`')->where(['presentacion.idPresentacion' => $idPresentacion])->andWhere(['not in','idAsiento',$subQuery]);
        $models=$query->all();
        return ArrayHelper::map($models, 'idAsiento','nombreSiento','idFila0.nombreFila'
      );
    }
    public function getcomboAsientosId($idPresentacion) {
        $models = Asiento::find()->select('asiento.*')->leftJoin('fila','`fila`.`idFila` = `asiento`.`idFila`')->leftJoin('presentacion','`presentacion`.`idSala` = `fila`.`idSala`')->where(['presentacion.idPresentacion' => $idPresentacion])->all();
        return ArrayHelper::map($models, 'idAsiento','nombreSiento','idFila0.nombreFila'
      );
    }

}
