<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%authors}}"
 * 
 * @property $id
 * @property $name
 * @property $bio
 * @property $meta_title
 * @property $meta_description
 * @property $meta_keywords
 * @property $photo
 * 
 */

 class Authors extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'bio', 'meta_title', 'meta_description', 'meta_keywords', 'photo'], 'string'],
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
            'bio' => Yii::t('app', 'Bio'),
            'photo' => Yii::t('app', 'Photo'),
        ];
    }

 }