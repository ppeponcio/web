<?php
use app\models\Ticket;
use yii\helpers\Html;
?>
<td>
    <?= $form->field($ticket, 'idAsiento')->dropDownList($ticket->getcomboAsientos(Yii::$app->getRequest()->getCookies()->getValue('yolo', (isset($_COOKIE['yolo']))? $_COOKIE['yolo']: '60')),[
        'id' => "Tickets_{$key}_idAsiento",
        'name' => "Tickets[$key][idAsiento]",
    ])->label(false) ?>
</td>
<td>
    <?= Html::a('Remove ' . $key, 'javascript:void(0);', [
      'class' => 'compra-remove-ticket-button btn btn-default btn-xs',
    ]) ?>
</td>
