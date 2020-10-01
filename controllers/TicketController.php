<?php


namespace app\controllers;
use app\models\TicketForm;
use Yii;

class TicketController extends AppController
{
    public $layout = 'simple';

    public function actionCreateTicket()
    {

      $newTicket = new TicketForm();
        //insert data
    /*    $newTicket->ticket_name = 'Ваше имя';
        $newTicket->ticket_email = '44ru';
        $newTicket->ticket_subject = 'Когда обновится дизайн';
        $newTicket->ticket_text = 'Текст обращения';
        $newTicket->save();*/

        if($newTicket->load(Yii::$app->request->post())) {
            if($newTicket->insert()) {
                Yii::$app->session->setFlash('success', 'Сообщение отправлено');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }


        $getTicket = TicketForm::findOne(9);

        if($getTicket->load(Yii::$app->request->post())) {
            if($getTicket->update()) {
                Yii::$app->session->setFlash('success', 'Сообщение отредактировано');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->view->title = 'Send TicketForm';
        return $this->render('ticket', compact('newTicket','getTicket'));
    }

    public function actionEditTicket()
    {

        return $this->render('ticket', compact('getTicket'));
    }

}