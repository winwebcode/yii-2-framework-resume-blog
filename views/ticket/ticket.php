<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ActiveField;
use app\components\FirstWidget;

?>

<?php
/*test widgets*/
//echo FirstWidget::widget(['name' => 'Random']);

FirstWidget::begin();
?> <p> first widget </p> <?php
FirstWidget::end();

?>
<h2>Форма обратной связи</h2>
<p>Ваш IP: <?php Yii::$app->request->userIP; ?></p><br>
<?php


if(Yii::$app->session->hasFlash('success')) {?>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>


    <?php
} else { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php
}

/*
 $form = ActiveForm::begin(['id' => 'ticketForm']);
    echo $form->field($newTicket, 'ticket_name');
    echo $form->field($newTicket, 'ticket_email')->input('email');
    echo $form->field($newTicket, 'ticket_subject');
    echo $form->field($newTicket, 'ticket_text')->textarea(['rows'=>7]);
    echo Html::submitButton('Отправить сообщение', ['class' =>'btn btn-success' ]);
ActiveForm::end();*/

$form2 = ActiveForm::begin(['id' => 'updateTicketForm']);
echo $form2->field($getTicket, 'ticket_name');
echo $form2->field($getTicket, 'ticket_email')->input('email');
echo $form2->field($getTicket, 'ticket_subject');
echo $form2->field($getTicket, 'ticket_text')->textarea(['rows'=>7]);
echo Html::submitButton('Отредактировать сообщение', ['class' =>'btn btn-success' ]);
ActiveForm::end();


//debuger($getTicket);


?>
