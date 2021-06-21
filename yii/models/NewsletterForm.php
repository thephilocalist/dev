<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\db\Subscribers;

/**
 * ContactForm is the model behind the contact form.
 */
class NewsletterForm extends Model
{
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'email' => '',
        ];
    }

    public function submit()
    {
        if ($this->validate()) {
            $subscriber = new Subscribers();
            $subscriber->email = $this->email;
            $subscriber->subscribed_at = time();

            if ($subscriber->save()) {
                return true;
            }
            return false;
        }
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
}
