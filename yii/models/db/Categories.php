<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%categories}}"
 * 
 * @property $id
 * @property $title
 * @property $photo
 * @property $position
 * @property $slung
 * @property $meta_title
 * @property $meta_description
 * @property $meta_keywords
 * 
 * @property Articles[] $Articles
 */

 class Categories extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'photo', 'slung', 'meta_title', 'meta_description', 'meta_keywords'], 'string'],
            [['id', 'position'], 'integer'],
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
            'photo' => Yii::t('app', 'Photo'),
            'position' => Yii::t('app', 'Position'),
            'slung' => Yii::t('app', 'Slung'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['category_id' => 'id']);
    }
 }