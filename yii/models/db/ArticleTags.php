<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "{{%articles_tags}}".
 *
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 *
 * @property articles $article
 * @property tags $tag
 */
class ArticleTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'tag_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'article_id' => Yii::t('app', ' '),
            'tag_id' => Yii::t('app', ' '),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }

    /**
     * @inheritdoc
     * @return BlogArticlesSubcategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleTagsQuery(get_called_class());
    }
}
