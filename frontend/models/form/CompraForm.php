<?php
namespace app\models\form;

use app\models\Compra; //Product
use app\models\Ticket;//Parcel
use app\models\Presentacion;
use app\models\Formato;
use app\models\Precio;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

class CompraForm extends Model
{
    private $_compra; //Product
    private $_tickets; //Parcel

    public function rules()
    {
        return [
            [['Compra'], 'required'], //Product
            [['Tickets'], 'safe'], //Parsel
        ];
    }

    public function afterValidate()
    {
        if (!Model::validateMultiple($this->getAllModels())) {
            $this->addError(null); // add an empty error to prevent saving
        }
        parent::afterValidate();
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        $transaction = Yii::$app->db->beginTransaction();
        $this->compra->cantidad=sizeof($this->tickets);
        $presentacion=Presentacion::findOne($this->compra->idPresentacion);
        $formato=Formato::findOne($presentacion->idFormato);
        $precio=Precio::findOne($formato->idPrecio);
        $this->compra->subtotalCompra=$this->compra->cantidad*($precio->valorPrecio);
        $this->compra->idUsuario=Yii::$app->user->id;
        if (!$this->compra->save()) { //Product
            $transaction->rollBack();
            return false;
        }
        if (!$this->saveTickets()) { //Parcel
            $transaction->rollBack();
            return false;
        }
        $transaction->commit();
        return true;
    }


    public function saveTickets() //Parcel
    {
        $keep = [];
        foreach ($this->tickets as $ticket) {  //Parcels Parcel
            $ticket->idCompra = $this->compra->idCompra; //Parcel idProducto Product idProduct
            if (!$ticket->save(false)) { //Parcel
                return false;
            }
            $keep[] = $ticket->idTicket; //Parcel idPArcel
        }
        $query = Ticket::find()->andWhere(['idCompra' => $this->compra->idCompra]);
        if ($keep) {
            $query->andWhere(['not in', 'idTicket', $keep]);
        }
        foreach ($query->all() as $ticket) {
            $ticket->delete();
        }
        return true;
    }

    public function getCompra()
    {
        return $this->_compra;
    }

    public function setCompra($compra)
    {
        if ($compra instanceof Compra) {
            $this->_compra = $compra;
        } else if (is_array($compra)) {
            $this->_compra->setAttributes($compra);
        }
    }

    public function getTickets()
    {
        if ($this->_tickets === null) {
            $this->_tickets = $this->compra->isNewRecord ? [] : $this->compra->tickets;
        }
        return $this->_tickets;
    }

    private function getTicket($key)
    {
        $ticket = $key && strpos($key, 'new') === false ? Ticket::findOne($key) : false;
        if (!$ticket) {
            $ticket = new Ticket();
            $ticket->loadDefaultValues();
        }
        return $ticket;
    }

    public function setTickets($tickets)
    {
        unset($tickets['__idTicket__']); // remove the hidden "new Parcel" row
        $this->_tickets = [];
        foreach ($tickets as $key => $ticket) {
            if (is_array($ticket)) {
                $this->_tickets[$key] = $this->getTicket($key);
                $this->_tickets[$key]->setAttributes($ticket);
            } elseif ($ticket instanceof Ticket) {
                $this->_tickets[$ticket->idTicket] = $ticket;
            }
        }
    }

    public function errorSummary($form)
    {
        $errorLists = [];
        foreach ($this->getAllModels() as $id => $model) {
            $errorList = $form->errorSummary($model, [
              'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
            ]);
            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
            $errorLists[] = $errorList;
        }
        return implode('', $errorLists);
    }

    private function getAllModels()
    {
        $models = [
            'Compra' => $this->compra,
        ];
        foreach ($this->tickets as $id => $ticket) {
            $models['Ticket.' . $id] = $this->tickets[$id];
        }
        return $models;
    }
}
