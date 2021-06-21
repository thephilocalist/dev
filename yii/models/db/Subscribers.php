<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%subscribers}}"
 * 
 * @property $id
 * @property $email
 * @property $subscribed_at
 * 
 */

 class Subscribers extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscribers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email',], 'email'],
            [['id', 'subscribed_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'subscribed_at' => Yii::t('app', 'Subscribed'),
        ];
    }
 }