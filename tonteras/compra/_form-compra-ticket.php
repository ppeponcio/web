<?php
use app\models\Ticket;
use yii\helpers\Html;
?>
<td>
    <?= $form->field($ticket, 'idAsiento')->textInput([
        'id' => "Tickets_{$key}_idAsiento",
        'name' => "Tickets[$key][idAsiento]",
    ])->label(false) ?>
</td>
<td>
    <?= $form->field($ticket, 'idPresentacion')->textInput([
        'id' => "Tickets_{$key}_idPresentacion",
        'name' => "Tickets[$key][idPresentacion]",
    ])->label(false) ?>
</td>
<td>
    <?= Html::a('Remove ' . $key, 'javascript:void(0);', [
      'class' => 'compra-remove-ticket-button btn btn-default btn-xs',
    ]) ?>
</td>
