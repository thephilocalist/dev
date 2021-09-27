<?php

namespace app\models\db;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\BaseHtml;
use yii\helpers\HtmlPurifier;
use Cocur\Slugify\Slugify;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property int $id
 * @property int $author_id
 * @property int $published
 * @property int $featured
 * @property string $title
 * @property string $slug
 * @property string $subtitle
 * @property string $text
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $main_photo
 * @property string $featured_photo
 * @property string $category_photo
 * @property int $publish_at
 * @property int $published_at
 * @property int $updated_at
 * @property int $created_at
 * 
 * @property authors $authors
 * @property categories[] $categories
 * @property Categories $categories
 * @property tags[] $tags
 * @property Tags $tags
 */
class Articles extends \yii\db\ActiveRecord
{
    public $Categories, $dirtyCategoryId, $Tags;

    public function fields()
    {
        return array_merge($this->attributes(), ['categories', 'tags']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'title'], 'required'],
            [['author_id', 'published_at', 'updated_at', 'created_at', 'featured', 'published'], 'integer'],
            [['text', 'meta_keywords', 'main_photo', 'featured_photo', 'category_photo'], 'string'],
            [['title', 'main_photo', 'featured_photo', 'category_photo'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 300],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_description'], 'string', 'max' => 160],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
          [
            'class' => SluggableBehavior::className(),
            'value' => function () {
                $slugify = new Slugify();

                return  $slugify->slugify($this->title);
            },
            'ensureUnique' => true,
          ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'author_id' => Yii::t('app', 'Author'),
            'published' => Yii::t('app', 'Published'),
            'featured' => Yii::t('app', 'Featured'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'main_photo' => Yii::t('app', 'Main Photo'),
            'featured_photo' => Yii::t('app', 'Featured Photo'),
            'category_photo' => Yii::t('app', 'Category Photo'),
            'text' => Yii::t('app', 'Text'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'published_at' => Yii::t('app', 'Published At'),
            'publish_at' => Yii::t('app', 'Publish At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated' => Yii::t('app', 'Updated'),
            'Categories' => Yii::t('app', ' '),
            'Tags' => Yii::t('app', ' '),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(ArticleCategories::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategories::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(ArticleTags::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     *//* 
    public function getBlogArticlesSubcategories()
    {
        return $this->hasMany(BlogArticlesSubcategories::className(), ['article_id' => 'id']);
    } */

    /**
     * @return \yii\db\ActiveQuery
     *//* 
    public function getBlogArticlesTags()
    {
        return $this->hasMany(BlogArticlesTags::className(), ['article_id' => 'id']);
    } */

    /**
     * @return \yii\db\ActiveQuery
     *//* 
    public function getBlogArticlesArchitects()
    {
        return $this->hasMany(BlogArticlesArchitects::className(), ['blod_article_id' => 'id']);
    } */

    /**
     * @return \yii\db\ActiveQuery
     *//* 
    public function getBlogArticlesProjects()
    {
        return $this->hasMany(BlogArticlesProjects::className(), ['blod_article_id' => 'id']);
    } */

    /**
     * @return \yii\db\ActiveQuery
     *//* 
    public function getBlogArticlesPhotos()
    {
        return $this->hasMany(BlogArticlesPhotos::className(), ['article_id' => 'id']);
    } */

    /**
     * {@inheritdoc}
     *
     * @return ArticlesQuery the active query used by this AR class
     */
    public static function find()
    {
        return new ArticlesQuery(get_called_class());
    }
    
    public static function findCategoryArticles()
    {
        return new ArticlesQuery(get_called_class());
    }

    public function beforeSave($record)
    {
        if (parent::beforeSave($record)) {
            $purifier = new HtmlPurifier();
            $this->text = BaseHtml::decode($this->text);
            $this->text = $purifier->process($this->text, function ($config) {
                $config->set('Core.Encoding', 'UTF-8');
                $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
                $config->set('HTML.DefinitionID', 'html5final');
                $config->set('HTML.DefinitionRev', 1);
                $config->set('HTML.TargetBlank', true);
                $config->set('HTML.Nofollow', true);
                $config->set('CSS.AllowTricky', true);
                $config->set('HTML.SafeIframe', true);
                $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%');
                $config->set('HTML.Allowed', 'iframe[src], iframe[style], iframe[frameborder], iframe, em, blockquote, del, span[style], h1[class], h2[class], h3[class], h4[class], h5[class], h6[class], h1[style], h2[style], h3[style], h4[style], h5[style], h6[style], br, figure[style], p, p[style], p[id], p[class], img[src], img[style], img[alt], img[title], img[width], a[href|target], strong, strong[class], br, div[class], div[id], ul, ol, li, em, b');
                $config->set('Attr.AllowedFrameTargets', ['_blank', '_self', '_parent', '_top']);
                $config->set('CSS.AllowedProperties', ['width', 'display', 'margin', 'font-size', 'color', 'text-align']);
                $config->set('AutoFormat.RemoveEmpty', true);
                if ($def = $config->maybeGetRawHTMLDefinition()) {
                    $def->addElement('figure', 'Block', 'Flow', 'Common', array());
                    $def->addElement('del', 'Block', 'Flow', 'Common', array());
                    $def->addElement('blockquote', 'Block', 'Flow', 'Common', array());
                    $def->addElement('iframe', 'Block', 'Flow', 'Common', array());
                }
            });

            if ($this->isAttributeChanged('published', false) && $this->published == 1) {
                $this->touch('published_at');
            }

            if ($this->isAttributeChanged('category_id', false)) {
                $this->dirtyCategoryId = 1;
            } else {
                $this->dirtyCategoryId = 0;
            }

            return true;
        }

        return false;
    }

    public function afterSave($insert, $changeAttributes)
    {
        parent::afterSave($insert, $changeAttributes);
        if ($this->dirtyCategoryId) {
            Categories::deleteAll(['article_id' => $this->id]);
        }
    }
}