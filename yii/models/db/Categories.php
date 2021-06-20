<?php 

namespace app\models\db;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\BaseHtml;
use yii\helpers\HtmlPurifier;
use Cocur\Slugify\Slugify;

/**
 * This is the model class for table "{{%categories}}"
 * 
 * @property $id
 * @property $title
 * @property $photo
 * @property $position
 * @property $slug
 * @property $enable
 * @property $meta_title
 * @property $meta_description
 * @property $meta_keywords
 * 
 * @property articles[] $articles
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
            [['title', 'photo', 'slug', 'meta_title', 'meta_description', 'meta_keywords'], 'string'],
            [['id', 'position', 'enable'], 'integer'],
            [['slug'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
          [
            'class' => SluggableBehavior::className(),
            'value' => function () {
                $slugify = new Slugify();

                $this->slug = $slugify->slugify($this->title);
                return  $slugify->slugify($this->title);
            },
            'ensureUnique' => true,
          ],
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
            'slug' => Yii::t('app', 'Slug'),
            'enable' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(ArticleCategories::className(), ['category_id' => 'id']);
    }
 }