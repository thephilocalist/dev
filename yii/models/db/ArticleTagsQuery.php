<?php

namespace app\models\db;

/**
 * This is the ActiveQuery class for [[ArticlesTags]].
 *
 * @see ArticlesTags
 */
class ArticleTagsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesTags[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesTags|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}