<?php
use app\models\Ticket;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="compra-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false, // TODO get this working with client validation
    ]); ?>

    <?= $model->errorSummary($form); ?>

    <fieldset>
        <legend>Compra</legend>
        <?= $form->field($model->compra, 'idPresentacion')->dropDownList($model->compra->comboPresentacion) ?>
    </fieldset>

    <fieldset>
        <legend>Tickets
            <?php
            // new ticket button
            echo Html::a('New Ticket', 'javascript:void(0);', [
              'id' => 'compra-new-ticket-button',
              'class' => 'pull-right btn btn-default btn-xs'
            ])
            ?>
        </legend>
        <?php

        // ticket table
        $ticket = new Ticket();
        $ticket->loadDefaultValues();
        echo '<table id="compra-tickets" class="table table-condensed table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>' . $ticket->getAttributeLabel('idAsiento') . '</th>';
        echo '<td>&nbsp;</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // existing tickets fields
        foreach ($model->tickets as $key => $_ticket) {
          echo '<tr>';
          echo $this->render('_form-compra-ticket', [
            'key' => $_ticket->isNewRecord ? (strpos($key, 'new') !== false ? $key : 'new' . $key) : $_ticket->idTicket,
            'form' => $form,
            'ticket' => $_ticket,
          ]);
          echo '</tr>';
        }

        // new ticket fields
        echo '<tr id="compra-new-ticket-block" style="display: none;">';
        echo $this->render('_form-compra-ticket', [
            'key' => '__idTicket__',
            'form' => $form,
            'ticket' => $ticket,
        ]);
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';

        ?>

        <?php ob_start(); // output buffer the javascript to register later ?>
        <script>

            // add ticket button
            var ticket_k = <?php echo isset($key) ? str_replace('new', '', $key) : 0; ?>;
            $('#compra-new-ticket-button').on('click', function () {
                ticket_k += 1;
                $('#compra-tickets').find('tbody')
                  .append('<tr>' + $('#compra-new-ticket-block').html().replace(/__idTicket__/g, 'new' + ticket_k) + '</tr>');

            });

            // remove ticket button
            $(document).on('click', '.compra-remove-ticket-button', function () {
                $(this).closest('tbody tr').remove();
            });


        </script>
        <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>

    </fieldset>

    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>

</div>
