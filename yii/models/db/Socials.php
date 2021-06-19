<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%socials}}"
 * 
 * @property $id
 * @property $name
 * @property $link
 * 
 */

 class Socials extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%socials}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'string'],
            [['id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'link' => Yii::t('app', 'Link'),
        ];
    }

 }