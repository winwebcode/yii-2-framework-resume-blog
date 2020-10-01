<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property string $ticket_name
 * @property string $ticket_email
 * @property string $ticket_subject
 * @property string $ticket_text
 * @property int $ticket_id
 */
class TicketForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_name', 'ticket_email', 'ticket_subject', 'ticket_text'], 'required'],
            [['ticket_name', 'ticket_email', 'ticket_subject', 'ticket_text'], 'string'],
            ['ticket_email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_name' => 'TicketForm Name',
            'ticket_email' => 'TicketForm Email',
            'ticket_subject' => 'TicketForm Subject',
            'ticket_text' => 'TicketForm Text',
            'ticket_id' => 'TicketForm ID',
        ];
    }
}
