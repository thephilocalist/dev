<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%articles}}"
 * 
 * @property $id
 * @property $title
 * @property $text
 * @property $author
 * @property $published
 * @property $created_at
 * @property $published_at
 * @property $meta_title
 * @property $meta_description
 * @property $meta_keywords
 * @property $slung
 * @property $photo
 * 
 */

 class Articles extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'author', 'meta_title', 'meta_description', 'meta_keywords', 'slung', 'photo'], 'string'],
            [['id', 'published', 'created_at', 'published_at'], 'integer'],
            [['slung'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'published' => Yii::t('app', 'Published'),
            'published_at' => Yii::t('app', 'Published At'),
            'created' => Yii::t('app', 'Created At'),
            'author' => Yii::t('app', 'Author'),
            'photo' => Yii::t('app', 'Photo'),
        ];
    }
 }