<?php
use app\models\Ticket;
use yii\helpers\Html;
?>
<td>
    <?= $form->field($ticket, 'idAsiento')->dropDownList($ticket->getcomboAsientos(Yii::$app->getRequest()->getQueryParam('idPresentacion')),[
        'id' => "Tickets_{$key}_idAsiento",
        'name' => "Tickets[$key][idAsiento]",
    ])->label(false) ?>
</td>
<td>
    <?= Html::a('Remove ' . $key, 'javascript:void(0);', [
      'class' => 'compra-remove-ticket-button btn btn-default btn-xs',
    ]) ?>
</td>
